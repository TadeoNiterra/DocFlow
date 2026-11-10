<?php

namespace App\Filament\Resources\ChecklistEquipos\Tables;

use App\Models\ChecklistEquipo;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
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
                    ->label('Serie / IMEI')
                    ->getStateUsing(function ($record) {
                        $disp = $record->dispositivo;
                        if (!$disp) {
                            return 'S/N';
                        }

                        return (!empty($disp->numero_serie) && strtoupper(trim($disp->numero_serie)) !== 'N/A')
                            ? $disp->numero_serie
                            : ($disp->imei ?? $disp->imei1 ?? 'S/N');
                    })
                    ->searchable(['numero_serie', 'imei'])
                    ->sortable(),

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
            // 📂 Agrupación por tipo de acción
            // 📂 Agrupación por tipo de acción con capacidad de colapso
            ->defaultGroup('accion')
            ->groups([
                Group::make('accion')
                    ->label('Tipo de Acción')
                    ->collapsible() // 👈 Permite abrir y contraer cada grupo haciendo clic en el encabezado
                    // ->collapsed() // Opcional: descomenta esta línea si deseas que aparezcan contraídos por defecto al cargar la página
                    ->getTitleFromRecordUsing(fn(ChecklistEquipo $record): string => match ($record->accion) {
                        'MANTENIMIENTO' => 'Mantenimientos Preventivos / Correctivos',
                        'ASIGNACION_INICIAL' => 'Asignaciones Iniciales',
                        'REPARACION' => 'Envíos a Reparación',
                        'DEVOLUCION' => 'Devoluciones (Bajas)',
                        'CAMBIO' => 'Cambios (Fin de Arrendamiento)',
                        default => $record->accion,
                    }),
            ])
            ->filters([
                SelectFilter::make('accion')
                    ->label('Tipo de Acción')
                    ->options([
                        'MANTENIMIENTO' => 'Mantenimiento',
                        'ASIGNACION_INICIAL' => 'Asignación Inicial',
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