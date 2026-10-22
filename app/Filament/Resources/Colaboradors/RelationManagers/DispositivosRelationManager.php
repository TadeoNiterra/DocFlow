<?php

namespace App\Filament\Resources\Colaboradors\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DispositivosRelationManager extends RelationManager
{
    protected static string $relationship = 'dispositivos';

    protected static ?string $title = 'Dispositivos Asignados';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('modelo_equipo_id')
                    ->label('Modelo de Equipo')
                    ->relationship('modeloEquipo', 'modelo')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => "[{$record->tipo}] {$record->marca} {$record->modelo}"
                    )
                    ->searchable(['marca', 'modelo', 'tipo'])
                    ->preload()
                    ->required(),

                TextInput::make('numero_serie')
                    ->label('Número de Serie / Service Tag')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('mac_address')
                    ->label('Dirección MAC'),

                TextInput::make('imei')
                    ->label('IMEI')
                    ->unique(ignoreRecord: true),

                TextInput::make('linea_telefonica')
                    ->label('Línea Telefónica'),

                Select::make('estatus_asignacion')
                    ->label('Estatus')
                    ->options([
                        'ENTREGADO'     => 'ENTREGADO',
                        'Aún activo'    => 'Aún activo',
                        'EN STOCK'      => 'EN STOCK',
                        'EN REPARACION' => 'EN REPARACIÓN',
                        'RETIRADO'      => 'RETIRADO / BAJA',
                    ])
                    ->default('ENTREGADO')
                    ->required(),

                DatePicker::make('fecha_asignacion')
                    ->label('Fecha de Asignación')
                    ->default(now()),

                Textarea::make('comentarios')
                    ->label('Comentarios / Observaciones')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('numero_serie')
            ->columns([
                TextColumn::make('modeloEquipo.tipo')
                    ->label('Tipo')
                    ->badge()
                    ->sortable(),

                TextColumn::make('modeloEquipo.marca')
                    ->label('Marca')
                    ->searchable(),

                TextColumn::make('modeloEquipo.modelo')
                    ->label('Modelo')
                    ->searchable(),

                TextColumn::make('numero_serie')
                    ->label('Núm. Serie')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('linea_telefonica')
                    ->label('Línea')
                    ->placeholder('N/A'),

                TextColumn::make('estatus_asignacion')
                    ->label('Estatus')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'ENTREGADO', 'Aún activo' => 'success',
                        'EN REPARACION' => 'warning',
                        'RETIRADO' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Asignar / Crear Dispositivo'),
                AssociateAction::make()
                    ->label('Vincular Existente (Stock)'),
            ])
            ->actions([
                EditAction::make(),
                DissociateAction::make()
                    ->label('Desasignar'),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}