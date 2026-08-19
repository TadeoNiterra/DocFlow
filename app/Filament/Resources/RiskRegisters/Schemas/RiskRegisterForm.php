<?php

namespace App\Filament\Resources\RiskRegisters\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class RiskRegisterForm
{
    // --- 1. CATÁLOGO DE VULNERABILIDADES ---
    public static function getVulnerabilitiesMap(): array
    {
        return [
            '1. Ambiente e infraestructura' => [
                'Inadecuada protección física del site' => 'Inadecuada protección física del site',
                'Inadecuada protección física del edificio' => 'Inadecuada protección física del edificio',
                'Inadecuada protección física – habitación' => 'Inadecuada protección física – habitación',
                'Inadecuado control de acceso –site' => 'Inadecuado control de acceso –site',
                'Inadecuado control de acceso – edificio' => 'Inadecuado control de acceso – edificio',
                'Inestabilidad en el suministro de energía eléctrica' => 'Inestabilidad en el suministro de energía eléctrica',
                'Agua – Suministro' => 'Agua – Suministro',
                'Desastre natural' => 'Desastre natural',
                'Falta de mantenimiento a la infraestructura' => 'Falta de mantenimiento a la infraestructura',
            ],
            '2. Personal' => [
                'Ausencias / insuficiencia de personal' => 'Ausencias / insuficiencia de personal',
                'Inadecuado control de la contratación' => 'Inadecuado control de la contratación',
                'Inadecuada definición del puesto de trabajo.' => 'Inadecuada definición del puesto de trabajo.',
                'Autoridad excesiva / control' => 'Autoridad excesiva / control',
                'Falta de conciencia sobre la seguridad' => 'Falta de conciencia sobre la seguridad',
                'Falta de capacitación laboral' => 'Falta de capacitación laboral',
                'Falta de políticas / estándares / procedimientos' => 'Falta de políticas / estándares / procedimientos',
                'Revocación de los derechos de acceso' => 'Revocación de los derechos de acceso',
            ],
            '3. Hardware' => [
                'Falla' => 'Falla',
                'Degradación' => 'Degradación',
                'Inadecuado / almacenamiento' => 'Inadecuado / almacenamiento',
                'Ubicación - exposición a daños' => 'Ubicación - exposición a daños',
                'Ubicación - exposición - temperatura' => 'Ubicación - exposición - temperatura',
                'Incompatibilidad' => 'Incompatibilidad',
                'Capacidad inadecuada' => 'Capacidad inadecuada',
            ],
            '3. Software' => [
                'Inadecuada / incompleta especificación' => 'Inadecuada / incompleta especificación',
                'inadecuado / pruebas insuficientes' => 'inadecuado / pruebas insuficientes',
                'Inadecuada aplicación de la regla de diseño' => 'Inadecuada aplicación de la regla de diseño',
                'Inadecuado control de acceso' => 'Inadecuado control de acceso',
                'Inadecuado control de versión.' => 'Inadecuado control de versión.',
                'Mala administración de contraseñas' => 'Mala administración de contraseñas',
                'Falta de protección contra virus y código malicioso' => 'Falta de protección contra virus y código malicioso',
            ],
            '4. Comunicaciones' => [
                'Líneas de comunicación no protegidas' => 'Líneas de comunicación no protegidas',
                'Cableado / articulaciones / conexiones pobres' => 'Cableado / articulaciones / conexiones pobres',
                'Falta de identificación del remitente / receptor' => 'Falta de identificación del remitente / receptor',
                'Transferencia de contraseñas / claves en texto plano' => 'Transferencia de contraseñas / claves en texto plano',
                'Insuficiencia en la gestión de la red.' => 'Insuficiencia en la gestión de la red.',
            ],
            '6. Documentos/ Datos' => [
                'Ubicación - almacenamiento desprotegido' => 'Ubicación - almacenamiento desprotegido',
                'No hay una política clara de escritorio limpio.' => 'No hay una política clara de escritorio limpio.',
                'Susceptibilidad de daños a los medios de almacenamiento' => 'Susceptibilidad de daños a los medios de almacenamiento',
                'Inadecuado control de base de datos' => 'Inadecuado control de base de datos',
                'Copia de seguridad de datos.' => 'Copia de seguridad de datos.',
            ],
            '7. General' => [
                'Control inadecuado de los servicios prestados al exterior' => 'Control inadecuado de los servicios prestados al exterior',
                'Insuficiencia de controles de trabajo' => 'Insuficiencia de controles de trabajo',
                'Control insuficiente de contratistas' => 'Control insuficiente de contratistas',
                'Ley de protección de datos' => 'Ley de protección de datos',
            ],
        ];
    }

