<?php

namespace App\Filament\Resources\FormatoIt11Reportes\Pages;

use App\Filament\Resources\FormatoIt11Reportes\FormatoIt11ReporteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFormatoIt11Reporte extends CreateRecord
{
    protected static string $resource = FormatoIt11ReporteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id_creador'] = auth()->id();
        return $data;
    }
}