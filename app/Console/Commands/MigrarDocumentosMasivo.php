<?php

namespace App\Console\Commands;

use App\Models\Document;
use App\Models\DocumentVersion;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class MigrarDocumentosMasivo extends Command
{
    /**
     * El nombre y firma del comando para la consola.
     */
    protected $signature = 'docflow:migrar-masivo';

    /**
     * La descripción del comando.
     */
    protected $description = 'Migra masivamente archivos reales (PDF, DOCX, XLSX) analizando patrones en sus nombres.';

    /**
     * Ejecutar el comando interno.
     */
    public function handle()
    {
        $this->info('🚀 Iniciando escaneo inteligente de archivos en "storage/app/migracion"...');

        // 1. Validar Actores del flujo de Firmas
        $jesus = User::where('email', 'jesus.marron@niterragroup.com')->first();
        $jose = User::where('email', 'jose.tadeo@niterragroup.com')->first();
        $takahiro = User::where('email', 'takahiro.arakawa@niterragroup.com')->first();

        if (!$jesus || !$jose || !$takahiro) {
            $this->error('❌ Error crítico: Faltan usuarios indispensables en la base de datos (Jesus, Jose o Takahiro).');
            return Command::FAILURE;
        }

        // 2. Asegurar existencia de la carpeta origen
        if (!Storage::disk('local')->exists('migracion')) {
            Storage::disk('local')->makeDirectory('migracion');
            $this->warn('📁 Carpeta creada. Coloca tus archivos reales en "storage/app/migracion" y vuelve a intentar.');
            return Command::INVALID;
        }

        $archivos = Storage::disk('local')->files('migracion');

        if (empty($archivos)) {
            $this->warn('📁 La carpeta "storage/app/migracion" está vacía. No hay archivos por procesar.');
            return Command::SUCCESS;
        }

        $procesados = 0;

        foreach ($archivos as $rutaArchivo) {
            $nombreArchivoCompleto = basename($rutaArchivo);

            // Ignorar archivos ocultos o de sistema (.gitignore, Thumbs.db, etc.)
            if (str_starts_with($nombreArchivoCompleto, '.'))
                continue;

            $filename = pathinfo($nombreArchivoCompleto, PATHINFO_FILENAME);
            $extension = strtolower(pathinfo($nombreArchivoCompleto, PATHINFO_EXTENSION));

            // Validar extensiones aceptadas (coincidiendo con tu FileUpload de Filament)
            $extensionesAceptadas = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
            if (!in_array($extension, $extensionesAceptadas)) {
                $this->warn("⚠️ Archivo omitido por extensión no válida: {$nombreArchivoCompleto}");
                continue;
            }

            // 🔍 PATRÓN 1: Extraer el Código Maestro (Soporta formatos tipo F-IT-11, F-ADM-18, POL-SCM-01)
            preg_match('/^([A-Z0-9\-\(\)]+)/i', $filename, $matchesCodigo);

            if (empty($matchesCodigo)) {
                $this->error("❌ No se pudo determinar un código de documento válido en: {$nombreArchivoCompleto}");
                continue;
            }

            $codigoDocumento = strtoupper(trim($matchesCodigo[1]));

            // 🔍 PATRÓN 2: Extraer el Número de Revisión / Versión (Busca "Rev. X", "REV. X", "R X", "R0")
            // Si el nombre no incluye ninguna referencia a revisiones, por seguridad asume Versión 0
            $versionNumero = 0;
            if (preg_match('/(?:rev\.?|r)\s*(\d+)/i', $filename, $matchesVersion)) {
                $versionNumero = (int) $matchesVersion[1];
            }

            // 3. Validar contra el Catálogo Maestro de la Base de Datos
            $documento = Document::where('code', $codigoDocumento)->first();

            if (!$documento) {
                $this->error("❌ El código '{$codigoDocumento}' extraído de [{$nombreArchivoCompleto}] no existe en tu catálogo maestro.");
                continue;
            }

            // 4. Leer binario real del archivo
            $contenidoArchivo = Storage::disk('local')->get($rutaArchivo);

            // Sanitizar nombre físico final para evitar caracteres extraños en el File System
            $cleanCode = strtolower(str_replace(['(', ')', '-'], '_', $documento->code));
            $hashUnico = bin2hex(random_bytes(4));
            // Mantiene la extensión original (.pdf, .docx, o .xlsx) del archivo cargado
            $nombreFisicoStorage = "{$cleanCode}_v{$versionNumero}_{$hashUnico}.{$extension}";

            $directorioDestino = 'documentos-docflow';
            $rutaDestinoFinal = "{$directorioDestino}/{$nombreFisicoStorage}";

            // Transferir físicamente al disco público (donde tu IIS y Filament leen los datos)
            Storage::disk('local')->put($rutaDestinoFinal, $contenidoArchivo);

            // 5. Registrar en Base de Datos en Estado APROBADO (ISMS Activo)
            $fechaFija = now();
            $descripcion = "Migración masiva automatizada del archivo físico real '{$nombreArchivoCompleto}'. Incorporado al SGSI vigente.";

            $nuevaVersion = DocumentVersion::create([
                'document_id' => $documento->id,
                'user_id' => $jesus->id,
                'version_number' => $versionNumero,
                'status' => 'aprobado',
                'change_description' => $descripcion,
                'file_path' => $rutaDestinoFinal,
                'file_name' => $nombreArchivoCompleto, // Guarda el nombre original explicativo para la UI
                'approved_at' => $fechaFija,

                // Mapeo RACI explícito fijado al mismo segundo exacto
                'created_by_id' => $jesus->id,    // Proceso de Elaboración
                'reviewed_by_id' => $jose->id,     // Proceso de Revisión
                'reviewed_at' => $fechaFija,
                'created_at' => $fechaFija,
                'updated_at' => $fechaFija,
            ]);

            // 6. Registro e Inmutabilidad de Firma (Autorización de Takahiro)
            $nuevaVersion->signatures()->create([
                'user_id' => $takahiro->id,
                'user_name_snapshot' => $takahiro->name,
                'user_email_snapshot' => $takahiro->email,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'DocFlow Mass Document Migration Engine CLI',
                'signature_hash' => hash('sha256', $nuevaVersion->id . '|' . $takahiro->email . '|mass-upload'),
                'signed_at' => $fechaFija,
                'created_at' => $fechaFija,
                'updated_at' => $fechaFija,
            ]);

            $this->line("✅ Mapeado y guardado: {$documento->code} (Rev. {$versionNumero}) [Format: .{$extension}]");
            $procesados++;
        }

        $this->info("\n🎉 ¡Proceso masivo terminado! Se migraron con éxito {$procesados} archivos al storage y BD.");
        return Command::SUCCESS;
    }
}