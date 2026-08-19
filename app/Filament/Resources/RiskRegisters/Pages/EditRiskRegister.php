<?php

namespace App\Filament\Resources\RiskRegisters\Pages;

use App\Filament\Resources\RiskRegisters\RiskRegisterResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRiskRegister extends EditRecord
{
    protected static string $resource = RiskRegisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}