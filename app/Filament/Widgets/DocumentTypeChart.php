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
        // Tu lógica actual de consulta (aquí un ejemplo ilustrativo de cómo estructurar los datos)
        return [
            'datasets' => [
                [
                    'label' => 'Documentos',
                    'data' => [25, 5, 3, 35, 15], // Tus contadores reales de la BD
                    // 🎨 SOLUCIÓN VISUAL: Colores explícitos e individuales para cada sección de la dona
                    'backgroundColor' => [
                        '#007580', // Formato -> Earth Green (Primario)
                        '#EEB500', // Instructivo -> Shine Yellow (Warning)
                        '#666666', // Manual -> Cool Gray 10 C (Gray)
                        '#10B981', // Politica -> Emerald (Success)
                        '#F43F5E', // Procedimiento -> Rose (Danger - Evita que se repita con el primero)
                    ],
                ],
            ],
            'labels' => ['Formato', 'Instructivo', 'Manual', 'Politica', 'Procedimiento'],
        ];
    }
}