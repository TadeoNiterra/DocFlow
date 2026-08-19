<?php

namespace App\Filament\Resources\UserDeletionControls\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;

class UserDeletionControlsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('fecha_baja')
                    ->label('Fecha de baja')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('fecha_final_periodo')
                    ->label('Fecha final del periodo')
                    ->date('d/m/Y'),

                TextColumn::make('dias_revision_respaldos')
                    ->label('Días de revisión')
                    ->badge()
                    ->color('info'),

                TextColumn::make('fecha_autorizacion_eliminacion')
                    ->label('Fecha de autorización')
                    ->date('d/m/Y')
                    ->placeholder('Pendiente'),

                TextColumn::make('fecha_eliminacion')
                    ->label('Fecha de eliminación')
                    ->date('d/m/Y')
                    ->badge()
                    ->color(fn ($state) => $state ? 'danger' : 'warning')
                    ->placeholder('Sin eliminar'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}