    // --- 2. CATÁLOGO DE AMENAZAS ---
    public static function getThreatsMap(): array
    {
        return [
            'Desastre natural' => [
                '1.1 Desastre natural - Terremoto' => '1.1 Desastre natural - Terremoto',
                '1.2 Desastre natural - Huracán' => '1.2 Desastre natural - Huracán',
                '1.3 Desastre natural - Inundación' => '1.3 Desastre natural - Inundación',
                '1.4 Desastre natural - Tormenta eléctrica' => '1.4 Desastre natural - Tormenta eléctrica',
            ],
            'Ataque malintencionado' => [
                '2.1 Ataque malintencionado - explosivos' => '2.1 Ataque malintencionado - explosivos',
                '2.2 Ataque malintencionado - dispositivo incendiario' => '2.2 Ataque malintencionado - dispositivo incendiario',
                '2.4 Ataque malintencionado - daño doloso / vandalismo' => '2.4 Ataque malintencionado - daño doloso / vandalismo',
                '2.7 Ataque malintencionado - intención de robo' => '2.7 Ataque malintencionado - intención de robo',
                '2.8 Ataque malintencionado – manipulación de datos o software' => '2.8 Ataque malintencionado – manipulación de datos o software',
                '2.12 Acceso no autorizado al site' => '2.12 Acceso no autorizado al site',
            ],
            'Daño accidental' => [
                '3.1 Daño accidental - aeronaves' => '3.1 Daño accidental - aeronaves',
                '3.2 Daño accidental - colisión vehicular' => '3.2 Daño accidental - colisión vehicular',
                '3.4 Daño accidental - fuego' => '3.4 Daño accidental - fuego',
                '3.5 Daño accidental - agua / suciedad' => '3.5 Daño accidental - agua / suciedad',
                '3.6 Daño accidental - falla del aire acondicionado' => '3.6 Daño accidental - falla del aire acondicionado',
                '3.7 Daño accidental - temperatura extrema / humedad' => '3.7 Daño accidental - temperatura extrema / humedad',
            ],
            'Falla de servicios' => [
                '4.0 Falla en el suministro de energía' => '4.0 Falla en el suministro de energía',
                '4.1 Fallas en el equipo de energía de respaldo' => '4.1 Fallas en el equipo de energía de respaldo',
                '4.2 Picos de tensión / aumentos repentinos / fluctuaciones' => '4.2 Picos de tensión / aumentos repentinos / fluctuaciones',
                '4.6 Falla del equipo' => '4.6 Falla del equipo',
                '4.7 Falla en el sistema de comunicaciones' => '4.7 Falla en el sistema de comunicaciones',
            ],
            'Ciberamenazas' => [
                '5.1 Uso del software por usuarios no autorizados' => '5.1 Uso del software por usuarios no autorizados',
                '5.3 Uso no autorizado de los dispositivos de almacenamiento' => '5.3 Uso no autorizado de los dispositivos de almacenamiento',
                '5.5 Uso ilegal de software' => '5.5 Uso ilegal de software',
                '5.6 Uso del servicio de red no autorizado' => '5.6 Uso del servicio de red no autorizado',
                '5.11 Software malintencionado' => '5.11 Software malintencionado',
                '5.36 Ingeniería social' => '5.36 Ingeniería social',
            ],
            'Falla de sistemas' => [
                '6.1 Deterioro de los soportes de almacenamiento' => '6.1 Deterioro de los soportes de almacenamiento',
                '6.2 Error del personal operativo' => '6.2 Error del personal operativo',
                '6.3 Falla de software / corrupción' => '6.3 Falla de software / corrupción',
                '6.5 Falla técnica en los componentes de red' => '6.5 Falla técnica en los componentes de red',
                '6.11 Errores del usuario' => '6.11 Errores del usuario',
            ],
            'Ingeniería social' => [
                '7.1 Uso sin control de recursos' => '7.1 Uso sin control de recursos',
                '7.3 Perdida de confidencialidad' => '7.3 Perdida de confidencialidad',
                '7.4 Pérdida de disponibilidad para los usuarios autorizados' => '7.4 Pérdida de disponibilidad para los usuarios autorizados',
                '7.10 Cruce de información' => '7.10 Cruce de información',
            ],
            'Pruebas y verificaciones' => [
                '8.1 Falta de pistas de auditoria' => '8.1 Falta de pistas de auditoria',
                '8.2 Verificación difícil / imposible' => '8.2 Verificación difícil / imposible',
                '8.4 Control deficiente de la codificación de metodología' => '8.4 Control deficiente de la codificación de metodología',
            ],
        ];
    }

