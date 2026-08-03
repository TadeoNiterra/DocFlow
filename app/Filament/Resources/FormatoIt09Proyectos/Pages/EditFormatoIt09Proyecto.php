<?php

namespace App\Filament\Resources\FormatoIt09Proyectos\Pages;

use App\Filament\Resources\FormatoIt09Proyectos\FormatoIt09ProyectoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt09Proyecto extends EditRecord
{
    protected static string $resource = FormatoIt09ProyectoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
