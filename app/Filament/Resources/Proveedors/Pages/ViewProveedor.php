<?php

namespace App\Filament\Resources\Proveedors\Pages;

use App\Filament\Resources\Proveedors\ProveedorResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewProveedor extends ViewRecord
{
    protected static string $resource = ProveedorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('descargar_zip')
                ->label('Descargar Expediente (ZIP)')
                ->icon('heroicon-o-archive-box')
                ->color('success')
                ->url(fn($record) => route('proveedores.descargar-expediente', $record))
                ->openUrlInNewTab(),
        ];
    }
}