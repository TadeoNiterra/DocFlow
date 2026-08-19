<?php

namespace App\Filament\Resources\UserDeletionControls\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class UserDeletionControlInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detalles del Control de Eliminación')
                    ->schema([
                        TextEntry::make('usuario')->label('Usuario'),
                        TextEntry::make('fecha_baja')->label('Fecha de Baja')->date('d/m/Y'),
                        TextEntry::make('dias_revision_respaldos')->label('Días de Revisión para Respaldos'),
                        TextEntry::make('fecha_final_periodo')->label('Fecha Final del Periodo')->date('d/m/Y'),
                        TextEntry::make('fecha_autorizacion_eliminacion')->label('Fecha de Autorización')->date('d/m/Y'),
                        TextEntry::make('fecha_eliminacion')->label('Fecha Efectiva de Eliminación')->date('d/m/Y'),
                    ])
                    ->columnSpanFull()->columns(6),
            ]);
    }
}