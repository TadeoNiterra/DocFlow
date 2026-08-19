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
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;

class RiskRegisterForm
{
    // --- CATALOGOS DE APOYO ---
    public static function getProbabilityOptions(): array
    {
        return [
            '1.0' => '100% - (Almost) Certain: Es inevitable que experimentemos más incidentes...',
            '0.8' => '80% - Probable: Es probable que experimentemos incidentes dentro de poco tiempo',
            '0.62' => '62% - Possible: Es claramente posible que experimentemos incidentes...',
            '0.25' => '25% - Unlikely: Los incidentes son poco comunes, pero existe posibilidad real',
            '0.01' => '1% - Rare: Aunque son concebibles, probablemente nunca los experimentaremos',
        ];
    }

    public static function getImpactOptions(): array
    {
        return [
            '1.0' => '100% - Extreme: Falla operativa completa, impacto "arriesgar la empresa"',
            '0.8' => '80% - Major: Pérdida severa, altamente perjudicial y costosa',
            '0.62' => '62% - Moderate: Impacto operativo sustancial, muy costoso',
            '0.25' => '25% - Minor: Impacto operativo notable pero limitado, algunos costos',
            '0.01' => '1% - Insignificant: Impacto operativo mínimo, costos insignificantes',
        ];
    }

    public static function getVulnerabilitiesMap(): array
    {
        return [
            '1. Ambiente e infraestructura' => [
                'Inadecuada protección física del site' => 'Inadecuada protección física del site',
                'Inadecuada protección física del edificio' => 'Inadecuada protección física del edificio',
                'Inadecuada protección física – habitación' => 'Inadecuada protección física – habitación',
                'Inadecuado control de acceso –site' => 'Inadecuado control de acceso –site',
                'Inestabilidad en el suministro de energía eléctrica' => 'Inestabilidad en el suministro de energía eléctrica',
            ],
            '2. Personal' => [
                'Ausencias / insuficiencia de personal' => 'Ausencias / insuficiencia de personal',
                'Inadecuado control de la contratación' => 'Inadecuado control de la contratación',
                'Falta de conciencia sobre la seguridad' => 'Falta de conciencia sobre la seguridad',
            ],
            '3. Hardware' => [
                'Falla' => 'Falla',
                'Degradación' => 'Degradación',
                'Incompatibilidad' => 'Incompatibilidad',
            ],
            '3. Software' => [
                'Inadecuada / incompleta especificación' => 'Inadecuada / incompleta especificación',
                'Inadecuado control de versión.' => 'Inadecuado control de versión.',
                'Falta de protección contra virus y código malicioso' => 'Falta de protección contra virus y código malicioso',
            ],
            '4. Comunicaciones' => [
                'Líneas de comunicación no protegidas' => 'Líneas de comunicación no protegidas',
                'Cableado / articulaciones / conexiones pobres' => 'Cableado / articulaciones / conexiones pobres',
            ],
            '6. Documentos/ Datos' => [
                'Ubicación - almacenamiento desprotegido' => 'Ubicación - almacenamiento desprotegido',
                'Copia de seguridad de datos.' => 'Copia de seguridad de datos.',
            ],
            '7. General' => [
                'Control inadecuado de los servicios prestados al exterior' => 'Control inadecuado de los servicios prestados al exterior',
                'Ley de protección de datos' => 'Ley de protección de datos',
            ],
        ];
    }

    public static function getThreatsMap(): array
    {
        return [
            'Desastre natural' => [
                '1.1 Desastre natural - Terremoto' => '1.1 Desastre natural - Terremoto',
                '1.2 Desastre natural - Huracán' => '1.2 Desastre natural - Huracán',
            ],
            'Ataque malintencionado' => [
                '2.1 Ataque malintencionado - explosivos' => '2.1 Ataque malintencionado - explosivos',
                '2.7 Ataque malintencionado - intención de robo' => '2.7 Ataque malintencionado - intención de robo',
            ],
            'Daño accidental' => [
                '3.4 Daño accidental - fuego' => '3.4 Daño accidental - fuego',
                '3.6 Daño accidental - falla del aire acondicionado' => '3.6 Daño accidental - falla del aire acondicionado',
            ],
            'Falla de servicios' => [
                '4.0 Falla en el suministro de energía' => '4.0 Falla en el suministro de energía',
                '4.7 Falla en el sistema de comunicaciones' => '4.7 Falla en el sistema de comunicaciones',
            ],
            'Ciberamenazas' => [
                '5.5 Uso ilegal de software' => '5.5 Uso ilegal de software',
                '5.11 Software malintencionado' => '5.11 Software malintencionado',
            ],
            'Falla de sistemas' => [
                '6.3 Falla de software / corrupción' => '6.3 Falla de software / corrupción',
                '6.11 Errores del usuario' => '6.11 Errores del usuario',
            ],
        ];
    }

