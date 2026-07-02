<?php

namespace App\Filament\Resources\FormatoIt04s\Pages;

use App\Filament\Resources\FormatoIt04s\FormatoIt04Resource;
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
}
