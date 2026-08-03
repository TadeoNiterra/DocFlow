<?php

namespace App\Filament\Resources\FormatoIt09Proyectos\Pages;

use App\Filament\Resources\FormatoIt09Proyectos\FormatoIt09ProyectoResource;
use App\Models\FormatoIt09Evidencia;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateFormatoIt09Proyecto extends CreateRecord
{
    protected static string $resource = FormatoIt09ProyectoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id_creador'] = Auth::id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $record = $this->getRecord();
        $archivos = $this->data['evidencias_archivos'] ?? [];

        foreach ($archivos as $ruta) {
            FormatoIt09Evidencia::create([
                'fmt_it_09_proyecto_id' => $record->id,
                'ruta_archivo'          => $ruta,
                'nombre_archivo'        => basename($ruta),
            ]);
        }
    }
}