<?php

use App\Http\Controllers\VdaEvidenceController;
use App\Models\VdaEvidence;
use Illuminate\Support\Facades\Route;
use App\Models\DocumentVersion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

Route::get('/documentos/{version}/view-pdf', function (DocumentVersion $version, \Illuminate\Http\Request $request) {
    if (!$version->file_path)
        abort(404, 'Ruta no registrada.');

    $pathOpcion1 = storage_path('app/' . $version->file_path);
    $pathOpcion2 = storage_path('app/private/' . $version->file_path);
    $pathFisicoFinal = file_exists($pathOpcion1) ? $pathOpcion1 : (file_exists($pathOpcion2) ? $pathOpcion2 : null);

    if (!$pathFisicoFinal) {
        abort(404, 'El archivo físico no existe en el servidor.');
    }

    $extension = strtolower(pathinfo($pathFisicoFinal, PATHINFO_EXTENSION));

    // 🔥 SI EL REQUISITO PIDE EL ARCHIVO CRUDO (Llamado interno desde el fetch de JavaScript)
    if ($request->has('raw')) {
        $mimeTypes = [
            'pdf' => 'application/pdf',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
        return response()->file($pathFisicoFinal, ['Content-Type' => $mimeTypes[$extension] ?? 'application/octet-stream']);
    }

    // 1. FLUJO ESTÁNDAR PARA PDFs: Se abren directo en el navegador
    if ($extension === 'pdf') {
        return response()->file($pathFisicoFinal, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $version->file_name . '"'
        ]);
    }

    // 2. FLUJO DE OFFICE MASIVO (DOCX, XLSX): Renderiza la vista del visor frontend
    return view('documentos.visor', [
        'fileUrl' => route('documentos.ver-pdf', ['version' => $version->id, 'raw' => 1]),
        'extension' => $extension,
        'fileName' => $version->file_name ?? 'Documento_DocFlow'
    ]);
})->name('documentos.ver-pdf')->middleware(['web', 'auth']);

Route::get('/vda/evidence/{evidence}/file', function (Request $request, VdaEvidence $evidence) {

    // 🔒 CASO 1: Si es un documento de DocFlow y el puente envió el 'version_id'
    if ($evidence->type === 'docflow_version' || $request->has('version_id')) {

        // Extraemos el id de la versión, si no viene en la URL, lo calculamos en caliente como fallback
        $versionId = $request->query('version_id');

        $version = $versionId
            ? DocumentVersion::find($versionId)
            : DocumentVersion::where('document_id', $evidence->document_id)
                ->whereIn('status', ['aprobado', 'aprobado / firmado'])
                ->orderBy('id', 'desc')
                ->first();

        if ($version && $version->file_path) {
            if (Storage::disk('local')->exists($version->file_path)) {
                return Storage::disk('local')->response($version->file_path);
            }
        }

        abort(404, 'No se encontró ninguna versión aprobada para este documento.');
    }

    // 📁 CASO 2: Si es una carga física tradicional ('upload')
    if ($evidence->file_path) {
        if (Storage::disk('local')->exists($evidence->file_path)) {
            return Storage::disk('local')->response($evidence->file_path);
        }
    }

    abort(404, 'El archivo binario solicitado no existe en el servidor aplmex01.');
})->name('vda.evidence.file');

// Ejemplo de lo que debes buscar en routes/web.php:
Route::get('/vda-evidences/{evidence}/file', [VdaEvidenceController::class, 'getFile'])
    ->name('vda.evidence.file');

Route::redirect('/', '/dashboard');