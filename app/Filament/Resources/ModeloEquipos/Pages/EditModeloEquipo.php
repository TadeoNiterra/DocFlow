<?php

namespace App\Filament\Resources\ModeloEquipos\Pages;

use App\Filament\Resources\ModeloEquipos\ModeloEquipoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditModeloEquipo extends EditRecord
{
    protected static string $resource = ModeloEquipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
