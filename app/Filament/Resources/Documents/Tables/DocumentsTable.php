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
            // ⚡ OPTIMIZACIÓN SQLITE: Carga el documento junto a su última versión en una sola consulta
            ->modifyQueryUsing(fn($query) => $query->with(['latestVersion']))

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

                TextColumn::make('latestVersion.version_number')
                    ->label('Última Versión')
                    ->formatStateUsing(
                        fn($state) =>
                        $state
                        ? "Rev. {$state}"
                        : 'Sin Versión'
                    )
                    ->badge()
                    ->color(fn () => 'warning')
                    ->alignCenter(),

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