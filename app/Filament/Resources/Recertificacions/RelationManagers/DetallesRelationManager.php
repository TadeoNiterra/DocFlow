<?php

namespace App\Filament\Resources\Recertificacions\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DetallesRelationManager extends RelationManager
{
    protected static string $relationship = 'detalles';
    protected static ?string $title = 'Censo de Cuentas Active Directory y Cambios del Trimestre';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id_ad_registrado')
            ->columns([
                TextColumn::make('id_ad_registrado')
                    ->label('Usuario')
                    ->searchable()
                    ->weight('bold')
                    ->sortable(),

                TextColumn::make('nombre_completo_ad')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email_ad')
                    ->label('Correo')
                    ->searchable()
                    ->placeholder('Sin correo')
                    ->copyable(),

                TextColumn::make('activo_en_ad')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn(bool $state) => $state ? 'Activo' : 'Inactivo')
                    ->color(fn(bool $state) => $state ? 'success' : 'danger')
                    ->sortable(),

                TextColumn::make('clasificacion')
                    ->label('Clasificación')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('departamento_ad')
                    ->label('Departamento')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tipo_cuenta')
                    ->label('Tipo')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('mes_recertificacion')
                    ->label('Mes de Recertificación')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('fecha_creacion_ad')
                    ->label('Fecha de Creación')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                TextColumn::make('fecha_recertificacion')
                    ->label('Última fecha de recertificación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('fecha_cambio_ad')
                    ->label('Última Modificación en AD')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('id_ad_registrado', 'asc')
            ->filters([
                SelectFilter::make('activo_en_ad')
                    ->label('Status en AD')
                    ->options([
                        1 => 'Activos',
                        0 => 'Inactivos',
                    ]),
                SelectFilter::make('clasificacion')
                    ->label('Clasificación'),
                SelectFilter::make('mes_recertificacion')
                    ->label('Mes'),
            ]);
    }
}