    public static function getControlsMap(): array
    {
        return [
            '1.1 Políticas y Organización de la Seguridad de la Información' => [
                '1.1.1 Políticas de seguridad' => '1.1.1 Políticas de seguridad',
                '1.2.1 Gestión de la seguridad de la información' => '1.2.1 Gestión de la seguridad de la información',
            ],
            '2. Recursos Humanos' => [
                '2.1.1 Competencias del personal' => '2.1.1 Competencias del personal',
                '2.1.3 Formación y concientización' => '2.1.3 Formación y concientización',
            ],
            '3. Seguridad física y continuidad de negocio' => [
                '3.1.1 Zonas de seguridad' => '3.1.1 Zonas de seguridad',
            ],
            '4.1 Gestión de la identidad y gestión de accesos' => [
                '4.1.2 Acceso de usuarios a servicios de red' => '4.1.2 Acceso de usuarios a servicios de red',
            ],
            '5.1 Criptografía' => [
                '5.1.2 Protección de la información durante la transferencia' => '5.1.2 Protección de la información durante la transferencia',
            ],
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. IDENTIFICACIÓN Y ACTIVOS
                Section::make('1. Identificación y Activos')
                    ->headerActions([
                        Action::make('guia_sec_1')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía: Identificación y Activos') // <-- Corregido a modalHeading
                            ->modalDescription('Asigne un código único (ej. R.TI.001) para identificar el evento sin ambigüedades. Defina el proceso o departamento responsable, el activo involucrado (ej. Servidores, Base de Datos, ERP) y el custodio (Risk Owner).')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
                        TextInput::make('code_id')->label('ID')->required()->placeholder('R.TI.001'),
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
                        TextInput::make('asset')->label('Activo (Asset)'),
                        TextInput::make('risk_owner')->label('Dueño del Riesgo (Risk Owner)')->placeholder('TI / Sistemas'),
                    ])
                    ->columnSpanFull()
                    ->columns(4),

                // 2. VULNERABILIDADES Y AMENAZAS
                Section::make('2. Análisis de Vulnerabilidades y Amenazas')
                    ->headerActions([
                        Action::make('guia_sec_2')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía: Vulnerabilidades y Amenazas') // <-- Corregido
                            ->modalDescription('Seleccione el "Tipo de vulnerabilidad" para filtrar las vulnerabilidades técnicas. Luego elija el "Tipo de amenaza" para filtrar las amenazas. Redacte la descripción técnica y los impactos esperados en el negocio.')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
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

                // 3. RIESGO INHERENTE
                Section::make('3. Evaluación del Riesgo Inherente')
                    ->headerActions([
                        Action::make('guia_sec_3')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía: Evaluación Inherente') // <-- Corregido
                            ->modalDescription('Evalúe la Probabilidad y el Impacto asumiendo que NO existe ningún control actualmente implementado. El sistema calculará automáticamente la Severidad Inherente multiplicando ambos valores (P x I).')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
                        Select::make('prob')
                            ->label('Probabilidad (Probability)')
                            ->options(self::getProbabilityOptions())
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateInherent($get, $set)),

                        Select::make('impact')
                            ->label('Impacto en el Negocio (Business Impact)')
                            ->options(self::getImpactOptions())
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateInherent($get, $set)),

                        TextInput::make('priority')
                            ->label('Riesgo Inherente (Priority)')
                            ->readOnly()
                            ->formatStateUsing(fn($state) => $state ? round($state * 100) . '%' : '0%'),
                    ])
                    ->columnSpanFull()
                    ->columns(3),

                // 4. PLAN DE MITIGACIÓN
                Section::make('4. Plan de Mitigación y Tratamiento')
                    ->headerActions([
                        Action::make('guia_sec_4')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía: Mitigación y Controles ISO 27001') // <-- Corregido
                            ->modalDescription('Seleccione la Categoría de Control para filtrar la norma/política aplicable. Escriba la acción técnica complementaria, el costo aproximado de la solución (M-Cost) y especifique el porcentaje de avance (M-Status: 100%, 50%, 0%).')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
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

                // 5. RIESGO RESIDUAL
                Section::make('5. Evaluación de Riesgo Residual')
                    ->headerActions([
                        Action::make('guia_sec_5')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía: Riesgo Residual') // <-- Corregido
                            ->modalDescription('Reevalúe la Probabilidad y el Impacto asumiendo que los controles y acciones descritos en la Sección 4 ya han sido implementados exitosamente. El valor calculado reflejará el nivel de riesgo real remanente.')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
                        Select::make('prob_2')
                            ->label('Probabilidad Residual (Prob 2)')
                            ->options(self::getProbabilityOptions())
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateResidual($get, $set)),

                        Select::make('impact_2')
                            ->label('Impacto Residual (Impact 2)')
                            ->options(self::getImpactOptions())
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(fn(Get $get, Set $set) => self::updateResidual($get, $set)),

                        TextInput::make('priority_2')
                            ->label('Riesgo Residual (Priority 2)')
                            ->readOnly()
                            ->formatStateUsing(fn($state) => $state ? round($state * 100) . '%' : '0%'),
                    ])
                    ->columnSpanFull()
                    ->columns(3),

                // 6. SEGUIMIENTO
                Section::make('6. Seguimiento y Control')
                    ->headerActions([
                        Action::make('guia_sec_6')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía: Seguimiento y Aceptación') // <-- Corregido
                            ->modalDescription('Agregue observaciones finales sobre la eficacia de las medidas tomadas o el respaldo formal de la dirección para la aceptación del riesgo residual. Indique la fecha de la revisión y el responsable auditado.')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
                        Textarea::make('comentarios_residuales')->label('Comentarios sobre riesgos residuales'),
                        DatePicker::make('date_last_reviewed')->label('Fecha de Revisión'),
                        TextInput::make('updated_by')->label('Revisado por'),
                    ])
                    ->columnSpanFull()
                    ->columns(3),
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