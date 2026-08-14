<?php

namespace App\Filament\Resources\FormatoIt02Rols\Pages;

use App\Filament\Resources\FormatoIt02Rols\FormatoIt02RolResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt02Rol extends EditRecord
{
    protected static string $resource = FormatoIt02RolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
