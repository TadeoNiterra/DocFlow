<?php

namespace App\Filament\Resources\FormatoLog01s\Tables;

use App\Models\FormatoLog01;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action; // 🟢 Importación correcta para la acción del PDF
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FormatoLog01sTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('proveedor.nombre')
                    ->label('Proveedor')
                    ->searchable(),
                TextColumn::make('area')
                    ->label('Área')
                    ->searchable(),
                IconColumn::make('tipo')
                    ->label('Evaluación Inicial')
                    ->boolean(),
                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('fechaAnterior')
                    ->label('Fecha Anterior')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('producto')
                    ->label('Producto / Servicio')
                    ->searchable(),
                TextColumn::make('evaluador')
                    ->label('Evaluador')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),

                // 🟢 ACCIÓN PARA DESCARGAR / VER PDF EN PESTAÑA NUEVA
                Action::make('pdf')
                    ->label('Ver PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('danger')
                    ->url(fn(FormatoLog01 $record) => route('formato-log01.pdf', $record->id))
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}