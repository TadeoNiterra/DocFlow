<?php

namespace App\Filament\Resources\DocumentVersions\Tables\Filters;

use App\Models\Document;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Eloquent\Builder;

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
            Group::make('is_latest_group')
                ->label('Estado de Vigencia')
                ->collapsible()
                // 🟢 1. Ordena la consulta SQL para agrupar primero las versiones vigentes y luego las anteriores
                ->orderQueryUsing(function (Builder $query, string $direction) {
                    return $query
                        ->join('documents', 'document_versions.document_id', '=', 'documents.id')
                        ->select('document_versions.*')
                        ->orderByRaw("(CASE WHEN document_versions.id = (
                        SELECT max(dv.id) 
                        from document_versions dv 
                        where dv.document_id = document_versions.document_id
                    ) THEN 1 ELSE 2 END) {$direction}");
                })
                // 🟢 2. Asigna la etiqueta visual correspondiente a los 2 únicos bloques
                ->getTitleFromRecordUsing(function ($record): string {
                    $latestVersionId = $record->document?->latestVersion?->id;

                    return ($latestVersionId && $record->id === $latestVersionId)
                        ? '🔒 Vigente (Última Versión)'
                        : '📜 Versiones Anteriores (Histórico)';
                }),

            Group::make('status')
                ->label('Tipo de Estatus')
                ->collapsible()
                ->getTitleFromRecordUsing(fn($record): string => match ($record->status) {
                    'draft' => '📝 Borrador (Draft)',
                    'terminado' => '🔍 En revisión por Auditor (Terminado)',
                    'revisado' => '🟣 Aceptado por Auditor (Revisado)',
                    'aprobado' => '🔒 Firmado y Publicado (Aprobado)',
                    default => ucfirst($record->status),
                }),

            Group::make('document.name')
                ->label('Nombre de documento')
                ->collapsible(),
        ];
    }
}