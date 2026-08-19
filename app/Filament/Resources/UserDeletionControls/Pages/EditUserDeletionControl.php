<?php

namespace App\Filament\Resources\UserDeletionControls\Pages;

use App\Filament\Resources\UserDeletionControls\UserDeletionControlResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserDeletionControl extends EditRecord
{
    protected static string $resource = UserDeletionControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
