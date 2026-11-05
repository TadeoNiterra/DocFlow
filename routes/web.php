<?php

use App\Models\DocumentVersion;
use App\Models\VdaEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ResponsivaController;

// Redirección raíz
Route::redirect('/', '/dashboard');

// 🔒 GRUPO DE RUTAS AUTENTICADAS
Route::middleware(['web', 'auth'])->group(function () {

    // 📄 VISOR SEGURO DE DOCUMENTOS EN RESGUARDO PRIVADO (storage/app/private)
    Route::get('/documentos/{version}/view-pdf', function (DocumentVersion $version, Request $request) {
        if (!$version->file_path) {
            abort(404, 'Ruta de archivo no registrada en el sistema.');
        }

        // El disco 'local' apunta a storage/app/private en Laravel 11/12/13
        $disk = Storage::disk('local');

        if (!$disk->exists($version->file_path)) {
            abort(404, "El archivo en resguardo privado no existe: {$version->file_path}");
        }

        $absolutePath = $disk->path($version->file_path);
        $ext = strtolower(pathinfo($version->file_path, PATHINFO_EXTENSION));
        $fileName = $version->file_name ?? basename($version->file_path);

        // 1. Respuesta en crudo (para stream binario o llamadas iframe internas)
        if ($request->has('raw')) {
            return $disk->response($version->file_path);
        }

        // 2. Visualización directa de PDF en el navegador
        if ($ext === 'pdf') {
            return response()->file($absolutePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $fileName . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, private',
            ]);
        }

        // 3. Vista intermedia para documentos Office (Word / Excel)
        return view('documentos.visor', [
            'fileUrl' => route('documentos.ver-pdf', ['version' => $version->id, 'raw' => 1]),
            'extension' => $ext,
            'fileName' => $fileName,
        ]);
    })->name('documentos.ver-pdf')->middleware(['auth']);
    
    // 📄 VISOR DE DOCUMENTOS Y OFICINA (DOCX, XLSX, PDF)
    Route::get('/documentos/{version}/view-pdf', function (DocumentVersion $version, Request $request) {
        if (!$version->file_path) {
            abort(404, 'Ruta no registrada.');
        }

        $disk = Storage::disk('local');
        if (!$disk->exists($version->file_path)) {
            abort(404, 'El archivo físico no existe.');
        }

        $ext = strtolower(pathinfo($version->file_path, PATHINFO_EXTENSION));

        if ($request->has('raw')) {
            return $disk->response($version->file_path);
        }

        if ($ext === 'pdf') {
            return $disk->response($version->file_path, $version->file_name ?? 'documento.pdf', [
                'Content-Disposition' => 'inline',
            ]);
        }

        return view('documentos.visor', [
            'fileUrl' => route('documentos.ver-pdf', ['version' => $version->id, 'raw' => 1]),
            'extension' => $ext,
            'fileName' => $version->file_name ?? 'Documento_DocFlow',
        ]);
    })->name('documentos.ver-pdf');

    // 📂 EVIDENCIAS VDA
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
            abort(404, 'No se encontró versión aprobada.');
        }

        if ($evidence->file_path && $disk->exists($evidence->file_path)) {
            return $disk->response($evidence->file_path);
        }

        abort(404, 'El archivo binario solicitado no existe.');
    })->name('vda.evidence.file');

});

Route::get('/colaboradores/{colaborador}/responsiva', [ResponsivaController::class, 'stream'])
    ->name('colaboradores.responsiva.pdf')
    ->middleware(['web', 'auth']);