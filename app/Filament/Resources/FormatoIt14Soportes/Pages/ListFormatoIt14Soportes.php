<?php

namespace App\Filament\Resources\FormatoIt14Soportes\Pages;

use App\Filament\Resources\FormatoIt14Soportes\FormatoIt14SoporteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt14Soportes extends ListRecords
{
    protected static string $resource = FormatoIt14SoporteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}