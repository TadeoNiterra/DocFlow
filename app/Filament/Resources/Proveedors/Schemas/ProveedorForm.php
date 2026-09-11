<?php

namespace App\Filament\Resources\Proveedors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
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
                    ->columns(3) //  3 Columnas internas
                    ->columnSpanFull(), //  Ocupa todo el ancho disponible

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
                    ->columns(3) //  3 Columnas internas
                    ->columnSpanFull(), //  Ocupa todo el ancho disponible

                Section::make('Ubicación y Domicilio Fiscal')
                    ->description('Dirección geografía y datos de localización del proveedor')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        TextInput::make('domicilio')
                            ->label('Calle y Número (Domicilio)')
                            ->maxLength(255),

                        TextInput::make('colonia')
                            ->label('Colonia')
                            ->maxLength(255),

                        TextInput::make('municipio')
                            ->label('Municipio / Alcaldía')
                            ->maxLength(255),

                        TextInput::make('ciudad')
                            ->label('Ciudad')
                            ->maxLength(255),

                        TextInput::make('cp')
                            ->label('Código Postal')
                            ->numeric()
                            ->length(5),

                        TextInput::make('pais')
                            ->label('País')
                            ->default('México')
                            ->maxLength(255),
                    ])
                    ->columns(3) //  3 Columnas internas
                    ->columnSpanFull(), //  Ocupa todo el ancho disponible
                // SECCIÓN 3: EXPEDIENTE
                Section::make('Expediente / Evidencias del Proveedor')
                    ->schema([
                        Repeater::make('evidencias')
                            ->relationship('evidencias')
                            ->schema([
                                // 1. Selección de Categoría Principal
                                Select::make('categoria')
                                    ->label('Categoría del Documento')
                                    ->options([
                                        'legales' => '⚖️ Documentos Legales',
                                        'educacion' => '🎓 Educación y Capacitación',
                                        'servicio' => '⚙️ Servicios y Niveles (SLA/SOC)',
                                        'otros' => '📁 Otros Documentos',
                                    ])
                                    ->live()
                                    ->required()
                                    ->columnSpan(1),

                                // 2. Tipo de Documento según la Categoría
                                Select::make('nombre_archivo')
                                    ->label('Tipo de Documento')
                                    ->options(function (Get $get) {
                                        return match ($get('categoria')) {
                                            'legales' => [
                                                'Acta Constitutiva' => 'Acta Constitutiva',
                                                'Comprobante de Domicilio' => 'Comprobante de Domicilio',
                                                'Constancia de Situacion Fiscal' => 'Constancia de Situación Fiscal (CSF)',
                                                'Opinion de Cumplimiento' => 'Opinión de Cumplimiento (SAT)',
                                                'Caratula Bancaria' => 'Carátula Bancaria',
                                                'Contrato de Servicios' => 'Contrato de Servicios',
                                                'NDA / Acuerdo de Confidencialidad' => 'NDA / Acuerdo de Confidencialidad',
                                            ],
                                            'educacion' => [
                                                'Memoria Tecnica' => 'Memoria Técnica',
                                                'Certificaciones' => 'Certificaciones de Personal / Empresa',
                                                'Cursos y Capacitacion' => 'Cursos y Capacitación',
                                                'Constancia Laboral / DC3' => 'Constancias / DC-3',
                                            ],
                                            'servicio' => [
                                                'SLA / Niveles de Servicio' => 'Acuerdo de Nivel de Servicio (SLA)',
                                                'Reporte SOC 1 / SOC 2' => 'Reporte SOC 1 / SOC 2 / ISO',
                                                'Matriz de Escalacion' => 'Matriz de Escalación y Soporte',
                                                'Poliza de Soporte' => 'Póliza de Soporte',
                                            ],
                                            default => [
                                                'Otro' => 'Otro Documento',
                                            ],
                                        };
                                    })
                                    ->searchable()
                                    ->required()
                                    ->columnSpan(1),

                                // 3. Carga del Archivo (ACEPTA CUALQUIER FORMATO)
                                FileUpload::make('ruta_archivo')
                                    ->label('Archivo / Evidencia Adjunta')
                                    ->disk('local')
                                    // 📁 Subcarpeta dinámica: proveedores/{proveedor}/{categoria}/
                                    ->directory(function (Get $get) {
                                        $nombreProveedor = $get('../../nombre') ?? 'general';
                                        $categoria = $get('categoria') ?? 'otros';

                                        $slugProveedor = Str::slug($nombreProveedor);
                                        $slugCategoria = Str::slug($categoria);

                                        return "proveedores/{$slugProveedor}/{$slugCategoria}";
                                    })
                                    // 📄 Mantiene la extensión original (.pdf, .docx, .xlsx, .zip, .png, etc.)
                                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file, Get $get) {
                                        $tipoDocumento = $get('nombre_archivo') ?? 'documento';
                                        $nombreProveedor = $get('../../nombre') ?? 'proveedor';

                                        $slugDocumento = Str::slug($tipoDocumento, '_');
                                        $slugProveedor = Str::slug($nombreProveedor, '_');

                                        // Captura dinámicamente la extensión real del archivo subido
                                        $extension = $file->getClientOriginalExtension();

                                        return "{$slugDocumento}_{$slugProveedor}.{$extension}";
                                    })
                                    // 🔓 Se removió ->acceptedFileTypes() para permitir cualquier tipo de archivo
                                    ->maxSize(20480) // Límite aumentado a 20 MB (Ajustable según tus necesidades)
                                    ->required()
                                    ->columnSpan(2),
                            ])
                            ->columns(2)
                            ->addActionLabel(' + Agregar otra evidencia / documento')
                            ->defaultItems(0)
                            ->reorderable(false),
                    ])
                    ->columnSpanFull()
            ]);
    }
}