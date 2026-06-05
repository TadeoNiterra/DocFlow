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
                    ->color('primary')
                    ->alignCenter(),


                TextColumn::make('name')
                    ->label('Criterio / Requisito de Evaluación VDA')
                    ->wrap(),


                TextColumn::make('evidences_count')
                    ->label('Evidencias')
                    ->counts('evidences')
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

                Group::make('tema')
                    ->label('Tema')
                    ->collapsible()

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
                    ->color('warning')

                    ->visible(
                        fn($record) =>
                        $record->parent &&
                        $record->parent->parent
                    ),

            ]);
    }
}