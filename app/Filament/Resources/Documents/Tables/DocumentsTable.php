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
            ->paginated(false)
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
                        'Procedimiento' => 'info',
                        'Formato' => 'success',
                        'Manual' => 'purple',
                        'Instructivo' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('document.id') // Apunta a la relación
                    ->label('Última Versión')
                    ->getStateUsing(function ($record): ?string {
                        // Si la fila actual tiene un documento relacionado válido
                        if ($record->document) {
                            // Entra al documento, busca sus versiones y extrae el último número de versión creado
                            return $record->document->versions()->latest('id')->value('version_number');
                        }

                        return 'N/A';
                    })
                    ->badge()
                    ->color('warning')
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