<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\VdaEvidence;
use App\Models\DocumentVersion;

class VdaEvidenceController extends Controller
{
    /**
     * Sirve o descarga el archivo físico de la evidencia.
     * Soporta la búsqueda dinámica de la última versión de DocFlow.
     */
    public function getFile(Request $request, VdaEvidence $evidence)
    {
        // Verificar si la petición es de tipo repositorio dinámico
        if ($evidence->type === 'docflow_version') {

            $versionId = $request->query('version_id');

            $version = $versionId
                ? DocumentVersion::find($versionId)
                : DocumentVersion::where('document_id', $evidence->document_id)
                    ->whereIn('status', ['aprobado', 'aprobado / firmado'])
                    ->orderBy('id', 'desc')
                    ->first();

            if ($version && $version->file_path && Storage::disk('local')->exists($version->file_path)) {
                return Storage::disk('local')->response($version->file_path);
            }

            abort(404, 'La revisión del documento DocFlow no se encuentra disponible.');
        }

        // Despacho para subidas tradicionales fijas
        if ($evidence->file_path && Storage::disk('local')->exists($evidence->file_path)) {
            return Storage::disk('local')->response($evidence->file_path);
        }

        abort(404, 'Archivo no localizado.');
    }
}