<?php

namespace App\Filament\Resources\Dispositivos\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class DispositivosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->with(['modeloEquipo', 'colaborador']))
            ->columns([
                TextColumn::make('modeloEquipo.tipo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Laptop' => 'info',
                        'Desktop' => 'purple',
                        'iPhone', 'Android' => 'success',
                        'Monitor' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('modeloEquipo.marca')
                    ->label('Marca')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('modeloEquipo.modelo')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('numero_serie')
                    ->label('Núm. Serie / IMEI')
                    ->state(fn($record) => $record->numero_serie ?? $record->imei ?? 'Sin Identificador')
                    ->searchable(['numero_serie', 'imei'])
                    ->copyable()
                    ->placeholder('N/A'),

                TextColumn::make('colaborador.name')
                    ->label('Colaborador Asignado')
                    ->formatStateUsing(
                        fn($record) => $record->colaborador
                            ? "{$record->colaborador->name} {$record->colaborador->lastname}"
                            : 'EN STOCK'
                    )
                    ->searchable(query: function ($query, string $search) {
                        $query->whereHas('colaborador', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%")
                                ->orWhere('lastname', 'like', "%{$search}%")
                                ->orWhere('id_colaborador', 'like', "%{$search}%");
                        });
                    })
                    ->sortable(),

                TextColumn::make('estatus_asignacion')
                    ->label('Estatus')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'ENTREGADO', 'Aún activo' => 'success',
                        'EN STOCK' => 'info',
                        'EN REPARACION' => 'warning',
                        'RETIRADO' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('fecha_asignacion')
                    ->label('Fecha Asignación')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}