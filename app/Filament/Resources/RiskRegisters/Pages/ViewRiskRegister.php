<?php

namespace App\Filament\Resources\RiskRegisters\Pages;

use App\Filament\Resources\RiskRegisters\RiskRegisterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRiskRegister extends ViewRecord
{
    protected static string $resource = RiskRegisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}