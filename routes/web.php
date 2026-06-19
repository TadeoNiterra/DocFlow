<?php

use App\Http\Controllers\VdaEvidenceController;
use App\Models\VdaEvidence;
use Illuminate\Support\Facades\Route;
use App\Models\DocumentVersion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request; 

Route::get('/documentos/{version}/view-pdf', function (DocumentVersion $version) {
    // 1. Validar que tenga el registro en la BD
    if (!$version->file_path) {
        abort(404, 'No hay ninguna ruta de archivo registrada para esta versión en la Base de Datos.');
    }

    // DIAGNÓSTICO / SOLUCIÓN AUTOMÁTICA:
    // Probamos la ruta tal como viene en la BD, y también forzando el prefijo 'private/' por si acaso.
    $pathOpcion1 = storage_path('app/' . $version->file_path);
    $pathOpcion2 = storage_path('app/private/' . $version->file_path);

    // Evaluamos cuál de las dos carpetas físicas contiene el archivo real
    if (file_exists($pathOpcion1)) {
        $pathFisicoFinal = $pathOpcion1;
    } elseif (file_exists($pathOpcion2)) {
        $pathFisicoFinal = $pathOpcion2;
    } else {
        // SI NINGUNA EXISTE: Mostramos un mensaje exacto en pantalla para saber qué está buscando
        dd([
            'Error' => 'El archivo físico no se encuentra en el servidor.',
            'Ruta que guardó la Base de Datos' => $version->file_path,
            'Ruta física donde se buscó (Opción 1)' => $pathOpcion1,
            'Ruta física donde se buscó (Opción 2)' => $pathOpcion2,
        ]);
    }

    // 3. Retornar el archivo directamente al visor del navegador si todo está bien
    return response()->file($pathFisicoFinal, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $version->file_name . '"'
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