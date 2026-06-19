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

                Section::make(fn() => 'Documento Asociado')
                    ->description('Selecciona el documento maestro al que pertenece esta revisión.')
                    ->schema([
                        Select::make('document_id')
                            ->label('Documento Maestro')
                            ->relationship('document', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                    ]),


                Section::make(fn() => 'Detalles de la Nueva Versión / Revisión')
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

                            if (blank($state)) {
                                    return;
                                }


                                $file = is_array($state) ? head($state) : $state;


                                if ($file instanceof TemporaryUploadedFile) {
                                    $set('file_name', $file->getClientOriginalName());
                                } elseif (is_string($file)) {

                                    $set('file_name', basename($file));
                                }
                            })
                            ->columnSpan(2),


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