<?php

namespace App\Filament\Resources\ModeloEquipos;

use App\Filament\Resources\ModeloEquipos\Pages\CreateModeloEquipo;
use App\Filament\Resources\ModeloEquipos\Pages\EditModeloEquipo;
use App\Filament\Resources\ModeloEquipos\Pages\ListModeloEquipos;
use App\Filament\Resources\ModeloEquipos\Schemas\ModeloEquipoForm;
use App\Filament\Resources\ModeloEquipos\Tables\ModeloEquiposTable;
use App\Models\ModeloEquipo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ModeloEquipoResource extends Resource
{
    protected static ?string $model = ModeloEquipo::class;
    protected static UnitEnum|string|null $navigationGroup = 'Inventarios';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::PuzzlePiece;


    
    protected static ?string $navigationLabel = 'Modelos de Equipos';

    protected static ?string $modelLabel = 'Modelo de Equipo';

    protected static ?string $pluralModelLabel = 'Modelos de Equipos';

    public static function form(Schema $schema): Schema
    {
        return ModeloEquipoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModeloEquiposTable::configure($table);
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
            'index' => ListModeloEquipos::route('/'),
            'create' => CreateModeloEquipo::route('/create'),
            'edit' => EditModeloEquipo::route('/{record}/edit'),
        ];
    }
}