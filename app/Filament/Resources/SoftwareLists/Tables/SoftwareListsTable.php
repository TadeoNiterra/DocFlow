<?php

namespace App\Filament\Resources\SoftwareLists\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SoftwareListsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre del Software')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo de Software')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ubication')
                    ->label('Ubicación del Software')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('clasification')   
                    ->label('Clasificación del Software')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('User')
                    ->label('Numero de Usuarios')
                    ->searchable()
                    ->sortable(),        
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