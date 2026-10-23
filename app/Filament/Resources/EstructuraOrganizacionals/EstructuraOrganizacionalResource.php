<?php

namespace App\Filament\Resources\EstructuraOrganizacionals;

use App\Filament\Resources\EstructuraOrganizacionals\Pages\ManageEstructuraOrganizacionals;
use App\Filament\Widgets\PuestosTableWidget;
use App\Models\Departamento;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class EstructuraOrganizacionalResource extends Resource
{
    protected static ?string $model = Departamento::class;

    protected static UnitEnum|string|null $navigationGroup = 'Inventarios';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $navigationLabel = 'Departamentos y Puestos';

    protected static ?string $modelLabel = 'Departamento';

    protected static ?string $pluralModelLabel = 'Departamentos';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Departamento')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Departamento')
            ->columns([
                TextColumn::make('Departamento')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function getFooterWidgets(): array
    {
        return [
            PuestosTableWidget::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => ManageEstructuraOrganizacionals::route('/'),
        ];
    }

}