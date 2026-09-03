<?php

namespace App\Filament\Resources\FormatoIt22Evaluations\Pages;

use App\Filament\Resources\FormatoIt22Evaluations\FormatoIt22EvaluationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt22Evaluation extends EditRecord
{
    protected static string $resource = FormatoIt22EvaluationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}