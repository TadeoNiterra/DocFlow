<?php

namespace App\Filament\Resources\FormatoIt22Evaluations\Tables;

use App\Filament\Resources\FormatoIt22Evaluations\Tables\Actions\FormatoIt22EvaluationActions;
use App\Filament\Resources\FormatoIt22Evaluations\Tables\Columns\FormatoIt22EvaluationColumns;
use Filament\Tables\Table;

class FormatoIt22EvaluationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns(FormatoIt22EvaluationColumns::make())
            ->recordActions(FormatoIt22EvaluationActions::makeRowActions());
    }
}