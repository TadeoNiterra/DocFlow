<?php

namespace App\Filament\Resources\FormatoIt22Evaluations\Tables\Columns;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class FormatoIt22EvaluationColumns
{
    public static function make(): array
    {
        return [
            TextColumn::make('supplier_name')
                ->label('Proveedor')
                ->searchable()
                ->sortable(),

            TextColumn::make('evaluation_date')
                ->label('Fecha Eval.')
                ->date('d/m/Y')
                ->sortable(),

            TextColumn::make('actual_score')
                ->label('Puntaje')
                ->suffix('/30')
                ->sortable(),

            TextColumn::make('percentage')
                ->label('Porcentaje')
                ->suffix('%')
                ->sortable(),

            TextColumn::make('classification')
                ->label('Dictamen')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'calificado' => 'success',
                    'sujeto_a_mejora' => 'warning',
                    'evaluacion_extraordinaria' => 'danger',
                    default => 'gray',
                })
                ->formatStateUsing(fn(string $state): string => match ($state) {
                    'calificado' => 'Proveedor Calificado',
                    'sujeto_a_mejora' => 'Sujeto a Mejora',
                    'evaluacion_extraordinaria' => 'Eval. Extraordinaria',
                    default => $state,
                }),

            IconColumn::make('requires_remediation')
                ->label('Remediación')
                ->boolean(),
        ];
    }
}