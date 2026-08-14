<?php

namespace App\Filament\Resources\FormatoIt02Categorias\Pages;

use App\Filament\Resources\FormatoIt02Categorias\FormatoIt02CategoriaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormatoIt02Categoria extends EditRecord
{
    protected static string $resource = FormatoIt02CategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
