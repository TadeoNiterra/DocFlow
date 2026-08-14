<?php

namespace App\Filament\Resources\Proveedors\Schemas;

use Filament\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class ProveedorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // SECCIÓN 1: DATOS DEL PROVEEDOR
                Section::make('Información del Proveedor')
                    ->schema([
                        TextEntry::make('nombre')
                            ->label('Nombre del Proveedor')
                            ->weight(FontWeight::Bold),

                        TextEntry::make('razonSocial')
                            ->label('Razón Social'),

                        TextEntry::make('actividad')
                            ->label('Actividad Principal'),

                        TextEntry::make('status')
                            ->label('Estatus del Proveedor')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Activo' => 'success',
                                'Baja'   => 'danger',
                                'Evento' => 'warning',
                                default  => 'gray',
                            }),

                        TextEntry::make('departamentoResponsable')
                            ->label('Departamento Responsable'),

                        TextEntry::make('date')
                            ->label('Año de Registro / Inicio'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                // SECCIÓN 2: DATOS DE CONTACTO
                Section::make('Datos de Contacto')
                    ->schema([
                        TextEntry::make('personaContacto')
                            ->label('Persona de Contacto')
                            ->icon('heroicon-m-user'),

                        TextEntry::make('numeroContacto')
                            ->label('Número de Contacto')
                            ->icon('heroicon-m-phone'),

                        TextEntry::make('email')
                            ->label('Correo Electrónico')
                            ->icon('heroicon-m-envelope'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                // SECCIÓN 3: EXPEDIENTE CON BOTÓN ZIP EN EL HEADER
                Section::make('Expediente Digital / Evidencias')
                    ->headerActions([
                        Action::make('descargar_expediente_zip')
                            ->label('Descargar Expediente (ZIP)')
                            ->icon('heroicon-o-archive-box')
                            ->color('success')
                            ->size('sm')
                            ->url(fn ($record) => route('proveedores.descargar-expediente', $record))
                            ->openUrlInNewTab(),
                    ])
                    ->schema([
                        RepeatableEntry::make('evidencias')
                            ->label('Documentos Registrados')
                            ->schema([
                                TextEntry::make('nombre_archivo')
                                    ->label('Tipo de Documento')
                                    ->weight(FontWeight::SemiBold)
                                    ->columnSpan(1),

                                TextEntry::make('ruta_archivo')
                                    ->label('Archivo Adjunto')
                                    ->formatStateUsing(fn ($state) => '📄 Ver Documento PDF')
                                    ->url(fn ($record) => $record?->ruta_archivo ? asset('storage/' . $record->ruta_archivo) : null)
                                    ->openUrlInNewTab()
                                    ->color('primary')
                                    ->columnSpan(1),
                            ])
                            ->columns(2)
                            ->placeholder('No hay documentos o evidencias registradas en este expediente.')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}