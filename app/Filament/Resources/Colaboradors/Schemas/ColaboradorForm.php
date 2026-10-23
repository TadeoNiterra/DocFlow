<?php

namespace App\Filament\Resources\Colaboradors\Schemas;

use App\Models\Colaborador;
use App\Models\Departamento;
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
                        // Select de Departamento dinámico
                        Select::make('departamento_id')
                            ->label('Departamento / Área')
                            ->relationship('departamento', 'nombre')
                            ->getOptionLabelFromRecordUsing(fn($record) => "[{$record->codigo}] {$record->nombre}")
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set, $record) {
                                if (blank($record) && filled($state)) {
                                    $depto = Departamento::find($state);
                                    if ($depto) {
                                        $conteo = Colaborador::where('departamento_id', $state)->count();
                                        $siguiente = $conteo + 1;
                                        $set('id_colaborador', "{$depto->codigo}{$siguiente}");
                                    }
                                }
                            }),

                        // Select de Puesto dinámico
                        Select::make('puesto_id')
                            ->label('Puesto / Rango')
                            ->relationship('puesto', 'nombre')
                            ->searchable()
                            ->preload()
                            ->required(),
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
                            ->afterStateUpdated(fn($get, $set) => self::calcularCorreo($get, $set)),

                        // 4. APELLIDOS - REACTIVO PARA EL CORREO
                        TextInput::make('lastname')
                            ->label('Apellidos')
                            ->required()
                            ->placeholder('Ej. Pérez López')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($get, $set) => self::calcularCorreo($get, $set)),

                        // 5. CORREO CORPORATIVO (AUTO-GENERADO Y EDITABLE SI SE REQUIERE)
                        TextInput::make('email')
                            ->label('Correo Electrónico Corporativo')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('se_generara_automaticamente@niterragroup.com'),


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