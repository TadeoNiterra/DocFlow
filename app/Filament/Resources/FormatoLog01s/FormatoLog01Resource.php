<?php

namespace App\Filament\Resources\FormatoLog01s;

use App\Filament\Resources\FormatoLog01s\Pages\CreateFormatoLog01;
use App\Filament\Resources\FormatoLog01s\Pages\EditFormatoLog01;
use App\Filament\Resources\FormatoLog01s\Pages\ListFormatoLog01s;
use App\Filament\Resources\FormatoLog01s\Schemas\FormatoLog01Form;
use App\Filament\Resources\FormatoLog01s\Tables\FormatoLog01sTable;
use App\Models\FormatoLog01;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FormatoLog01Resource extends Resource
{
    protected static ?string $model = FormatoLog01::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;
    protected static ?string $navigationLabel = 'F-LOG-(T)-01 Eval. Proveedores';
    protected static ?string $modelLabel = 'F-LOG-(T)-01';
    protected static ?string $pluralModelLabel = 'Evaluaciones F-LOG-(T)-01';

    protected static ?string $recordTitleAttribute = 'FormatoLog01';

    public static function form(Schema $schema): Schema
    {
        return FormatoLog01Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormatoLog01sTable::configure($table);
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
            'index' => ListFormatoLog01s::route('/'),
            'create' => CreateFormatoLog01::route('/create'),
            'edit' => EditFormatoLog01::route('/{record}/edit'),
        ];
    }

}