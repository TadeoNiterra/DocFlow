<?php

namespace App\Filament\Widgets;

use App\Models\Document;
use Filament\Widgets\ChartWidget;

// 🚀 CORRECCIÓN: Asegurar que el nombre aquí sea DocumentTypeChart
class DocumentTypeChart extends ChartWidget
{
    protected ?string $heading = 'Distribución del Catálogo de Información';

    public function getType(): string
    {
        return 'doughnut';
    }

    protected function getData(): array
    {
        // Consultamos la agrupación de conteos por tipo directamente en la BD
        $tiposData = Document::query()
            ->selectRaw('type, count(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type')
            ->toArray();

        $labels = array_keys($tiposData);
        $valores = array_values($tiposData);

        if (empty($labels)) {
            $labels = ['Políticas', 'Procedimientos', 'Formatos', 'Manuales', 'Instructivos'];
            $valores = [0, 0, 0, 0, 0];
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total de Documentos',
                    'data' => $valores,
                    // 🚀 MAPEAMOS 5 COLORES DIFERENTES PARA EVITAR DUPLICADOS:
                    'backgroundColor' => [
                        '#ef4444', // Rojo (Crítico - ej. Politicas)
                        '#3b82f6', // Azul (ej. Procedimientos)
                        '#10b981', // Verde (ej. Formatos)
                        '#f59e0b', // Naranja/Amarillo (ej. Instructivos)
                        '#a855f7', // Morado (ej. Manuales)
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }
}