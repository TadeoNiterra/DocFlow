<?php

namespace App\Filament\Resources\ChecklistEquipos\Pages;

use App\Filament\Resources\ChecklistEquipos\ChecklistEquipoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditChecklistEquipo extends EditRecord
{
    protected static string $resource = ChecklistEquipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $checklist = $this->getRecord();
        $dispositivo = $checklist->dispositivo;

        if (!$dispositivo) {
            return;
        }

        match ($checklist->accion) {
            'ASIGNACION_INICIAL' => $dispositivo->update([
                'colaborador_id' => $checklist->colaborador_id,
                'fecha_asignacion' => $checklist->fecha,
                'estatus_asignacion' => 'ENTREGADO',
                'location' => 'Oficina',
            ]),

            'DEVOLUCION', 'CAMBIO' => $dispositivo->update([
                'colaborador_id' => null,
                'estatus_asignacion' => $checklist->accion === 'CAMBIO' ? 'RETIRADO' : 'EN STOCK',
                'location' => 'Almacén',
            ]),

            'REPARACION' => $dispositivo->update([
                'estatus_asignacion' => 'EN REPARACION',
            ]),

            default => null,
        };
    }
}