<?php

namespace App\Filament\Resources\VdaControls\Schemas;

use App\Models\DocumentVersion;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\TextEntry;
use Filament\Actions\Action; // 🚀 Alias unificado para evitar conflictos
use Filament\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class VdaControlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        TextInput::make('number')
                            ->label('Código')
                            ->disabled(),

                        TextInput::make('name')
                            ->label('Criterio')
                            ->disabled()
                            ->columnSpan(2),
                    ])
                    ->columns(3),
                Tabs::make('VDA_Details')
                    ->tabs([
                        Tab::make('Requisito y Solución TISAX')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Textarea::make('description')
                                    ->label('Descripción VDA')
                                    ->disabled()
                                    ->rows(3),

                                Textarea::make('solution_description')
                                    ->label('Solución Implementada')
                                    ->rows(4)
                                    ->required(),
                            ]),
                        Tab::make('Vincular Evidencia')
                            ->icon('heroicon-o-arrow-up-on-square-stack')
                            ->schema([
                                Section::make(fn () => 'Nueva Evidencia')
                                    ->schema([
                                        TextInput::make('new_evidence_name')
                                            ->label('Nombre Evidencia')
                                            ->required(),

                                        Select::make('new_evidence_type')
                                            ->label('Tipo')
                                            ->options([
                                                'upload' => '📁 Subir Archivo',
                                                'docflow_version' => '🔒 DocFlow',
                                                'url' => '🔗 URL',
                                            ])
                                            ->reactive()
                                            ->required(),

                                        FileUpload::make('new_evidence_file_path')
                                            ->label('Archivo')
                                            ->disk('local')
                                            ->visibility('private')
                                            ->storeFiles(false)
                                            ->preserveFilenames()
                                            ->visible(fn($get) => $get('new_evidence_type') === 'upload')
                                            ->required(fn($get) => $get('new_evidence_type') === 'upload'),

                                        Select::make('new_evidence_document_version_id')
                                            ->label('Documento DocFlow')
                                            ->options(
                                                fn() => DocumentVersion::query()
                                                    ->where(fn () => 'status', 'aprobado')
                                                    ->pluck('file_name', 'id')
                                            )
                                            ->searchable()
                                            ->visible(fn($get) => $get('new_evidence_type') === 'docflow_version')
                                            ->required(fn($get) => $get('new_evidence_type') === 'docflow_version'),

                                        TextInput::make('new_evidence_external_url')
                                            ->label('URL')
                                            ->url()
                                            ->visible(fn($get) => $get('new_evidence_type') === 'url'),
                                    ])
                                    ->columns(3)
                                    ->headerActions([
                                        Action::make('saveEvidence')
                                            ->label('Guardar Evidencia')
                                            ->icon('heroicon-m-plus')
                                            ->color(fn () => 'success')
                                            ->action(function ($record, array $state, $set) {
                                                $filePath = null;

                                                if ($state['new_evidence_type'] === 'upload') {
                                                    $file = is_array($state['new_evidence_file_path'])
                                                        ? reset($state['new_evidence_file_path'])
                                                        : $state['new_evidence_file_path'];

                                                    $folder = 'vda-evidences/' . $record->number;
                                                    $filename = Str::uuid() . '_' . $file->getClientOriginalName();

                                                    $filePath = $file->storeAs($folder, $filename, 'local');
                                                }

                                                if ($state['new_evidence_type'] === 'docflow_version') {
                                                    $version = DocumentVersion::find($state['new_evidence_document_version_id']);
                                                    $filePath = $version?->file_path;
                                                }

                                                $record->evidences()->create([
                                                    'name' => $state['new_evidence_name'],
                                                    'type' => $state['new_evidence_type'],
                                                    'file_path' => $filePath,
                                                    'document_version_id' => $state['new_evidence_document_version_id'] ?? null,
                                                    'external_url' => $state['new_evidence_external_url'] ?? null,
                                                    'user_id' => auth()->id(),
                                                ]);

                                                foreach ([
                                                    'new_evidence_name',
                                                    'new_evidence_type',
                                                    'new_evidence_file_path',
                                                    'new_evidence_document_version_id',
                                                    'new_evidence_external_url',
                                                ] as $field) {
                                                    $set($field, null);
                                                }

                                                Notification::make()
                                                    ->title('Evidencia guardada')
                                                    ->success()
                                                    ->send();
                                            })
                                    ])
                            ]),
                        Tab::make('Evidencias vinculadas')
                            ->icon('heroicon-o-paper-clip')
                            ->badge(fn($record) => $record?->evidences()->count() ?? 0)
                            ->schema(function ($record) {
                                if (!$record || $record->evidences->isEmpty()) {
                                    return [
                                        TextEntry::make('empty')
                                            ->label('')
                                            ->default('Sin evidencias vinculadas.')
                                    ];
                                }

                                return [
                                    Grid::make([
                                        'default' => 1,
                                        'md' => 5,
                                    ])
                                        ->schema(
                                            $record->evidences->map(function ($evidence) {
                                                $icon = match ($evidence->type) {
                                                    'upload' => '📁',
                                                    'docflow_version' => '🔒',
                                                    default => '🔗',
                                                };

                                                return Section::make("{$icon} {$evidence->name}")
                                                    ->compact()
                                                    ->headerActions([

                                                        // 👁️ ACCIÓN: VER EVIDENCIA MULTIFORMATO EN MODAL MAXIMIZADO
                                                        Action::make('view_' . $evidence->id)
                                                            ->label('')
                                                            ->icon('heroicon-m-eye')
                                                            ->color(fn () => 'success')
                                                            ->url(fn() => $evidence->type === 'url' ? $evidence->external_url : null)
                                                            ->openUrlInNewTab(fn() => $evidence->type === 'url')
                                                            ->modalSubmitAction(false)
                                                            ->modalCancelActionLabel('Cerrar')
                                                            ->modalHeading($evidence->name)
                                                            ->modalWidth('7xl') // 🚀 Fuerza el ancho del modal de Filament a tamaño panorámico
                                                            ->modalContent(function () use ($evidence) {
                                                                if ($evidence->type === 'url') {
                                                                    return null;
                                                                }

                                                                $url = route('vda.evidence.file', $evidence);
                                                                $extension = strtolower(pathinfo($evidence->file_path, PATHINFO_EXTENSION));

                                                                // 📄 RENDERIZADO ESTRICTO DE PDF CON ALTO FIJO FORZADO
                                                                if ($extension === 'pdf') {
                                                                    return new HtmlString("
                                                                    <div class='w-full' style='min-height: 500px;'>
                                                                        <iframe 
                                                                            src='{$url}' 
                                                                            style='width: 100%; height: 500px; min-height: 500px;' 
                                                                            class='rounded-lg border border-gray-200 dark:border-gray-700 shadow-inner'
                                                                            frameborder='0'
                                                                        ></iframe>
                                                                    </div>
                                                                ");
                                                                }

                                                                // 🖼️ RENDERIZADO DE IMÁGENES (PNG, JPG, JPEG)
                                                                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                                                    return new HtmlString("
                                                                    <div class='flex justify-center items-center p-2 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 shadow-inner'>
                                                                        <img src='{$url}' class='max-w-full max-h-[600px] object-contain rounded-lg shadow-sm' />
                                                                    </div>
                                                                ");
                                                                }

                                                                // 📦 FALLBACK PARA OTROS FORMATOS (Excel, Word, ZIP)
                                                                return new HtmlString("
                                                                <div class='text-center p-10 bg-gray-50 dark:bg-gray-900 rounded-xl border border-dashed border-gray-300 dark:border-gray-700'>
                                                                    <div class='text-6xl mb-3'>📦</div>
                                                                    <h3 class='font-bold text-gray-950 dark:text-white mb-1'>Archivo de extensión .{$extension}</h3>
                                                                    <p class='text-xs text-gray-500 dark:text-gray-400 max-w-xs mx-auto mb-6'>La vista previa no está disponible para este tipo de archivo.</p>
                                                                    <a href='{$url}' class='inline-flex items-center gap-2 px-4 py-2 text-xs font-bold text-white bg-success-600 hover:bg-success-500 rounded-lg transition shadow-sm'>
                                                                        📥 Descargar Archivo
                                                                    </a>
                                                                </div>
                                                            ");
                                                            }),

                                                        // 🗑️ ACCIÓN: ELIMINAR REGISTRO INDEPENDIENTE
                                                        Action::make('delete_' . $evidence->id)
                                                            ->label('')
                                                            ->icon('heroicon-m-trash')
                                                            ->color(fn () => 'danger')
                                                            ->requiresConfirmation()
                                                            ->action(function () use ($evidence) {
                                                                $evidence->delete();

                                                                Notification::make()
                                                                    ->title('Evidencia eliminada')
                                                                    ->success()
                                                                    ->send();
                                                            })
                                                    ]);
                                            })->toArray()
                                        )
                                ];
                            })
                    ])
                    ->columnSpanFull()
            ]);
    }
}