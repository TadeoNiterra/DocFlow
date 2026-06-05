<?php

namespace App\Filament\Resources\VdaControls\Pages;

use App\Filament\Resources\VdaControls\VdaControlResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVdaControl extends EditRecord
{
    protected static string $resource = VdaControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
