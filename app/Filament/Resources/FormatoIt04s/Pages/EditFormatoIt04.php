<?php

namespace App\Filament\Resources\FormatoIt04s\Pages;

use App\Filament\Resources\FormatoIt04s\FormatoIt04Resource;
use App\Models\FormatoIt04Evidencia;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt04 extends EditRecord
{
    protected static string $resource = FormatoIt04Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    /**
     * Cargar las fotos existentes de la base de datos en el componente FileUpload
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['evidencias_fotos'] = FormatoIt04Evidencia::where('formato_it04_id', $this->record->id)
            ->orderBy('orden')
            ->pluck('ruta_archivo')
            ->toArray();

        return $data;
    }

    /**
     * Sincronizar las fotos en la base de datos al guardar
     */
    protected function afterSave(): void
    {
        $record = $this->getRecord();
        $fotos = $this->form->getState()['evidencias_fotos'] ?? [];

        // Eliminamos los registros previos en la base de datos para reordenar/actualizar
        FormatoIt04Evidencia::where('formato_it04_id', $record->id)->delete();

        $i = 1;
        foreach ($fotos as $ruta) {
            FormatoIt04Evidencia::create([
                'formato_it04_id' => $record->id,
                'ruta_archivo' => $ruta,
                'nombre_archivo' => basename($ruta),
                'orden' => $i++,
            ]);
        }
    }
}