<?php

namespace App\Filament\Resources\FormatoIt13Evidencias\Tables;

use App\Models\FormatoIt13Evidencia;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class FormatoIt13EvidenciasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('usuario')->label('Usuario')->searchable()->sortable(),
                TextColumn::make('base')->label('Base de Datos')->searchable()->sortable(),
                TextColumn::make('version')->label('Versión'),
                TextColumn::make('fecha')->label('Fecha')->dateTime('d/m/Y H:i')->sortable(),

                BadgeColumn::make('status')
                    ->label('Estatus')
                    ->colors([
                        'success' => 'Aprobado',
                        'warning' => 'Pendiente',
                        'danger' => 'Rechazado',
                    ]),

                TextColumn::make('descripcion')->label('Descripción')->limit(30)->toggleable(),
                TextColumn::make('observaciones')->label('Observaciones')->limit(30)->toggleable(),
            ])
            ->headerActions([
                // 🟢 Botón de creación mediante Modal
                CreateAction::make()
                    ->label('Nueva Evidencia')
                    ->modalHeading('Registrar Evidencia de Base de Datos (F-IT-13)')
                    ->form(self::getFormSchema()),
            ])
            ->actions([
                // 👁️ BOTÓN PARA VER EVIDENCIA EN MODAL (PDF o Imagen)
                Action::make('ver_evidencia')
                    ->label('Evidencia')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->visible(fn(FormatoIt13Evidencia $record) => !empty($record->rutaEvidencia))
                    ->modalHeading('Vista Previa de Evidencia')
                    ->modalContent(function (FormatoIt13Evidencia $record) {
                        $url = Storage::url($record->rutaEvidencia);
                        $ext = strtolower(pathinfo($record->rutaEvidencia, PATHINFO_EXTENSION));

                        if ($ext === 'pdf') {
                            return new HtmlString("
                                <iframe src='{$url}' style='width: 100%; height: 500px; border: none;'></iframe>
                            ");
                        }

                        return new HtmlString("
                            <div style='text-align: center;'>
                                <img src='{$url}' style='max-width: 100%; max-height: 500px; margin: auto; border-radius: 8px;'>
                            </div>
                        ");
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Cerrar'),

                // ✏️ Editar en Modal
                EditAction::make()
                    ->modalHeading('Editar Evidencia')
                    ->form(self::getFormSchema()),

                DeleteAction::make(),
            ]);
    }

    // Esquema de formulario para los modales
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('usuario')
                ->label('Usuario')
                ->required()
                ->maxLength(50)
                ->default(fn() => auth()->user()?->name ?? ''),

            TextInput::make('base')
                ->label('Base de Datos')
                ->required()
                ->maxLength(50),

            TextInput::make('version')
                ->label('Versión')
                ->required()
                ->maxLength(50),

            DateTimePicker::make('fecha')
                ->label('Fecha')
                ->default(now()),

            Select::make('status')
                ->label('Estatus')
                ->options([
                    'Aprobado' => 'Aprobado',
                    'Pendiente' => 'Pendiente',
                    'Rechazado' => 'Rechazado',
                ])
                ->required()
                ->default('Aprobado'),

            TextInput::make('descripcion')
                ->label('Descripción')
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('observaciones')
                ->label('Observaciones')
                ->maxLength(50)
                ->columnSpanFull(),

            FileUpload::make('rutaEvidencia')
                ->label('Archivo de Evidencia (PDF o Imagen)')
                ->directory('evidencias-f-it-13')
                ->acceptedFileTypes(['application/pdf', 'image/*'])
                ->maxSize(10240)
                ->columnSpanFull(),

            DateTimePicker::make('fecha_nueva')
                ->label('Fecha Nueva')
                ->nullable(),
        ];
    }
}