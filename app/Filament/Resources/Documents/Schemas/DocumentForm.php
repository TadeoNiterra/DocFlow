<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                        TextInput::make('code')
                            ->label('Código Único')
                            ->required()
                            ->placeholder('Ej: POL-IT-01')
                            ->unique(ignoreRecord: true),

                        TextInput::make('name')
                            ->label('Nombre del Documento')
                            ->required()
                            ->placeholder('Ej: Politica General de Seguridad de la Información'),

                        Select::make('type')
                            ->label('Tipo de Documento')
                            ->options([
                                'Politica' => 'Politica',
                                'Procedimiento' => 'Procedimiento',
                                'Instructivo' => 'Instructivo',
                                'Formato' => 'Formato',
                                'Manual' => 'Manual',
                            ])
                            ->required(),

                        Textarea::make('description')
                            ->label('Descripción / Objetivo General')
                            ->placeholder('Escribe una breve descripción del propósito de este documento...')
                    ]);
    }
}