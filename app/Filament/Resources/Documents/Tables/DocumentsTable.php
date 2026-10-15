<?php

namespace App\Filament\Resources\Documents\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\Action;

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->with(['latestVersion']))
            ->columns([
                TextColumn::make('code')
                    ->label('Código')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nombre del Documento')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('latestVersion.version_number')
                    ->label('Última Versión')
                    ->formatStateUsing(fn($state) => filled($state) ? "Rev. {$state}" : 'Sin Versión')
                    ->badge()
                    ->color('warning')
                    ->alignCenter(),
                TextColumn::make('latestVersion.status')
                    ->label('Estatus Vigente')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'draft' => 'gray',
                        'terminado' => 'info',
                        'revisado' => 'purple',
                        'aprobado' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->sortable(),
            ])
            ->actions([
                Action::make('ver_archivo')
                    ->label('Ver PDF')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->visible(fn($record) => $record->latestVersion?->file_path !== null)
                    ->url(fn($record) => route('documentos.ver-pdf', ['version' => $record->latestVersion->id]))
                    ->openUrlInNewTab(),
                EditAction::make()->label('Editar'),
            ]);
    }
}