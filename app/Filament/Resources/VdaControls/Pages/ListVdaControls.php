<?php

namespace App\Filament\Resources\VdaControls\Pages;

use App\Filament\Resources\VdaControls\VdaControlResource;
use App\Models\DocumentVersion;
use App\Models\VdaControl;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use ZipArchive;

class ListVdaControls extends ListRecords
{
    protected static string $resource = VdaControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ==============================================================
            // OPCIÓN 1: Botón con Modal interactivo (Lista Desplegable)
            // ==============================================================
            Action::make('export_modal')
                ->label('Exportar Matriz VDA')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('primary')
                ->modalHeading('Exportación y Descarga de Evidencias')
                ->modalDescription('Selecciona el formato en el que deseas exportar los datos y archivos de la norma VDA / TISAX:')
                ->modalSubmitActionLabel('Descargar')
                ->modalWidth('md')
                ->form([
                    Select::make('formato')
                        ->label('Formato de Descarga')
                        ->options([
                            'zip' => '📦 Paquete Completo ZIP (Archivos, DocFlow y Enlaces CSV)',
                            'pdf' => '📄 Reporte Ejecutivo en PDF (Tablas y Resumen)',
                            'csv' => '📊 Matriz Consolidada en CSV (Compatible con Excel)',
                        ])
                        ->default('zip')
                        ->required(),
                ])
                ->action(function (array $data) {
                    return match ($data['formato']) {
                        'zip' => $this->generarZip(),
                        'pdf' => $this->generarPdf(),
                        'csv' => $this->generarCsv(),
                    };
                }),

