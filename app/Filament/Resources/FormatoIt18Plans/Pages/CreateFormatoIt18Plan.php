<?php

namespace App\Filament\Resources\FormatoIt18Plans\Pages;

use App\Filament\Resources\FormatoIt18Plans\FormatoIt18PlanResource;
use App\Models\FormatoIt18Plan;
use Filament\Resources\Pages\CreateRecord;

class CreateFormatoIt18Plan extends CreateRecord
{
    protected static string $resource = FormatoIt18PlanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id_creador'] = auth()->id();

        if (empty($data['folio'])) {
            $data['folio'] = FormatoIt18Plan::generarFolioNext();
        }

        return $data;
    }

    // 🟢 Este Hook se ejecuta DESPUÉS de guardar el plan y todas sus fases hijas
    protected function afterCreate(): void
    {
        /** @var FormatoIt18Plan $record */
        $record = $this->getRecord();

        $rpo = $record->fases()->where('tipo_metrico', 'RPO')->sum('tiempo_horas');
        $rto = $record->fases()->where('tipo_metrico', 'RTO')->sum('tiempo_horas');

        $record->update([
            'rpo_global' => $rpo,
            'rto_global' => $rto,
            'mtd' => $rpo + $rto,
        ]);
    }
}