<?php

namespace App\Filament\Resources\DocumentVersions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DocumentVersionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECCIÓN 1: ASIGNACIÓN DEL DOCUMENTO MAESTRO
                Section::make('Documento Asociado')
                    ->description('Selecciona el documento maestro al que pertenece esta revisión.')
                    ->schema([
                        Select::make('document_id')
                            ->label('Documento Maestro')
                            ->relationship('document', 'name') // Utiliza la relación 'document' definida en tu modelo
                            ->searchable()                    // Permite escribir para buscar entre muchos documentos
                            ->preload()                       // Precarga los primeros elementos para agilizar
                            ->required()
                            ->columnSpanFull(),
                    ]),

                // SECCIÓN 2: CONTROL DE ARCHIVOS Y REVISIÓN INDIVIDUAL
                Section::make('Detalles de la Nueva Versión / Revisión')
                    ->description('Carga un archivo físico individual para esta versión del documento.')
                    ->schema([
                        TextInput::make('version_number')
                            ->label('Versión / Revisión')
                            ->required()
                            ->placeholder('Ej: v1.0')
                            ->columnSpan(1),

                        FileUpload::make('file_path')
                            ->label('Seleccionar Archivo (PDF o Word)')
                            ->required()
                            ->directory('documentos-docflow')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                            ])
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Al quitar la inyección estricta del parámetro, evitamos el Binding error.
                                // Verificamos si el estado contiene un archivo válido cargado.
                                if (blank($state)) {
                                    return;
                                }

                                // Si Filament maneja el archivo de forma unitaria o en array, extraemos el primero
                                $file = is_array($state) ? head($state) : $state;

                                // Validamos que sea una instancia correcta de archivo temporal antes de extraer el nombre
                                if ($file instanceof TemporaryUploadedFile) {
                                    $set('file_name', $file->getClientOriginalName());
                                } elseif (is_string($file)) {
                                    // En caso de re-edición donde ya es un string, extraemos el nombre base limpio
                                    $set('file_name', basename($file));
                                }
                            })
                            ->columnSpan(2),

                        // Campo oculto para registrar file_name en la BD sin mostrarlo en la interfaz
                        Hidden::make('file_name')
                            ->required(),

                        Textarea::make('change_description')
                            ->label('Descripción de los Cambios en esta versión')
                            ->required()
                            ->placeholder('Explica detalladamente qué se modificó o por qué se sube esta nueva revisión...')
                            ->columnSpan(3),

                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->default(auth()->id())
                            ->disabled()
                            ->dehydrated()
                            ->label('Subido por')
                            ->columnSpan(3),
                    ])->columns(3),
            ]);
    }
}