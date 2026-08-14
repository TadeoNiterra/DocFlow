<?php

namespace App\Filament\Resources\FormatoIt18Plans;

use App\Filament\Resources\FormatoIt18Plans\Pages\CreateFormatoIt18Plan;
use App\Filament\Resources\FormatoIt18Plans\Pages\EditFormatoIt18Plan;
use App\Filament\Resources\FormatoIt18Plans\Pages\ListFormatoIt18Plans;
use App\Filament\Resources\FormatoIt18Plans\Schemas\FormatoIt18PlanForm;
use App\Filament\Resources\FormatoIt18Plans\Tables\FormatoIt18PlansTable;
use App\Models\FormatoIt18Plan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FormatoIt18PlanResource extends Resource
{
    protected static ?string $model = FormatoIt18Plan::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'F-IT-18 Plan PER';

    protected static ?string $modelLabel = 'Plan PER';

    protected static ?string $pluralModelLabel = 'F-IT-18 Plans Específicos de Recuperación';

    public static function form(Schema $schema): Schema
    {
        return FormatoIt18PlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormatoIt18PlansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListFormatoIt18Plans::route('/'),
            'create' => CreateFormatoIt18Plan::route('/create'),
            'edit'   => EditFormatoIt18Plan::route('/{record}/edit'),
        ];
    }
}