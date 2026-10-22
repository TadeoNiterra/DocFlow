<?php

namespace App\Filament\Resources\Colaboradors\Tables;

use App\Models\Colaborador;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;

class ColaboradorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->withCount('dispositivos'))
            ->columns([
                TextColumn::make('id_colaborador')
                    ->label('Clave / ID')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('name')
                    ->label('Nombre(s)')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('lastname')
                    ->label('Apellidos')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('department')
                    ->label('Departamento')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->formatStateUsing(fn($state) => match ($state) {
                        'IT' => 'IT / Sistemas',
                        'RH' => 'Recursos Humanos',
                        'MKT' => 'Mercadotecnia',
                        'SCM' => 'Cadena de Suministro',
                        'ALM' => 'Almacén',
                        'ADM' => 'Administración',
                        'FIN' => 'Finanzas',
                        'IAM' => 'Ventas',
                        'CONT' => 'Contabilidad',
                        'OEM' => 'OEM',
                        'MKS' => 'Mercadotecnia Servicio',
                        'BI' => 'Inteligencia de Negocios',
                        'IAM_EXP' => 'Ventas Internacionales',
                        'PRES' => 'Presidencia',
                        'TRAF' => 'Tráfico',
                        'COMINT' => 'Compras Internacionales',
                        default => $state,
                    }),

                TextColumn::make('dispositivos_count')
                    ->label('Equipos Asignados')
                    ->counts('dispositivos')
                    ->badge()
                    ->color(fn($state) => $state > 0 ? 'success' : 'gray')
                    ->alignCenter(),
            ])
            ->defaultSort('id_colaborador')
            ->recordActions([
                // Acceso directo para abrir la responsiva PDF
                Action::make('ver_responsiva')
                    ->label('Responsiva')
                    ->icon('heroicon-o-document-text')
                    ->color('info')
                    ->url(fn(Colaborador $record): string => route('colaboradores.responsiva.pdf', $record))
                    ->openUrlInNewTab(),

                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}