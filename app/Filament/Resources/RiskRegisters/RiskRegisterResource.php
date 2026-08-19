<?php

namespace App\Filament\Resources\RiskRegisters;

use App\Filament\Resources\RiskRegisters\Pages\CreateRiskRegister;
use App\Filament\Resources\RiskRegisters\Pages\EditRiskRegister;
use App\Filament\Resources\RiskRegisters\Pages\ListRiskRegisters;
use App\Filament\Resources\RiskRegisters\Pages\ViewRiskRegister;
use App\Filament\Resources\RiskRegisters\Schemas\RiskRegisterForm;
use App\Filament\Resources\RiskRegisters\Schemas\RiskRegisterInfolist;
use App\Filament\Resources\RiskRegisters\Tables\RiskRegistersTable;
use App\Models\RiskRegister;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RiskRegisterResource extends Resource
{
    protected static ?string $model = RiskRegister::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'F-IT-05 Matriz de Riesgos';

    protected static ?string $recordTitleAttribute = 'code_id';

    protected static ?string $modelLabel = 'Riesgo';

    protected static ?string $pluralModelLabel = 'Matriz de Riesgos (F-IT-05)';

    public static function form(Schema $schema): Schema
    {
        return RiskRegisterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RiskRegisterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RiskRegistersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRiskRegisters::route('/'),
            'create' => CreateRiskRegister::route('/create'),
            'view' => ViewRiskRegister::route('/{record}'),
            'edit' => EditRiskRegister::route('/{record}/edit'),
        ];
    }
}