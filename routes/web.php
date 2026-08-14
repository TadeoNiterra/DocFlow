<?php

use App\Http\Controllers\VdaEvidenceController;
use App\Models\DocumentVersion;
use App\Models\FormatoIt04;
use App\Models\FormatoIt09Evidencia;
use App\Models\FormatoIt09Proyecto;
use App\Models\VdaEvidence;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\FormatoIt02Categoria;
use App\Models\FormatoIt02Permiso;
use App\Models\FormatoIt02Rol;

// Redirección raíz
Route::redirect('/', '/dashboard');

// 🔒 GRUPO DE RUTAS AUTENTICADAS
Route::middleware(['web', 'auth'])->group(function () {

    // 📄 VISOR DE DOCUMENTOS Y OFICINA (DOCX, XLSX, PDF)
    Route::get('/documentos/{version}/view-pdf', function (DocumentVersion $version, Request $request) {
        if (!$version->file_path)
            abort(404, 'Ruta no registrada.');

        $disk = Storage::disk('local');
        if (!$disk->exists($version->file_path))
            abort(404, 'El archivo físico no existe.');

        $ext = strtolower(pathinfo($version->file_path, PATHINFO_EXTENSION));

        // Respuesta cruda (fetch interno JS)
        if ($request->has('raw'))
            return $disk->response($version->file_path);

        // PDFs directo en el navegador
        if ($ext === 'pdf') {
            return $disk->response($version->file_path, $version->file_name ?? 'documento.pdf', [
                'Content-Disposition' => 'inline',
            ]);
        }

        // Visor Frontend para DOCX / XLSX
        return view('documentos.visor', [
            'fileUrl' => route('documentos.ver-pdf', ['version' => $version->id, 'raw' => 1]),
            'extension' => $ext,
            'fileName' => $version->file_name ?? 'Documento_DocFlow',
        ]);
    })->name('documentos.ver-pdf');

    // 📂 EVIDENCIAS VDA (DocFlow + Cargas Tradicionales)
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

    // 📄 FORMATO F-IT-04 (Desmantelamiento - PDF Vertical)
    Route::get('/formatos/f-it-04/{record}/preview', function (FormatoIt04 $record) {
        $pdf = Pdf::loadView('pdf.formato-it04', compact('record'));
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"F-IT-04-{$record->folio}.pdf\"",
        ]);
    })->name('formato-it04.preview-pdf');

    // 📄 FORMATO F-IT-09 (Análisis de Riesgos - PDF Horizontal Landscape)
    Route::get('/formatos/f-it-09/{record}/preview', function (FormatoIt09Proyecto $record) {
        $pdf = Pdf::loadView('pdf.formato-it09', compact('record'))->setPaper('a4', 'landscape');
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=\"F-IT-09-{$record->folio}.pdf\"",
        ]);
    })->name('formato-it09.preview-pdf');

    // 📥 DESCARGA / LECTURA SEGURO DE EVIDENCIAS F-IT-09
    Route::get('/formatos/f-it-09/evidencia/{evidencia}', function (FormatoIt09Evidencia $evidencia) {
        $disk = Storage::disk('local');
        if (!$disk->exists($evidencia->ruta_archivo))
            abort(404);

        return $disk->download($evidencia->ruta_archivo, $evidencia->nombre_archivo);
    })->name('formato-it09.download-evidencia');
});
// Formato F-IT-11
Route::get('/formatos/f-it-11/{record}/preview', function (\App\Models\FormatoIt11Reporte $record) {
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.formato-it11', compact('record'));
    return response($pdf->output(), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => "inline; filename=\"{$record->folio}.pdf\"",
    ]);
})->name('formato-it11.preview-pdf');
// Formato F-IT-18 PER
Route::get('/formatos/f-it-18/{record}/preview', function (\App\Models\FormatoIt18Plan $record) {
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.formato-it18', compact('record'));
    return response($pdf->output(), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => "inline; filename=\"{$record->folio}.pdf\"",
    ]);
})->name('formato-it18.preview-pdf');
Route::get('/formatos/f-it-02/pdf', function () {
    $roles = FormatoIt02Rol::orderBy('orden')->get();

    $categoriasFunciones = FormatoIt02Categoria::where('matriz_tipo', 'funciones')
        ->with('funciones')
        ->orderBy('orden')
        ->get();

    $categoriasRecursos = FormatoIt02Categoria::where('matriz_tipo', 'recursos')
        ->with('funciones')
        ->orderBy('orden')
        ->get();

    $permisos = FormatoIt02Permiso::all();
    $permisosMap = [];
    foreach ($permisos as $p) {
        $permisosMap[$p->rol_id][$p->funcion_id] = $p->valor;
    }

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.formato-it02', compact(
        'roles', 'categoriasFunciones', 'categoriasRecursos', 'permisosMap'
    ))->setPaper('letter', 'landscape');

    return response($pdf->output(), 200, [
        'Content-Type'        => 'application/pdf',
        'Content-Disposition' => 'inline; filename="F-IT-02_Matriz_Derechos_y_Privilegios.pdf"',
    ]);
})->name('formato-it02.pdf');