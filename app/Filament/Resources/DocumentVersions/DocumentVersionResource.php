<?php

namespace App\Filament\Resources\DocumentVersions;

use App\Filament\Resources\DocumentVersions\Pages\CreateDocumentVersion;
use App\Filament\Resources\DocumentVersions\Pages\EditDocumentVersion;
use App\Filament\Resources\DocumentVersions\Pages\ListDocumentVersions;
use App\Filament\Resources\DocumentVersions\Schemas\DocumentVersionForm;
use App\Filament\Resources\DocumentVersions\Tables\DocumentVersionsTable;
use App\Models\DocumentVersion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DocumentVersionResource extends Resource
{
    protected static ?string $model = DocumentVersion::class;

    // Cambia estas dos propiedades estáticas dentro de tu DocumentVersionResource:

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentArrowUp;

    public static function getPluralModelLabel(): string
    {
        return 'Historial de Versiones';
    }

    protected static ?string $recordTitleAttribute = 'DocumentVersion';

    public static function form(Schema $schema): Schema
    {
        return DocumentVersionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocumentVersionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDocumentVersions::route('/'),
            'create' => CreateDocumentVersion::route('/create'),
            'edit' => EditDocumentVersion::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        // Si no hay ningún usuario logueado por seguridad solo devolvemos los aprobados
        if (!$user) {
            return $query->where('status', 'aprobado');
        }

        // [ R ] RESPONSABLE: Les aparece draft, terminado, revisado y aprobado (Es decir, todos)
        if ($user->default_raci_type === 'R') {
            return $query->whereIn('status', ['draft', 'terminado', 'revisado', 'aprobado']);
        }

        // [ A ] AUTORIDAD (CISO): Les aparece revisado y aprobado
        if ($user->default_raci_type === 'A') {
            return $query->whereIn('status', ['revisado', 'aprobado']);
        }

        // [ C ] CONSULTADO (Auditor): Les aparece terminado y aprobado
        if ($user->default_raci_type === 'C') {
            return $query->whereIn('status', ['terminado', 'aprobado']);
        }

        // [ I ] INFORMADO: Les aparece únicamente aprobado
        if ($user->default_raci_type === 'I') {
            return $query->where('status', 'aprobado');
        }

        // Fallback de seguridad por si existe otro rol no contemplado
        return $query;
    }
}