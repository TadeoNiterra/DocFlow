<?php

namespace App\Filament\Widgets;

use App\Models\Puesto;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PuestosTableWidget extends BaseWidget
{
    protected static ?string $heading = 'Catálogo de Puestos y Rangos';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Puesto::query())
            ->columns([
                TextColumn::make('codigo')
                    ->label('Código')
                    ->badge()
                    ->color('warning')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nombre')
                    ->label('Nombre del Puesto')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('colaboradores_count')
                    ->label('Colaboradores Asignados')
                    ->counts('colaboradores')
                    ->badge()
                    ->color('info')
                    ->alignCenter(),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->placeholder('Sin descripción'),
            ])
            ->headerActions([
                CreateAction::make('crear_puesto')
                    ->label('Nuevo Puesto')
                    ->modalHeading('Crear Nuevo Puesto')
                    ->modalWidth('lg')
                    ->form([
                        TextInput::make('codigo')
                            ->label('Código del Puesto')
                            ->placeholder('Ej. MGR, SUP, STF')
                            ->required()
                            ->unique(Puesto::class, 'codigo'),
                        TextInput::make('nombre')
                            ->label('Nombre del Puesto')
                            ->placeholder('Ej. MANAGER')
                            ->required()
                            ->unique(Puesto::class, 'nombre'),
                        Textarea::make('descripcion')
                            ->label('Descripción')
                            ->columnSpanFull(),
                    ]),
            ])
            ->actions([
                EditAction::make()
                    ->modalHeading('Editar Puesto')
                    ->form([
                        TextInput::make('codigo')->required(),
                        TextInput::make('nombre')->required(),
                        Textarea::make('descripcion')->columnSpanFull(),
                    ]),
                DeleteAction::make(),
            ]);
    }
}