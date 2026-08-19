<?php

namespace App\Filament\Resources\RiskRegisters\Pages;

use App\Filament\Resources\RiskRegisters\RiskRegisterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRiskRegisters extends ListRecords
{
    protected static string $resource = RiskRegisterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}