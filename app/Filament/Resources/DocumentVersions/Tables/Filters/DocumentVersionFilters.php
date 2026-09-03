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
            // 🟢 Usamos un nombre de columna string puro en Group::make()
            Group::make('id')
                ->label('Estado de Vigencia')
                ->collapsible()
                ->orderQueryUsing(function (Builder $query, string $direction) {
                    // Ordenamos en SQL Server calculando si el id de la versión es el máximo registrado para ese documento
                    return $query->orderByRaw("(CASE WHEN document_versions.id = (
                        SELECT MAX(dv.id) 
                        FROM document_versions dv 
                        WHERE dv.document_id = document_versions.document_id
                    ) THEN 1 ELSE 2 END) {$direction}");
                })
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
                    default => ucfirst($record->status ?? 'Desconocido'),
                }),

            Group::make('document.name')
                ->label('Nombre de documento')
                ->collapsible(),
        ];
    }
}