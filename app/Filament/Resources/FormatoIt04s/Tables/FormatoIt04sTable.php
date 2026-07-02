<?php

namespace App\Filament\Resources\FormatoIt04s\Tables;

use App\Models\FormatoIt04;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\Action; // 👈 Aseguramos la importación correcta para tablas
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class FormatoIt04sTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('folio')
                    ->label('Folio')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('fecha_eliminacion')
                    ->label('Fecha Eliminación')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('nombre_puesto')
                    ->label('Puesto')
                    ->searchable(),

                TextColumn::make('nombre_maquina')
                    ->label('Equipo')
                    ->searchable(),

                TextColumn::make('dispositivo')
                    ->label('Tipo'),

                TextColumn::make('tratamiento')
                    ->label('Tratamiento'),
            ])
            ->recordActions([
                // 🚀 Abre el PDF directamente en una pestaña/ventana del navegador
                Action::make('previewPdf')
                    ->label('Ver PDF')
                    ->icon(Heroicon::OutlinedEye)
                    ->color('info')
                    ->url(fn(FormatoIt04 $record): string => route('formato-it04.preview-pdf', $record))
                    ->openUrlInNewTab(), // 👈 Atributo para abrir en nueva pestaña/ventana

                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}