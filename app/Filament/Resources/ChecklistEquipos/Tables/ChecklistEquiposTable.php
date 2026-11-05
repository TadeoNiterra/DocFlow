<?php

namespace App\Filament\Resources\ChecklistEquipos\Tables;

use App\Models\ChecklistEquipo;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ChecklistEquiposTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('folio')
                    ->label('Folio')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('accion')
                    ->label('Evento / Acción')
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
                    })
                    ->sortable(),

                TextColumn::make('dispositivo.numero_serie')
                    ->label('N° Serie Equipo')
                    ->searchable()
                    ->sortable()
                    ->placeholder('S/N'),

                TextColumn::make('nombre_usuario')
                    ->label('Usuario Asignado')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nombre_jefe_directo')
                    ->label('Jefe Directo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('nombre_sistemas')
                    ->label('Validado por TI')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('created_at')
                    ->label('Fecha Registro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('fecha', 'desc')
            ->filters([
                SelectFilter::make('accion')
                    ->label('Tipo de Acción')
                    ->options([
                        'ASIGNACION_INICIAL' => 'Asignación Inicial',
                        'MANTENIMIENTO' => 'Mantenimiento',
                        'REPARACION' => 'Reparación',
                        'DEVOLUCION' => 'Devolución (Baja)',
                        'CAMBIO' => 'Cambio (Arrendamiento)',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}