<?php

namespace App\Filament\Resources\UserDeletionControls;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Models\UserDeletionControl;
use App\Filament\Resources\UserDeletionControls\Pages\EditUserDeletionControl;
use App\Filament\Resources\UserDeletionControls\Pages\ListUserDeletionControls;
use App\Filament\Resources\UserDeletionControls\Pages\CreateUserDeletionControl;
use App\Filament\Resources\UserDeletionControls\Schemas\UserDeletionControlForm;
use App\Filament\Resources\UserDeletionControls\Tables\UserDeletionControlsTable;
use App\Filament\Resources\UserDeletionControls\Schemas\UserDeletionControlInfolist;
use UnitEnum;

class UserDeletionControlResource extends Resource
{
    protected static ?string $model = UserDeletionControl::class;

    protected static UnitEnum|string|null $navigationGroup = 'Formatos SGSI';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $recordTitleAttribute = 'usuario';

    protected static ?string $modelLabel = 'Control de Eliminación';

    protected static ?string $pluralModelLabel = 'F-IT-21 Control de Eliminación de Usuarios';

    public static function form(Schema $schema): Schema
    {
        return UserDeletionControlForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserDeletionControlInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserDeletionControlsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserDeletionControls::route('/'),
            'create' => CreateUserDeletionControl::route('/create'),
            'edit' => EditUserDeletionControl::route('/{record}/edit'),
        ];
    }
}