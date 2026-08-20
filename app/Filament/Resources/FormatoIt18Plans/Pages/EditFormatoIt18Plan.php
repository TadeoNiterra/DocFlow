<?php

namespace App\Filament\Resources\FormatoIt18Plans\Pages;

use App\Filament\Resources\FormatoIt18Plans\FormatoIt18PlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt18Plan extends EditRecord
{
    protected static string $resource = FormatoIt18PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // 🟢 Recalcula automáticamente sobre la BD cuando se actualicen las fases
    protected function afterSave(): void
    {
        $record = $this->getRecord();

        $rpo = $record->fases()->where('tipo_metrico', 'RPO')->sum('tiempo_horas');
        $rto = $record->fases()->where('tipo_metrico', 'RTO')->sum('tiempo_horas');

        $record->updateQuietly([
            'rpo_global' => $rpo,
            'rto_global' => $rto,
            'mtd' => $rpo + $rto,
        ]);
    }
}