<?php

namespace App\Filament\Resources\FormatoIt14Soportes\Pages;

use App\Filament\Resources\FormatoIt14Soportes\FormatoIt14SoporteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt14Soporte extends EditRecord
{
    protected static string $resource = FormatoIt14SoporteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
