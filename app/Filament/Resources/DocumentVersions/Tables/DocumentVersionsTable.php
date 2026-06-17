<?php

namespace App\Filament\Resources\DocumentVersions\Tables;

use App\Models\DocumentVersion;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Grouping\Group;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Label;

use Filament\Tables\Filters\SelectFilter;
use App\Models\Document;

class DocumentVersionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('document.name')
                    ->label('Documento Maestro')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('version_number')
                    ->label('Versión')
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Estado Versión')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'draft' => 'gray',
                        'terminado' => 'info',
                        'revisado' => 'purple',
                        'aprobado' => 'success',
                        default => 'transparent',
                    })
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),

                TextColumn::make('file_name')
                    ->label('Nombre de Archivo')
                    ->searchable()
                    ->limit(25),

                TextColumn::make('user.name')
                    ->label('Subido por'),

                TextColumn::make('creator.name')
                    ->label('Creado por')
                    ->placeholder('Sin asignar')
                    ->searchable(),

                TextColumn::make('reviewer.name')
                    ->label('Revisado por')
                    ->placeholder('Pendiente de revisión')
                    ->searchable(),

                TextColumn::make('reviewed_at')
                    ->label('Fecha de Revisión')
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true), // Oculta por defecto para no saturar, se puede activar en la UI

                TextColumn::make('last_reviewed_at')
                    ->label('Última Revisión')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('approved_at')
                    ->label('Fecha de Aprobación')
                    ->dateTime('d/m/Y H:i')
                    ->description(fn($record) => $record->approved_at ? '🔒 Validación TISAX' : null)
                    ->sortable(),
            ])

            ->filters([
                SelectFilter::make('document_id')
                    ->label('Filtrar por Documento')
                    ->searchable()
                    ->preload()
                    ->options(function () {
                        return Document::query()
                            ->pluck('name', 'id')
                            ->toArray();
                    }),
            ])
            ->groups([
                // Agrupación 1: Por el Estado de la revisión (Mapeo por registro corregido)
                Group::make('status')
                    ->label('Tipo de Estatus')
                    ->collapsible()
                    ->getTitleFromRecordUsing(fn($record): string => match ($record->status) {
                        'draft' => '📝 Borrador (Draft)',
                        'terminado' => '🔍 En revisión por Auditor (Terminado)',
                        'revisado' => '🟣 Aceptado por Auditor (Revisado)',
                        'aprobado' => '🔒 Firmado y Publicado (Aprobado)',
                        default => ucfirst($record->status),
                    }),

                // Agrupación 2: Por el Nombre del Documento Maestro
                Group::make('document.name')
                    ->label('Nombre de documento')
                    ->collapsible()
            ])
            ->collapsedGroupsByDefault()

            ->actions([
                ViewAction::make()
                    ->label('Ver Detalles')
                    ->color('info')
                    ->infolist(function ($infolist) {
                        return $infolist
                            ->schema([
                                Section::make('Historial y Registro de Cambios')
                                    ->schema([
                                        TextEntry::make('document.name')->label('Documento Maestro'),
                                        TextEntry::make('version_number')->label('Versión / Revisión')->badge()->color('warning'),

                                        TextEntry::make('status')
                                            ->label('Estado Actual de la Revisión')
                                            ->badge()
                                            ->color(fn(string $state): string => match ($state) {
                                                'draft' => 'gray',
                                                'terminado' => 'info',
                                                'revisado' => 'purple',
                                                'aprobado' => 'success',
                                                default => 'transparent',
                                            })
                                            ->formatStateUsing(fn(string $state): string => ucfirst($state)),

                                        TextEntry::make('file_name')->label('Nombre del Archivo Original'),
                                        TextEntry::make('user.name')->label('Registrado por'),
                                        TextEntry::make('created_at')->label('Fecha y Hora de Carga')->dateTime('d/m/Y H:i'),

                                        TextEntry::make('change_description')
                                            ->label('Descripción de los Cambios / Historial de Rechazos')
                                            ->columnSpanFull()
                                            ->html(),
                                    ])->columns(2),

                                Section::make('Evidencia de Firma Electrónica Inmutable')
                                    ->description('Certificado digital emitido internamente bajo cumplimiento normativo de seguridad.')
                                    ->icon('heroicon-o-shield-check')
                                    ->schema([
                                        TextEntry::make('signed_by_name')
                                            ->label('Autorizado y Firmado Por')
                                            ->weight(\Filament\Support\Enums\FontWeight::Bold)
                                            ->color('success')
                                            ->state(fn($record): ?string => $record->signatures->first()?->user_name_snapshot),

                                        TextEntry::make('signed_by_email')
                                            ->label('Correo Institucional')
                                            ->state(fn($record): ?string => $record->signatures->first()?->user_email_snapshot),

                                        TextEntry::make('signed_at_time')
                                            ->label('Fecha y Hora del Estampado')
                                            ->state(fn($record): ?string => $record->signatures->first()?->signed_at?->format('d/m/Y H:i:s')),

                                        TextEntry::make('signed_by_ip')
                                            ->label('Dirección IP de Origen')
                                            ->badge()
                                            ->color('gray')
                                            ->state(fn($record): ?string => $record->signatures->first()?->ip_address),

                                        TextEntry::make('signature_hash')
                                            ->label('Sello Digital de Integridad (SHA-256 Hash)')
                                            ->fontFamily(\Filament\Support\Enums\FontFamily::Mono)
                                            ->copyable()
                                            ->color('warning')
                                            ->columnSpanFull()
                                            ->state(fn($record): ?string => $record->signatures->first()?->signature_hash),

                                        TextEntry::make('user_agent')
                                            ->label('Metadatos del Entorno (User Agent)')
                                            ->color('gray')
                                            ->columnSpanFull()
                                            ->state(fn($record): ?string => $record->signatures->first()?->user_agent),
                                    ])
                                    ->columns(2)
                                    ->visible(function (?DocumentVersion $record): bool {
                                        return $record !== null && $record->status === 'aprobado';
                                    }),
                            ]);
                    })
                    ->extraModalActions([
                        Action::make('view_pdf')
                            ->label('Ver PDF / Archivo')
                            ->icon('heroicon-o-eye')
                            ->color('success')
                            ->url(fn($record): string => $record->file_path ? route('documentos.ver-pdf', ['version' => $record->id]) : '#')
                            ->openUrlInNewTab()
                            ->visible(function ($record) {
                                $user = auth()->user();
                                if ($user->default_raci_type === 'I') {
                                    return $record->status === 'aprobado';
                                }
                                return !empty($record->file_path);
                            }),

                        // 🚀 ACCIÓN ACTUALIZADA: AVANZAR ESTADO, FIRMAR O RETORNAR A DRAFT CON COMENTARIOS
                        Action::make('change_version_status')
                            ->label('Avanzar Estado / Firmar')
                            ->icon('heroicon-o-arrow-path')
                            ->color('warning')
                            ->form(function ($record) {
                                $user = auth()->user();
                                $options = [];

                                // 1. Opciones para el CISO (Aprobador 'A')
                                if ($user->default_raci_type === 'A' && $record->status === 'revisado') {
                                    return [
                                        \Filament\Forms\Components\Placeholder::make('info_firma')
                                            ->label('🔒 Proceso de Firma Digital TISAX')
                                            ->content('Al aprobar este documento, se estampará tu firma electrónica inmutable con tu cuenta, dirección IP y fecha actual.'),

                                        \Filament\Forms\Components\Select::make('status')
                                            ->label('Acción de Aprobación')
                                            ->options([
                                                'aprobado' => '🖋️ Autorizar, Firmar y Publicar (Aprobado)',
                                                'draft' => '❌ Rechazar y Devolver a borrador (Draft)'
                                            ])
                                            ->reactive()
                                            ->required(),

                                        \Filament\Forms\Components\Textarea::make('comment')
                                            ->label('Motivo del Rechazo / Comentarios de Aprobación')
                                            ->rows(3)
                                            ->required(fn($get) => $get('status') === 'draft'), // Obligatorio si rechaza
                    
                                        \Filament\Forms\Components\TextInput::make('password_confirmation')
                                            ->label('Confirma tu Contraseña para Validar Firma')
                                            ->password()
                                            ->visible(fn($get) => $get('status') === 'aprobado')
                                            ->required(fn($get) => $get('status') === 'aprobado')
                                            ->rules(['current_password']),
                                    ];
                                }

                                // 2. Opciones para el Creador (Responsable 'R')
                                if ($user->default_raci_type === 'R' && $record->status === 'draft') {
                                    $options = ['terminado' => 'Enviar a Revisión (Terminado)'];
                                }

                                // 3. Opciones para el Revisor (Consultado 'C')
                                elseif ($user->default_raci_type === 'C' && $record->status === 'terminado') {
                                    $options = [
                                        'revisado' => 'Aceptar y Enviar a CISO (Revisado)',
                                        'draft' => '❌ Rechazar y Devolver a Creador (Draft)'
                                    ];
                                }

                                return [
                                    \Filament\Forms\Components\Select::make('status')
                                        ->label('Siguiente Paso en el Flujo TISAX')
                                        ->options($options)
                                        ->reactive()
                                        ->required(),

                                    \Filament\Forms\Components\Textarea::make('comment')
                                        ->label('Motivo del Rechazo / Comentarios de Aprobación')
                                        ->rows(3)
                                        // 🚀 CORRECTO: $get aquí lee el Select 'status' del MODAL en tiempo real, no el modelo.
                                        ->required(fn($get) => $get('status') === 'draft'),

                                    \Filament\Forms\Components\TextInput::make('password_confirmation')
                                        ->label('Confirma tu Contraseña para Validar Firma')
                                        ->password()
                                        // 🚀 CORRECTO: $get evalúa el Select del formulario del modal.
                                        ->visible(fn($get) => $get('status') === 'aprobado')
                                        ->required(fn($get) => $get('status') === 'aprobado')
                                        ->rules(['current_password']), // Obligatorio si se regresa a borrador
                                ];
                            })
                            ->visible(function ($record) {
                                $user = auth()->user();
                                if ($user->default_raci_type === 'I')
                                    return false;
                                if ($user->default_raci_type === 'R' && $record->status === 'draft')
                                    return true;
                                if ($user->default_raci_type === 'C' && $record->status === 'terminado')
                                    return true;
                                if ($user->default_raci_type === 'A' && $record->status === 'revisado')
                                    return true;
                                return false;
                            })
                            ->action(function (array $data, $record): void {
                                $user = auth()->user();
                                $timestamp = now()->format('d/m/Y H:i');

                                // Formateamos el comentario con saltos de línea para mantener el historial limpio
                                $nuevoComentario = "";
                                if (!empty($data['comment'])) {
                                    $nuevoComentario = "<br><small class='text-gray-500'>[{$timestamp}] {$user->name} ({$user->default_raci_type}):</small> " . e($data['comment']);
                                }

                                // Flujo especial: El CISO aprueba el documento con Firma Electrónica SHA-256
                                if ($user->default_raci_type === 'A' && $record->status === 'revisado' && $data['status'] === 'aprobado') {
                                    $cadenaParaHash = $record->id . '|' . $record->file_path . '|' . $user->email . '|' . now()->toIso8601String();
                                    $signatureHash = hash('sha256', $cadenaParaHash);

                                    $record->signatures()->create([
                                        'user_id' => $user->id,
                                        'user_name_snapshot' => $user->name,
                                        'user_email_snapshot' => $user->email,
                                        'ip_address' => request()->ip(),
                                        'user_agent' => request()->userAgent(),
                                        'signature_hash' => $signatureHash,
                                        'signed_at' => now(),
                                    ]);

                                    // Acumulamos la bitácora de cambios
                                    $historialActualizado = $record->change_description . ($nuevoComentario ?: "<br><small class='text-gray-500'>[{$timestamp}]</small> Documento firmado electrónicamente por CISO.");

                                    $record->update([
                                        'status' => 'aprobado',
                                        'change_description' => $historialActualizado
                                    ]);

                                    \Filament\Notifications\Notification::make()
                                        ->title('Documento Firmado y Publicado')
                                        ->body('La revisión ha sido aprobada con éxito bajo la norma TISAX.')
                                        ->success()
                                        ->send();
                                } else {
                                    // Flujo general o rechazo a borrador (Draft)
                                    if (isset($data['status'])) {
                                        // Acumulamos el comentario nuevo en la descripción de cambios existente sin borrar el pasado
                                        $historialActualizado = $record->change_description . $nuevoComentario;

                                        $record->update([
                                            'status' => $data['status'],
                                            'change_description' => $historialActualizado
                                        ]);

                                        $mensajeTitulo = $data['status'] === 'draft' ? 'Documento Rechazado' : 'Flujo Avanzado Exitosamente';
                                        $mensajeCuerpo = $data['status'] === 'draft' ? 'El registro fue devuelto a borrador para su corrección.' : "El documento cambió al estado: " . strtoupper($data['status']);

                                        \Filament\Notifications\Notification::make()
                                            ->title($mensajeTitulo)
                                            ->body($mensajeCuerpo)
                                            ->success()
                                            ->send();
                                    }
                                }
                            }),
                    ]),

                EditAction::make()->label('Editar'),
                DeleteAction::make()->label('Eliminar'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    // 🚀 ACCIÓN UNIFICADA: Procesamiento y Avance Masivo para R, C y A
                    BulkAction::make('mass_advance_flow')
                        ->label(function () {
                            $user = auth()->user();
                            if (!$user)
                                return 'Procesamiento Masivo';
                            return match ($user->default_raci_type) {
                                'R' => 'Enviar Seleccionados a Revisión',
                                'C' => 'Aceptar y Enviar Lote a CISO',
                                'A' => 'Aprobación y Firma Masiva TISAX',
                                default => 'Procesamiento Masivo',
                            };
                        })
                        ->icon(function () {
                            $user = auth()->user();
                            return $user && $user->default_raci_type === 'A' ? 'heroicon-o-shield-check' : 'heroicon-o-arrow-path';
                        })
                        ->color(fn() => auth()->user()?->default_raci_type === 'A' ? 'success' : 'warning')

                        // Ocultar la acción por completo si el usuario es Informado (I)
                        ->visible(fn() => auth()->user()?->default_raci_type !== 'I')

                        // El formulario de contraseña solo se despliega si el usuario logueado es el CISO (A)
                        ->form(function () {
                            $user = auth()->user();
                            if ($user && $user->default_raci_type === 'A') {
                                return [
                                    \Filament\Forms\Components\Placeholder::make('info_masiva')
                                        ->label('🔒 Proceso de Firma Electrónica Masiva')
                                        ->content('Al confirmar, estamparás tu firma digital inmutable en TODAS las versiones seleccionadas en estado "Revisado".'),

                                    \Filament\Forms\Components\TextInput::make('password_confirmation')
                                        ->label('Confirma tu Contraseña Institucional')
                                        ->password()
                                        ->required()
                                        ->rules(['current_password']),
                                ];
                            }
                            return []; // Sin campos requeridos para R y C (Ejecución directa)
                        })

                        ->action(function (\Illuminate\Database\Eloquent\Collection $records): void {
                            $user = auth()->user();
                            if (!$user)
                                return;

                            $contadorProcesados = 0;

                            foreach ($records as $record) {
                                // [ R ] RESPONSABLE: De 'draft' a 'terminado'
                                if ($user->default_raci_type === 'R' && $record->status === 'draft') {
                                    $record->update(['status' => 'terminado']);
                                    $contadorProcesados++;
                                }
                                // [ C ] CONSULTADO: De 'terminado' a 'revisado'
                                elseif ($user->default_raci_type === 'C' && $record->status === 'terminado') {
                                    $record->update(['status' => 'revisado']);
                                    $contadorProcesados++;
                                }
                                // [ A ] AUTORIDAD (CISO): De 'revisado' a 'aprobado' + Estampado de Firma
                                elseif ($user->default_raci_type === 'A' && $record->status === 'revisado') {
                                    $cadenaParaHash = $record->id . '|' . $record->file_path . '|' . $user->email . '|' . now()->toIso8601String();
                                    $signatureHash = hash('sha256', $cadenaParaHash);

                                    $record->signatures()->create([
                                        'user_id' => $user->id,
                                        'user_name_snapshot' => $user->name,
                                        'user_email_snapshot' => $user->email,
                                        'ip_address' => request()->ip(),
                                        'user_agent' => request()->userAgent(),
                                        'signature_hash' => $signatureHash,
                                        'signed_at' => now(),
                                    ]);

                                    $record->update(['status' => 'aprobado']);
                                    $contadorProcesados++;
                                }
                            }

                            // Mensajes personalizados de éxito basados en el rol operativo
                            if ($contadorProcesados > 0) {
                                $mensaje = match ($user->default_raci_type) {
                                    'R' => "Se enviaron {$contadorProcesados} revisiones a revisión exitosamente.",
                                    'C' => "Se validaron y enviaron {$contadorProcesados} documentos al CISO.",
                                    'A' => "Se firmaron digitalmente y publicaron {$contadorProcesados} documentos bajo norma TISAX.",
                                    default => "Se actualizaron {$contadorProcesados} registros.",
                                };

                                \Filament\Notifications\Notification::make()
                                    ->title('Procesamiento por Lote Exitoso')
                                    ->body($mensaje)
                                    ->success()
                                    ->send();
                            } else {
                                \Filament\Notifications\Notification::make()
                                    ->title('Sin cambios realizados')
                                    ->body('Ninguno de los documentos seleccionados correspondía a tu fase o estado actual del flujo.')
                                    ->warning()
                                    ->send();
                            }
                        }),

                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}