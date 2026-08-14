<?php

namespace App\Filament\Resources\FormatoIt02Categorias;

use App\Filament\Resources\FormatoIt02Categorias\Pages\ListFormatoIt02Categorias;
use App\Models\FormatoIt02Categoria;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FormatoIt02CategoriaResource extends Resource
{
    protected static ?string $model = FormatoIt02Categoria::class;

    protected static UnitEnum|string|null $navigationGroup = 'F-IT-02 Matriz Derechos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::QueueList;

    protected static ?string $navigationLabel = '2. Categorías y Funciones';

    protected static ?string $modelLabel = 'Categoría';

    protected static ?string $pluralModelLabel = 'Categorías y Funciones';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('matriz_tipo')
                ->label('Matriz Perteneciente')
                ->options([
                    'funciones' => 'Matriz 1: Funciones y Permisos',
                    'recursos'  => 'Matriz 2: Recursos de Acceso',
                ])
                ->required(),

            TextInput::make('nombre')
                ->label('Nombre de la Categoría')
                ->placeholder('Ej: Funciones y permisos de uso de software')
                ->required(),

            TextInput::make('orden')
                ->numeric()
                ->default(0),

            Repeater::make('funciones')
                ->relationship('funciones')
                ->schema([
                    TextInput::make('nombre')
                        ->label('Función / Recurso')
                        ->required()
                        ->columnSpan(4),

                    TextInput::make('orden')
                        ->numeric()
                        ->default(0)
                        ->columnSpan(1),
                ])
                ->columns(5)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('matriz_tipo')->badge(),
            TextColumn::make('nombre')->searchable(),
            TextColumn::make('funciones_count')->counts('funciones')->label('Total Funciones'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt02Categorias::route('/'),
        ];
    }
}