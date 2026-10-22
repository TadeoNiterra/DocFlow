<?php

namespace App\Filament\Resources\ModeloEquipos\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ModeloEquiposTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tipo')
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

                TextColumn::make('marca')
                    ->label('Marca')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('modelo')
                    ->label('Modelo')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('processor')
                    ->label('Procesador')
                    ->placeholder('N/A')
                    ->searchable(),

                TextColumn::make('ram_memory')
                    ->label('RAM')
                    ->placeholder('N/A')
                    ->alignCenter(),

                TextColumn::make('ssd')
                    ->label('Almacenamiento')
                    ->placeholder('N/A')
                    ->alignCenter(),

                TextColumn::make('dispositivos_count')
                    ->label('Total en Inventario')
                    ->counts('dispositivos')
                    ->badge()
                    ->color('gray')
                    ->alignCenter(),
            ])
            ->defaultSort('marca')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}