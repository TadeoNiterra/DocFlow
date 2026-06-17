<?php

namespace App\Filament\Resources\VdaControls\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Actions\EditAction;

class VdaControlsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->modifyQueryUsing(function ($query) {
                $query
                    ->whereHas('parent.parent')
                    ->with([
                        'parent',
                        'parent.parent',
                    ]);
            })

            ->columns([
                TextColumn::make('number')
                    ->label('Código')
                    ->fontFamily('mono')
                    ->color(fn () => 'primary')
                    ->alignCenter(),

                TextColumn::make('name')
                    ->label('Criterio / Requisito de Evaluación VDA')
                    ->wrap(),

                TextColumn::make('evidences_count')
                    ->label('Evidencias')
                    ->counts(fn () => 'evidences')
                    ->badge()
                    ->color(
                        fn($state) =>
                        $state > 0
                        ? 'success'
                        : 'gray'
                    )
                    ->alignCenter(),
            ])

            ->groups([

                // 📁 CONFIGURACIÓN DEL GRUPO TEMA CORREGIDA PARA SQL SERVER
                Group::make('tema')
                    ->label('Tema')
                    ->collapsible()

                    // 💡 SOLUCIÓN: Le decimos a SQL Server que ordene usando la columna real 'sort_order'
                    // en lugar de buscar una columna llamada 'tema'
                    ->orderQueryUsing(function ($query, $direction) {
                        return $query->orderBy('sort_order', $direction);
                    })

                    ->getKeyFromRecordUsing(
                        fn($record) =>
                        (string) $record->parent->parent->id
                    )

                    ->getTitleFromRecordUsing(function ($record) {
                        $tema = $record->parent->parent;
                        return "📁 Tema {$tema->number}: {$tema->name}";
                    }),

                Group::make('subtema')
                    ->label('Subtema')
                    ->collapsible()
                    // Si el subtema también necesita respetar el ordenamiento de sort_order:
                    ->orderQueryUsing(function ($query, $direction) {
                        return $query->orderBy('sort_order', $direction);
                    })
                    ->getKeyFromRecordUsing(
                        fn($record) =>
                        (string) $record->parent->id
                    )
                    ->getTitleFromRecordUsing(function ($record) {
                        $subtema = $record->parent;
                        return "📋 Subtema {$subtema->number}: {$subtema->name}";
                    }),
            ])

            ->defaultGroup('tema')

            ->collapsedGroupsByDefault()

            ->paginated(false)

            ->actions([
                EditAction::make()
                    ->label('Auditar / Evidencias')
                    ->icon('heroicon-m-clipboard-document-check')
                    ->color(fn () => 'warning')
                    ->visible(
                        fn($record) =>
                        $record->parent &&
                        $record->parent->parent
                    ),
            ]);
    }
}