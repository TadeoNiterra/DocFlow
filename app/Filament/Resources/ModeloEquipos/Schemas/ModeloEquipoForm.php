<?php

namespace App\Filament\Resources\ModeloEquipos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ModeloEquipoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Modelo de Hardware')
                    ->description('Definición de plantilla técnica para inventario de equipos')
                    ->schema([
                        Select::make('tipo')
                            ->label('Tipo de Dispositivo')
                            ->options([
                                'Laptop' => 'Laptop',
                                'Desktop' => 'Desktop / CPU',
                                'iPhone' => 'iPhone',
                                'Android' => 'Smartphone Android',
                                'Monitor' => 'Monitor',
                            ])
                            ->required()
                            ->live(), // Hace reactivas las secciones inferiores

                        TextInput::make('marca')
                            ->label('Marca')
                            ->required()
                            ->placeholder('Ej. Lenovo, Apple, Dell, Honor'),

                        TextInput::make('modelo')
                            ->label('Modelo')
                            ->required()
                            ->placeholder('Ej. ThinkPad T16, iPhone 14 128GB, X8A'),

                        Select::make('type_laptop')
                            ->label('Categoría de Equipo')
                            ->options([
                                'SPECIAL' => 'SPECIAL',
                                'STANDARD' => 'STANDARD',
                            ])
                            ->visible(fn(Get $get) => in_array($get('tipo'), ['Laptop', 'Desktop'])),
                    ])->columns(2),

                // ESPECIFICACIONES TÉCNICAS (Laptops y Computadoras)
                Section::make('Especificaciones de Computo')
                    ->visible(fn(Get $get) => in_array($get('tipo'), ['Laptop', 'Desktop']))
                    ->schema([
                        TextInput::make('processor')
                            ->label('Procesador')
                            ->placeholder('Ej. Core Ultra 7, M2, Ryzen 7'),

                        TextInput::make('ram_memory')
                            ->label('Memoria RAM')
                            ->placeholder('Ej. 32 GB, 16 GB'),

                        TextInput::make('ssd')
                            ->label('Capacidad SSD / Almacenamiento')
                            ->placeholder('Ej. 512 GB, 1 TB'),

                        TextInput::make('screen')
                            ->label('Tamaño de Pantalla')
                            ->placeholder('Ej. 15", 14", 27"'),
                    ])->columns(2),
            ]);
    }
}