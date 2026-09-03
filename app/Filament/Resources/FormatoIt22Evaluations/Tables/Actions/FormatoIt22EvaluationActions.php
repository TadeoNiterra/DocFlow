<?php

namespace App\Filament\Resources\FormatoIt22Evaluations\Tables\Actions;

use App\Models\FormatoIt22Evaluation;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;

class FormatoIt22EvaluationActions
{
    public static function makeRowActions(): array
    {
        return [
            Action::make('previewPdf')
                ->label('Ver PDF')
                ->icon(Heroicon::OutlinedEye)
                ->color('info')
                ->url(fn(FormatoIt22Evaluation $record): string => route('evaluaciones-proveedor.pdf', ['record' => $record->id]))
                ->openUrlInNewTab(),

            EditAction::make(),
        ];
    }
}