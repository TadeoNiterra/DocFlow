<?php

namespace App\Filament\Resources\FormatoIt04s;

use App\Filament\Resources\FormatoIt04s\Pages;
use App\Filament\Resources\FormatoIt04s\Schemas\FormatoIt04Form;
use App\Filament\Resources\FormatoIt04s\Tables\FormatoIt04sTable;
use App\Models\FormatoIt04;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;

class FormatoIt04Resource extends Resource
{
    protected static ?string $model = FormatoIt04::class;

    // 📌 Configuración de Navegación v5
    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedComputerDesktop;
    protected static ?string $navigationLabel = 'F-IT-04 Desmantelamiento';
    protected static ?string $modelLabel = 'Formato F-IT-04';
    protected static ?string $pluralModelLabel = 'Formatos F-IT-04';

    public static function form(Schema $schema): Schema
    {
        return FormatoIt04Form::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormatoIt04sTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormatoIt04s::route('/'),
            'create' => Pages\CreateFormatoIt04::route('/create'),
            'edit' => Pages\EditFormatoIt04::route('/{record}/edit'),
        ];
    }
}