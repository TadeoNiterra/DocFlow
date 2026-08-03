<?php

namespace App\Filament\Resources\FormatoIt09Proyectos;

use App\Filament\Resources\FormatoIt09Proyectos\Pages\CreateFormatoIt09Proyecto;
use App\Filament\Resources\FormatoIt09Proyectos\Pages\EditFormatoIt09Proyecto;
use App\Filament\Resources\FormatoIt09Proyectos\Pages\ListFormatoIt09Proyectos;
use App\Filament\Resources\FormatoIt09Proyectos\Schemas\FormatoIt09ProyectoForm;
use App\Filament\Resources\FormatoIt09Proyectos\Tables\FormatoIt09ProyectosTable;
use App\Models\FormatoIt09Proyecto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Support\Icons\Heroicon;

class FormatoIt09ProyectoResource extends Resource
{
    protected static ?string $model = FormatoIt09Proyecto::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static ?string $navigationLabel = 'F-IT-09 Riesgos de Proyecto';

    protected static ?string $modelLabel = 'Análisis de Riesgos';

    protected static ?string $pluralModelLabel = 'Análisis de Riesgos de Proyecto';

    public static function form(Schema $schema): Schema
    {
        return FormatoIt09ProyectoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormatoIt09ProyectosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt09Proyectos::route('/'),
            'create' => CreateFormatoIt09Proyecto::route('/create'),
            'edit' => EditFormatoIt09Proyecto::route('/{record}/edit'),
        ];
    }
}