<?php

namespace App\Filament\Resources\FormatoIt11Reportes\Pages;

use App\Filament\Resources\FormatoIt11Reportes\FormatoIt11ReporteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt11Reportes extends ListRecords
{
    protected static string $resource = FormatoIt11ReporteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}