<?php

namespace App\Filament\Resources\Recertificacions\Pages;

use App\Filament\Resources\Recertificacions\RecertificacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecertificacion extends EditRecord
{
    protected static string $resource = RecertificacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
