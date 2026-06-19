<?php

namespace App\Filament\Resources\DocumentVersions\Tables;

use Filament\Tables\Table;
use App\Filament\Resources\DocumentVersions\Tables\Columns\DocumentVersionColumns;
use App\Filament\Resources\DocumentVersions\Tables\Filters\DocumentVersionFilters;
use App\Filament\Resources\DocumentVersions\Tables\Actions\DocumentVersionActions;

class DocumentVersionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns(DocumentVersionColumns::make())
            ->filters(DocumentVersionFilters::makeSelectFilters())
            ->groups(DocumentVersionFilters::makeGroups())
            ->collapsedGroupsByDefault()
            ->actions(DocumentVersionActions::makeRowActions())
            ->bulkActions(DocumentVersionActions::makeBulkActions());
    }
}