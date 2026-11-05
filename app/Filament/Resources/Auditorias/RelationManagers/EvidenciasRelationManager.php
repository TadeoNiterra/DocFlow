<?php

namespace App\Filament\Resources\Auditorias\AuditoriaResource\RelationManagers;

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
    protected static ?string $title = 'Evidencias y Documentos Adjuntos';
    protected static ?string $modelLabel = 'Evidencia';
    protected static ?string $pluralModelLabel = 'Evidencias';

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('nombre')
                        ->label('Nombre del Documento')
                        ->placeholder('Ej. Plan de Auditoría Firmado')
                        ->required()
                        ->maxLength(255),

                    Select::make('tipo_documento')
                        ->label('Tipo de Documento')
                        ->options([
                            'PLAN' => 'Plan de Auditoría',
                            'INFORME' => 'Informe de Auditoría',
                            'MINUTA' => 'Minuta de Reunión / Cierre',
                            'CHECKLIST' => 'Lista de Verificación / Checklist',
                            'CAPTURA' => 'Evidencia Fotográfica / Pantallazo',
                            'OTRO' => 'Otro Documento',
                        ])
                        ->default('OTRO')
                        ->required(),
                ]),

                FileUpload::make('archivo_path')
                    ->label('Archivo')
                    ->disk('public')
                    ->directory('auditorias/evidencias')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'image/jpeg',
                        'image/png',
                    ])
                    ->maxSize(20480) // 20 MB
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
                        'PLAN' => 'Plan de Auditoría',
                        'INFORME' => 'Informe Final',
                        'MINUTA' => 'Minuta',
                        'CHECKLIST' => 'Checklist',
                        'CAPTURA' => 'Captura / Foto',
                        default => 'Otro',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'PLAN' => 'info',
                        'INFORME' => 'success',
                        'MINUTA' => 'warning',
                        'CHECKLIST' => 'primary',
                        default => 'gray',
                    }),

                TextColumn::make('archivo_path')
                    ->label('Archivo')
                    ->formatStateUsing(fn() => 'Descargar / Ver')
                    ->url(fn($record) => asset('storage/' . $record->archivo_path))
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