<?php

namespace App\Filament\Widgets;

use App\Models\Document;
use App\Models\DocumentVersion;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // 💡 ASEGÚRATE DE QUE QUEDE ASÍ, SIN LA PALABBRA "static":
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        // ... todo tu método getStats() sigue igual abajo
        $user = auth()->user();

        // 1. Contador de documentos maestros
        $totalDocs = Document::count();

        // 2. Documentos publicados (Aprobados)
        $publicados = DocumentVersion::where('status', 'aprobado')->count();

        // 3. Cálculo de pendientes dinámicos por Rol RACI
        $pendientesLabel = 'Pendientes en Flujo';
        $pendientesCount = 0;
        $color = 'gray';

        if ($user) {
            switch ($user->default_raci_type) {
                case 'R':
                    $pendientesCount = DocumentVersion::where('status', 'draft')->count();
                    $pendientesLabel = 'Mis Borradores (Por Terminar)';
                    $color = 'gray';
                    break;
                case 'C':
                    $pendientesCount = DocumentVersion::where('status', 'terminado')->count();
                    $pendientesLabel = 'Por Auditar (Terminados)';
                    $color = 'info';
                    break;
                case 'A':
                    $pendientesCount = DocumentVersion::where('status', 'revisado')->count();
                    $pendientesLabel = 'Por Firmar (Revisados)';
                    $color = 'warning';
                    break;
                case 'I':
                    $pendientesCount = 0; // El informado no tiene tareas pendientes
                    $pendientesLabel = 'Sin acciones requeridas';
                    $color = 'success';
                    break;
            }
        }

        return [
            Stat::make('Catálogo de Documentos', $totalDocs)
                ->description('Estructura maestra actual')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Documentos Firmados / Aprobados', $publicados)
                ->description('Vigentes bajo Norma TISAX')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('success'),

            Stat::make($pendientesLabel, $pendientesCount)
                ->description('Requieren tu atención inmediata')
                ->descriptionIcon('heroicon-m-clock')
                ->color($color),
        ];
    }
}