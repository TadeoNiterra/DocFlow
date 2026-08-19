<?php

namespace App\Filament\Resources\RiskRegisters\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RiskRegisterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información General del Riesgo')
                    ->schema([
                        TextEntry::make('code_id')->label('ID'),
                        TextEntry::make('proceso')->label('Proceso'),
                        TextEntry::make('asset')->label('Activo (Asset)'),
                        TextEntry::make('risk_owner')->label('Dueño del Riesgo'),
                    ])->columns(4),

                Section::make('Análisis de Vulnerabilidades y Amenazas')
                    ->schema([
                        TextEntry::make('tipo_vulnerabilidad')->label('Tipo Vulnerabilidad'),
                        TextEntry::make('vulnerabilidad')->label('Vulnerabilidad'),
                        TextEntry::make('tipo_amenaza')->label('Tipo Amenaza'),
                        TextEntry::make('amenaza')->label('Amenaza'),
                        TextEntry::make('risk_description')->label('Descripción del Riesgo')->columnSpanFull(),
                    ])->columns(2),

                Section::make('Evaluación de Riesgo Inherente y Residual')
                    ->schema([
                        TextEntry::make('priority')->label('Riesgo Inherente')->formatStateUsing(fn ($state) => round($state * 100) . '%'),
                        TextEntry::make('priority_2')->label('Riesgo Residual')->formatStateUsing(fn ($state) => round($state * 100) . '%'),
                        TextEntry::make('m_cost')->label('Costo Mitigación'),
                        TextEntry::make('date_last_reviewed')->label('Fecha Revisión')->date('d/m/Y'),
                    ])->columns(4),
            ]);
    }
}