<?php

namespace App\Filament\Resources\Cursos\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EvidenciasRelationManager extends RelationManager
{
    protected static string $relationship = 'evidencias';
    protected static ?string $title = 'Evidencias del Curso (Asistencia, Evaluaciones, Diplomas)';
    protected static ?string $modelLabel = 'Evidencia';
    protected static ?string $pluralModelLabel = 'Evidencias';

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nombre')
                        ->label('Nombre del Documento')
                        ->placeholder('Ej. Lista de Asistencia Firmada')
                        ->required()
                        ->maxLength(255),

                    Select::make('tipo_documento')
                        ->label('Tipo de Evidencia')
                        ->options([
                            'LISTA_ASISTENCIA' => 'Lista de Asistencia',
                            'TEMARIO' => 'Temario / Plan del Curso',
                            'DIPLOMA_CERTIFICADO' => 'Constancias / Diplomas',
                            'EVALUACION' => 'Evaluaciones / Exámenes',
                            'MATERIAL' => 'Material Didáctico / Presentación',
                            'FOTOGRAFIA' => 'Fotografía de la Sesión',
                            'OTRO' => 'Otro Documento',
                        ])
                        ->default('LISTA_ASISTENCIA')
                        ->required(),
                ]),

                FileUpload::make('archivo_path')
                    ->label('Archivo')
                    ->disk('public')
                    ->directory('cursos/evidencias')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.ms-powerpoint',
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                        'image/jpeg',
                        'image/png',
                    ])
                    ->maxSize(25600) // 25 MB
                    ->openable()
                    ->downloadable()
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('comentarios')
                    ->label('Comentarios / Observaciones')
                    ->rows(2)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre')
            ->columns([
                TextColumn::make('nombre')
                    ->label('Documento')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('tipo_documento')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'LISTA_ASISTENCIA' => 'Lista de Asistencia',
                        'TEMARIO' => 'Temario',
                        'DIPLOMA_CERTIFICADO' => 'Diploma / Constancia',
                        'EVALUACION' => 'Evaluación',
                        'MATERIAL' => 'Material Didáctico',
                        'FOTOGRAFIA' => 'Fotografía',
                        default => 'Otro',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'LISTA_ASISTENCIA' => 'success',
                        'DIPLOMA_CERTIFICADO' => 'primary',
                        'EVALUACION' => 'warning',
                        'TEMARIO' => 'info',
                        'FOTOGRAFIA' => 'secondary',
                        default => 'gray',
                    }),

                TextColumn::make('archivo_path')
                    ->label('Archivo')
                    ->formatStateUsing(fn() => 'Descargar / Ver')
                    ->url(fn($record) => route('cursos.evidencia.descargar', $record))
                    ->openUrlInNewTab()
                    ->badge()
                    ->color('primary')
                    ->icon('heroicon-o-arrow-down-tray'),

                TextColumn::make('created_at')
                    ->label('Fecha de Subida')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()->label('Agregar Evidencia'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}