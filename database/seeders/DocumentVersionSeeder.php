<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentVersion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocumentVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Localizar a los 3 actores del flujo RACI mediante sus correos oficiales
        $jesus = User::where('email', 'jesus.marron@niterragroup.com')->first();
        $jose = User::where('email', 'jose.tadeo@niterragroup.com')->first();
        $takahiro = User::where('email', 'takahiro.arakawa@niterragroup.com')->first();

        if (!$jesus || !$jose || !$takahiro) {
            $this->command->error('Faltan usuarios críticos en la base de datos. Asegúrate de ejecutar el UserSeeder primero.');
            return;
        }

        // 2. Mapa estricto de la versión máxima de cada documento especial
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

        $documents = Document::all();

        foreach ($documents as $document) {
            $codeUpper = strtoupper($document->code);
            $maxVersion = $targetVersions[$codeUpper] ?? 0;

            // 3. Bucle para construir la línea de tiempo del documento
            for ($v = 0; $v <= $maxVersion; $v++) {

                // 🔥 Cambios Clave: Todo es aprobado y comparte la misma fecha fija al segundo exacto
                $fechaFija = now();
                $status = 'aprobado';
                $creatorId = $jesus->id;      // Elaborado Por (Jesús)
                $reviewerId = $jose->id;       // Revisado Por (José)
                $approvedAt = $fechaFija;      // Autorizado Por (Takahiro)

                $descripcion = $v === 0
                    ? "Carga inicial histórica (Versión 0) migrada del sistema de archivos. Validada bajo controles vigentes del ISMS."
                    : "Evolución documental a Versión {$v}. Validada bajo controles normativos de seguridad TISAX.";

                $fakeFileName = strtolower(str_replace(['(', ')', '-'], '_', $document->code)) . "_v{$v}.pdf";

                // Insertamos mapeando los campos que Filament lee
                $version = DocumentVersion::create([
                    'document_id' => $document->id,
                    'user_id' => $creatorId,
                    'version_number' => $v,
                    'status' => $status,
                    'change_description' => $descripcion,
                    'file_path' => "documentos/{$fakeFileName}",
                    'file_name' => $fakeFileName,
                    'approved_at' => $approvedAt,

                    // Asignación explícita para congelar los flujos del modal de Filament
                    'created_by_id' => $creatorId,
                    'reviewed_by_id' => $reviewerId,
                    'reviewed_at' => $fechaFija,

                    // Sincronización estricta de auditoría
                    'created_at' => $fechaFija,
                    'updated_at' => $fechaFija,
                ]);

                // 4. SELLO DIGITAL INMUTABLE: Todo documento aprobado genera su registro de firma oficial
                $version->signatures()->create([
                    'user_id' => $takahiro->id,
                    'user_name_snapshot' => $takahiro->name,
                    'user_email_snapshot' => $takahiro->email,
                    'ip_address' => '127.0.0.1',
                    'user_agent' => 'DocFlow ISMS Activation Engine',
                    'signature_hash' => hash('sha256', $version->id . '|' . $takahiro->email . '|activation'),
                    'signed_at' => $fechaFija,
                    'created_at' => $fechaFija,
                    'updated_at' => $fechaFija,
                ]);
            }
        }

        $this->command->info('¡ISMS Activado! Todos los documentos e históricos han sido inyectados con estatus APROBADO.');
    }
}