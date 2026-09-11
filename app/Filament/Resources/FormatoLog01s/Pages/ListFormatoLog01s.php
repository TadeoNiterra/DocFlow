<?php

namespace App\Filament\Resources\FormatoLog01s\Pages;

use App\Filament\Resources\FormatoLog01s\FormatoLog01Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoLog01s extends ListRecords
{
    protected static string $resource = FormatoLog01Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
