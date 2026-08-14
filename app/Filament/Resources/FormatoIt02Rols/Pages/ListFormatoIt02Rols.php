<?php

namespace App\Filament\Resources\FormatoIt02Rols\Pages;

use App\Filament\Resources\FormatoIt02Rols\FormatoIt02RolResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt02Rols extends ListRecords
{
    protected static string $resource = FormatoIt02RolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
