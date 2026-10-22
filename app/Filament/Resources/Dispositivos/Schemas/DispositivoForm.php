<?php

namespace App\Filament\Resources\Dispositivos\Schemas;

use App\Models\ModeloEquipo;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class DispositivoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. SELECCIÓN DE MODELO Y COLABORADOR ASIGNADO
                Section::make('Asignación y Modelo')
                    ->schema([
                        Select::make('modelo_equipo_id')
                            ->label('Modelo / Especificación de Hardware')
                            ->relationship('modeloEquipo', 'modelo')
                            ->getOptionLabelFromRecordUsing(
                                fn($record) => "[{$record->tipo}] {$record->marca} {$record->modelo} " .
                                    ($record->processor ? "({$record->processor} / {$record->ram_memory} RAM / {$record->ssd})" : '')
                            )
                            ->searchable(['marca', 'modelo', 'processor', 'tipo'])
                            ->preload()
                            ->required()
                            ->live()
                            ->columnSpanFull(),

                        Select::make('colaborador_id')
                            ->label('Colaborador Asignado')
                            ->relationship('colaborador', 'name')
                            ->getOptionLabelFromRecordUsing(
                                fn($record) => "{$record->name} {$record->lastname} ({$record->id_colaborador})"
                            )
                            ->searchable(['name', 'lastname', 'id_colaborador', 'email'])
                            ->preload()
                            ->nullable()
                            ->placeholder('Sin asignar (En Stock / Disponible)')
                            ->columnSpanFull(),
                    ]),

                // 2. IDENTIFICADORES ÚNICOS DE LA UNIDAD FÍSICA
                Section::make('Datos Únicos e Identificadores del Equipo')
                    ->schema([
                        TextInput::make('numero_serie')
                            ->label('Número de Serie / Service Tag')
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. PF58RC2L'),

                        TextInput::make('mac_address')
                            ->label('Dirección MAC')
                            ->placeholder('Ej. 00:1A:2B:3C:4D:5E'),

                        TextInput::make('imei')
                            ->label('IMEI Principal')
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. 351168084597145'),

                        TextInput::make('imei2')
                            ->label('IMEI 2 (Secundario)')
                            ->placeholder('Ej. 351168084662089'),

                        TextInput::make('linea_telefonica')
                            ->label('Número / Línea Telefónica')
                            ->placeholder('Ej. 55-1234-5678'),

                        Toggle::make('cubo_cargador')
                            ->label('¿Incluye Cubo Cargador?')
                            ->default(false)
                            ->inline(false),
                    ])->columns(3),

                // 3. ACCESORIOS ADJUNTOS (Monitor secundario)
                Section::make('Periféricos y Monitor Adjunto')
                    ->description('Registrar si este equipo incluye un monitor adicional asignado')
                    ->schema([
                        TextInput::make('marca_monitor')
                            ->label('Marca Monitor Adjunto')
                            ->placeholder('Ej. Lenovo, Dell'),

                        TextInput::make('serie_monitor')
                            ->label('Serie Monitor Adjunto')
                            ->placeholder('Ej. VNABLTY3'),
                    ])->columns(2),

                // 4. CICLO DE VIDA, CONTROL FINANCIERO Y SEGURIDAD (SGSI / TISAX)
                Section::make('Control, Ciclo de Vida y Estatus')
                    ->schema([
                        Select::make('estatus_asignacion')
                            ->label('Estatus de Asignación')
                            ->options([
                                'ENTREGADO' => 'ENTREGADO',
                                'Aún activo' => 'Aún activo',
                                'EN STOCK' => 'EN STOCK',
                                'EN REPARACION' => 'EN REPARACIÓN',
                                'RETIRADO' => 'RETIRADO / BAJA',
                            ])
                            ->default('ENTREGADO')
                            ->required(),

                        Select::make('nivel_confidencialidad')
                            ->label('Confidencialidad')
                            ->options([
                                'CONFIDENCIAL' => 'CONFIDENCIAL',
                                'PUBLICO' => 'PÚBLICO',
                                'RESTRINGIDO' => 'RESTRINGIDO',
                            ])
                            ->default('CONFIDENCIAL'),

                        TextInput::make('location')
                            ->label('Ubicación')
                            ->default('Oficina'),

                        TextInput::make('arrendamiento_compra')
                            ->label('Contrato / Arrendamiento / Compra')
                            ->placeholder('Ej. Primero, Leased'),

                        DatePicker::make('fecha_compra')
                            ->label('Fecha de Compra'),

                        DatePicker::make('fecha_asignacion')
                            ->label('Fecha de Asignación'),

                        DatePicker::make('fecha_baja')
                            ->label('Fecha de Baja / Retiro'),

                        TextInput::make('ciclo_borrado')
                            ->label('Ciclo de Borrado')
                            ->numeric()
                            ->default(0),

                        Textarea::make('comentarios')
                            ->label('Comentarios / Observaciones')
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }
}