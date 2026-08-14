<?php

namespace App\Filament\Resources\FormatoIt18Plans\Pages;

use App\Filament\Resources\FormatoIt18Plans\FormatoIt18PlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt18Plans extends ListRecords
{
    protected static string $resource = FormatoIt18PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}