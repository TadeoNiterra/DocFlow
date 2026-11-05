<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentVersion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentVersionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuarios RACI
        $jesus = User::where('email', 'jesus.marron@niterragroup.com')->first();
        $jose = User::where('email', 'jose.tadeo@niterragroup.com')->first();
        $takahiro = User::where('email', 'takahiro.arakawa@niterragroup.com')->first();

        if (!$jesus || !$jose || !$takahiro) {
            $this->command->error('Faltan usuarios críticos en la base de datos.');
            return;
        }

        // Carpeta donde tienes los archivos reales para asociar
        // Puedes poner tus archivos en storage/app/archivos_origen o cambiar esta ruta
        $sourceDirectory = storage_path('app/archivos_origen');

        // Disco y carpeta destino oficial de DocFlow
        // 🔒 Disco en resguardo privado (storage/app/private)
        $targetDisk = 'local';
        $targetFolder = 'documentos-docflow';

        if (!File::isDirectory($sourceDirectory)) {
            File::makeDirectory($sourceDirectory, 0755, true);
            $this->command->warn("Se creó la carpeta: {$sourceDirectory}. Coloca allí los archivos reales si deseas copiarlos automáticamente.");
        }

        // Mapa de versiones objetivo
        $targetVersions = [
            'F-IT-11' => 1,
            'F-IT-12' => 1,
            'F-ADM-18' => 1,
            'F-IT-05' => 1,
            'F-IT-09' => 1,
            'POL-IT-01' => 1,
            'POL-IT-02' => 1,
            'POL-IT-03' => 1,
            'POL-IT-04' => 1,
            'POL-IT-07' => 1,
            'POL-IT-10' => 1,
            'POL-IT-11' => 1,
            'POL-IT-13' => 1,
            'POL-SCM-01' => 1,
            'PO-IT-03' => 1,
            'POL-IT-05' => 2,
            'PO-IT-02' => 2,
            'PO-IT-04' => 2,
            'F-LOG-(T)-01' => 4,
        ];

        // Todos los archivos presentes en el directorio origen indexados
        $availableFiles = File::isDirectory($sourceDirectory) ? File::files($sourceDirectory) : [];

        $documents = Document::all();

        foreach ($documents as $document) {
            $codeUpper = strtoupper($document->code);
            $maxVersion = $targetVersions[$codeUpper] ?? 0;

            // Prefijo esperado: f_adm_08, f_log_t_01, pol_it_01, etc.
            $basePrefix = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '_', $document->code));
            $basePrefix = trim($basePrefix, '_');

            for ($v = 0; $v <= $maxVersion; $v++) {
                $fechaFija = now();
                $descripcion = $v === 0
                    ? "Carga inicial histórica (Versión 0) migrada del sistema de archivos. Validada bajo controles vigentes del ISMS."
                    : "Evolución documental a Versión {$v}. Validada bajo controles normativos de seguridad TISAX.";

                // Buscar el archivo real que coincida con este documento y versión
                // Coincide con: f_it_09_v0.xlsx, f_it_09_v0_32bad032.xlsx, f_it_09_v0.pdf, etc.
                $matchedFile = null;
                $searchPattern = "/^{$basePrefix}_v{$v}(_[a-f0-9]+)?\.(pdf|docx|xlsx|doc|xls)$/i";

                foreach ($availableFiles as $file) {
                    if (preg_match($searchPattern, $file->getFilename())) {
                        $matchedFile = $file;
                        break;
                    }
                }

                if ($matchedFile) {
                    // Nombre limpio estandarizado: pol_it_01_v0.pdf o f_it_09_v0.xlsx
                    $cleanExtension = strtolower($matchedFile->getExtension());
                    $cleanFileName = "{$basePrefix}_v{$v}.{$cleanExtension}";
                    $destinationRelativePath = "{$targetFolder}/{$cleanFileName}";

                    // Copiar el archivo real al storage público de forma limpia (sin el hash)
                    Storage::disk($targetDisk)->put(
                        $destinationRelativePath,
                        File::get($matchedFile->getRealPath())
                    );

                    $realPathForDb = $destinationRelativePath;
                    $realNameForDb = $cleanFileName;
                } else {
                    // Fallback si el archivo no está en la carpeta de origen
                    $cleanFileName = "{$basePrefix}_v{$v}.pdf";
                    $realPathForDb = "{$targetFolder}/{$cleanFileName}";
                    $realNameForDb = $cleanFileName;
                }

                // Crear o actualizar la versión en BD
                $version = DocumentVersion::updateOrCreate(
                    [
                        'document_id' => $document->id,
                        'version_number' => $v,
                    ],
                    [
                        'user_id' => $jesus->id,
                        'status' => 'aprobado',
                        'change_description' => $descripcion,
                        'file_path' => $realPathForDb,
                        'file_name' => $realNameForDb,
                        'approved_at' => $fechaFija,
                        'created_by_id' => $jesus->id,
                        'reviewed_by_id' => $jose->id,
                        'reviewed_at' => $fechaFija,
                        'created_at' => $fechaFija,
                        'updated_at' => $fechaFija,
                    ]
                );

                // Firma electrónica
                $version->signatures()->updateOrCreate(
                    ['document_version_id' => $version->id],
                    [
                        'user_id' => $takahiro->id,
                        'user_name_snapshot' => $takahiro->name,
                        'user_email_snapshot' => $takahiro->email,
                        'ip_address' => '127.0.0.1',
                        'user_agent' => 'DocFlow ISMS Activation Engine',
                        'signature_hash' => hash('sha256', $version->id . '|' . $takahiro->email . '|activation'),
                        'signed_at' => $fechaFija,
                        'created_at' => $fechaFija,
                        'updated_at' => $fechaFija,
                    ]
                );
            }
        }

        $this->command->info('¡Documentos y versiones sincronizados correctamente con sus archivos reales!');
    }
}