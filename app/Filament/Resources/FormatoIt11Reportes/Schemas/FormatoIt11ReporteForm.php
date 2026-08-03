<?php

namespace App\Filament\Resources\FormatoIt11Reportes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormatoIt11ReporteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. Datos Generales del Reporte
                Section::make('Información General de la Prueba')
                    ->schema([
                        TextInput::make('folio')
                            ->label('Folio')
                            ->required()
                            ->default(fn() => 'F-IT-11 ' . now()->format('d-m-Y'))
                            ->readOnly(),

                        DatePicker::make('fecha_prueba')
                            ->label('Fecha de Prueba')
                            ->required()
                            ->default(now())
                            ->live()
                            ->afterStateUpdated(function ($state, $set) {
                                if ($state) {
                                    $fecha = \Carbon\Carbon::parse($state)->format('d-m-Y');
                                    $set('folio', "F-IT-11 {$fecha}");
                                }
                            }),

                        TextInput::make('area_negocio')
                            ->label('Área de Negocio')
                            ->default('IT')
                            ->required()
                            ->readOnly(),

                        TextInput::make('unidad_funcional')
                            ->label('Unidad Funcional')
                            ->default('Niterra México')
                            ->required()
                            ->readOnly(),

                        TextInput::make('responsable_respuesta')
                            ->label('Responsable de Respuesta')
                            ->default('Operations Department Emergency Response Head Office')
                            ->required()
                            ->columnSpan(2),

                        TextInput::make('lugar_entrevista')
                            ->label('Lugar de Entrevista')
                            ->default('Niterra México, Depto IT')
                            ->required()
                            ->columnSpan(1),

                        Textarea::make('escenario')
                            ->label('Escenario')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),

                        Textarea::make('consideraciones')
                            ->label('Consideraciones / Descripción del Escenario de Recuperación')
                            ->rows(2)
                            ->columnSpanFull(),

                        TextInput::make('personas_presentes')
                            ->label('No. De Personas Presentes')
                            ->numeric()
                            ->placeholder('Ej: 70')
                            ->columnSpan(1),

                        TextInput::make('personas_involucradas')
                            ->label('No. De Personas Involucradas')
                            ->numeric()
                            ->placeholder('Ej: 4')
                            ->columnSpan(1),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                // 2. Tabla Cronograma de Fases (Pre-cargadas por defecto)
                Section::make('Fases del Simulacro (BCP / DRP)')
                    ->schema([
                        Repeater::make('fases')
                            ->relationship('fases')
                            ->schema([
                                TextInput::make('bloque')
                                    ->label('Fase BCP/DRP')
                                    ->required()
                                    ->readOnly()
                                    ->columnSpan(2),

                                TextInput::make('fase')
                                    ->label('Paso')
                                    ->required()
                                    ->readOnly()
                                    ->columnSpan(2),

                                TimePicker::make('inicio')
                                    ->label('Inicio')
                                    ->format('H:i')
                                    ->columnSpan(1),

                                TimePicker::make('fin')
                                    ->label('Fin')
                                    ->format('H:i')
                                    ->columnSpan(1),

                                Textarea::make('descripcion')
                                    ->label('Descripción de Actividades')
                                    ->rows(2)
                                    ->columnSpan(6),
                            ])
                            ->columns(6)
                            ->default([
                                ['bloque' => 'Activación BCP', 'fase' => '1. Notificación'],
                                ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación'],
                                ['bloque' => 'Activación BCP', 'fase' => '3. Contención'],
                                ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación'],
                                ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación'],
                                ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños'],
                                ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones'],
                            ])
                            ->addable(false)
                            ->deletable(false)
                            ->reorderable(false)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                // 3. Métricos (Teórico vs Real)
                Section::make('Métricas de Tiempos')
                    ->schema([
                        TextInput::make('evacuacion_teorico')->label('Tiempo Evacuación Teórico (h)')->numeric()->step(0.01)->columnSpan(1),
                        TextInput::make('evacuacion_real')->label('Tiempo Evacuación Real (h)')->numeric()->step(0.01)->columnSpan(1),

                        TextInput::make('rpo_teorico')->label('RPO Teórico (h)')->numeric()->step(0.01)->columnSpan(1),
                        TextInput::make('rpo_real')->label('RPO Real (h)')->numeric()->step(0.01)->columnSpan(1),

                        TextInput::make('rto_teorico')->label('RTO Teórico (h)')->numeric()->step(0.01)->columnSpan(1),
                        TextInput::make('rto_real')->label('RTO Real (h)')->numeric()->step(0.01)->columnSpan(1),

                        TextInput::make('mtd_teorico')->label('MTD Teórico (h)')->numeric()->step(0.01)->columnSpan(1),
                        TextInput::make('mtd_real')->label('MTD Real (h)')->numeric()->step(0.01)->columnSpan(1),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // 4. Evaluación Final
                Section::make('Evaluación Final y Mejoras')
                    ->schema([
                        Select::make('plan_efectivo')
                            ->label('¿El plan de recuperación fue efectivo?')
                            ->options([
                                1 => 'Sí',
                                0 => 'No',
                            ])
                            ->required()
                            ->columnSpan(1),

                        Textarea::make('porque_efectivo')
                            ->label('¿Por qué?')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('lecciones_aprendidas')
                            ->label('Lecciones aprendidas / oportunidades de mejora')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}