<?php

namespace App\Filament\Resources\VdaControls\Pages;

use App\Filament\Resources\VdaControls\VdaControlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListVdaControls extends ListRecords
{
    protected static string $resource = VdaControlResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

}