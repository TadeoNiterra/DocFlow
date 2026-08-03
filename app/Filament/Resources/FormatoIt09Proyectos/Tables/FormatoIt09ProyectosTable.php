<?php

namespace App\Filament\Resources\FormatoIt09Proyectos\Tables;

use App\Models\FormatoIt09Proyecto;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FormatoIt09ProyectosTable
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

                TextColumn::make('proyecto')
                    ->label('Nombre del Proyecto')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('creador.name')
                    ->label('Creado por')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('activos_count')
                    ->label('Activos')
                    ->counts('activos')
                    ->badge()
                    ->color('info'),

                TextColumn::make('riesgos_count')
                    ->label('Riesgos')
                    ->counts('riesgos')
                    ->badge()
                    ->color('warning'),

                TextColumn::make('created_at')
                    ->label('Registro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                // 📄 BOTÓN DE VISTA PREVIA PDF HORIZONTAL
                Action::make('pdf')
                    ->label('PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->url(fn (FormatoIt09Proyecto $record): string => route('formato-it09.preview-pdf', $record))
                    ->openUrlInNewTab(),

                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}