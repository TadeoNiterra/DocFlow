<?php

namespace App\Filament\Resources\FormatoIt02Permisos;

use App\Filament\Resources\FormatoIt02Permisos\Pages\ListFormatoIt02Permisos;
use App\Models\FormatoIt02Funcion;
use App\Models\FormatoIt02Permiso;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class FormatoIt02PermisoResource extends Resource
{
    protected static ?string $model = FormatoIt02Permiso::class;

    protected static UnitEnum|string|null $navigationGroup = 'F-IT-02 Matriz Derechos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShieldCheck;

    protected static ?string $navigationLabel = '3. Asignación de Permisos';

    protected static ?string $modelLabel = 'Asignación';

    protected static ?string $pluralModelLabel = 'Asignación de Permisos';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('rol_id')
                ->label('Rol / Puesto')
                ->relationship('rol', 'nombre')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('funcion_id')
                ->label('Función o Recurso')
                ->options(function () {
                    return FormatoIt02Funcion::with('categoria')->get()->mapWithKeys(function ($funcion) {
                        return [$funcion->id => "[{$funcion->categoria?->nombre}] {$funcion->nombre}"];
                    });
                })
                ->searchable()
                ->required(),

            Select::make('valor')
                ->label('Permiso Otorgado')
                ->options([
                    'D' => 'Derecho (D)',
                    'P' => 'Privilegio (P)',
                    'N' => 'No Aplicable (N)',
                ])
                ->default('D')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rol.nombre')
                    ->label('Rol / Puesto')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('funcion.categoria.nombre')
                    ->label('Categoría')
                    ->sortable(),

                TextColumn::make('funcion.nombre')
                    ->label('Función / Recurso')
                    ->searchable(),

                BadgeColumn::make('valor')
                    ->label('Permiso')
                    ->colors([
                        'info'    => 'D',
                        'danger'  => 'P',
                        'gray'    => 'N',
                    ])
                    ->alignCenter(),
            ])
            ->headerActions([
                Action::make('descargar_pdf')
                    ->label('Exportar Matriz PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->url(route('formato-it02.pdf'))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormatoIt02Permisos::route('/'),
        ];
    }
}