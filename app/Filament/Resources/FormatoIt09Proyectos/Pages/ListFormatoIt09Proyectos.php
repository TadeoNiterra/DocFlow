<?php

namespace App\Filament\Resources\FormatoIt09Proyectos\Pages;

use App\Filament\Resources\FormatoIt09Proyectos\FormatoIt09ProyectoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt09Proyectos extends ListRecords
{
    protected static string $resource = FormatoIt09ProyectoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
