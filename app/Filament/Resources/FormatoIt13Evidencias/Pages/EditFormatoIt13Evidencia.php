<?php

namespace App\Filament\Resources\FormatoIt13Evidencias\Pages;

use App\Filament\Resources\FormatoIt13Evidencias\FormatoIt13EvidenciaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt13Evidencia extends EditRecord
{
    protected static string $resource = FormatoIt13EvidenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
