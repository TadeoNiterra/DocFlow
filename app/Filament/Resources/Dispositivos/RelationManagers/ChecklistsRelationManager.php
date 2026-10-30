<?php

namespace App\Filament\Resources\DispositivoResource\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChecklistsRelationManager extends RelationManager
{
    protected static string $relationship = 'checklists';
    protected static ?string $title = 'Historial de Trazabilidad y Mantenimientos';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('folio')
            ->columns([
                TextColumn::make('folio')
                    ->label('Folio')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('accion')
                    ->label('Evento')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'ASIGNACION_INICIAL' => 'Asignación Inicial',
                        'MANTENIMIENTO' => 'Mantenimiento',
                        'REPARACION' => 'Reparación',
                        'DEVOLUCION' => 'Devolución (Baja)',
                        'CAMBIO' => 'Cambio (Arrendamiento)',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'ASIGNACION_INICIAL' => 'info',
                        'MANTENIMIENTO' => 'primary',
                        'REPARACION' => 'warning',
                        'DEVOLUCION' => 'danger',
                        'CAMBIO' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('nombre_usuario')
                    ->label('Custodio al Momento'),

                TextColumn::make('nombre_sistemas')
                    ->label('Inspector TI'),

                TextColumn::make('observaciones')
                    ->label('Observaciones')
                    ->limit(50),
            ])
            ->defaultSort('fecha', 'desc')
            ->headerActions([
                CreateAction::make()->label('Registrar Evento / Checklist'),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}