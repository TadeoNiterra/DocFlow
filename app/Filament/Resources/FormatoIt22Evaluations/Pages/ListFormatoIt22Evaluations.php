<?php

namespace App\Filament\Resources\FormatoIt22Evaluations\Pages;

use App\Filament\Resources\FormatoIt22Evaluations\FormatoIt22EvaluationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt22Evaluations extends ListRecords
{
    protected static string $resource = FormatoIt22EvaluationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}