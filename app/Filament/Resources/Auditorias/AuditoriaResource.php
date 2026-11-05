<?php

namespace App\Filament\Resources\Auditorias;

use App\Filament\Resources\Auditorias\AuditoriaResource\RelationManagers\EvidenciasRelationManager;
use App\Filament\Resources\Auditorias\Pages\ListAuditorias;
use App\Filament\Resources\Auditorias\Pages\CreateAuditoria;
use App\Filament\Resources\Auditorias\Pages\EditAuditoria;
use App\Models\Auditoria;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class AuditoriaResource extends Resource
{
    protected static ?string $model = Auditoria::class;

    protected static UnitEnum|string|null $navigationGroup = 'Inventarios';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'Auditorías';
    protected static ?string $modelLabel = 'Auditoría';
    protected static ?string $pluralModelLabel = 'Auditorías';

    public static function form(Schema $form): Schema
    {
        return $form
            ->columns(1)
            ->schema([
                Section::make('Datos de la Auditoría')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nombre')
                                ->label('Nombre de la Auditoría')
                                ->placeholder('Ej. Auditoría Interna Q4')
                                ->required()
                                ->maxLength(255),

                            DatePicker::make('fecha')
                                ->label('Fecha')
                                ->required()
                                ->default(now()),
                        ]),

                        Grid::make(2)->schema([
                            Select::make('tipo')
                                ->label('Tipo de Auditoría')
                                ->options([
                                    'INTERNA' => 'Interna',
                                    'EXTERNA' => 'Externa',
                                    'CERTIFICACION' => 'Certificación',
                                    'SEGUIMIENTO' => 'Seguimiento',
                                ])
                                ->default('INTERNA')
                                ->required(),

                            Select::make('estatus')
                                ->label('Estatus')
                                ->options([
                                    'PROGRAMADA' => 'Programada',
                                    'EN_PROCESO' => 'En Proceso',
                                    'CONCLUIDA' => 'Concluida',
                                ])
                                ->default('PROGRAMADA')
                                ->required(),
                        ]),

                        Textarea::make('comentarios')
                            ->label('Comentarios / Alcance')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->label('Auditoría')
                    ->searchable()
                    ->weight('bold')
                    ->sortable(),

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('estatus')
                    ->label('Estatus')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'CONCLUIDA' => 'success',
                        'EN_PROCESO' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('evidencias_count')
                    ->counts('evidencias')
                    ->label('Archivos')
                    ->badge()
                    ->color('primary'),
            ])
            ->defaultSort('fecha', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            EvidenciasRelationManager::class, // <-- Vinculación de la tabla de archivos
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAuditorias::route('/'),
            'create' => CreateAuditoria::route('/create'),
            'edit' => EditAuditoria::route('/{record}/edit'),
        ];
    }
}