<?php

namespace App\Filament\Resources\ChecklistEquipos\Pages;

use App\Filament\Resources\ChecklistEquipos\ChecklistEquipoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChecklistEquipos extends ListRecords
{
    protected static string $resource = ChecklistEquipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
