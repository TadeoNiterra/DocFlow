<?php

namespace App\Filament\Resources\RiskRegisters\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RiskRegistersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code_id')
                    ->label('ID')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('proceso')->label('Proceso'),
                TextColumn::make('asset')->label('Asset')->wrap()->limit(40),
                TextColumn::make('vulnerabilidad')->label('Vulnerabilidad')->wrap(),
                TextColumn::make('amenaza')->label('Amenaza')->wrap(),
                TextColumn::make('risk_description')->label('Risk description')->wrap()->limit(40),
                TextColumn::make('risk_owner')->label('Risk owner'),
                TextColumn::make('impact_description')->label('Impact description')->wrap()->limit(40),

                // SEMÁFOROS Y INDICADORES EN %
                TextColumn::make('prob')
                    ->label('Prob')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->badge()
                    ->color(fn($state) => match (true) {
                        $state >= 0.60 => 'warning',
                        $state >= 0.25 => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('impact')
                    ->label('Impact')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->badge()
                    ->color('success'),

                TextColumn::make('priority')
                    ->label('Priority')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->badge()
                    ->color(fn($state) => match (true) {
                        $state >= 0.15 => 'danger',
                        $state >= 0.08 => 'warning',
                        default => 'success',
                    }),

                TextColumn::make('categoria_control')->label('Categoría de control'),
                TextColumn::make('mitigation_description')->label('Mitigation description')->wrap()->limit(40),
                TextColumn::make('m_cost')->label('M-Cost'),
                TextColumn::make('m_status')
                    ->label('M-Status')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->weight('bold'),

                TextColumn::make('prob_2')
                    ->label('Prob 2')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->badge()
                    ->color('danger'),

                TextColumn::make('impact_2')
                    ->label('Impact 2')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->badge()
                    ->color('danger'),

                TextColumn::make('priority_2')
                    ->label('Priority 2')
                    ->formatStateUsing(fn($state) => round($state * 100) . '%')
                    ->badge()
                    ->color('success'),

                TextColumn::make('date_last_reviewed')->label('Date last reviewed')->date('d/m/Y'),
                TextColumn::make('updated_by')->label('Reviewed by'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}