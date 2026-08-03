<?php

namespace App\Filament\Resources\FormatoIt09Proyectos\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FormatoIt09ProyectoForm
{
    public static function configure(Schema $schema): Schema
    {
        $opcionesResultados = [
            'clasificacion adecuada' => 'Clasificación adecuada',
            'aumentar nivel de clasificacion' => 'Aumentar nivel de clasificación',
            'disminuir nivel de clasificacion' => 'Disminuir nivel de clasificación',
            'NA' => 'N/A',
        ];

        return $schema
            ->components([
                // 1. Información General del Proyecto
                Section::make('Información General del Proyecto')
                    ->schema([
                        TextInput::make('folio')
                            ->label('Folio')
                            ->required()
                            ->default('FIT09-' . strtoupper(uniqid()))
                            ->readOnly(),

                        TextInput::make('proyecto')
                            ->label('Nombre del Proyecto')
                            ->required(),

                        DatePicker::make('fecha')
                            ->label('Fecha')
                            ->required()
                            ->default(now()),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),

                // 2. Clasificación de Activos
                Section::make('Clasificación de Activos')
                    ->schema([
                        Repeater::make('activos')
                            ->relationship('activos')
                            ->schema([
                                Select::make('id_activo')
                                    ->label('ID Activo')
                                    ->options([
                                        'DM' => 'DM',
                                        'SV' => 'SV',
                                        'BD' => 'BD',
                                        'SW' => 'SW',
                                        'IN' => 'IN',
                                    ])
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        $nombres = [
                                            'DM' => 'Dispositivos móviles',
                                            'SV' => 'Servidores',
                                            'BD' => 'Bases de datos',
                                            'SW' => 'Herramientas de software',
                                            'IN' => 'Información',
                                        ];
                                        $set('activo', $nombres[$state] ?? '');
                                    })
                                    ->columnSpan(1),

                                TextInput::make('activo')
                                    ->label('Activo')
                                    ->required()
                                    ->readOnly()
                                    ->columnSpan(2),

                                Select::make('clasificacion')
                                    ->label('Clasificación')
                                    ->options([
                                        'Publico' => 'Público',
                                        'Privado' => 'Privado',
                                        'Confidencial' => 'Confidencial',
                                    ])
                                    ->columnSpan(3),

                                DatePicker::make('revision_inicial')->label('Rev. Inicial')->columnSpan(1),
                                Select::make('resultado_inicial')->label('Res. Inicial')->options($opcionesResultados)->columnSpan(1),

                                DatePicker::make('revision_intermedia')->label('Rev. Intermedia')->columnSpan(1),
                                Select::make('resultado_intermedio')->label('Res. Intermedio')->options($opcionesResultados)->columnSpan(1),

                                DatePicker::make('revision_final')->label('Rev. Final')->columnSpan(1),
                                Select::make('resultado_final')->label('Res. Final')->options($opcionesResultados)->columnSpan(1),
                            ])
                            ->columns(6)
                            ->defaultItems(1)
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => $state['activo'] ?? null)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                // 3. Evaluación de Riesgos y sus Evidencias
                Section::make('Evaluación de Riesgos')
                    ->schema([
                        Repeater::make('riesgos')
                            ->relationship('riesgos')
                            ->schema([
                                TextInput::make('numero')
                                    ->label('NO.')
                                    ->numeric()
                                    ->required()
                                    ->placeholder('Ej: 1')
                                    ->columnSpan(1),

                                Textarea::make('riesgo_problema')
                                    ->label('Riesgo (Problema)')
                                    ->required()
                                    ->rows(2)
                                    ->columnSpan(4),

                                Checkbox::make('c')->label('(C)')->columnSpan(1),
                                Checkbox::make('i')->label('(I)')->columnSpan(1),
                                Checkbox::make('d')->label('(D)')->columnSpan(1),

                                TextInput::make('probabilidad')
                                    ->label('Probab')
                                    ->numeric()
                                    ->default(1)
                                    ->live()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $prob = (int) ($state ?? 1);
                                        $sev = (int) ($get('severidad') ?? 1);
                                        $puntaje = $prob * $sev;

                                        $nivel = match (true) {
                                            $puntaje >= 15 => 'Alto',
                                            $puntaje >= 7 => 'Medio',
                                            default => 'Bajo',
                                        };

                                        $set('puntaje', $puntaje);
                                        $set('nivel_riesgo', $nivel);
                                    })
                                    ->columnSpan(2),

                                TextInput::make('severidad')
                                    ->label('Severi')
                                    ->numeric()
                                    ->default(1)
                                    ->live()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        $prob = (int) ($get('probabilidad') ?? 1);
                                        $sev = (int) ($state ?? 1);
                                        $puntaje = $prob * $sev;

                                        $nivel = match (true) {
                                            $puntaje >= 15 => 'Alto',
                                            $puntaje >= 7 => 'Medio',
                                            default => 'Bajo',
                                        };

                                        $set('puntaje', $puntaje);
                                        $set('nivel_riesgo', $nivel);
                                    })
                                    ->columnSpan(2),

                                TextInput::make('puntaje')
                                    ->label('Puntaj')
                                    ->numeric()
                                    ->default(1)
                                    ->readOnly()
                                    ->dehydrated()
                                    ->dehydrateStateUsing(fn(Get $get) => (int) ($get('probabilidad') ?? 1) * (int) ($get('severidad') ?? 1))
                                    ->placeholder(fn(Get $get) => (int) ($get('probabilidad') ?? 1) * (int) ($get('severidad') ?? 1))
                                    ->columnSpan(2),

                                TextInput::make('nivel_riesgo')
                                    ->label('Nivel')
                                    ->readOnly()
                                    ->dehydrated()
                                    ->dehydrateStateUsing(function (Get $get) {
                                        $puntaje = (int) ($get('probabilidad') ?? 1) * (int) ($get('severidad') ?? 1);
                                        return match (true) {
                                            $puntaje >= 15 => 'Alto',
                                            $puntaje >= 7 => 'Medio',
                                            default => 'Bajo',
                                        };
                                    })
                                    ->placeholder(function (Get $get) {
                                        $puntaje = (int) ($get('probabilidad') ?? 1) * (int) ($get('severidad') ?? 1);
                                        return match (true) {
                                            $puntaje >= 15 => 'Alto',
                                            $puntaje >= 7 => 'Medio',
                                            default => 'Bajo',
                                        };
                                    })
                                    ->columnSpan(2),
                                    
                                Textarea::make('tratamiento_causa')
                                    ->label('Tratamiento / Causa')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                // 📎 SUBIDA DE EVIDENCIAS LIGADAS DIRECTAMENTE A ESTE RIESGO
                                Repeater::make('evidencias')
                                    ->relationship('evidencias')
                                    ->schema([
                                        FileUpload::make('ruta_archivo')
                                            ->label('Evidencia (Archivo o Imagen)')
                                            ->disk('local')
                                            ->directory(fn($get) => 'f-it-09/' . ($get('../../../../folio') ?? 'temp'))
                                            ->getUploadedFileNameForStorageUsing(
                                                function (TemporaryUploadedFile $file, $get): string {
                                                    $folio = $get('../../../../folio') ?? 'FIT09-TEMP';
                                                    static $counter = 1;
                                                    $extension = $file->getClientOriginalExtension();
                                                    $filename = "{$folio}-Riesgo-{$counter}.{$extension}";
                                                    $counter++;
                                                    return $filename;
                                                }
                                            )
                                            ->storeFileNamesIn('nombre_archivo')
                                            ->required()
                                            ->columnSpanFull(),
                                    ])
                                    ->label('Evidencias del Tratamiento para este Riesgo')
                                    ->defaultItems(0)
                                    ->columnSpanFull(),
                            ])
                            ->columns(8)
                            ->defaultItems(1)
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => isset($state['numero']) ? "Riesgo #{$state['numero']}" : null)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}