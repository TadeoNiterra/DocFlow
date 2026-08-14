<?php

namespace App\Filament\Resources\FormatoIt18Plans\Pages;

use App\Filament\Resources\FormatoIt18Plans\FormatoIt18PlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFormatoIt18Plan extends CreateRecord
{
    protected static string $resource = FormatoIt18PlanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id_creador'] = auth()->id();
        return $data;
    }
}