<?php

namespace App\Filament\Resources\ChecklistEquipos\Tables;

use App\Models\ChecklistEquipo;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

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

                TextColumn::make('dispositivo_identificador')
                    ->label('Serie / IMEI')
                    ->getStateUsing(function (ChecklistEquipo $record) {
                        $disp = $record->dispositivo;
                        if (!$disp) {
                            return 'S/N';
                        }
                        return (!empty($disp->numero_serie) && strtoupper(trim($disp->numero_serie)) !== 'N/A')
                            ? $disp->numero_serie
                            : ($disp->imei ?? $disp->imei1 ?? 'S/N');
                    })
                    ->searchable(query: function ($query, string $search) {
                        $query->whereHas('dispositivo', function ($q) use ($search) {
                            $q->where('numero_serie', 'like', "%{$search}%")
                                ->orWhere('imei', 'like', "%{$search}%");
                        });
                    }),

                TextColumn::make('nombre_usuario')
                    ->label('Usuario Asignado')
                    ->searchable()
                    ->sortable(),

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
            ->defaultGroup('accion')
            ->groups([
                Group::make('accion')
                    ->label('Tipo de Acción')
                    ->collapsible()
                    ->getTitleFromRecordUsing(fn(ChecklistEquipo $record): string => match ($record->accion) {
                        'ASIGNACION_INICIAL' => 'Asignaciones Iniciales',
                        'MANTENIMIENTO' => 'Mantenimientos Preventivos / Correctivos',
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
                Action::make('pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn(ChecklistEquipo $record): string => route('checklists.pdf.download', $record))
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('descargar_pdf_lote')
                        ->label('Imprimir Seleccionados (PDF)')
                        ->icon('heroicon-o-printer')
                        ->color('success')
                        ->action(function (Collection $records) {
                            $ids = $records->pluck('id')->join(',');
                            return redirect()->away(route('checklists.pdf.bulk', ['ids' => $ids]));
                        }),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}