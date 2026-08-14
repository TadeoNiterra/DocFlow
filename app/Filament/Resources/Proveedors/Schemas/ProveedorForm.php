<?php

namespace App\Filament\Resources\Proveedors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProveedorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECCIÓN 1: DATOS GENERALES (3 COLUMNAS)
                Section::make('Datos del Proveedor')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre del Proveedor')
                            ->placeholder('Ej. TELMEX')
                            ->required(),

                        TextInput::make('razonSocial')
                            ->label('Razón Social')
                            ->placeholder('Ej. TELMEX S.A. de C.V.')
                            ->required(),

                        TextInput::make('actividad')
                            ->label('Actividad')
                            ->placeholder('Ej. Venta de equipos')
                            ->required(),

                        Select::make('status')
                            ->label('Estatus del Proveedor')
                            ->options([
                                'Activo' => 'Activo',
                                'Baja' => 'Baja',
                                'Evento' => 'Evento',
                            ])
                            ->default('Activo')
                            ->required(),

                        TextInput::make('departamentoResponsable')
                            ->label('Departamento Responsable')
                            ->placeholder('Ej. IT')
                            ->default('IT')
                            ->required(),

                        Select::make('date')
                            ->label('Año de Registro / Inicio')
                            ->options(function () {
                                $anioActual = (int) date('Y');
                                $anios = range($anioActual, 1990);
                                return array_combine($anios, $anios);
                            })
                            ->default(date('Y'))
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(3) // 👈 3 Columnas internas
                    ->columnSpanFull(), // 👈 Ocupa todo el ancho disponible

                // SECCIÓN 2: CONTACTO (3 COLUMNAS)
                Section::make('Datos de contacto del Proveedor')
                    ->schema([
                        TextInput::make('personaContacto')
                            ->label('Persona de Contacto')
                            ->placeholder('Ej. Juan Pérez')
                            ->required(),

                        TextInput::make('numeroContacto')
                            ->label('Número de Contacto')
                            ->tel()
                            ->placeholder('Ej. 55-1234-5678'),

                        TextInput::make('email')
                            ->email()
                            ->label('Correo Electrónico')
                            ->placeholder('Ej. juan.perez@empresa.com'),
                    ])
                    ->columns(3) // 👈 3 Columnas internas
                    ->columnSpanFull(), // 👈 Ocupa todo el ancho disponible

                // SECCIÓN 3: EXPEDIENTE
                Section::make('Expediente / Evidencias del Proveedor')
                    ->schema([
                        Repeater::make('evidencias')
                            ->relationship('evidencias')
                            ->schema([
                                Select::make('nombre_archivo')
                                    ->label('Tipo de Documento')
                                    ->options([
                                        'Acta Constitutiva' => 'Acta Constitutiva',
                                        'Comprobante de Domicilio' => 'Comprobante de Domicilio',
                                        'Constancia de Situación Fiscal' => 'Constancia de Situación Fiscal (CSF)',
                                        'Opinión de Cumplimiento' => 'Opinión de Cumplimiento (SAT)',
                                        'Caratula Bancaria' => 'Carátula Bancaria',
                                        'Contrato de Servicios' => 'Contrato de Servicios',
                                        'NDA / Acuerdo de Confidencialidad' => 'NDA / Acuerdo de Confidencialidad',
                                        'Otro' => 'Otro Documento',
                                    ])
                                    ->searchable()
                                    ->required()
                                    ->columnSpan(1), // 👈 Ocupa 1 columna de las 2 del Repeater

                                FileUpload::make('ruta_archivo')
                                    ->label('Archivo PDF')
                                    ->disk('local')
                                    ->directory(function ($get) {
                                        $nombreProveedor = $get('../../nombre') ?? 'general';
                                        $slug = Str::slug($nombreProveedor);
                                        return "proveedores/{$slug}";
                                    })
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, $get) {
                                        // 1. Obtener Tipo de Documento y Nombre del Proveedor
                                        $tipoDocumento = $get('nombre_archivo') ?? 'documento';
                                        $nombreProveedor = $get('../../nombre') ?? 'proveedor';

                                        // 2. Formatear a texto limpio sin caracteres especiales o espacios
                                        $slugDocumento = Str::slug($tipoDocumento, '_');
                                        $slugProveedor = Str::slug($nombreProveedor, '_');
                                        $extension = $file->getClientOriginalExtension();

                                        // 3. Resultado: TipoDocumento_NombreProveedor.pdf
                                        return "{$slugDocumento}_{$slugProveedor}.{$extension}";
                                    })
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(10240) // 10 MB
                                    ->required()
                                    ->columnSpan(1),
                            ])
                            ->columns(2) // 👈 Dentro de cada ítem del repeater mantendremos 2 columnas para equilibrar Tipo y Archivo
                            ->addActionLabel(' + Agregar otra evidencia / documento')
                            ->defaultItems(0)
                            ->reorderable(false),
                    ])
                    ->columnSpanFull(), // 👈 Ocupa todo el ancho disponible
            ]);
    }
}