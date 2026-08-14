<?php

namespace App\Filament\Resources\FormatoIt02Permisos\Pages;

use App\Filament\Resources\FormatoIt02Permisos\FormatoIt02PermisoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt02Permisos extends ListRecords
{
    protected static string $resource = FormatoIt02PermisoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