    // --- 3. CATÁLOGO DE CONTROLES (ISO 27001) ---
    public static function getControlsMap(): array
    {
        return [
            '1.1 Políticas y Organización de la Seguridad de la Información' => [
                '1.1.1 Políticas de seguridad' => '1.1.1 Políticas de seguridad',
                '1.2.1 Gestión de la seguridad de la información' => '1.2.1 Gestión de la seguridad de la información',
                '1.2.2 Responsabilidades de la seguridad de la información' => '1.2.2 Responsabilidades de la seguridad de la información',
                '1.3.1 Gestión y registro de activos' => '1.3.1 Gestión y registro de activos',
                '1.3.2 Clasificación y manejo de activos' => '1.3.2 Clasificación y manejo de activos',
                '1.4.1 Gestión de riesgos de seguridad de la Información' => '1.4.1 Gestión de riesgos de seguridad de la Información',
            ],
            '2. Recursos Humanos' => [
                '2.1.1 Competencias del personal' => '2.1.1 Competencias del personal',
                '2.1.2 Obligaciones contractuales' => '2.1.2 Obligaciones contractuales',
                '2.1.3 Formación y concientización' => '2.1.3 Formación y concientización',
                '2.1.4 Teletrabajo' => '2.1.4 Teletrabajo',
            ],
            '3. Seguridad física y continuidad de negocio' => [
                '3.1.1 Zonas de seguridad' => '3.1.1 Zonas de seguridad',
                '3.1.2 Seguridad de la Información en situaciones excepcionales' => '3.1.2 Seguridad de la Información en situaciones excepcionales',
                '3.1.3 Manejo de activos de soporte' => '3.1.3 Manejo de activos de soporte',
                '3.1.4 Dispositivos móviles' => '3.1.4 Dispositivos móviles',
            ],
            '4.1 Gestión de la identidad y gestión de accesos' => [
                '4.1.1 Gestión del uso de medios de identificación' => '4.1.1 Gestión del uso de medios de identificación',
                '4.1.2 Acceso de usuarios a servicios de red' => '4.1.2 Acceso de usuarios a servicios de red',
                '4.1.3 Gestión segura de cuentas de usuario e información de inicio de sesión' => '4.1.3 Gestión segura de cuentas de usuario e información de inicio de sesión',
                '4.2.1 Gestión y asignación de derechos de acceso' => '4.2.1 Gestión y asignación de derechos de acceso',
            ],
            '5.1 Criptografía' => [
                '5.1.1 Uso de procedimientos criptográficos' => '5.1.1 Uso de procedimientos criptográficos',
                '5.1.2 Protección de la información durante la transferencia' => '5.1.2 Protección de la información durante la transferencia',
                '5.2.1 Gestión de cambios' => '5.2.1 Gestión de cambios',
                '5.2.3 Protección contra malware' => '5.2.3 Protección contra malware',
                '5.2.4 Registro y análisis de eventos' => '5.2.4 Registro y análisis de eventos',
                '5.2.7 Gestión de las redes' => '5.2.7 Gestión de las redes',
                '5.3.2 Requisitos de servicios de red' => '5.3.2 Requisitos de servicios de red',
            ],
            '6. Relaciones con proveedores' => [
                '6.1.1 Protección de la información en la relación con proveedores y terceros' => '6.1.1 Protección de la información en la relación con proveedores y terceros',
                '6.1.2 Acuerdos contractuales de no divulgación' => '6.1.2 Acuerdos contractuales de no divulgación',
            ],
            '7. Cumplimiento' => [
                '7.1.1 Cumplimiento reglamentario y contractual' => '7.1.1 Cumplimiento reglamentario y contractual',
                '7.1.2 Protección de información de identificación personal' => '7.1.2 Protección de información de identificación personal',
            ],
        ];
    }

