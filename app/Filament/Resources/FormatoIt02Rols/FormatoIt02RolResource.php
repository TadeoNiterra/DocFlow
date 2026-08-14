<?php

namespace App\Filament\Resources\FormatoIt02Rols;

use App\Filament\Resources\FormatoIt02Rols\Pages\ListFormatoIt02Rols;
use App\Models\FormatoIt02Rol;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FormatoIt02RolResource extends Resource
{
    protected static ?string $model = FormatoIt02Rol::class;

    protected static UnitEnum|string|null $navigationGroup = 'F-IT-02 Matriz Derechos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $navigationLabel = '1. Gestión de Roles';

    protected static ?string $modelLabel = 'Rol';

    protected static ?string $pluralModelLabel = 'Roles / Puestos';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nombre')
                ->label('Nombre del Rol / Puesto')
                ->placeholder('Ej: GERENTE DE SISTEMAS')
                ->required(),

            TextInput::make('orden')
                ->label('Orden de Columna')
                ->numeric()
                ->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('orden')->sortable(),
                TextColumn::make('nombre')->searchable()->sortable(),
            ])
            ->defaultSort('orden');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt02Rols::route('/'),
        ];
    }
}