            // ==============================================================
            // OPCIÓN 2 (Alternativa): Menú Desplegable Directo (Dropdown)
            // Si prefieres que el botón despliegue las 3 opciones con 1 clic:
            // ==============================================================
            /*
            Action::make('export_dropdown')
                ->label('Descargar')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->button()
                ->extraAttributes(['class' => 'fi-dropdown-trigger'])
                ->grouped([
                    Action::make('down_zip')
                        ->label('Paquete ZIP Completo')
                        ->icon('heroicon-o-archive-box-arrow-down')
                        ->action(fn () => $this->generarZip()),
                    Action::make('down_pdf')
                        ->label('Reporte en PDF')
                        ->icon('heroicon-o-document-arrow-down')
                        ->action(fn () => $this->generarPdf()),
                    Action::make('down_csv')
                        ->label('Matriz en CSV')
                        ->icon('heroicon-o-table-cells')
                        ->action(fn () => $this->generarCsv()),
                ]),*/
        ];
            
    }

    // --------------------------------------------------------------------------
    // GENERADOR 1: PAQUETE ZIP (Archivos locales + DocFlow + URLs en CSV)
    // --------------------------------------------------------------------------
    protected function generarZip(): ?BinaryFileResponse
    {
        if (!class_exists('ZipArchive')) {
            Notification::make()
                ->title('Extensión no disponible')
                ->body('La extensión php_zip no está habilitada en el servidor.')
                ->danger()
                ->send();
            return null;
        }

        $zipFileName = 'VDA_TISAX_Evidencias_' . date('Y-m-d_His') . '.zip';
        $tempZipPath = storage_path('app/temp_' . uniqid() . '.zip');

        $zip = new ZipArchive();
        if ($zip->open($tempZipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            Notification::make()
                ->title('Error al generar ZIP')
                ->body('No se pudo inicializar el archivo temporal en el servidor.')
                ->danger()
                ->send();
            return null;
        }

        $controls = VdaControl::query()
            ->whereHas('parent.parent')
            ->with(['parent', 'parent.parent', 'evidences.document'])
            ->orderBy('sort_order')
            ->get();

        $urlEvidences = [];

        foreach ($controls as $control) {
            $temaNumber = Str::slug($control->parent?->parent?->number ?? 'T0');
            $subtemaNumber = Str::slug($control->parent?->number ?? 'ST0');
            $controlNumber = Str::slug($control->number ?? 'C0');

            // Subcarpeta dentro del ZIP: Tema_X/Subtema_Y/Control_Z/
            $folderPath = "Tema_{$temaNumber}/Subtema_{$subtemaNumber}/Control_{$controlNumber}/";

            foreach ($control->evidences as $evidence) {
                // 1. Archivo físico tradicional (upload)
                if ($evidence->type === 'upload' && !empty($evidence->file_path)) {
                    $disk = Storage::disk('local')->exists($evidence->file_path) ? 'local' : 'public';
                    if (Storage::disk($disk)->exists($evidence->file_path)) {
                        $absolutePath = Storage::disk($disk)->path($evidence->file_path);
                        $extension = pathinfo($evidence->file_path, PATHINFO_EXTENSION);
                        $safeName = Str::slug($evidence->name) . ($extension ? ".{$extension}" : '');
                        $zip->addFile($absolutePath, $folderPath . $safeName);
                    }
                }
                // 2. Documento maestro DocFlow (última versión aprobada/firmada)
                elseif ($evidence->type === 'docflow_version' && $evidence->document_id) {
                    $latestVersion = DocumentVersion::where('document_id', $evidence->document_id)
                        ->whereIn('status', ['aprobado', 'aprobado / firmado'])
                        ->orderBy('id', 'desc')
                        ->first();

                    if ($latestVersion && !empty($latestVersion->file_path)) {
                        $disk = Storage::disk('local')->exists($latestVersion->file_path) ? 'local' : 'public';
                        if (Storage::disk($disk)->exists($latestVersion->file_path)) {
                            $absolutePath = Storage::disk($disk)->path($latestVersion->file_path);
                            $extension = pathinfo($latestVersion->file_path, PATHINFO_EXTENSION);
                            $docCode = Str::slug($evidence->document?->code ?? 'DOC');
                            $safeName = "{$docCode}_" . Str::slug($evidence->name) . ($extension ? ".{$extension}" : '');
                            $zip->addFile($absolutePath, $folderPath . $safeName);
                        }
                    }
                }
                // 3. URLs externas
                elseif ($evidence->type === 'url' && !empty($evidence->external_url)) {
                    $urlEvidences[] = [
                        $control->parent?->parent?->number ?? '',
                        $control->parent?->parent?->name ?? '',
                        $control->parent?->number ?? '',
                        $control->parent?->name ?? '',
                        $control->number,
                        $control->name,
                        $evidence->name,
                        $evidence->external_url,
                        $evidence->created_at?->format('d/m/Y H:i') ?? '',
                    ];
                }
            }
        }

        // Agregar archivo CSV con las URLs dentro del ZIP
        $csvMemory = fopen('php://temp', 'r+');
        fputs($csvMemory, "\xEF\xBB\xBF");
        fputcsv($csvMemory, ['Código Tema', 'Tema', 'Código Subtema', 'Subtema', 'Código Control', 'Criterio VDA', 'Nombre Evidencia', 'URL Externa', 'Fecha Registro']);
        foreach ($urlEvidences as $row) {
            fputcsv($csvMemory, $row);
        }
        rewind($csvMemory);
        $zip->addFromString('enlaces_y_referencias_externas.csv', stream_get_contents($csvMemory));
        fclose($csvMemory);

        // Guía de lectura dentro del ZIP
        $zip->addFromString('LEEME.txt', "REPORTE GENERAL DE EVIDENCIAS VDA / TISAX\r\nGenerado: " . now()->format('d/m/Y H:i:s'));

        $zip->close();

        return response()->download($tempZipPath, $zipFileName, [
            'Content-Type' => 'application/zip',
        ])->deleteFileAfterSend(true);
    }

    // --------------------------------------------------------------------------
    // GENERADOR 2: REPORTE EN PDF
    // --------------------------------------------------------------------------
    protected function generarPdf()
    {
        $controls = VdaControl::query()
            ->whereHas('parent.parent')
            ->with(['parent', 'parent.parent', 'evidences.document'])
            ->orderBy('sort_order')
            ->get();

        $grouped = $controls->groupBy(function ($item) {
            return $item->parent?->parent?->number . ' - ' . $item->parent?->parent?->name;
        })->map(function ($itemsInTema) {
            return $itemsInTema->groupBy(function ($item) {
                return $item->parent?->number . ' - ' . $item->parent?->name;
            });
        });

        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.vda-evidencias-pdf', [
                'groupedControls' => $grouped,
                'fechaReporte' => now()->format('d/m/Y H:i'),
            ])->setPaper('a4', 'landscape');

            return response()->streamDownload(
                fn() => print ($pdf->output()),
                'vda_matriz_evidencias_' . date('Y-m-d_His') . '.pdf'
            );
        }

        return response()->streamDownload(function () use ($grouped) {
            echo view('pdf.vda-evidencias-pdf', [
                'groupedControls' => $grouped,
                'fechaReporte' => now()->format('d/m/Y H:i'),
            ])->render();
        }, 'vda_matriz_evidencias_' . date('Y-m-d_His') . '.html');
    }

    // --------------------------------------------------------------------------
    // GENERADOR 3: MATRIZ COMPLETA EN CSV
    // --------------------------------------------------------------------------
    protected function generarCsv(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fputs($handle, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($handle, [
                'Código Tema',
                'Tema',
                'Código Subtema',
                'Subtema',
                'Código Control',
                'Criterio / Requisito VDA',
                'Nombre Evidencia',
                'Tipo Evidencia',
                'Origen / Documento / URL',
                'Fecha de Registro',
            ]);

            $controls = VdaControl::query()
                ->whereHas('parent.parent')
                ->with(['parent', 'parent.parent', 'evidences.document'])
                ->orderBy('sort_order')
                ->get();

            foreach ($controls as $control) {
                $tema = $control->parent?->parent;
                $subtema = $control->parent;

                $codTema = $tema ? "Tema {$tema->number}" : 'N/A';
                $nomTema = $tema?->name ?? 'N/A';
                $codSubtema = $subtema ? "Subtema {$subtema->number}" : 'N/A';
                $nomSubtema = $subtema?->name ?? 'N/A';

                if ($control->evidences->isNotEmpty()) {
                    foreach ($control->evidences as $evidence) {
                        $origen = match ($evidence->type) {
                            'upload' => $evidence->file_path ?? 'Archivo local',
                            'docflow_version' => $evidence->document
                                ? "DocFlow: {$evidence->document->code} - {$evidence->document->name}"
                                : 'Documento DocFlow',
                            'url' => $evidence->external_url ?? 'N/A',
                            default => 'N/A',
                        };

                        $tipoLabel = match ($evidence->type) {
                            'upload' => 'Archivo Subido',
                            'docflow_version' => 'DocFlow',
                            'url' => 'Enlace Externo',
                            default => $evidence->type,
                        };

                        fputcsv($handle, [
                            $codTema,
                            $nomTema,
                            $codSubtema,
                            $nomSubtema,
                            $control->number,
                            $control->name,
                            $evidence->name,
                            $tipoLabel,
                            $origen,
                            $evidence->created_at?->format('d/m/Y H:i') ?? 'N/A',
                        ]);
                    }
                } else {
                    fputcsv($handle, [
                        $codTema,
                        $nomTema,
                        $codSubtema,
                        $nomSubtema,
                        $control->number,
                        $control->name,
                        'Sin evidencias vinculadas',
                        'N/A',
                        'N/A',
                        'N/A',
                    ]);
                }
            }

            fclose($handle);
        }, 'vda_evidencias_' . date('Y-m-d_His') . '.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}