    public static function getScoringOptions(): array
    {
        return [
            '1.0' => '100% - Casi Seguro / Extremo',
            '0.8' => '80% - Probable / Mayor',
            '0.62' => '62% - Posible / Moderado',
            '0.25' => '25% - Poco Probable / Menor',
            '0.01' => '1% - Raro / Insignificante',
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('1. Identificación y Activos')
                    ->schema([
                        TextInput::make('code_id')
                            ->label('ID')
                            ->required()
                            ->placeholder('R.TI.001'),
                        Select::make('proceso')
                            ->label('Proceso')
                            ->options([
                                'Administración' => 'Administración',
                                'Compras' => 'Compras',
                                'Compras Internacionales' => 'Compras Internacionales',
                                'Estrategia de Producto' => 'Estrategia de Producto',
                                'Finanzas' => 'Finanzas',
                                'IT / Sistemas' => 'IT / Sistemas',
                                'MKT' => 'MKT (Marketing)',
                                'Recursos Humanos' => 'Recursos Humanos',
                                'SCM' => 'SCM (Cadena de Suministro)',
                                'Ventas' => 'Ventas',
                                'TODOS' => 'TODOS (Transversal)',
                            ])
                            ->searchable()
                            ->default('IT / Sistemas')
                            ->required(),
                        TextInput::make('asset')
                            ->label('Activo (Asset)'),
                        TextInput::make('risk_owner')
                            ->label('Dueño del Riesgo (Risk Owner)')
                            ->placeholder('TI / Sistemas'),
                    ])
                    ->columnSpanFull()
                    ->columns(4),

                Section::make('2. Análisis de Vulnerabilidades y Amenazas')
                    ->schema([
                        // TIPO VULNERABILIDAD -> VULNERABILIDAD
                        Select::make('tipo_vulnerabilidad')
                            ->label('Tipo de vulnerabilidad')
                            ->options(array_combine(array_keys(self::getVulnerabilitiesMap()), array_keys(self::getVulnerabilitiesMap())))
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(callable $set) => $set('vulnerabilidad', null)),

                        Select::make('vulnerabilidad')
                            ->label('Vulnerabilidad')
                            ->options(function (Get $get) {
                                $tipo = $get('tipo_vulnerabilidad');
                                $map = self::getVulnerabilitiesMap();
                                return ($tipo && isset($map[$tipo])) ? $map[$tipo] : [];
                            })
                            ->searchable(),

                        // TIPO AMENAZA -> AMENAZA
                        Select::make('tipo_amenaza')
                            ->label('Tipo de amenaza')
                            ->options(array_combine(array_keys(self::getThreatsMap()), array_keys(self::getThreatsMap())))
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(callable $set) => $set('amenaza', null)),

                        Select::make('amenaza')
                            ->label('Amenaza')
                            ->options(function (Get $get) {
                                $tipo = $get('tipo_amenaza');
                                $map = self::getThreatsMap();
                                return ($tipo && isset($map[$tipo])) ? $map[$tipo] : [];
                            })
                            ->searchable(),

                        Textarea::make('risk_description')->label('Risk description')->columnSpanFull(),
                        Textarea::make('impact_description')->label('Impact description')->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                Section::make('3. Evaluación del Riesgo Inherente')
                    ->schema([
                        Select::make('prob')
                            ->label('Probabilidad (Prob)')
                            ->options(self::getScoringOptions())
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateInherent($get, $set)),

                        Select::make('impact')
                            ->label('Impacto (Impact)')
                            ->options(self::getScoringOptions())
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateInherent($get, $set)),

                        TextInput::make('priority')
                            ->label('Riesgo Inherente (Priority)')
                            ->readOnly()
                            ->formatStateUsing(fn($state) => $state ? round($state * 100) . '%' : '0%'),
                    ])
                    ->columnSpanFull()
                    ->columns(3),

