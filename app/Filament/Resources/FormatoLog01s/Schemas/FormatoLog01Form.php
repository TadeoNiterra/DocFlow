<?php

namespace App\Filament\Resources\FormatoLog01s\Schemas;

use App\Models\Proveedor;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class FormatoLog01Form
{
    public static function recalcularPuntajes(Get $get, Set $set): void
    {
        // Suma de las 15 preguntas (Cada una vale 2, 1 ó 0 pts)
        $totalPuntos = 0;
        for ($i = 1; $i <= 15; $i++) {
            $totalPuntos += (int) $get("pregunta{$i}");
        }

        // Puntaje Máximo Posible = 30 puntos (15 preguntas * 2 pts máx)
        $maximoPosible = 30;

        // Fórmula: (Total Obtenido / Puntaje Máximo) * 100
        $porcentaje = number_format(($totalPuntos / $maximoPosible) * 100, 1);

        // Actualiza los estados en tiempo real
        $set('total_puntos', $totalPuntos);
        $set('porcentaje', $porcentaje);
    }
    public static function recalcularPuntajePreliminar(Get $get, Set $set): void
    {
        // Suma de los 4 criterios preliminares
        $precio = (int) $get('precio');
        $respuesta = (int) $get('respuesta');
        $experiencia = (int) $get('experiencia');
        $pago = (int) $get('pago');

        $totalPreliminar = $precio + $respuesta + $experiencia + $pago;

        // Puntaje Máximo Posible = 8 puntos (4 criterios * 2 pts máx)
        $maximoPosible = 8;

        // Porcentaje
        $porcentaje = number_format(($totalPreliminar / $maximoPosible) * 100, 1);

        // Actualiza los estados dinámicos del formulario
        $set('total_preliminar', $totalPreliminar);
        $set('porcentaje_preliminar', $porcentaje);
    }
    public static function configure(Schema $schema): Schema
    {
        $opcionesEvaluacion = [
            2 => '2 - Bueno',
            1 => '1 - Regular',
            0 => '0 - Malo',
        ];
        return $schema
            ->columns(1)
            ->components([
                // -----------------------------------------------------------------
                // SECCIÓN 1: DATOS GENERALES
                // -----------------------------------------------------------------
                Section::make('1. Datos Generales de la Evaluación')
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        Select::make('proveedor_id')
                            ->label('Proveedor')
                            ->options(fn() => Proveedor::query()->pluck('nombre', 'id')->toArray())
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set) {
                                if ($proveedor = Proveedor::find($state)) {
                                    $set('razonSocial', $proveedor->razonSocial);
                                    $set('personaContacto', $proveedor->personaContacto);
                                    $set('numeroContacto', $proveedor->numeroContacto);
                                    $set('email', $proveedor->email);
                                    $set('domicilio', $proveedor->domicilio);
                                    $set('colonia', $proveedor->colonia);
                                    $set('municipio', $proveedor->municipio);
                                    $set('ciudad', $proveedor->ciudad);
                                    $set('cp', $proveedor->cp);
                                    $set('pais', $proveedor->pais);
                                }
                            }),

                        // 2. Campo Oculto para sincronizar supplier_name
                        TextInput::make('razonSocial')
                            ->label('Razon social'),
                        TextInput::make('personaContacto')
                            ->label('Persona de contacto'),
                        TextInput::make('numeroContacto')
                            ->label('Número de contacto'),
                        TextInput::make('email')
                            ->label('Email'),
                        TextInput::make('domicilio')
                            ->label('Domicilio'),
                        TextInput::make('colonia')
                            ->label('Colonia'),
                        TextInput::make('municipio')
                            ->label('Municipio'),
                        TextInput::make('ciudad')
                            ->label('Ciudad'),
                        TextInput::make('cp')
                            ->label('Código postal'),
                        TextInput::make('pais')
                            ->label('País'),

                    ]),
                Section::make('2. Datos de la Evaluación')
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextInput::make('area')
                            ->label('Área')
                            ->required(),
                        Toggle::make('tipo')
                            ->label('Evaluación inicial check, sino dejelo vacio')
                            ->required(),
                        DatePicker::make('fecha')
                            ->label('Fecha de la evaluación')
                            ->default(now())
                            ->required(),
                        DatePicker::make('fechaAnterior')
                            ->label('Fecha de la evaluación anterior')
                            ->required(),
                        TextInput::make('producto')
                            ->label('Tipo de producto')
                            ->required(),
                    ]),

                Section::make('3. Resultados de la Evaluación (Puntuación Preliminar)')
                    ->description('Criterios de Selección: 2 = Bueno | 1 = Regular | 0 = Malo (Puntaje Máximo: 8 pts).')
                    ->columnSpanFull()
                    ->schema([

                        // 🟢 CAMPOS DE SELECCIÓN DE CRITERIOS
                        Fieldset::make('Criterios de Selección')
                            ->columns(4)
                            ->schema([
                                Select::make('precio')
                                    ->label('Precio (Opción más económica)')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajePreliminar($get, $set)),

                                Select::make('respuesta')
                                    ->label('Respuesta (Menor a 48 horas)')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajePreliminar($get, $set)),

                                Select::make('experiencia')
                                    ->label('Experiencia en su ramo (3 – 5 años)')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajePreliminar($get, $set)),

                                Select::make('pago')
                                    ->label('Condiciones de pago (Opciones de crédito)')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajePreliminar($get, $set)),
                            ]),

                        // 🟢 RESUMEN Y RESULTADO DE SELECCIÓN
                        Section::make('Resumen y Dictamen de Selección')
                            ->columns(3)
                            ->schema([
                                Placeholder::make('total_preliminar_display')
                                    ->label('Total Puntaje Obtenido')
                                    ->content(fn(Get $get) => ($get('total_preliminar') ?? 8) . ' / 8 pts'),

                                Placeholder::make('porcentaje_preliminar_display')
                                    ->label('Porcentaje de Compatibilidad')
                                    ->content(fn(Get $get) => ($get('porcentaje_preliminar') ?? '100.0') . '%'),

                                Placeholder::make('dictamen_preliminar_display')
                                    ->label('Criterio de Aceptación')
                                    ->content(function (Get $get) {
                                        $pct = (float) ($get('porcentaje_preliminar') ?? 100);
                                        if ($pct >= 75) {
                                            return '🟢 RECOMENDADO PARA SELECCIÓN';
                                        } elseif ($pct >= 50) {
                                            return '🟡 VIABLE (BAJO REVISIÓN)';
                                        } else {
                                            return '🔴 NO RECOMENDADO';
                                        }
                                    }),
                            ]),
                    ]),


                Section::make('4. Evaluación de la Calidad del Servicio')
                    ->description('Criterios de evaluación: 2 = Bueno | 1 = Regular | 0 = Malo (Puntaje Máximo: 30 pts = 100%).')
                    ->columnSpanFull()
                    ->schema([

                        // 🟢 1. DESEMPEÑO (Preguntas 1 a 3)
                        Fieldset::make('1. Desempeño')
                            ->columns(3)
                            ->schema([
                                Select::make('pregunta1')
                                    ->label('1. Respuesta: Atención a solicitudes en tiempo')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta2')
                                    ->label('2. Cumplimiento con lo establecido en la solicitud')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta3')
                                    ->label('3. Calidad y exactitud en entregables/productos')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),
                            ]),

                        // 🟢 2. SERVICIO (Preguntas 4 a 6)
                        Fieldset::make('2. Servicio')
                            ->columns(3)
                            ->schema([
                                Select::make('pregunta4')
                                    ->label('4. Seguimiento a la satisfacción del cliente')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta5')
                                    ->label('5. Trato, disposición y amabilidad del personal')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta6')
                                    ->label('6. Valor agregado y flexibilidad ante requerimientos')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),
                            ]),

                        // 🟢 3. OTRAS PERCEPCIONES (Preguntas 7 a 9)
                        Fieldset::make('3. Otras Percepciones')
                            ->columns(3)
                            ->schema([
                                Select::make('pregunta7')
                                    ->label('7. Precio: Respetar acuerdos negociados')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta8')
                                    ->label('8. Infraestructura y recursos tecnológicos')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta9')
                                    ->label('9. Capacidad técnica y competencia del personal')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),
                            ]),

                        // 🟢 4. CONFIABILIDAD (Preguntas 10 a 12)
                        Fieldset::make('4. Confiabilidad')
                            ->columns(3)
                            ->schema([
                                Select::make('pregunta10')
                                    ->label('10. Compromiso con el entorno y normativas')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta11')
                                    ->label('11. Mejora continua y controles de calidad')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta12')
                                    ->label('12. Grado general de satisfacción')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),
                            ]),

                        // 🟢 5. SEGURIDAD DE LA INFORMACIÓN (Preguntas 13 a 15)
                        Fieldset::make('5. Seguridad de la Información')
                            ->columns(3)
                            ->schema([
                                Select::make('pregunta13')
                                    ->label('13. Confidencialidad y manejo de datos sensibles')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta14')
                                    ->label('14. Cumplimiento con políticas de ciberseguridad')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),

                                Select::make('pregunta15')
                                    ->label('15. Gestión de riesgos y planes de continuidad')
                                    ->options($opcionesEvaluacion)
                                    ->default(2)->required()->live()
                                    ->afterStateUpdated(fn(Get $get, Set $set) => static::recalcularPuntajes($get, $set)),
                            ]),

                        // 🟢 RESUMEN Y CÁLCULO GENERAL DE EVALUACIÓN
                        Section::make('Resumen y Resultado de Evaluación')
                            ->columns(3)
                            ->schema([
                                Placeholder::make('total_puntos_display')
                                    ->label('Total Puntaje Obtenido')
                                    ->content(fn(Get $get) => ($get('total_puntos') ?? 30) . ' / 30 pts'),

                                Placeholder::make('porcentaje_display')
                                    ->label('Porcentaje Resultante (%)')
                                    ->content(fn(Get $get) => ($get('porcentaje') ?? '100.0') . '%'),

                                Placeholder::make('dictamen_display')
                                    ->label('Estatus del Proveedor')
                                    ->content(function (Get $get) {
                                        $pct = (float) ($get('porcentaje') ?? 100);
                                        if ($pct >= 80) {
                                            return '🟢 APROBADO (A)';
                                        } elseif ($pct >= 60) {
                                            return '🟡 CONDICIONADO (C)';
                                        } else {
                                            return '🔴 RECHAZADO (R)';
                                        }
                                    }),
                            ]),
                    ]),
                Section::make('5. Evaluador y Contrato')
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        TextInput::make('evaluador')
                            ->label('Nombre del evaluador')
                            ->default(fn() => auth()->user()?->name)
                            ->required(),
                        Toggle::make('contrato')
                            ->label('¿Se tiene contrato con el proveedor?')
                            ->required(),
                        Toggle::make('vigencia')
                            ->label('¿El contrato está vigente?'),
                    ]),
            ]);
    }
}