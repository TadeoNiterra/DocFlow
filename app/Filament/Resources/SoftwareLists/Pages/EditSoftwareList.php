<?php

namespace App\Filament\Resources\SoftwareLists\Pages;

use App\Filament\Resources\SoftwareLists\SoftwareListResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSoftwareList extends EditRecord
{
    protected static string $resource = SoftwareListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
