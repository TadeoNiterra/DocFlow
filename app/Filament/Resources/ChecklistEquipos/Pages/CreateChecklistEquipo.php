<?php

namespace App\Filament\Resources\ChecklistEquipos\Pages;

use App\Filament\Resources\ChecklistEquipos\ChecklistEquipoResource;
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
            // Asigna el equipo al usuario de forma bidireccional
            'ASIGNACION_INICIAL' => $dispositivo->update([
                'colaborador_id' => $checklist->colaborador_id,
                'fecha_asignacion' => $checklist->fecha,
                'estatus_asignacion' => 'ENTREGADO',
                'location' => 'Oficina',
            ]),

            // Desvincula el equipo por baja de usuario
            'DEVOLUCION' => $dispositivo->update([
                'colaborador_id' => null,
                'estatus_asignacion' => 'EN STOCK',
                'location' => 'Almacén',
            ]),

            // Marca el equipo para retiro / devolución a arrendadora
            'CAMBIO' => $dispositivo->update([
                'colaborador_id' => null,
                'estatus_asignacion' => 'RETIRADO',
                'location' => 'Almacén',
            ]),

            // Pasa el equipo a reparación manteniendo o no el usuario
            'REPARACION' => $dispositivo->update([
                'estatus_asignacion' => 'EN REPARACION',
            ]),

            default => null,
        };
    }
}