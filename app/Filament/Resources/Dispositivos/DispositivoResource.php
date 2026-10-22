<?php

namespace App\Filament\Resources\Dispositivos;

use App\Filament\Resources\Dispositivos\Pages\CreateDispositivo;
use App\Filament\Resources\Dispositivos\Pages\EditDispositivo;
use App\Filament\Resources\Dispositivos\Pages\ListDispositivos;
use App\Filament\Resources\Dispositivos\Schemas\DispositivoForm;
use App\Filament\Resources\Dispositivos\Tables\DispositivosTable;
use App\Models\Dispositivo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DispositivoResource extends Resource
{
    protected static ?string $model = Dispositivo::class;

    protected static UnitEnum|string|null $navigationGroup = 'Inventarios';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ComputerDesktop;


    protected static ?string $navigationLabel = 'Dispositivos';

    protected static ?string $modelLabel = 'Dispositivo';

    protected static ?string $pluralModelLabel = 'Dispositivos';

    public static function form(Schema $schema): Schema
    {
        return DispositivoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DispositivosTable::configure($table);
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
            'index' => ListDispositivos::route('/'),
            'create' => CreateDispositivo::route('/create'),
            'edit' => EditDispositivo::route('/{record}/edit'),
        ];
    }
}