<?php

namespace App\Filament\Resources\DocumentVersions\Tables\Actions;

use App\Models\DocumentVersion;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Select;
use Filament\Support\Icons\Heroicon;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentVersionHeaderActions
{
    public static function make(): array
    {
        return [
            ActionGroup::make([
                // 🟢 1. EXPORTAR A CSV
                Action::make('exportCsv')
                    ->label('Exportar Evidencia (CSV)')
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->color('success')
                    ->form([
                        Select::make('vigencia')
                            ->label('Filtrar por Estado de Vigencia')
                            ->options([
                                'vigentes' => '🔒 Solo Versiones Vigentes (Última Versión)',
                                'historico' => '📜 Solo Versiones Anteriores (Histórico)',
                                'todos' => '📋 Todas las Versiones',
                            ])
                            ->default('vigentes')
                            ->required(),
                    ])
                    ->action(function (array $data): StreamedResponse {
                        return self::downloadCsv($data['vigencia']);
                    }),

                // 🟢 2. EXPORTAR A PDF
                Action::make('exportPdf')
                    ->label('Exportar Reporte (PDF)')
                    ->icon(Heroicon::OutlinedDocumentArrowDown)
                    ->color('danger')
                    ->form([
                        Select::make('vigencia')
                            ->label('Filtrar por Estado de Vigencia')
                            ->options([
                                'vigentes' => '🔒 Solo Versiones Vigentes (Última Versión)',
                                'historico' => '📜 Solo Versiones Anteriores (Histórico)',
                                'todos' => '📋 Todas las Versiones',
                            ])
                            ->default('vigentes')
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        return self::downloadPdf($data['vigencia']);
                    }),
            ])
                ->label('Exportar Evidencias')
                ->icon(Heroicon::OutlinedArrowDownTray)
                ->color('primary')
                ->button(),
        ];
    }

    /**
     * Lógica para construir el archivo CSV con los formatos de fecha ajustados
     */
    private static function downloadCsv(string $tipoFiltro): StreamedResponse
    {
        $fileName = "Evidencia_Documentos_{$tipoFiltro}_" . now()->format('Ymd_His') . ".csv";

        return response()->streamDownload(function () use ($tipoFiltro) {
            $file = fopen('php://output', 'w');

            // BOM UTF-8 para compatibilidad con Excel
            fputs($file, "\xEF\xBB\xBF");

            // Encabezados del CSV
            fputcsv($file, [
                'ID',
                'Documento Maestro',
                'Versión',
                'Estatus Versión',
                'Nombre Archivo',
                'Subido Por',
                'Fecha Registro',
                'Próxima Revisión',
                'Estado Vigencia'
            ]);

            $query = DocumentVersion::with(['document', 'user']);

            $records = $query->get()->filter(function ($record) use ($tipoFiltro) {
                $latestId = $record->document?->latestVersion?->id;
                $esVigente = ($latestId && $record->id === $latestId);

                if ($tipoFiltro === 'vigentes')
                    return $esVigente;
                if ($tipoFiltro === 'historico')
                    return !$esVigente;
                return true;
            });

            // Cálculo dinámico de fecha de próxima revisión (01/07/{año_proximo})
            $proximaRevision = Carbon::now()->addYear()->month(7)->day(1)->format('01/07/Y');

            foreach ($records as $row) {
                $latestId = $row->document?->latestVersion?->id;
                $esVigente = ($latestId && $row->id === $latestId);

                fputcsv($file, [
                    $row->id,
                    $row->document?->name ?? 'N/A',
                    $row->version_number ?? $row->version,
                    $row->status,
                    $row->file_name ?? $row->file_path,
                    $row->user?->name ?? 'N/A',
                    $row->created_at ? Carbon::parse($row->created_at)->format('d/m/Y') : 'N/A', // 🟢 Formato DD/MM/AAAA
                    $proximaRevision, // 🟢 01/07/{año_proximo}
                    $esVigente ? 'Vigente (Última Versión)' : 'Histórico (Anterior)',
                ]);
            }

            fclose($file);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * Lógica para construir el PDF
     */
    private static function downloadPdf(string $tipoFiltro)
    {
        $query = DocumentVersion::with(['document', 'user']);

        $versions = $query->get()->filter(function ($record) use ($tipoFiltro) {
            $latestId = $record->document?->latestVersion?->id;
            $esVigente = ($latestId && $record->id === $latestId);

            if ($tipoFiltro === 'vigentes')
                return $esVigente;
            if ($tipoFiltro === 'historico')
                return !$esVigente;
            return true;
        });

        // Fecha de próxima revisión: 01/07 de la siguiente anualidad
        $proximaRevision = Carbon::now()->addYear()->month(7)->day(1)->format('01/07/Y');

        $pdf = Pdf::loadView('pdf.reporte-vigencia-documentos', [
            'versions' => $versions,
            'tipoFiltro' => $tipoFiltro,
            'fecha' => now()->format('d/m/Y'),
            'proximaRevision' => $proximaRevision,
        ])->setPaper('letter', 'landscape');

        $fileName = "Reporte_Vigencia_{$tipoFiltro}_" . now()->format('Ymd') . ".pdf";

        return response()->streamDownload(fn() => print ($pdf->output()), $fileName);
    }
}