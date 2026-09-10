<?php

namespace App\Filament\Resources\SoftwareLists;

use App\Filament\Resources\SoftwareLists\Pages\CreateSoftwareList;
use App\Filament\Resources\SoftwareLists\Pages\EditSoftwareList;
use App\Filament\Resources\SoftwareLists\Pages\ListSoftwareLists;
use App\Filament\Resources\SoftwareLists\Schemas\SoftwareListForm;
use App\Filament\Resources\SoftwareLists\Tables\SoftwareListsTable;
use App\Models\SoftwareList;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SoftwareListResource extends Resource
{
    protected static ?string $model = SoftwareList::class;

    protected static UnitEnum|string|null $navigationGroup = 'Inventarios';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $recordTitleAttribute = 'Software';
    
    protected static ?string $modelLabel = 'Software';
    
    protected static ?string $pluralModelLabel = 'Listado de Software';
    

    public static function form(Schema $schema): Schema
    {
        return SoftwareListForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SoftwareListsTable::configure($table);
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
            'index' => ListSoftwareLists::route('/'),
            'create' => CreateSoftwareList::route('/create'),
            'edit' => EditSoftwareList::route('/{record}/edit'),
        ];
    }
}