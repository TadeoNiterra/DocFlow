<?php

namespace App\Filament\Resources\DocumentVersions\Pages;

use App\Filament\Resources\DocumentVersions\DocumentVersionResource;
use App\Filament\Resources\DocumentVersions\Tables\Actions\DocumentVersionHeaderActions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDocumentVersions extends ListRecords
{
    protected static string $resource = DocumentVersionResource::class;

    protected function getHeaderActions(): array
    {
        return array_merge(
            [
                // 🟢 Se define explícitamente el botón de creación
                CreateAction::make()
                    ->label('Crear Nueva Versión')
                    ->icon('heroicon-o-plus'),
            ],
            // 🟢 Se anexan los botones de exportación CSV / PDF
            DocumentVersionHeaderActions::make()
        );
    }
}