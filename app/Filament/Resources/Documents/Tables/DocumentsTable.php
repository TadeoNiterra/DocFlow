<?php

namespace App\Filament\Resources\Documents\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Tables\Grouping\Group; 

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Código')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nombre del Documento')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Politica' => 'danger',      
                        'Procedimiento' => 'warning', 
                        'Formato' => 'success',      
                        'Manual' => 'info',          
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('versions_count')
                    ->label('Total Revisiones')
                    ->counts('versions') 
                    ->alignCenter(),

                TextColumn::make('updated_at')
                    ->label('Última Modificación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make()
                    ->label('Editar'),
            ])
            
            ->groups([
                Group::make('type')
                    ->label('Tipo de Documento')
                    ->collapsible(), 
            ])
            ->defaultGroup('type'); 
    }
}