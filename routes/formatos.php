<?php

use App\Http\Controllers\PdfReportController;
use App\Models\FormatoIt09Evidencia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Proveedor;
use Illuminate\Support\Str;

Route::middleware(['web', 'auth'])->group(function () {
    
    // 📦 DESCARGA DE EXPEDIENTE COMPLETO EN ZIP
    Route::get('/proveedores/{proveedor}/descargar-expediente', function (Proveedor $proveedor) {
        $slug = Str::slug($proveedor->nombre);
        $folderPath = storage_path("app/private/proveedores/{$slug}");

        // Verificar si existe la carpeta física
        if (!file_exists($folderPath)) {
            abort(404, 'El proveedor no cuenta con archivos cargados en su expediente.');
        }

        $zipFileName = "Expediente_{$slug}.zip";
        $zipPath = storage_path("app/private/temp_{$zipFileName}");

        // 👈 Usamos \ZipArchive directamente
        $zip = new \ZipArchive(); 
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($folderPath),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($folderPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
        } else {
            abort(500, 'No se pudo crear el archivo comprimido.');
        }

        // Descargar el ZIP y eliminarlo del servidor tras enviarlo
        return response()->download($zipPath, $zipFileName)->deleteFileAfterSend(true);
    })->name('proveedores.descargar-expediente');

});

Route::middleware(['web', 'auth'])->prefix('formatos')->group(function () {

    // Generación de PDFs
    Route::get('/f-it-02/pdf', [PdfReportController::class, 'formatoIt02'])->name('formato-it02.pdf');
    Route::get('/f-it-04/{record}/preview', [PdfReportController::class, 'formatoIt04'])->name('formato-it04.preview-pdf');
    Route::get('/f-it-09/{record}/preview', [PdfReportController::class, 'formatoIt09'])->name('formato-it09.preview-pdf');
    Route::get('/f-it-11/{record}/preview', [PdfReportController::class, 'formatoIt11'])->name('formato-it11.preview-pdf');
    Route::get('/f-it-18/{record}/preview', [PdfReportController::class, 'formatoIt18'])->name('formato-it18.preview-pdf');

    // Descargas de evidencias
    Route::get('/f-it-09/evidencia/{evidencia}', function (FormatoIt09Evidencia $evidencia) {
        $disk = Storage::disk('local');
        if (!$disk->exists($evidencia->ruta_archivo)) {
            abort(404);
        }

        return $disk->download($evidencia->ruta_archivo, $evidencia->nombre_archivo);
    })->name('formato-it09.download-evidencia');
});