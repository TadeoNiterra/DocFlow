<?php

namespace App\Filament\Resources\EstructuraOrganizacionals\Pages;

use App\Filament\Resources\EstructuraOrganizacionals\EstructuraOrganizacionalResource;
use App\Filament\Widgets\PuestosTableWidget;
use App\Models\Departamento;
use App\Models\Puesto;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ManageRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ManageEstructuraOrganizacionals extends ManageRecords
{
    protected static string $resource = EstructuraOrganizacionalResource::class;


    /**
     * Declara los widgets que se mostrarán al pie de la página
     */
    protected function getFooterWidgets(): array
    {
        return [
            PuestosTableWidget::class,
        ];
    }
    
    /**
     * Acciones superiores para crear registros en Modal
     */
    protected function getHeaderActions(): array
    {
        return [
            // Modal para Crear Departamento
            CreateAction::make()
                ->label('Nuevo Departamento')
                ->modalHeading('Crear Departamento') // Correcto para Filament v3
                ->modalWidth('lg')
                ->form([
                    TextInput::make('codigo')
                        ->label('Código / Clave')
                        ->placeholder('Ej. IT, SCM, TRAF')
                        ->required()
                        ->unique(Departamento::class, 'codigo'),
                    TextInput::make('nombre')
                        ->label('Nombre del Departamento')
                        ->placeholder('Ej. Tecnologías de la Información')
                        ->required()
                        ->unique(Departamento::class, 'nombre'),
                    Textarea::make('descripcion')
                        ->label('Descripción')
                        ->columnSpanFull(),
                ]),
        ];
    }

    /**
     * Tabla principal de Departamentos
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('codigo')
                    ->label('Código')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nombre')
                    ->label('Nombre del Departamento')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('colaboradores_count')
                    ->label('Colaboradores')
                    ->counts('colaboradores')
                    ->badge()
                    ->color('success')
                    ->alignCenter(),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->placeholder('Sin descripción'),
            ])
            ->actions([
                EditAction::make()
                    ->modalHeading('Editar Departamento') // Correcto para Filament v3
                    ->form([
                        TextInput::make('codigo')->required(),
                        TextInput::make('nombre')->required(),
                        Textarea::make('descripcion')->columnSpanFull(),
                    ]),
                DeleteAction::make(),
            ]);
    }
}