<?php

namespace App\Filament\Resources\FormatoIt04s\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\FileUpload;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FormatoIt04Form
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos del Equipo y Puesto')
                    ->schema([
                        TextInput::make('folio')
                            ->label('Folio')
                            ->required()
                            ->default('FIT04-' . strtoupper(uniqid()))
                            ->readOnly(),

                        DatePicker::make('fecha_eliminacion')
                            ->label('Fecha de Eliminación')
                            ->required()
                            ->default(now()),

                        TextInput::make('nombre_puesto')
                            ->label('Puesto de Trabajo')
                            ->placeholder('Ej. Supervisor')
                            ->required(),

                        TextInput::make('nombre_maquina')
                            ->label('Nombre de la Máquina')
                            ->placeholder('Ej. JORGEGM')
                            ->required(),

                        TextInput::make('num_serie')
                            ->label('Service Tag / Núm. Serie')
                            ->placeholder('Ej. SRE123S')
                            ->required(),
                    ])->columns(2),

                Section::make('Especificaciones Técnicas')
                    ->schema([
                        Select::make('tipo_dispositivo')
                            ->label('Dispositivo Físico o Virtual')
                            ->options([
                                'Fisico' => 'Físico',
                                'Virtual' => 'Virtual',
                            ])
                            ->default('Fisico')
                            ->required(),

                        Select::make('dispositivo')
                            ->label('Tipo de Dispositivo')
                            ->options([
                                'Celular' => 'Celular',
                                'Disco duro' => 'Disco duro',
                                'Disco Duro externo' => 'Disco Duro externo',
                                'Equipo de comunicación' => 'Equipo de comunicación',
                                'Laptop completa' => 'Laptop completa',
                                'Memoria SD' => 'Memoria SD',
                                'Momoria USB' => 'Momoria USB',
                                'Router' => 'Router',
                                'CPU' => 'CPU',
                                'Switch' => 'Switch',
                            ])
                            ->required(),

                        Select::make('tratamiento')
                            ->label('Tratamiento del Equipo')
                            ->options([
                                'Total' => 'Destrucción Total',
                                'Reutilizable' => 'Reutilizable',
                            ])
                            ->required(),

                        Textarea::make('carpeta_respaldo')
                            ->label('Carpetas a Respaldar')
                            ->placeholder('Ej. /respaldo/')
                            ->columnSpanFull(),
                    ])->columns(2),
                Section::make('Evidencias Fotográficas')
                    ->schema([
                        FileUpload::make('evidencias_fotos')
                            ->label('Fotografías del Proceso (Subida Masiva)')
                            ->multiple()
                            ->image()
                            ->imageEditor()
                            ->reorderable()
                            ->disk('local') // 👈 Apunta a storage/app/private
                            ->directory(fn($get) => 'f-it-04/' . ($get('folio') ?? 'temp'))
                            ->getUploadedFileNameForStorageUsing(
                                function (TemporaryUploadedFile $file, $get): string {
                                    $folio = $get('folio') ?? 'FIT04-TEMP';

                                    static $counter = 1;
                                    $extension = $file->getClientOriginalExtension();
                                    $filename = "{$folio}-{$counter}.{$extension}";
                                    $counter++;

                                    return $filename;
                                }
                            )
                            ->columnSpanFull(),
                    ]),

                Section::make('Autorización y Firmas')
                    ->schema([
                        Select::make('user_id_creador')
                            ->label('Firma de Sistemas (Creador)')
                            ->relationship('Creador', 'name')
                            ->default(fn() => Auth::id())
                            ->required()
                            ->dehydrated() 
                            ->disabled(),  
                            
                        TextInput::make('nombre_gerente')
                            ->label('Firma de Gerente')
                            ->placeholder('Ej. Jesús Marrón')
                            ->required(),
                    ])->columns(1),
            ]);
    }
}