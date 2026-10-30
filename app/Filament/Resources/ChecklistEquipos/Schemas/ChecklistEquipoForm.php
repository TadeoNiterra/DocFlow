<?php

namespace App\Filament\Resources\ChecklistEquipos\Schemas;

use App\Models\Colaborador;
use App\Models\Dispositivo;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Facades\Auth;
use League\Uri\Builder;

class ChecklistEquipoForm
{
    public static function configure(Schema $schema): Schema
    {
        $opcionesCumplimiento = [
            'C' => 'C (Cumple)',
            'NC' => 'NC (No Cumple)',
            'NA' => 'NA (No Aplica)',
        ];

        return $schema->components([
            Section::make('Datos del Evento y Trazabilidad')
                ->schema([
                    TextInput::make('folio')
                        ->label('Folio')
                        ->default(fn() => 'CHK-' . date('Y') . '-' . strtoupper(substr(uniqid(), -4)))
                        ->required()
                        ->readOnly(),

                    Select::make('accion')
                        ->label('Tipo de Acción / Evento')
                        ->options([
                            'ASIGNACION_INICIAL' => 'Asignación Inicial',
                            'MANTENIMIENTO' => 'Mantenimiento Preventivo / Correctivo',
                            'REPARACION' => 'Envío a Reparación',
                            'DEVOLUCION' => 'Devolución (Baja de Colaborador)',
                            'CAMBIO' => 'Cambio (Fin de Arrendamiento / Renovación)',
                        ])
                        ->required()
                        ->live()
                        ->afterStateUpdated(function (callable $set) {
                            // Al cambiar de acción se resetean los campos para evitar registros inconsistentes
                            $set('dispositivo_id', null);
                            $set('colaborador_id', null);
                            $set('nombre_usuario', null);
                        }),

                    Select::make('dispositivo_id')
                        ->label('Equipo / Serie')
                        ->relationship(
                            name: 'dispositivo',
                            titleAttribute: 'numero_serie',
                            modifyQueryUsing: function (EloquentBuilder $query, callable $get) {
                                $accion = $get('accion');

                                // 1. Si es Asignación Inicial: SOLO dispositivos en stock (sin colaborador)
                                if ($accion === 'ASIGNACION_INICIAL') {
                                    return $query->where('estatus_asignacion', 'EN STOCK')
                                        ->whereNull('colaborador_id');
                                }

                                // 2. Para Mantenimiento, Reparación, Devolución o Cambio:
                                // SOLO dispositivos que sí estén asignados a un colaborador (no en stock)
                                return $query->whereNotNull('colaborador_id')
                                    ->where('estatus_asignacion', '!=', 'EN STOCK');
                            }
                        )
                        ->getOptionLabelFromRecordUsing(
                            fn(Dispositivo $d) =>
                                "{$d->numero_serie} - {$d->modeloEquipo?->marca} {$d->modeloEquipo?->modelo} " .
                                ($d->colaborador
                                    ? "[Asignado a: {$d->colaborador->name} {$d->colaborador->lastname}]"
                                    : "[EN STOCK]")
                        )
                        ->searchable(['numero_serie'])
                        ->preload()
                        ->required()
                        ->live()
                        ->disabled(fn(callable $get) => empty($get('accion'))) // Bloqueado hasta elegir la acción
                        ->afterStateUpdated(function ($state, callable $set, callable $get) {
                            $accion = $get('accion');
                            $dispositivo = Dispositivo::with('colaborador')->find($state);

                            if (!$dispositivo) {
                                return;
                            }

                            // Si NO es asignación inicial, precarga automáticamente el usuario actual del equipo
                            if ($accion !== 'ASIGNACION_INICIAL' && $dispositivo->colaborador_id) {
                                $set('colaborador_id', $dispositivo->colaborador_id);
                                $set('nombre_usuario', trim("{$dispositivo->colaborador->name} {$dispositivo->colaborador->lastname}"));
                            }
                        }),

                    Select::make('colaborador_id')
                        ->label('Colaborador')
                        ->relationship('colaborador', 'name')
                        ->getOptionLabelFromRecordUsing(fn(Colaborador $c) => "{$c->name} {$c->lastname} ({$c->departamento?->nombre})")
                        ->searchable()
                        ->preload()
                        ->required()
                        ->live()
                        // En acciones que no sean asignación, se bloquea porque ya pertenece al dueño actual del equipo
                        ->disabled(fn(callable $get) => $get('accion') !== 'ASIGNACION_INICIAL' && filled($get('dispositivo_id')))
                        ->dehydrated()
                        ->afterStateUpdated(function ($state, callable $set) {
                            if ($c = Colaborador::find($state)) {
                                $set('nombre_usuario', trim("{$c->name} {$c->lastname}"));
                            } else {
                                $set('nombre_usuario', null);
                            }
                        }),

                    DatePicker::make('fecha')
                        ->label('Fecha de Inspección')
                        ->default(now())
                        ->required(),

                    TextInput::make('accesorios')
                        ->label('Accesorios Asignados')
                        ->placeholder('Ej. Cargador 65W, Mouse inalámbrico, Mochila')
                        ->columnSpanFull(),
                ])->columns(2),

            Section::make('1. Inspección de Hardware')
                ->description('Estado de los componentes físicos y periféricos')
                ->schema([
                    Radio::make('hw_accesorios_completos')->label('Accesorios completos')->options($opcionesCumplimiento)->inline(),
                    Radio::make('hw_partes_funcionan')->label('Todas las partes funcionan')->options($opcionesCumplimiento)->inline(),
                    Radio::make('hw_enciende_bien')->label('Enciende correctamente')->options($opcionesCumplimiento)->inline(),
                    Radio::make('hw_carcasa_estado')->label('Carcasa sin golpes ni rasguños')->options($opcionesCumplimiento)->inline(),
                    Radio::make('hw_accesorios_estado')->label('Estado físico de accesorios')->options($opcionesCumplimiento)->inline(),
                    Radio::make('hw_limpieza')->label('Limpieza general del equipo')->options($opcionesCumplimiento)->inline(),
                    TextInput::make('hw_otros')->label('Otros (Hardware)')->columnSpanFull(),
                ])->columns(3),

            Section::make('2. Inspección de Software')
                ->description('Revisión de programas, políticas y almacenamiento')
                ->schema([
                    Radio::make('sw_programas_completos')->label('Programas instalados completos')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_programas_principales')->label('Programas principales se ejecutan')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_programas_secundarios')->label('Programas secundarios se ejecutan')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_limpieza_cookies_historial')->label('Limpieza de historial y Cookies')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_autorizado')->label('Software autorizado por la empresa')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_respaldo_local')->label('Respaldo de información local')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_espacio_almacenamiento')->label('Espacio de almacenamiento local')->options($opcionesCumplimiento)->inline(),
                    Radio::make('sw_velocidad_respuesta')->label('Velocidad de respuesta óptima')->options($opcionesCumplimiento)->inline(),
                ])->columns(3),

