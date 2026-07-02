<?php

namespace App\Filament\Resources\FormatoIt04s\Pages;

use App\Filament\Resources\FormatoIt04s\FormatoIt04Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt04s extends ListRecords
{
    protected static string $resource = FormatoIt04Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
