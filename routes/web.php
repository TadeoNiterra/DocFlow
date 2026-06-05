<?php

use Illuminate\Support\Facades\Route;
use App\Models\DocumentVersion;
use Illuminate\Support\Facades\Storage;

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

Route::get(
    '/vda/evidence/{evidence}/file',
    function (App\Models\VdaEvidence $evidence) {

        abort_unless(
            auth()->check(),
            403
        );

        return Storage::disk('local')
            ->response(
                $evidence->file_path
            );
    }
)
    ->name('vda.evidence.file');

Route::redirect('/', '/dashboard');