            Section::make('3. Seguridad de la Información')
                ->description('Validación de controles TISAX / SGSI')
                ->schema([
                    Radio::make('seg_mfa_desbloqueado')->label('MFA Office desbloqueado / revisado')->options($opcionesCumplimiento)->inline(),
                    Radio::make('seg_antivirus_bloqueado')->label('Bloqueo de configuración de antivirus')->options($opcionesCumplimiento)->inline(),
                    Radio::make('seg_derechos_privilegios')->label('Revisión F-IT-02 Derechos y privilegios')->options($opcionesCumplimiento)->inline(),
                    TextInput::make('seg_otros')->label('Otros (Seguridad)')->columnSpanFull(),
                ])->columns(3),

            Section::make('Observaciones y Firmas de Conformidad')
                ->schema([
                    Textarea::make('observaciones')
                        ->label('Observaciones Generales')
                        ->default('No se encontraron observaciones adicionales.')
                        ->columnSpanFull(),

                    // 1. Usuario: Se llena solo con el colaborador seleccionado
                    TextInput::make('nombre_usuario')
                        ->label('Usuario del Equipo')
                        ->readOnly()
                        ->dehydrated()
                        ->required()
                        ->placeholder('Se asigna al elegir el colaborador'),

                    // 2. Jefe directo: Lista desplegable que excluye cualquier tipo de STAFF
                    Select::make('nombre_jefe_directo')
                        ->label('Jefe Directo')
                        ->options(function () {
                            return Colaborador::query()
                                ->whereHas('puesto', function ($q) {
                                    $q->where('nombre', 'not like', '%STAFF%');
                                })
                                ->orderBy('name')
                                ->get()
                                ->mapWithKeys(function (Colaborador $c) {
                                    $nombreCompleto = trim("{$c->name} {$c->lastname}");
                                    $puesto = $c->puesto?->nombre ?? 'Sin puesto';
                                    return [$nombreCompleto => "{$nombreCompleto} ({$puesto})"];
                                });
                        })
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder('Selecciona al jefe directo'),

                    // 3. Sistemas: Usuario logueado que crea el checklist
                    TextInput::make('nombre_sistemas')
                        ->label('Validado por Sistemas (TI)')
                        ->default(fn() => Auth::user()?->name ?? 'Sistemas TI')
                        ->readOnly()
                        ->dehydrated()
                        ->required(),
                ])->columns(3),
        ]);
    }
}