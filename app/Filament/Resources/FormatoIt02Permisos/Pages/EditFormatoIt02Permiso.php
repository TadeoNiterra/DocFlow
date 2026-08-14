<?php

namespace App\Filament\Resources\FormatoIt02Permisos\Pages;

use App\Filament\Resources\FormatoIt02Permisos\FormatoIt02PermisoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt02Permiso extends EditRecord
{
    protected static string $resource = FormatoIt02PermisoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
