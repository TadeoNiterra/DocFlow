<?php

namespace App\Filament\Resources\Dispositivos\Pages;

use App\Filament\Resources\Dispositivos\DispositivoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDispositivo extends EditRecord
{
    protected static string $resource = DispositivoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
