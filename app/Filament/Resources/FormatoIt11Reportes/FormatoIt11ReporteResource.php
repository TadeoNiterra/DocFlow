<?php

namespace App\Filament\Resources\FormatoIt11Reportes;

use App\Filament\Resources\FormatoIt11Reportes\Pages\CreateFormatoIt11Reporte;
use App\Filament\Resources\FormatoIt11Reportes\Pages\EditFormatoIt11Reporte;
use App\Filament\Resources\FormatoIt11Reportes\Pages\ListFormatoIt11Reportes; // 👈 Con "s" al final
use App\Filament\Resources\FormatoIt11Reportes\Schemas\FormatoIt11ReporteForm; // 👈 Nombre actualizado
use App\Filament\Resources\FormatoIt11Reportes\Tables\FormatoIt11ReportesTable;
use App\Models\FormatoIt11Reporte;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Support\Icons\Heroicon;

class FormatoIt11ReporteResource extends Resource
{
    protected static ?string $model = FormatoIt11Reporte::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'F-IT-11 Prueba Continuidad';

    protected static ?string $modelLabel = 'Reporte de Prueba de Continuidad';

    protected static ?string $pluralModelLabel = 'Reportes de Prueba de Continuidad';

    public static function form(Schema $schema): Schema
    {
        return FormatoIt11ReporteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormatoIt11ReportesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt11Reportes::route('/'), // 👈 Con "s" al final
            'create' => CreateFormatoIt11Reporte::route('/create'),
            'edit' => EditFormatoIt11Reporte::route('/{record}/edit'),
        ];
    }
}