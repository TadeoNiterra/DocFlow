<?php

namespace App\Filament\Resources\FormatoIt11Reportes\Tables;

use App\Models\FormatoIt11Reporte;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FormatoIt11ReportesTable
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

                TextColumn::make('fecha_prueba')
                    ->label('Fecha Prueba')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('escenario')
                    ->label('Escenario')
                    ->limit(40)
                    ->wrap(),

                IconColumn::make('plan_efectivo')
                    ->label('Efectivo')
                    ->boolean(),

                TextColumn::make('creador.name')
                    ->label('Registrado por')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Fecha Registro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->url(fn(FormatoIt11Reporte $record): string => route('formato-it11.preview-pdf', $record))
                    ->openUrlInNewTab(),

                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}