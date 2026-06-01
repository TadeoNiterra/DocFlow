<?php

namespace App\Filament\Resources\DocumentVersions\Tables;

// TUS IMPORTS COMPROBADOS Y EXITOSOS
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;

class DocumentVersionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('document.name')
                    ->label('Documento Maestro')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('version_number')
                    ->label('Versión')
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Estado Versión')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'terminado' => 'info',
                        'aprobado' => 'success',
                        default => 'transparent',
                    })
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),

                TextColumn::make('file_name')
                    ->label('Nombre de Archivo')
                    ->searchable()
                    ->limit(25),

                TextColumn::make('user.name')
                    ->label('Subido por'),

                TextColumn::make('created_at')
                    ->label('Fecha de Carga')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                    ->label('Ver Detalles')
                    ->color('info')
                    ->infolist(function ($infolist) {
                        return $infolist
                            ->schema([
                                Section::make('Historial y Registro de Cambios')
                                    ->schema([
                                        TextEntry::make('document.name')->label('Documento Maestro'),
                                        TextEntry::make('version_number')->label('Versión / Revisión')->badge()->color('warning'),

                                        TextEntry::make('status')
                                            ->label('Estado Actual de la Revisión')
                                            ->badge()
                                            ->color(fn(string $state): string => match ($state) {
                                                'draft' => 'gray',
                                                'terminado' => 'info',
                                                'aprobado' => 'success',
                                                default => 'transparent',
                                            })
                                            ->formatStateUsing(fn(string $state): string => ucfirst($state)),

                                        TextEntry::make('file_name')->label('Nombre del Archivo Original'),
                                        TextEntry::make('user.name')->label('Registrado por'),
                                        TextEntry::make('created_at')->label('Fecha y Hora de Carga')->dateTime('d/m/Y H:i'),

                                        TextEntry::make('change_description')
                                            ->label('Descripción de los Cambios')
                                            ->columnSpanFull()
                                            ->html(),
                                    ])->columns(2),
                            ]);
                    })
                    // CAMBIO AQUÍ: extraModalActions inyecta los botones en el Footer del Modal
                    ->extraModalActions([

                        // BOTÓN 1: VER PDF
                        Action::make('view_pdf')
                            ->label('Ver PDF / Archivo')
                            ->icon(Heroicon::OutlinedEye)
                            ->color('success')
                            ->url(fn($record): string => $record->file_path ? Storage::disk('public')->url($record->file_path) : '#')
                            ->openUrlInNewTab(),

                        // BOTÓN 2: CAMBIAR STATUS
                        Action::make('change_version_status')
                            ->label('Cambiar Estado de la Versión')
                            ->icon(Heroicon::OutlinedArrowPath)
                            ->color('warning')
                            ->form([
                                \Filament\Forms\Components\Select::make('status')
                                    ->label('Seleccionar Estado de Revisión')
                                    ->options([
                                        'draft' => 'Draft (Borrador)',
                                        'terminado' => 'Terminado',
                                        'aprobado' => 'Aprobado',
                                    ])
                                    ->required(),
                            ])
                            ->fillForm(fn($record): array => [
                                'status' => $record->status ?? 'draft',
                            ])
                            ->action(function (array $data, $record): void {
                                $record->update([
                                    'status' => $data['status']
                                ]);

                                \Filament\Notifications\Notification::make()
                                    ->title('Estado de Versión Updated')
                                    ->body("Esta revisión se movió a: " . ucfirst($data['status']))
                                    ->success()
                                    ->send();
                            }),
                    ]),

                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}