<?php

namespace App\Filament\Widgets;

use App\Models\DocumentVersion;
use Filament\Widgets\ChartWidget;

class DocumentStatusChart extends ChartWidget
{
    protected ?string $heading = 'Distribución del Estado de los Documentos';

    public function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {

        $draftcount = DocumentVersion::where('status', 'draft')->count();
        $terminadocount = DocumentVersion::where('status', 'terminado')->count();
        $revisadocount = DocumentVersion::where('status', 'revisado')->count();
        $aprobadocount = DocumentVersion::where('status', 'aprobado')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Documentos',
                    'data' => [
                        $draftcount,
                        $terminadocount,
                        $revisadocount,
                        $aprobadocount
                    ], // Tus contadores reales de la BD
                    // 🎨 SOLUCIÓN VISUAL: Colores explícitos e individuales para cada sección de la dona
                    'backgroundColor' => [
                        '#666666',
                        '#10B981',
                        '#EEB500',
                        '#007580',
                    ],
                ],
            ],
            'labels' => ['Draft', 'Terminado', 'Revisado', 'Aprobado'],
        ];
    }
}