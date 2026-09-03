<?php

namespace App\Filament\Resources\FormatoIt22Evaluations;

use App\Filament\Resources\FormatoIt22Evaluations\Pages;
use App\Filament\Resources\FormatoIt22Evaluations\Schemas\FormatoIt22EvaluationForm;
use App\Filament\Resources\FormatoIt22Evaluations\Tables\FormatoIt22EvaluationsTable;
use App\Models\FormatoIt22Evaluation;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use UnitEnum;

class FormatoIt22EvaluationResource extends Resource
{
    protected static ?string $model = FormatoIt22Evaluation::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;
    protected static ?string $navigationLabel = 'F-IT-22 Eval. Proveedores';
    protected static ?string $modelLabel = 'Formato F-IT-22';
    protected static ?string $pluralModelLabel = 'Formatos F-IT-22';

    public static function form(Schema $schema): Schema
    {
        return FormatoIt22EvaluationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormatoIt22EvaluationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListFormatoIt22Evaluations::route('/'),
            'create' => Pages\CreateFormatoIt22Evaluation::route('/create'),
            'edit'   => Pages\EditFormatoIt22Evaluation::route('/{record}/edit'),
        ];
    }
}