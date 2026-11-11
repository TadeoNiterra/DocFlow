<?php

use App\Http\Controllers\ChecklistPdfController;
use App\Http\Controllers\ResponsivaController;
use App\Models\DocumentVersion;
use App\Models\VdaEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// 🔀 Redirección raíz
Route::redirect('/', '/dashboard');

// 🔒 GRUPO DE RUTAS AUTENTICADAS (Web + Auth)
Route::middleware(['web', 'auth'])->group(function () {

    // =========================================================================
    // 🖨️ CHECKLISTS DE EQUIPOS (F-IT-03)
    // =========================================================================
    Route::get('/checklists/{checklist}/pdf', [ChecklistPdfController::class, 'download'])
        ->name('checklists.pdf.download');

    Route::get('/checklists-bulk-pdf', [ChecklistPdfController::class, 'bulkDownload'])
        ->name('checklists.pdf.bulk');

    // =========================================================================
    // 📑 RESPONSIVAS DE ACTIVOS TI
    // =========================================================================
    Route::get('/colaboradores/{colaborador}/responsiva', [ResponsivaController::class, 'stream'])
        ->name('colaboradores.responsiva.pdf');

    // =========================================================================
    // 📄 VISOR SEGURO DE DOCUMENTOS PRIVADOS (storage/app/private)
    // =========================================================================
    Route::get('/documentos/{version}/view-pdf', function (DocumentVersion $version, Request $request) {
        if (!$version->file_path) {
            abort(404, 'Ruta de archivo no registrada en el sistema.');
        }

        $disk = Storage::disk('local');

        if (!$disk->exists($version->file_path)) {
            abort(404, "El archivo en resguardo privado no existe: {$version->file_path}");
        }

        $absolutePath = $disk->path($version->file_path);
        $ext = strtolower(pathinfo($version->file_path, PATHINFO_EXTENSION));
        $fileName = $version->file_name ?? basename($version->file_path);

        // 1. Entrega binaria directa (streaming)
        if ($request->has('raw') || $ext === 'pdf') {
            return response()->file($absolutePath, [
                'Content-Type' => ($ext === 'pdf') ? 'application/pdf' : 'application/octet-stream',
                'Content-Disposition' => 'inline; filename="' . $fileName . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, private',
            ]);
        }

        // 2. Visor interactivo para archivos Word / Excel
        return view('documentos.visor', [
            'fileUrl' => route('documentos.ver-pdf', ['version' => $version->id, 'raw' => 1]),
            'extension' => $ext,
            'fileName' => $fileName,
        ]);
    })->name('documentos.ver-pdf');

    // =========================================================================
    // 📂 EVIDENCIAS VDA
    // =========================================================================
    Route::get('/vda/evidence/{evidence}/file', function (Request $request, VdaEvidence $evidence) {
        $disk = Storage::disk('local');

        if ($evidence->type === 'docflow_version' || $request->has('version_id')) {
            $versionId = $request->query('version_id');
            $version = $versionId
                ? DocumentVersion::find($versionId)
                : DocumentVersion::where('document_id', $evidence->document_id)
                    ->whereIn('status', ['aprobado', 'aprobado / firmado'])
                    ->latest()
                    ->first();

            if ($version?->file_path && $disk->exists($version->file_path)) {
                return $disk->response($version->file_path);
            }
            abort(404, 'No se encontró versión aprobada del documento.');
        }

        if ($evidence->file_path && $disk->exists($evidence->file_path)) {
            return $disk->response($evidence->file_path);
        }

        abort(404, 'El archivo binario solicitado no existe.');
    })->name('vda.evidence.file');

    // =========================================================================
    // 🎓 VISOR / DESCARGA DE EVIDENCIAS DE CURSOS
    // =========================================================================
    Route::get('/cursos-evidencias/{id}', function ($id) {
        $evidencia = DB::table('curso_evidencias')->where('id', $id)->first()
            ?? DB::table('evidencias')->where('id', $id)->first()
            ?? DB::table('cursos_evidencias')->where('id', $id)->first();

        if (!$evidencia || empty($evidencia->archivo_path)) {
            abort(404, 'Registro de evidencia no encontrado.');
        }

        $disk = Storage::disk('public');

        if (!$disk->exists($evidencia->archivo_path)) {
            abort(404, 'El archivo físico no se encuentra en el almacenamiento.');
        }

        $pathFisico = $disk->path($evidencia->archivo_path);
        $mimeType = $disk->mimeType($evidencia->archivo_path) ?? 'application/octet-stream';

        return response()->file($pathFisico, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($evidencia->archivo_path) . '"',
        ]);
    })->name('cursos.evidencia.descargar');

});