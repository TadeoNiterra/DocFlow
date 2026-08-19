<?php

namespace App\Filament\Resources\UserDeletionControls\Schemas;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class UserDeletionControlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bitácora de Control de Eliminación de Usuarios')
                    ->headerActions([
                        Action::make('guia_f_it_21')
                            ->label('Guía de llenado')
                            ->icon(Heroicon::InformationCircle)
                            ->modalHeading('Guía F-IT-21: Eliminación de Usuarios')
                            ->modalDescription('Registre los datos del usuario dado de baja. Al ingresar la Fecha de Baja y los días de revisión otorgados para respaldar la información, el sistema calculará la fecha final del periodo automáticamente.')
                            ->modalSubmitAction(false)
                            ->modalCancelActionLabel('Entendido'),
                    ])
                    ->schema([
                        TextInput::make('usuario')
                            ->label('Usuario')
                            ->placeholder('Ej. Juan Perez (juan.perez@empresa.com)')
                            ->required()
                            ->columnSpan(2),

                        DatePicker::make('fecha_baja')
                            ->label('Fecha de baja')
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn (Get $get, Set $set) => self::calculatePeriodEnd($get, $set)),

                        TextInput::make('dias_revision_respaldos')
                            ->label('Días de revisión para respaldos')
                            ->numeric()
                            ->default(30)
                            ->required()
                            ->live()
                            ->afterStateUpdated(fn (Get $get, Set $set) => self::calculatePeriodEnd($get, $set)),

                        DatePicker::make('fecha_final_periodo')
                            ->label('Fecha final del periodo')
                            ->readOnly()
                            ->helperText('Fecha calculada automáticamente'),

                        DatePicker::make('fecha_autorizacion_eliminacion')
                            ->label('Fecha de autorización de eliminación'),

                        DatePicker::make('fecha_eliminacion')
                            ->label('Fecha de eliminación'),
                    ])
                    ->columnSpanFull()
                    ->columns(3),
            ]);
    }

    public static function calculatePeriodEnd(Get $get, Set $set): void
    {
        $fechaBaja = $get('fecha_baja');
        $dias = (int) $get('dias_revision_respaldos');

        if ($fechaBaja && $dias) {
            $set('fecha_final_periodo', Carbon::parse($fechaBaja)->addDays($dias)->format('Y-m-d'));
        }
    }
}