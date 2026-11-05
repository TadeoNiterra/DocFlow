<?php

namespace App\Filament\Resources\ChecklistEquipos;

use App\Filament\Resources\ChecklistEquipos\Pages\CreateChecklistEquipo;
use App\Filament\Resources\ChecklistEquipos\Pages\EditChecklistEquipo;
use App\Filament\Resources\ChecklistEquipos\Pages\ListChecklistEquipos;
use App\Filament\Resources\ChecklistEquipos\Schemas\ChecklistEquipoForm;
use App\Filament\Resources\ChecklistEquipos\Tables\ChecklistEquiposTable;
use App\Models\ChecklistEquipo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ChecklistEquipoResource extends Resource
{
    protected static ?string $model = ChecklistEquipo::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'F-IT-03 Checklist de Equipos';
    public static function form(Schema $schema): Schema
    {
        return ChecklistEquipoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChecklistEquiposTable::configure($table);
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
            'index' => ListChecklistEquipos::route('/'),
            'create' => CreateChecklistEquipo::route('/create'),
            'edit' => EditChecklistEquipo::route('/{record}/edit'),
        ];
    }
}