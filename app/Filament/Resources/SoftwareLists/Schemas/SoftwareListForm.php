<?php

namespace App\Filament\Resources\SoftwareLists\Schemas;

use BcMath\Number;
use Dom\Text;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SoftwareListForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Datos del Software')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre del Software')
                            ->required(),
                        Select::make('type')
                            ->label('Tipo de Software')
                            ->options([
                                'On premise' => 'On premise',
                                'SAAS' => 'SAAS',
                                'Open Source' => 'Open Source',
                                'Free Source' => 'Free Source',
                            ])
                            ->required(),
                        Select::make('ubication')
                            ->label('Ubicación del Software')
                            ->options([
                                'Local' => 'Local',
                                'Externo' => 'Externo',
                                'Virtual' => 'Virtual',
                            ])
                            ->required(),
                        Select::make('clasification')
                            ->label('Clasificación del Software')
                            ->options([
                                'Confidencial' => 'Confidencial',
                                'Privado' => 'Privado',
                                'Publico' => 'Publico',
                            ])
                            ->required(),
                        TextInput::make('User')
                            ->label('Numero de Usuarios')
                            ->Integer()
                            ->required(),
                        TextInput::make('Admin')
                            ->label('Numero de Administradores')
                            ->Integer()
                            ->required(),
                        DatePicker::make('installationDate')
                            ->label('Fecha de Instalación')
                            ->required(),
                        Textarea::make('proposal')
                            ->label('Proposito del Software'),
                        Select::make('secury')
                            ->label('¿Incluye medidas de seguridad?')
                            ->options([
                                true => 'Sí',
                                false => 'No',
                            ])
                            ->default(true)
                            ->required(),
                        Select::make('licenseType')
                            ->label('Tipo de Licencia')
                            ->options([
                                'Por grupo' => 'Por grupo',
                                'Por Usuario' => 'Por Usuario',
                                'Libre' => 'Libre',
                                'Ilimitado' => 'Ilimitado',
                            ])
                            ->required(),
                        TextInput::make('license')
                            ->label('Número de Licencia')
                            ->integer()
                            ->required(),
                        Select::make('status')
                            ->label('Estado del Software')
                            ->options([
                                true => 'Aprobado',
                                false => 'No Aprobado',
                            ])
                            ->default(true)
                            ->required(),
                        TextInput::make('aprobation')
                            ->label('Aprobador del Software')
                            ->default('Jesús Alejandro Marron Legorreta'),
                        TextInput::make('area')
                            ->label('Área Responsable')
                            ->default('IT'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

            ]);
    }
}