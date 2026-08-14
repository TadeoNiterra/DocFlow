<?php

namespace App\Filament\Resources\FormatoIt14Soportes;

use App\Filament\Resources\FormatoIt14Soportes\Pages\ListFormatoIt14Soportes;
use App\Filament\Resources\FormatoIt14Soportes\Tables\FormatoIt14SoportesTable;
use App\Models\FormatoIt14Soporte;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FormatoIt14SoporteResource extends Resource
{
    protected static ?string $model = FormatoIt14Soporte::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static ?string $navigationLabel = 'F-IT-14 Control Soporte';

    protected static ?string $modelLabel = 'Registro de Soporte';

    protected static ?string $pluralModelLabel = 'Control de Registros de Soporte';

    public static function table(Table $table): Table
    {
        return FormatoIt14SoportesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt14Soportes::route('/'),
        ];
    }
}