<?php

namespace App\Filament\Resources\Recertificacions;

use App\Filament\Resources\Recertificacions\Pages\CreateRecertificacion;
use App\Filament\Resources\Recertificacions\Pages\EditRecertificacion;
use App\Filament\Resources\Recertificacions\Pages\ListRecertificacions;
use App\Filament\Resources\Recertificacions\RelationManagers\DetallesRelationManager;
use App\Filament\Resources\Recertificacions\Schemas\RecertificacionForm;
use App\Filament\Resources\Recertificacions\Tables\RecertificacionsTable;
use App\Models\Recertificacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RecertificacionResource extends Resource
{
    protected static ?string $model = Recertificacion::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'Recertificación de Cuentas';

    public static function form(Schema $schema): Schema
    {
        return RecertificacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecertificacionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            DetallesRelationManager::class,
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => ListRecertificacions::route('/'),
            'create' => CreateRecertificacion::route('/create'),
            'edit' => EditRecertificacion::route('/{record}/edit'),
        ];
    }
}