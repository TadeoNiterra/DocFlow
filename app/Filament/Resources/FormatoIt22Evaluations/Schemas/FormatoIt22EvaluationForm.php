<?php

namespace App\Filament\Resources\FormatoIt22Evaluations\Schemas;

use App\Models\Proveedor;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class FormatoIt22EvaluationForm
{
    public static function configure(Schema $schema): Schema
    {
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
                                    // Guarda el nombre en supplier_name para satisfacer el NOT NULL
                                    $set('supplier_name', $proveedor->nombre);

                                    // Rena datos de contacto
                                    $set('supplier_representative', $proveedor->personaContacto);
                                    $set('telephone', $proveedor->numeroContacto);
                                }
                            }),

                        // 2. Campo Oculto para sincronizar supplier_name
                        Hidden::make('supplier_name')
                            ->required(),
                            
                        TextInput::make('supplier_representative')
                            ->label('Representante del Proveedor'),

                        Select::make('audit_type')
                            ->label('Tipo de Auditoría')
                            ->options([
                                'precalificacion' => 'Precalificación',
                                'autoevaluacion' => 'Autoevaluación',
                                'reevaluacion' => 'Reevaluación',
                                'otro' => 'Otro (Especificar)',
                            ])
                            ->default('autoevaluacion')
                            ->required()
                            ->live(),

                        TextInput::make('audit_type_other')
                            ->label('Especifique Otro Tipo')
                            ->visible(fn(Get $get) => $get('audit_type') === 'otro')
                            ->required(fn(Get $get) => $get('audit_type') === 'otro'),

                        DatePicker::make('evaluation_date')
                            ->label('Fecha de Evaluación')
                            ->default(now())
                            ->required(),

                        TextInput::make('evaluator_name')
                            ->label('Nombre del Evaluador')
                            ->default(fn() => auth()->user()?->name)
                            ->required(),

                        TextInput::make('telephone')
                            ->label('Teléfono de Contacto')
                            ->tel(),

                        TextInput::make('sow')
                            ->label('Declaración de Trabajo (SOW)'),

                        TextInput::make('sla')
                            ->label('Acuerdo Nivel Servicio (SLA)'),

                        TextInput::make('evaluation_period')
                            ->label('Periodo de Evaluación')
                            ->placeholder('Ej. Anual 2026'),

                        TextInput::make('evaluation_reason')
                            ->label('Motivo de Evaluación')
                            ->columnSpan(2),
                    ]),

                // -----------------------------------------------------------------
                // SECCIÓN 2: ANTECEDENTES DEL PROVEEDOR
                // -----------------------------------------------------------------
                Section::make('2. Antecedentes del Proveedor')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Toggle::make('bg_has_certifications')
                            ->label('¿Cuenta con certificaciones vigentes (ISO 27001, TISAX, COBIT)?'),

                        TextInput::make('bg_market_time')
                            ->label('¿Tiempo en el mercado?')
                            ->placeholder('Ej. 5 años'),

                        Toggle::make('bg_has_support_channels')
                            ->label('¿Canales de soporte técnico activos?'),

                        Toggle::make('bg_has_247_support')
                            ->label('¿Soporte técnico 24/7/365?'),

                        Textarea::make('bg_comments')
                            ->label('Comentarios de Antecedentes')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                // -----------------------------------------------------------------
                // SECCIÓN 3: CUESTIONARIO Y SCORING POR CATEGORÍAS
                // -----------------------------------------------------------------
                Section::make('3. Evaluación de Controles de Seguridad (Scoring F-IT-22)')
                    ->description('Seleccione la calificación (0 a 3 Pts) mediante la lista desplegable para cada ítem.')
                    ->columnSpanFull()
                    ->schema([
                        Fieldset::make('SECCIÓN 1: CERTIFICACIONES')
                            ->columns(1)
                            ->schema([
                                self::makeScoreSelect('q1_score', '1. ¿Cuenta con certificaciones relacionadas con seguridad de la información?'),
                            ]),

                        Fieldset::make('SECCIÓN 2: CONTROL DE ACCESOS FÍSICOS')
                            ->columns(1)
                            ->schema([
                                self::makeScoreSelect('q2_score', '2. ¿Cuenta con políticas de control de accesos o seguridad física?'),
                                self::makeScoreSelect('q3_score', '3. ¿Cuenta con algún mecanismo de registro de visitantes o externos?'),
                                self::makeScoreSelect('q4_score', '4. ¿Cuenta con infraestructuras de control de accesos físicos (Cerrojos, biométricos, tarjeta de proximidad)?'),
                            ]),

                        Fieldset::make('SECCIÓN 3: CONTROL DE ACCESOS LÓGICOS')
                            ->columns(1)
                            ->schema([
                                self::makeScoreSelect('q5_score', '5. ¿Cuenta con políticas de control de accesos lógicos o a sistemas?'),
                                self::makeScoreSelect('q6_score', '6. ¿Cuenta con algún medio de autentificación según la cantidad de licencias o usuarios contratados?'),
                                self::makeScoreSelect('q7_score', '7. ¿Se tienen definidos los medios de recuperación de usuarios?'),
                            ]),

                        Fieldset::make('SECCIÓN 4: SEGURIDAD EN EL INTERCAMBIO DE INFORMACIÓN')
                            ->columns(1)
                            ->schema([
                                self::makeScoreSelect('q8_score', '8. ¿El intercambio de información se realiza a través de un dominio protegido?'),
                            ]),

                        Fieldset::make('SECCIÓN 5: COMPLIANCE')
                            ->columns(1)
                            ->schema([
                                self::makeScoreSelect('q9_score', '9. ¿Tiene disponible la información legal o contractual sobre los servicios o productos contratados?'),
                                self::makeScoreSelect('q10_score', '10. ¿Cuenta con un aviso de privacidad actualizado y visible?'),
                            ]),
                    ]),

                // -----------------------------------------------------------------
                // SECCIÓN 4: TABLA DE RESULTADOS Y DESGLOSE POR SECCIÓN (EXCEL F-IT-22)
                // -----------------------------------------------------------------
                Section::make('4. Puntuación por Secciones y Dictamen Final')
                    ->columnSpanFull()
                    ->schema([
                        Fieldset::make('1. CERTIFICACIONES (Posibles: 3 Pts)')
                            ->columns(2)
                            ->schema([
                                TextInput::make('sec1_score')->label('Puntos Obtenidos')->prefix('Pts')->readOnly(),
                                TextInput::make('sec1_percent')->label('Porcentaje Sección')->suffix('%')->readOnly(),
                            ]),

                        Fieldset::make('2. CONTROLES DE ACCESO FÍSICOS (Posibles: 9 Pts)')
                            ->columns(2)
                            ->schema([
                                TextInput::make('sec2_score')->label('Puntos Obtenidos')->prefix('Pts')->readOnly(),
                                TextInput::make('sec2_percent')->label('Porcentaje Sección')->suffix('%')->readOnly(),
                            ]),

                        Fieldset::make('3. CONTROLES DE ACCESOS LÓGICOS (Posibles: 9 Pts)')
                            ->columns(2)
                            ->schema([
                                TextInput::make('sec3_score')->label('Puntos Obtenidos')->prefix('Pts')->readOnly(),
                                TextInput::make('sec3_percent')->label('Porcentaje Sección')->suffix('%')->readOnly(),
                            ]),

                        Fieldset::make('4. SEGURIDAD EN EL INTERCAMBIO DE INFORMACIÓN (Posibles: 3 Pts)')
                            ->columns(2)
                            ->schema([
                                TextInput::make('sec4_score')->label('Puntos Obtenidos')->prefix('Pts')->readOnly(),
                                TextInput::make('sec4_percent')->label('Porcentaje Sección')->suffix('%')->readOnly(),
                            ]),

                        Fieldset::make('5. COMPLIANCE (Posibles: 6 Pts)')
                            ->columns(2)
                            ->schema([
                                TextInput::make('sec5_score')->label('Puntos Obtenidos')->prefix('Pts')->readOnly(),
                                TextInput::make('sec5_percent')->label('Porcentaje Sección')->suffix('%')->readOnly(),
                            ]),

                        Fieldset::make('TOTALES Y DICTAMEN FINAL (Posibles: 30 Pts)')
                            ->columns(3)
                            ->schema([
                                TextInput::make('actual_score')
                                    ->label('Puntaje Total Obtenido')
                                    ->numeric()
                                    ->prefix('Pts')
                                    ->readOnly(),

                                TextInput::make('percentage')
                                    ->label('Porcentaje Total')
                                    ->numeric()
                                    ->suffix('%')
                                    ->readOnly(),

                                Select::make('classification')
                                    ->label('Dictamen Final')
                                    ->options([
                                        'calificado' => '🟢 Proveedor Calificado (76-100%)',
                                        'sujeto_a_mejora' => '🟡 Sujeto a Mejora (25-75%)',
                                        'evaluacion_extraordinaria' => '🔴 Eval. Extraordinaria (<25%)',
                                    ])
                                    ->disabled()
                                    ->dehydrated(),
                            ]),
                    ]),

                // -----------------------------------------------------------------
                // SECCIÓN 5: ACCIONES CORRECTIVAS
                // -----------------------------------------------------------------
                Section::make('5. Plan de Acciones Correctivas (Remediación)')
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(2)->schema([
                            Toggle::make('requires_remediation')
                                ->label('¿Se requieren medidas de remediación?')
                                ->live(),

                            DatePicker::make('remediation_deadline')
                                ->label('Fecha Límite de Medidas de Remediación')
                                ->visible(fn(Get $get) => (bool) $get('requires_remediation'))
                                ->required(fn(Get $get) => (bool) $get('requires_remediation')),
                        ]),

                        Repeater::make('correctiveActions')
                            ->relationship()
                            ->label('Acciones Correctivas Requeridas')
                            ->schema([
                                TextInput::make('item')->label('Item / Ref')->columnSpan(1),
                                TextInput::make('concern')->label('Hallazgo / Inquietud')->required()->columnSpan(3),
                                TextInput::make('action')->label('Acción Correctiva')->required()->columnSpan(3),
                                TextInput::make('responsible')->label('Responsable')->required()->columnSpan(2),
                                DatePicker::make('start_date')->label('Fecha Inicio')->required()->columnSpan(2),
                                DatePicker::make('close_date')->label('Fecha Cierre')->columnSpan(1),
                            ])
                            ->columns(12)
                            ->collapsible()
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    /**
     * Helper para seleccionar calificación y recalcular el desglose por sección en tiempo real.
     */
    private static function makeScoreSelect(string $name, string $label): Select
    {
        return Select::make($name)
            ->label($label)
            ->options([
                0 => '0 - No cuenta con antecedentes del control',
                1 => '1 - Demuestra aplicación empírica/documental sin evidencias claras',
                2 => '2 - Demuestra la implementación de procesos e infraestructura',
                3 => '3 - Demuestra la efectividad completa del control',
            ])
            ->default(0)
            ->required()
            ->live()
            ->afterStateUpdated(function (Get $get, Set $set) {
                // Sumas por cada sección según la matriz F-IT-22
                $sec1 = (int) $get('q1_score'); // Máx 3 Pts
                $sec2 = (int) $get('q2_score') + (int) $get('q3_score') + (int) $get('q4_score'); // Máx 9 Pts
                $sec3 = (int) $get('q5_score') + (int) $get('q6_score') + (int) $get('q7_score'); // Máx 9 Pts
                $sec4 = (int) $get('q8_score'); // Máx 3 Pts
                $sec5 = (int) $get('q9_score') + (int) $get('q10_score'); // Máx 6 Pts
    
                $total = $sec1 + $sec2 + $sec3 + $sec4 + $sec5;
                $percent = round(($total / 30) * 100, 2);

                // Asignación de valores por sección
                $set('sec1_score', $sec1);
                $set('sec1_percent', round(($sec1 / 3) * 100, 2));

                $set('sec2_score', $sec2);
                $set('sec2_percent', round(($sec2 / 9) * 100, 2));

                $set('sec3_score', $sec3);
                $set('sec3_percent', round(($sec3 / 9) * 100, 2));

                $set('sec4_score', $sec4);
                $set('sec4_percent', round(($sec4 / 3) * 100, 2));

                $set('sec5_score', $sec5);
                $set('sec5_percent', round(($sec5 / 6) * 100, 2));

                // Totales generales
                $set('actual_score', $total);
                $set('percentage', $percent);

                if ($percent >= 76) {
                    $set('classification', 'calificado');
                } elseif ($percent >= 25) {
                    $set('classification', 'sujeto_a_mejora');
                } else {
                    $set('classification', 'evaluacion_extraordinaria');
                }
            });
    }
}