<?php

namespace App\Filament\Resources\FormatoLog01s\Pages;

use App\Filament\Resources\FormatoLog01s\FormatoLog01Resource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoLog01 extends EditRecord
{
    protected static string $resource = FormatoLog01Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
