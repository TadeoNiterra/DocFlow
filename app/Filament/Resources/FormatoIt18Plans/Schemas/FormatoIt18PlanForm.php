<?php

namespace App\Filament\Resources\FormatoIt18Plans\Schemas;

use App\Models\FormatoIt18Plan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class FormatoIt18PlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. Datos Generales
                Section::make('Información del Plan PER')
                    ->schema([
                        TextInput::make('folio')
                            ->label('Folio PER')
                            ->required()
                            ->default(fn() => FormatoIt18Plan::generarFolioNext())
                            ->disabled(),

                        DatePicker::make('fecha_elaboracion')
                            ->label('Fecha de Elaboración')
                            ->required()
                            ->default(now()),

                        Select::make('tipo_escenario')
                            ->label('Tipo de Escenario')
                            ->options([
                                'Tecnológico' => 'Tecnológico',
                                'Natural' => 'Natural',
                                'Operativo' => 'Operativo',
                                'Humano' => 'Humano',
                            ])
                            ->required(),

                        TextInput::make('escenario_critico')
                            ->label('Escenario Crítico')
                            ->required()
                            ->columnSpan(2),

                        Textarea::make('descripcion_escenario')
                            ->label('Descripción del Escenario')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),

                        Textarea::make('antecedentes')
                            ->label('Antecedentes')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                // 2. Factores del Entorno (FODA)
                Section::make('Factores del Entorno que Influyen')
                    ->schema([
                        Repeater::make('factores')
                            ->relationship('factores')
                            ->schema([
                                Select::make('tipo')
                                    ->label('Tipo')
                                    ->options(['Interno' => 'Interno', 'Externo' => 'Externo'])
                                    ->required()
                                    ->columnSpan(1),

                                TextInput::make('descripcion')
                                    ->label('Descripción')
                                    ->required()
                                    ->columnSpan(3),

                                Select::make('clasificacion')
                                    ->label('FODA')
                                    ->options([
                                        'Fortaleza' => 'Fortaleza',
                                        'Oportunidad' => 'Oportunidad',
                                        'Debilidad' => 'Debilidad',
                                        'Amenaza' => 'Amenaza',
                                    ])
                                    ->required()
                                    ->columnSpan(1),

                                Select::make('influencia')
                                    ->label('Influencia')
                                    ->options(['Alto' => 'Alto', 'Medio' => 'Medio', 'Bajo' => 'Bajo'])
                                    ->required()
                                    ->columnSpan(1),
                            ])
                            ->columns(6)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                // 3. Fases del Plan y Métricos (RPO, RTO, MTD)
                Section::make('Actividades y Cronograma de Recuperación')
                    ->schema([
                        Repeater::make('fases')
                            ->relationship('fases')
                            ->schema([
                                TextInput::make('fase_nombre')
                                    ->label('Fase')
                                    ->disabled()
                                    ->columnSpan(2),

                                Select::make('tipo_metrico')
                                    ->label('Métrico')
                                    ->options(['RPO' => 'RPO', 'RTO' => 'RTO', 'N/A' => 'N/A'])
                                    ->disabled()    // 🟢 Deshabilita la edición del Select
                                    ->dehydrated()  // 🟢 Asegura que el valor predeterminado se guarde en la BD
                                    ->columnSpan(1),

                                TextInput::make('tiempo_horas')
                                    ->label('Tiempo (h)')
                                    ->numeric()
                                    ->step(0.01)
                                    ->default(0)
                                    ->live()
                                    ->afterStateUpdated(fn(Set $set, Get $get) => self::recalcularMetricos($set, $get))
                                    ->columnSpan(1),

                                Textarea::make('acciones')
                                    ->label('Acciones que se tomarán')
                                    ->rows(2)
                                    ->columnSpan(2),
                            ])
                            ->columns(6)
                            ->default([
                                ['fase_nombre' => 'Fase 0: Preparación', 'tipo_metrico' => 'N/A'],
                                ['fase_nombre' => 'Fase 1: Reporte / Notificación', 'tipo_metrico' => 'RPO'],
                                ['fase_nombre' => 'Fase 2: Evaluación de la situación', 'tipo_metrico' => 'RPO'],
                                ['fase_nombre' => 'Fase 3: Contención', 'tipo_metrico' => 'RPO'],
                                ['fase_nombre' => 'Fase 4: Coordinación interna y externa', 'tipo_metrico' => 'RTO'],
                                ['fase_nombre' => 'Fase 5: Mitigación', 'tipo_metrico' => 'RTO'],
                                ['fase_nombre' => 'Fase 6: Evaluación de daños / contención', 'tipo_metrico' => 'RTO'],
                                ['fase_nombre' => 'Fase 7: Retorno seguro', 'tipo_metrico' => 'RTO'],
                            ])
                            ->addable(false)
                            ->deletable(false)
                            ->reorderable(false)
                            ->columnSpanFull(),

                        TextInput::make('rpo_global')
                            ->label('RPO Global (h)')
                            ->numeric()
                            ->disabled()
                            ->dehydrated()
                            ->columnSpan(1),

                        TextInput::make('rto_global')
                            ->label('RTO Global (h)')
                            ->numeric()
                            ->disabled()
                            ->dehydrated()
                            ->columnSpan(1),

                        TextInput::make('mtd')
                            ->label('MTD (RPO + RTO) (h)')
                            ->numeric()
                            ->disabled()
                            ->dehydrated()
                            ->columnSpan(1),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                // 4. Afectación al Cliente
                Section::make('Evaluación de Afectación al Cliente')
                    ->schema([
                        Toggle::make('impacta_cliente')
                            ->label('¿Impacta a cliente?')
                            ->default(false)
                            ->columnSpanFull(),

                        TextInput::make('oem_tipo_afectacion')->label('OEM/OES - Tipo Afectación')->placeholder('Tiempo de entrega'),
                        TextInput::make('oem_consideraciones')->label('OEM/OES - Consideraciones Crisis'),

                        TextInput::make('aftermarket1_tipo_afectacion')->label('Aftermarket 1 - Tipo Afectación')->placeholder('Volumen de entrega'),
                        TextInput::make('aftermarket1_consideraciones')->label('Aftermarket 1 - Consideraciones Crisis'),

                        TextInput::make('aftermarket2_tipo_afectacion')->label('Aftermarket 2 - Tipo Afectación')->placeholder('Continuidad de operación'),
                        TextInput::make('aftermarket2_consideraciones')->label('Aftermarket 2 - Consideraciones Crisis'),

                        TextInput::make('otros_tipo_afectacion')->label('Otros - Tipo Afectación'),
                        TextInput::make('otros_consideraciones')->label('Otros - Consideraciones Crisis'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // 5. Cadena de Llamadas, Limitaciones y Coordinación
                Section::make('Comité de Crisis, Limitaciones y Responsabilidades')
                    ->schema([
                        Textarea::make('comite_crisis')->label('Principales miembros del comité de crisis')->rows(2),
                        Textarea::make('otros_niterra')->label('Otros miembros de Niterra involucrados')->rows(2),
                        Textarea::make('otras_partes_interesadas')->label('Otras partes interesadas')->rows(2),

                        Textarea::make('limitaciones')
                            ->label('Limitaciones')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('coordinaciones_responsabilidades')
                            ->label('Coordinaciones y Responsabilidades')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }

    // Cálculo automático reactivo de RPO, RTO y MTD
    protected static function recalcularMetricos(Set $set, Get $get): void
    {
        $fases = $get('fases') ?? [];
        $rpo = 0;
        $rto = 0;

        foreach ($fases as $fase) {
            $tiempo = (float) ($fase['tiempo_horas'] ?? 0);
            $tipo = $fase['tipo_metrico'] ?? 'N/A';

            if ($tipo === 'RPO') {
                $rpo += $tiempo;
            } elseif ($tipo === 'RTO') {
                $rto += $tiempo;
            }
        }

        $set('rpo_global', $rpo);
        $set('rto_global', $rto);
        $set('mtd', $rpo + $rto);
    }
}