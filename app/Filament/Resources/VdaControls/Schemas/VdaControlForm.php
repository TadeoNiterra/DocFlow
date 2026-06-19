<?php

namespace App\Filament\Resources\VdaControls\Schemas;

use App\Models\Document;
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
use Filament\Actions\Action;
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
                                Section::make(fn() => 'Nueva Evidencia')
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

                                        Select::make('document_id')
                                            ->label('Seleccionar Documento Maestro de DocFlow')
                                            ->options(function () {
                                                return Document::query()
                                                    ->whereNotNull('name')
                                                    ->get()
                                                    ->mapWithKeys(fn($doc) => [
                                                        $doc->id => "{$doc->code} - {$doc->name}"
                                                    ]);
                                            })
                                            ->searchable()
                                            ->preload()
                                            ->reactive()
                                            ->required(fn($get) => $get('new_evidence_type') === 'docflow_version')
                                            ->visible(fn($get) => $get('new_evidence_type') === 'docflow_version'),

                                        TextInput::make('new_evidence_external_url')
                                            ->label('URL')
                                            ->url()
                                            ->visible(fn($get) => $get('new_evidence_type') === 'url')
                                            ->required(fn($get) => $get('new_evidence_type') === 'url'),
                                    ])
                                    ->columns(3)
                                    ->headerActions([
                                        Action::make('saveEvidence')
                                            ->label('Guardar Evidencia')
                                            ->icon('heroicon-m-plus')
                                            ->color(fn() => 'success')
                                            ->action(function ($record, array $state, $set) {
                                                $filePath = null;
                                                $documentId = null;

                                                // 📁 CASO 1: Subida física tradicional
                                                if ($state['new_evidence_type'] === 'upload') {
                                                    $file = is_array($state['new_evidence_file_path'])
                                                        ? reset($state['new_evidence_file_path'])
                                                        : $state['new_evidence_file_path'];

                                                    $folder = 'vda-evidences/' . $record->number;
                                                    $filename = Str::uuid() . '_' . $file->getClientOriginalName();
                                                    $filePath = $file->storeAs($folder, $filename, 'local');
                                                }

                                                // 🔒 CASO 2: Vinculación viva al Documento Padre de DocFlow
                                                if ($state['new_evidence_type'] === 'docflow_version') {
                                                    $documentId = $state['document_id'];

                                                    // Validación técnica preventiva: Verificamos que tenga al menos una revisión aprobada
                                                    $hasApprovedVersion = DocumentVersion::where('document_id', $documentId)
                                                        ->whereIn('status', ['aprobado', 'aprobado / firmado'])
                                                        ->exists();

                                                    if (!$hasApprovedVersion) {
                                                        Notification::make()
                                                            ->title('Error de Validación')
                                                            ->body('El documento maestro seleccionado no cuenta con ninguna versión autorizada o firmada.')
                                                            ->danger()
                                                            ->send();
                                                        return; // Frena la ejecución del insert
                                                    }

                                                    // Dejamos explícitamente $filePath como null para que use el Puente Vivo al renderizar
                                                    $filePath = null;
                                                }

                                                // 💾 Operación transaccional sobre la tabla con el nuevo campo físico
                                                $record->evidences()->create([
                                                    'name' => $state['new_evidence_name'],
                                                    'type' => $state['new_evidence_type'],
                                                    'file_path' => $filePath, // null si viene de DocFlow
                                                    'document_id' => $documentId, // 🔥 Inyección directa en tu nueva columna
                                                    'document_version_id' => null, // Saneado de la FK antigua para evitar conflictos
                                                    'external_url' => $state['new_evidence_type'] === 'url' ? ($state['new_evidence_external_url'] ?? null) : null,
                                                ]);

                                                // 🧼 Limpieza secuencial estricta de las variables de estado del formulario
                                                foreach ([
                                                    'new_evidence_name',
                                                    'new_evidence_type',
                                                    'new_evidence_file_path',
                                                    'document_id',
                                                    'new_evidence_external_url',
                                                ] as $field) {
                                                    $set($field, null);
                                                }

                                                Notification::make()
                                                    ->title('Evidencia vinculada dinámicamente')
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

                                                        // 👁️ ACCIÓN INSTITUCIONAL: VISUALIZADOR DE EVIDENCIAS EN VIVO
                                                        Action::make('view_' . $evidence->id)
                                                            ->label('')
                                                            ->icon('heroicon-m-eye')
                                                            ->color(fn() => 'success')
                                                            ->url(fn() => $evidence->type === 'url' ? $evidence->external_url : null)
                                                            ->openUrlInNewTab(fn() => $evidence->type === 'url')
                                                            ->modalSubmitAction(false)
                                                            ->modalCancelActionLabel('Cerrar')
                                                            ->modalHeading($evidence->name)
                                                            ->modalWidth('7xl')
                                                            ->modalContent(function () use ($evidence) {
                                                                if ($evidence->type === 'url') {
                                                                    return null;
                                                                }

                                                                // 1. Ruta base por defecto para cargas locales tradicionales ('upload')
                                                                $url = route('vda.evidence.file', $evidence);
                                                                $filePathToInspect = $evidence->file_path;

                                                                // 2. 🔥 EL NUEVO PUENTE DINÁMICO: Consulta directa orientada al Documento Padre
                                                                if ($evidence->type === 'docflow_version' && $evidence->document_id) {

                                                                    // Buscamos de forma reactiva la revisión más alta con estatus aprobado o firmado
                                                                    $latestVersion = DocumentVersion::where('document_id', $evidence->document_id)
                                                                        ->whereIn('status', ['aprobado', 'aprobado / firmado'])
                                                                        ->orderBy('id', 'desc') // El ID más alto siempre será el más nuevo
                                                                        ->first();

                                                                    if ($latestVersion) {
                                                                        // Inyectamos el parámetro version_id para que el controlador lo reciba y despache el stream binario
                                                                        $url = route('vda.evidence.file', ['evidence' => $evidence->id, 'version_id' => $latestVersion->id]);

                                                                        // ✅ CORREGIDO: Se evalúa sobre el path real del storage, no sobre el nombre comercial
                                                                        $filePathToInspect = $latestVersion->file_path;
                                                                    } else {
                                                                        // Mensaje de mitigación por si el documento se queda sin versiones autorizadas en caliente
                                                                        return new HtmlString("
                                                <div class='text-center p-10 bg-danger-50 text-danger-700 dark:bg-gray-900 rounded-xl border border-danger-200 dark:border-gray-800'>
                                                    <div class='text-5xl mb-3'>🔒</div>
                                                    <h3 class='font-bold mb-1'>Documento Bloqueado u Obsoleto</h3>
                                                    <p class='text-xs text-gray-500'>Este archivo maestro de DocFlow no posee actualmente ninguna revisión en estado autorizado o firmado.</p>
                                                </div>
                                            ");
                                                                    }
                                                                }

                                                                // Extracción e inspección automática de la extensión del archivo binario
                                                                $extension = strtolower(pathinfo($filePathToInspect, PATHINFO_EXTENSION));

                                                                // 📄 RENDERIZADO EN VISOR PANORÁMICO: DOCUMENTOS PDF
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

                                                                // 🖼️ RENDERIZADO EN VISOR PANORÁMICO: IMÁGENES INDUSTRIALES (PNG, JPG, WEBP)
                                                                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                                                    return new HtmlString("
                                            <div class='flex justify-center items-center p-2 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700 shadow-inner'>
                                                <img src='{$url}' class='max-w-full max-h-[600px] object-contain rounded-lg shadow-sm' />
                                            </div>
                                        ");
                                                                }

                                                                // 📦 CONTENEDOR DE CONTINGENCIA: FORMATOS COMPRIMIDOS O NO NATIVOS (.XLSX, .ZIP)
                                                                return new HtmlString("
                                        <div class='text-center p-10 bg-gray-50 dark:bg-gray-900 rounded-xl border border-dashed border-gray-300 dark:border-gray-700'>
                                            <div class='text-6xl mb-3'>📦</div>
                                            <h3 class='font-bold text-gray-950 dark:text-white mb-1'>Archivo de extensión .{$extension}</h3>
                                            <p class='text-xs text-gray-500 dark:text-gray-400 max-w-xs mx-auto mb-6'>La vista previa no está disponible para este tipo de archivo.</p>
                                            <a href='{$url}' class='inline-flex items-center gap-2 px-4 py-2 text-xs font-bold text-white bg-success-600 hover:bg-success-500 rounded-lg transition shadow-sm'>
                                                📥 Descargar Archivo Seguro
                                            </a>
                                        </div>
                                    ");
                                                            }),

                                                        // 🗑️ ACCIÓN INSTITUCIONAL: ELIMINACIÓN DE EVIDENCIA DE LA MATRIZ VDA
                                                        Action::make('delete_' . $evidence->id)
                                                            ->label('')
                                                            ->icon('heroicon-m-trash')
                                                            ->color(fn() => 'danger')
                                                            ->requiresConfirmation()
                                                            ->action(function () use ($evidence) {
                                                                $evidence->delete();

                                                                Notification::make()
                                                                    ->title('Evidencia eliminada de forma permanente')
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