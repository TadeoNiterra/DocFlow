<?php

namespace App\Filament\Resources\UserDeletionControls\Pages;

use App\Filament\Resources\UserDeletionControls\UserDeletionControlResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserDeletionControls extends ListRecords
{
    protected static string $resource = UserDeletionControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
