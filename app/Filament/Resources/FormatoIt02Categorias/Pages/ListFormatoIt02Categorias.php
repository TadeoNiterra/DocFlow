<?php

namespace App\Filament\Resources\FormatoIt02Categorias\Pages;

use App\Filament\Resources\FormatoIt02Categorias\FormatoIt02CategoriaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormatoIt02Categorias extends ListRecords
{
    protected static string $resource = FormatoIt02CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
