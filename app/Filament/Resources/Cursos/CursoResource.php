<?php

namespace App\Filament\Resources\Cursos;

use App\Filament\Resources\Cursos\Pages\CreateCurso;
use App\Filament\Resources\Cursos\Pages\EditCurso;
use App\Filament\Resources\Cursos\Pages\ListCursos;
use App\Filament\Resources\Cursos\RelationManagers\EvidenciasRelationManager;
use App\Models\Curso;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class CursoResource extends Resource
{
    protected static ?string $model = Curso::class;

    
    protected static UnitEnum|string|null $navigationGroup = 'Inventarios';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;
    protected static ?string $navigationLabel = 'Cursos';
    protected static ?string $modelLabel = 'Curso';
    protected static ?string $pluralModelLabel = 'Cursos';

    public static function form(Schema $schema): Schema
    {
        return $schema->columns(1)
            ->schema([
                Section::make('Información del Curso')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('nombre')
                                ->label('Nombre del Curso')
                                ->placeholder('Ej. Concientización de Seguridad de la Información')
                                ->required()
                                ->maxLength(255),

                            TextInput::make('instructor')
                                ->label('Instructor / Proveedor')
                                ->placeholder('Ej. IT Security Team / Consultoría Externa')
                                ->maxLength(255),
                        ]),

                        Grid::make(3)->schema([
                            DatePicker::make('fecha_inicio')
                                ->label('Fecha de Inicio')
                                ->required()
                                ->default(now()),

                            DatePicker::make('fecha_fin')
                                ->label('Fecha de Fin'),

                            TextInput::make('horas_duracion')
                                ->label('Duración (Horas)')
                                ->numeric()
                                ->minValue(1)
                                ->placeholder('Ej. 8'),
                        ]),

                        Grid::make(2)->schema([
                            Select::make('modalidad')
                                ->label('Modalidad')
                                ->options([
                                    'PRESENCIAL' => 'Presencial',
                                    'EN_LINEA' => 'En Línea / Virtual',
                                    'HIBRIDO' => 'Híbrido',
                                ])
                                ->default('PRESENCIAL')
                                ->required(),

                            Select::make('estatus')
                                ->label('Estatus')
                                ->options([
                                    'PROGRAMADO' => 'Programado',
                                    'EN_CURSO' => 'En Curso',
                                    'COMPLETADO' => 'Completado',
                                    'CANCELADO' => 'Cancelado',
                                ])
                                ->default('PROGRAMADO')
                                ->required(),
                        ]),

                        Textarea::make('comentarios')
                            ->label('Objetivo / Temas / Observaciones')
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
                    ->label('Curso')
                    ->searchable()
                    ->weight('bold')
                    ->sortable(),

                TextColumn::make('instructor')
                    ->label('Instructor')
                    ->searchable()
                    ->placeholder('N/A'),

                TextColumn::make('fecha_inicio')
                    ->label('Inicio')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('modalidad')
                    ->label('Modalidad')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('estatus')
                    ->label('Estatus')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'COMPLETADO' => 'success',
                        'EN_CURSO' => 'warning',
                        'CANCELADO' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('evidencias_count')
                    ->counts('evidencias')
                    ->label('Evidencias')
                    ->badge()
                    ->color('primary'),
            ])
            ->defaultSort('fecha_inicio', 'desc')
            ->filters([
                SelectFilter::make('estatus')
                    ->options([
                        'PROGRAMADO' => 'Programado',
                        'EN_CURSO' => 'En Curso',
                        'COMPLETADO' => 'Completado',
                        'CANCELADO' => 'Cancelado',
                    ]),
                SelectFilter::make('modalidad')
                    ->options([
                        'PRESENCIAL' => 'Presencial',
                        'EN_LINEA' => 'En Línea',
                        'HIBRIDO' => 'Híbrido',
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            EvidenciasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCursos::route('/'),
            'create' => CreateCurso::route('/create'),
            'edit' => EditCurso::route('/{record}/edit'),
        ];
    }
}