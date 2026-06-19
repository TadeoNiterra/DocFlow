<?php

namespace App\Filament\Resources\DocumentVersions\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class DocumentVersionColumns
{
    public static function make(): array
    {
        return [
            TextColumn::make('document.name')
                ->label('Documento Maestro')
                ->searchable()
                ->sortable(),

            TextColumn::make('version_number')
                ->label('Versión')
                ->badge()
                ->color('warning')
                ->sortable(),

            TextColumn::make('status')
                ->label('Estado Versión')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'draft' => 'gray',
                    'terminado' => 'info',
                    'revisado' => 'purple',
                    'aprobado' => 'success',
                    default => 'transparent',
                })
                ->formatStateUsing(fn(string $state): string => ucfirst($state)),

            TextColumn::make('file_name')
                ->label('Nombre de Archivo')
                ->searchable()
                ->limit(25),

            TextColumn::make('user.name')->label('Subido por'),
            TextColumn::make('creator.name')->label('Creado por')->placeholder('Sin asignar')->searchable(),
            TextColumn::make('reviewer.name')->label('Revisado por')->placeholder('Pendiente de revisión')->searchable(),

            TextColumn::make('reviewed_at')->label('Fecha de Revisión')->dateTime('d/m/Y H:i')->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('last_reviewed_at')->label('Última Revisión')->dateTime('d/m/Y H:i')->sortable(),
            TextColumn::make('approved_at')->label('Fecha de Aprobación')->dateTime('d/m/Y H:i')
                ->description(fn($record) => $record->approved_at ? '🔒 Validación TISAX' : null)->sortable(),
        ];
    }
}