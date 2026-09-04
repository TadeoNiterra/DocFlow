<?php

namespace App\Filament\Resources\DocumentVersions\Pages;

use App\Filament\Resources\DocumentVersions\DocumentVersionResource;
use App\Filament\Resources\DocumentVersions\Tables\Actions\DocumentVersionHeaderActions;
use Filament\Resources\Pages\ListRecords;

class ListDocumentVersions extends ListRecords
{
    protected static string $resource = DocumentVersionResource::class;

    protected function getHeaderActions(): array
    {
        return array_merge(
            DocumentVersionHeaderActions::make(),
            parent::getHeaderActions()
        );
    }
}