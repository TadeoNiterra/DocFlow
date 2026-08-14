<?php

namespace App\Filament\Resources\FormatoIt18Plans\Tables;

use App\Models\FormatoIt18Plan;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FormatoIt18PlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('folio')
                    ->label('Folio')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('tipo_escenario')
                    ->label('Tipo Escenario')
                    ->sortable(),

                TextColumn::make('escenario_critico')
                    ->label('Escenario Crítico')
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('mtd')
                    ->label('MTD (h)')
                    ->suffix(' h')
                    ->alignCenter(),

                IconColumn::make('impacta_cliente')
                    ->label('Impacta Cliente')
                    ->boolean(),

                TextColumn::make('fecha_elaboracion')
                    ->label('Elaborado')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->url(fn (FormatoIt18Plan $record): string => route('formato-it18.preview-pdf', $record))
                    ->openUrlInNewTab(),

                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}