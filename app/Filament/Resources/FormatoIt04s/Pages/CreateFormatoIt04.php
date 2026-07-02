<?php

namespace App\Filament\Resources\FormatoIt04s\Pages;

use App\Filament\Resources\FormatoIt04s\FormatoIt04Resource;
use App\Models\FormatoIt04Evidencia;
use Filament\Resources\Pages\CreateRecord;

class CreateFormatoIt04 extends CreateRecord
{
    protected static string $resource = FormatoIt04Resource::class;

    protected function afterCreate(): void
{
    $record = $this->getRecord();
    $fotos = $this->data['evidencias_fotos'] ?? [];

    $i = 1;
    foreach ($fotos as $ruta) {
        FormatoIt04Evidencia::create([
            'formato_it04_id' => $record->id,
            'ruta_archivo'   => $ruta, 
            'nombre_archivo' => basename($ruta),
            'orden'          => $i++,
        ]);
    }
}
}