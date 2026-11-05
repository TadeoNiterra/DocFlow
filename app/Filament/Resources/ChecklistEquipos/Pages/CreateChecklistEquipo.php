<?php

namespace App\Filament\Resources\ChecklistEquipos\Pages;

use App\Filament\Resources\ChecklistEquipos\ChecklistEquipoResource;
use App\Models\ChecklistEquipo;
use Filament\Resources\Pages\CreateRecord;

class CreateChecklistEquipo extends CreateRecord
{
    protected static string $resource = ChecklistEquipoResource::class;

    protected function afterCreate(): void
    {
        $checklist = $this->getRecord();
        $dispositivo = $checklist->dispositivo;

        if (!$dispositivo) {
            return;
        }

        match ($checklist->accion) {
            'ASIGNACION_INICIAL' => (function () use ($checklist, $dispositivo) {
                    // Contar cuántas asignaciones o devoluciones ha tenido este dispositivo antes de este registro
                    $asignacionesPrevias = ChecklistEquipo::where('dispositivo_id', $dispositivo->id)
                    ->where('id', '!=', $checklist->id)
                    ->whereIn('accion', ['ASIGNACION_INICIAL', 'DEVOLUCION'])
                    ->exists();

                    // Si ya tuvo historial previo (es una 2da o posterior asignación), sumamos 1 a ciclo_borrado
                    $nuevoCiclo = $asignacionesPrevias
                    ? ($dispositivo->ciclo_borrado ?? 0) + 1
                    : ($dispositivo->ciclo_borrado ?? 0);

                    $dispositivo->update([
                    'colaborador_id' => $checklist->colaborador_id,
                    'fecha_asignacion' => $checklist->fecha,
                    'estatus_asignacion' => 'ENTREGADO',
                    'location' => 'Oficina',
                    'ciclo_borrado' => $nuevoCiclo,
                    ]);
                })(),

            // Al devolverse pasa a stock y queda listo para un futuro segundo ciclo
            'DEVOLUCION' => $dispositivo->update([
                'colaborador_id' => null,
                'estatus_asignacion' => 'EN STOCK',
                'location' => 'Almacén',
            ]),

            'CAMBIO' => $dispositivo->update([
                'colaborador_id' => null,
                'estatus_asignacion' => 'RETIRADO',
                'location' => 'Almacén',
            ]),

            'REPARACION' => $dispositivo->update([
                'estatus_asignacion' => 'EN REPARACION',
            ]),

            default => null,
        };
    }
}