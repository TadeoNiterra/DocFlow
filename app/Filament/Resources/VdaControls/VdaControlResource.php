<?php

namespace App\Filament\Resources\VdaControls;

use App\Filament\Resources\VdaControls\Pages\CreateVdaControl;
use App\Filament\Resources\VdaControls\Pages\EditVdaControl;
use App\Filament\Resources\VdaControls\Pages\ListVdaControls;
use App\Filament\Resources\VdaControls\Schemas\VdaControlForm;
use App\Filament\Resources\VdaControls\Tables\VdaControlsTable;
use App\Models\VdaControl;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VdaControlResource extends Resource
{
    protected static ?string $model = VdaControl::class;

    // 🚀 Icono oficial de escudo/cumplimiento normativo
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    protected static ?string $navigationLabel = 'Estructura VDA / TISAX';
    protected static ?string $modelLabel = 'Control VDA';
    protected static ?string $pluralModelLabel = 'Controles VDA';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return VdaControlForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // 🚀 Pasamos la tabla directamente al configurador estático sin Clousures intermedios
        return VdaControlsTable::configure($table);
    }

    /**
     * 🛡️ Bloquea la creación manual desde la interfaz para proteger la norma sembrada
     */
    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVdaControls::route('/'),
            'create' => CreateVdaControl::route('/create'),
            'edit' => EditVdaControl::route('/{record}/edit'),
        ];
    }
}