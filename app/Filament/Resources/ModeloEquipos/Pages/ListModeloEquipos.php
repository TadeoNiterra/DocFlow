<?php

namespace App\Filament\Resources\ModeloEquipos\Pages;

use App\Filament\Resources\ModeloEquipos\ModeloEquipoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListModeloEquipos extends ListRecords
{
    protected static string $resource = ModeloEquipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
