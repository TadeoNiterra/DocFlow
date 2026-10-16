<?php

namespace App\Filament\Resources\DocumentVersions\Tables\Filters;

use App\Models\Document;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;

class DocumentVersionFilters
{
    public static function makeSelectFilters(): array
    {
        return [
            SelectFilter::make('document_id')
                ->label('Filtrar por Documento')
                ->searchable()
                ->preload()
                ->options(fn() => Document::query()->pluck('name', 'id')->toArray()),
        ];
    }

    public static function makeGroups(): array
    {
        return [
            Group::make('id')
                ->label('Estado de Vigencia')
                ->collapsible()
                // Se eliminó orderQueryUsing con la subconsulta MAX() que bloqueaba SQL Server
                ->getTitleFromRecordUsing(function ($record): string {
                    $latestVersionId = $record->document?->latestVersion?->id;
                    return ($latestVersionId && $record->id === $latestVersionId)
                        ? 'Vigente (Última Versión)'
                        : 'Versiones Anteriores (Histórico)';
                }),

            Group::make('status')
                ->label('Tipo de Estatus')
                ->collapsible()
                ->getTitleFromRecordUsing(fn($record): string => match ($record->status) {
                    'draft' => 'Borrador (Draft)',
                    'terminado' => 'En revisión por Auditor (Terminado)',
                    'revisado' => 'Aceptado por Auditor (Revisado)',
                    'aprobado' => 'Firmado y Publicado (Aprobado)',
                    default => ucfirst($record->status ?? 'Desconocido'),
                }),

            Group::make('document.name')
                ->label('Nombre de documento')
                ->collapsible(),
        ];
    }
}