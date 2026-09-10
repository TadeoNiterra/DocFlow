<?php

namespace App\Filament\Resources\SoftwareLists\Pages;

use App\Filament\Resources\SoftwareLists\SoftwareListResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSoftwareLists extends ListRecords
{
    protected static string $resource = SoftwareListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
