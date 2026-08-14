<?php

namespace App\Filament\Resources\FormatoIt13Evidencias;

use App\Filament\Resources\FormatoIt13Evidencias\Pages\ListFormatoIt13Evidencias;
use App\Filament\Resources\FormatoIt13Evidencias\Tables\FormatoIt13EvidenciasTable;
use App\Models\FormatoIt13Evidencia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FormatoIt13EvidenciaResource extends Resource
{
    protected static ?string $model = FormatoIt13Evidencia::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static ?string $navigationLabel = 'F-IT-13 Evidencias BD';

    protected static ?string $modelLabel = 'Evidencia de BD';

    protected static ?string $pluralModelLabel = 'F-IT-13 Evidencias de BD';

    public static function table(Table $table): Table
    {
        return FormatoIt13EvidenciasTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt13Evidencias::route('/'),
        ];
    }
}