                Section::make('4. Plan de Mitigación y Tratamiento')
                    ->schema([
                        // CATEGORÍA DE CONTROL -> MITIGATION DESCRIPTION
                        Select::make('categoria_control')
                            ->label('Categoría de control')
                            ->options(array_combine(array_keys(self::getControlsMap()), array_keys(self::getControlsMap())))
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(callable $set) => $set('mitigation_description', null)),

                        Select::make('mitigation_description')
                            ->label('Mitigation description (Control ISO)')
                            ->options(function (Get $get) {
                                $cat = $get('categoria_control');
                                $map = self::getControlsMap();
                                return ($cat && isset($map[$cat])) ? $map[$cat] : [];
                            })
                            ->searchable(),

                        Textarea::make('mitigation_description_2')->label('Mitigation description 2'),
                        TextInput::make('m_cost')->label('Costo (M-Cost)')->placeholder('15k MXN'),
                        Select::make('m_status')
                            ->label('Estatus (M-Status)')
                            ->options([
                                '1.0' => '100% - Completado',
                                '0.5' => '50% - En Proceso',
                                '0.0' => '0% - No Iniciado',
                            ])->default('1.0'),
                    ])
                    ->columnSpanFull()
                    ->columns(3),

                Section::make('5. Evaluación de Riesgo Residual')
                    ->schema([
                        Select::make('prob_2')
                            ->label('Probabilidad Residual (Prob 2)')
                            ->options(self::getScoringOptions())
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateResidual($get, $set)),

                        Select::make('impact_2')
                            ->label('Impacto Residual (Impact 2)')
                            ->options(self::getScoringOptions())
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateResidual($get, $set)),

                        TextInput::make('priority_2')
                            ->label('Riesgo Residual (Priority 2)')
                            ->readOnly()
                            ->formatStateUsing(fn($state) => $state ? round($state * 100) . '%' : '0%'),
                    ])->columns(3),

                Section::make('6. Seguimiento y Control')
                    ->schema([
                        Textarea::make('comentarios_residuales')->label('Comentarios sobre riesgos residuales'),
                        DatePicker::make('date_last_reviewed')->label('Fecha de Revisión'),
                        TextInput::make('updated_by')->label('Revisado por'),
                    ])->columns(3),
            ]);
    }

    public static function updateInherent(Get $get, Set $set): void
    {
        $p = floatval($get('prob'));
        $i = floatval($get('impact'));
        $set('priority', $p * $i);
    }

    public static function updateResidual(Get $get, Set $set): void
    {
        $p2 = floatval($get('prob_2'));
        $i2 = floatval($get('impact_2'));
        $set('priority_2', $p2 * $i2);
    }
}