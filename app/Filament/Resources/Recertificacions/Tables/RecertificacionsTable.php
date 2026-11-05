<?php

namespace App\Filament\Resources\Recertificacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RecertificacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('folio')->weight('bold')->searchable(),
                TextColumn::make('periodo')->badge()->color('info'),
                TextColumn::make('fecha_ejecucion')->dateTime('d/m/Y H:i')->sortable(),
                TextColumn::make('total_evaluados')->label('Evaluados')->alignCenter(),
                TextColumn::make('total_vigentes')->label('Vigentes en AD')->badge()->color('success')->alignCenter(),
                TextColumn::make('total_desactivados_ad')->label('Desactivados')->badge()->color('warning')->alignCenter(),
                TextColumn::make('total_no_encontrados_ad')->label('Borrados / Inexistentes')->badge()->color('danger')->alignCenter(),
                TextColumn::make('estatus')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'VIGENTE' => 'success',
                        'ACCION_REQUERIDA' => 'danger',
                        'APROBADO' => 'gray',
                        default => 'warning',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}