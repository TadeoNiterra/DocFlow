<?php

namespace App\Filament\Resources\Colaboradors\Schemas;

use App\Models\Colaborador;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ColaboradorForm
{
    /**
     * Función auxiliar para limpiar acentos y extraer la primera palabra
     */
    private static function extraerPrimerPalabra(string $texto): string
    {
        // Pasa a minúsculas y elimina acentos/caracteres especiales
        $limpio = Str::slug(trim($texto));
        // Separa por guiones y toma la primera palabra
        $partes = explode('-', $limpio);

        return $partes[0] ?? '';
    }

    /**
     * Helper para recalcular y asignar el correo dinámicamente
     */
    private static function calcularCorreo(callable $get, callable $set): void
    {
        $nombre = $get('name') ?? '';
        $apellido = $get('lastname') ?? '';

        $primerNombre = self::extraerPrimerPalabra($nombre);
        $primerApellido = self::extraerPrimerPalabra($apellido);

        if (filled($primerNombre) && filled($primerApellido)) {
            $email = "{$primerNombre}.{$primerApellido}@niterragroup.com";
            $set('email', $email);
        }
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECCIÓN 1: DATOS PERSONALES Y LABORALES
                Section::make('Información del Colaborador')
                    ->description('Datos generales y puesto dentro de la organización')
                    ->schema([
                        // 1. SELECT DE DEPARTAMENTO (REACTIVO)
                        Select::make('department')
                            ->label('Departamento / Área')
                            ->options([
                                'IT'      => 'Departamento de IT',
                                'RH'      => 'Departamento de Recursos Humanos',
                                'MKT'     => 'Departamento de Mercadotecnia',
                                'SCM'     => 'Departamento de Cadena de Suministro',
                                'ALM'     => 'Departamento de Almacén',
                                'ADM'     => 'Departamento de Administración',
                                'FIN'     => 'Departamento de Finanzas',
                                'IAM'     => 'Departamento de Ventas',
                                'CONT'    => 'Departamento de Contabilidad',
                                'OEM'     => 'Departamento de OEM',
                                'MKS'     => 'Departamento de Mercadotecnia Servicio',
                                'BI'      => 'Departamento de Inteligencia de Negocios',
                                'IAM_EXP' => 'Departamento de Ventas Internacionales',
                                'PRES'    => 'Departamento de Presidencia',
                                'TRAF'    => 'Departamento de Tráfico',
                                'COMINT'  => 'Departamento de Compras Internacionales',
                            ])
                            ->required()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set, $record) {
                                if (blank($record) && filled($state)) {
                                    $conteoActual = Colaborador::where('department', $state)->count();
                                    $siguienteNumero = $conteoActual + 1;
                                    $set('id_colaborador', "{$state}{$siguienteNumero}");
                                }
                            }),

                        // 2. CAMPO ID / CLAVE COLABORADOR (AUTO-GENERADO)
                        TextInput::make('id_colaborador')
                            ->label('ID / Clave Colaborador')
                            ->required()
                            ->readOnly()
                            ->dehydrated()
                            ->placeholder('Selecciona un departamento...')
                            ->unique(ignoreRecord: true),

                        // 3. NOMBRE(S) - REACTIVO PARA EL CORREO
                        TextInput::make('name')
                            ->label('Nombre(s)')
                            ->required()
                            ->placeholder('Ej. Juan Carlos')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($get, $set) => self::calcularCorreo($get, $set)),

                        // 4. APELLIDOS - REACTIVO PARA EL CORREO
                        TextInput::make('lastname')
                            ->label('Apellidos')
                            ->required()
                            ->placeholder('Ej. Pérez López')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($get, $set) => self::calcularCorreo($get, $set)),

                        // 5. CORREO CORPORATIVO (AUTO-GENERADO Y EDITABLE SI SE REQUIERE)
                        TextInput::make('email')
                            ->label('Correo Electrónico Corporativo')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('se_generara_automaticamente@niterragroup.com'),

                        // 6. SELECT DE RANGO / PUESTO
                        Select::make('puesto')
                            ->label('Rango / Puesto')
                            ->options([
                                'GENERAL MANAGER'        => 'GENERAL MANAGER',
                                'DEPUTY GENERAL MANAGER' => 'DEPUTY GENERAL MANAGER',
                                'MANAGER'                => 'MANAGER',
                                'DEPUTY MANAGER'         => 'DEPUTY MANAGER',
                                'SENIOR SUPERVISOR'      => 'SENIOR SUPERVISOR',
                                'SUPERVISOR A'           => 'SUPERVISOR A',
                                'SUPERVISOR B'           => 'SUPERVISOR B',
                                'SUPERVISOR'             => 'SUPERVISOR',
                                'SENIOR STAFF A'         => 'SENIOR STAFF A',
                                'SENIOR STAFF B'         => 'SENIOR STAFF B',
                                'SENIOR STAFF'           => 'SENIOR STAFF',
                                'STAFF A'                => 'STAFF A',
                                'STAFF B'                => 'STAFF B',
                                'STAFF C'                => 'STAFF C',
                                'STAFF'                  => 'STAFF',
                            ])
                            ->required()
                            ->searchable()
                            ->placeholder('Selecciona el rango...'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // SECCIÓN 2: IDENTIFICADORES Y CREDENCIALES DE SISTEMAS (TI)
                Section::make('Identificadores de Sistemas e Infraestructura')
                    ->description('Cuentas y claves de acceso asignadas en los diferentes entornos')
                    ->schema([
                        TextInput::make('id_sap')
                            ->label('ID SAP')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. SAP_JPEREZ'),

                        TextInput::make('id_vpn')
                            ->label('ID VPN')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. VPN_JPEREZ'),

                        TextInput::make('id_cofidi')
                            ->label('ID COFIDI')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. COF_JPEREZ'),

                        TextInput::make('id_AD')
                            ->label('Usuario Active Directory (AD)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. j_perez'),

                        TextInput::make('num_tarjeta')
                            ->label('Número de Tarjeta de Acceso')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('Ej. ACC-998811'),

                        Toggle::make('DDEX')
                            ->label('¿Cuenta con permisos DDEX?')
                            ->default(false)
                            ->inline(false),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}