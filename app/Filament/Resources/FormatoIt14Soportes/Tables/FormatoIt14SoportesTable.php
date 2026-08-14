<?php

namespace App\Filament\Resources\FormatoIt14Soportes\Tables;

use App\Models\FormatoIt14Soporte;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class FormatoIt14SoportesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('alcance_soporte')
                    ->label('Alcance')
                    ->colors([
                        'info' => 'Externo',
                        'success' => 'Interno',
                    ])
                    ->alignCenter(),

                TextColumn::make('responsable_asignado')
                    ->label('Responsable Asignado')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('usuario_designado')
                    ->label('Usuario Designado')
                    ->searchable()
                    ->default('N/A'),

                TextColumn::make('inicio')
                    ->label('Inicio')
                    ->dateTime('d-M H:i')
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('fin')
                    ->label('Fin')
                    ->dateTime('d-M H:i')
                    ->sortable()
                    ->placeholder('En proceso')
                    ->alignCenter(),

                TextColumn::make('solucion_justificacion')
                    ->label('Solución / Justificación')
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('comentarios')
                    ->label('Comentarios')
                    ->limit(30)
                    ->wrap()
                    ->toggleable(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Nuevo Soporte')
                    ->modalHeading('Registrar Ticket de Soporte')
                    ->form(self::getFormSchema()),
            ])
            ->actions([
                // 🔵 Botón Ver Evidencia (si existe archivo)
                Action::make('ver_evidencia')
                    ->label('Evidencia')
                    ->icon('heroicon-m-paper-clip')
                    ->button()
                    ->color('info')
                    ->visible(fn(FormatoIt14Soporte $record) => !empty($record->rutaEvidencia))
                    ->modalHeading('Evidencia Adjunta')
                    ->modalContent(function (FormatoIt14Soporte $record) {
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

                // 🟡 Botón Editar Registro
                EditAction::make()
                    ->label('')
                    ->tooltip('Actualizar Soporte')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->modalHeading('Actualizar Soporte')
                    ->form(self::getFormSchema()),

                DeleteAction::make(),
            ]);
    }

    public static function getFormSchema(): array
    {
        return [
            Select::make('alcance_soporte')
                ->label('Alcance de Soporte')
                ->options([
                    'Interno' => 'Interno',
                    'Externo' => 'Externo',
                ])
                ->default('Interno')
                ->required()
                ->columnSpan(1),

            TextInput::make('responsable_asignado')
                ->label('Responsable Asignado')
                ->required()
                ->default(fn() => auth()->user()?->name ?? '')
                ->columnSpan(1),

            TextInput::make('usuario_designado')
                ->label('Usuario Designado')
                ->default('N/A')
                ->placeholder('Ej: j_guzman o N/A')
                ->columnSpan(1),

            DateTimePicker::make('inicio')
                ->label('Inicio (Fecha y Hora)')
                ->default(now())
                ->required()
                ->columnSpan(1),

            DateTimePicker::make('fin')
                ->label('Fin (Fecha y Hora)')
                ->nullable()
                ->columnSpan(1),

            Textarea::make('solucion_justificacion')
                ->label('Solución / Justificación')
                ->rows(3)
                ->columnSpanFull(),

            Textarea::make('comentarios')
                ->label('Comentarios')
                ->rows(2)
                ->columnSpanFull(),

            FileUpload::make('rutaEvidencia')
                ->label('Evidencia / Captura (Opcional)')
                ->directory('evidencias-f-it-14')
                ->acceptedFileTypes(['application/pdf', 'image/*'])
                ->maxSize(10240)
                ->columnSpanFull(),
        ];
    }
}