<?php

namespace App\Filament\Resources\DocumentVersions\Tables\Actions;

use App\Models\DocumentVersion;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action as ModalAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\FontFamily;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Illuminate\Database\Eloquent\Collection;

class DocumentVersionActions
{
    public static function makeRowActions(): array
    {
        return [
            ViewAction::make() // Ahora compilará de forma perfecta
                ->label('Ver Detalles')
                ->color('info')
                ->infolist(fn($infolist) => self::buildInfolistSchema($infolist))
                ->extraModalActions([
                    self::makeViewPdfAction(),
                    self::makeWorkflowTransitionAction(),
                ]),
            EditAction::make()->label('Editar'),
            DeleteAction::make()->label('Eliminar'),
        ];
    }

    public static function makeBulkActions(): array
    {
        return [
            BulkActionGroup::make([
                BulkAction::make('mass_advance_flow')
                    ->label(fn() => match (auth()->user()?->default_raci_type) {
                        'R' => 'Enviar Seleccionados a Revisión',
                        'C' => 'Aceptar y Enviar Lote a CISO',
                        'A' => 'Aprobación y Firma Masiva TISAX',
                        default => 'Procesamiento Masivo',
                    })
                    ->icon(fn() => auth()->user()?->default_raci_type === 'A' ? 'heroicon-o-shield-check' : 'heroicon-o-arrow-path')
                    ->color(fn() => auth()->user()?->default_raci_type === 'A' ? 'success' : 'warning')
                    ->visible(fn() => auth()->user()?->default_raci_type !== 'I')
                    ->form(function () {
                        if (auth()->user()?->default_raci_type === 'A') {
                            return [
                                \Filament\Forms\Components\Placeholder::make('info_masiva')
                                    ->label('🔒 Proceso de Firma Electrónica Masiva')
                                    ->content('Al confirmar, estamparás tu firma digital inmutable.'),
                                \Filament\Forms\Components\TextInput::make('password_confirmation')
                                    ->label('Confirma tu Contraseña Institucional')->password()->required()->rules(['current_password']),
                            ];
                        }
                        return [];
                    })
                    ->action(fn(Collection $records) => self::executeMassWorkflow($records)),
                DeleteBulkAction::make(),
            ]),
        ];
    }
    private static function buildInfolistSchema($infolist)
    {
        return $infolist->schema([
            Section::make(fn() =>'Historial y Registro de Cambios')->schema([
                TextEntry::make('document.name')->label('Documento Maestro'),
                TextEntry::make('version_number')->label('Versión')->badge()->color(fn() =>'warning'),
                TextEntry::make('status')->label('Estado Actual')->badge()
                    ->color(fn($state) => match ($state) { 'draft' => 'gray', 'terminado' => 'info', 'revisado' => 'purple', 'aprobado' => 'success', default => 'transparent'}),
                TextEntry::make('file_name')->label('Archivo Original'),
                TextEntry::make('user.name')->label('Registrado por'),
                TextEntry::make('created_at')->label('Fecha Carga')->dateTime('d/m/Y H:i'),
                TextEntry::make('change_description')->label('Descripción')->columnSpanFull()->html(),
            ])->columns(2),

            Section::make(fn() =>'Trazabilidad e Inmutabilidad de Firma')->schema([
                Section::make(fn() =>'📥 1. Proceso de Elaboración')->compact()->schema([
                    TextEntry::make('created_by')->label('Elaborado Por')->weight(FontWeight::Bold)->state(fn($record) => $record->creator?->name ?? 'Sistema'),
                    TextEntry::make('created_at_time')->label('Fecha')
                        ->state(fn($record) => $record->created_at ? \Carbon\Carbon::parse($record->created_at)->format('d/m/Y H:i:s') : 'N/A'),
                ])->columns(2),

                Section::make(fn() => '🔍 2. Proceso de Revisión')->compact()->schema([
                    TextEntry::make('reviewed_by')->label('Revisado Por')->weight(FontWeight::Bold)->color('warning')->state(fn($record) => $record->reviewer?->name ?? 'Pendiente'),
                    // 🔥 CORREGIDO: Envolvemos reviewed_at en Carbon::parse para mitigar strings de SQLite
                    TextEntry::make('reviewed_at_time')->label('Fecha')
                        ->state(fn($record) => $record->reviewed_at ? \Carbon\Carbon::parse($record->reviewed_at)->format('d/m/Y H:i:s') : 'N/A'),
                ])->columns(2),

                Section::make(fn() =>'🖋️ 3. Autorización y Sello Digital')->compact()->schema([
                    Grid::make(2)->schema([
                        TextEntry::make('signed_by_name')->label('Autorizado Por')->weight(FontWeight::Bold)->color('success')->state(fn($record) => $record->signatures->first()?->user_name_snapshot ?? 'Pendiente'),
                        TextEntry::make('signed_by_email')->label('Correo')->state(fn($record) => $record->signatures->first()?->user_email_snapshot),
                        // 🔥 CORREGIDO: Envolvemos signed_at en Carbon::parse para mitigar strings de SQLite
                        TextEntry::make('signed_at_time')->label('Fecha')
                            ->state(function ($record) {
                                $signedAt = $record->signatures->first()?->signed_at;
                                return $signedAt ? \Carbon\Carbon::parse($signedAt)->format('d/m/Y H:i:s') : 'N/A';
                            }),
                        TextEntry::make('signed_by_ip')->label('IP')->badge()->color('gray')->state(fn($record) => $record->signatures->first()?->ip_address),
                        TextEntry::make('signature_hash')->label('Sello SHA-256')->fontFamily(FontFamily::Mono)->copyable()->color('warning')->columnSpanFull()->state(fn($record) => $record->signatures->first()?->signature_hash),
                    ])
                ]),
            ])->columns(1)->visible(fn(?DocumentVersion $record) => $record !== null && $record->status === 'aprobado'),
        ]);
    }

    private static function makeViewPdfAction(): ModalAction
    {
        return ModalAction::make('view_pdf')
            ->label('Ver PDF / Archivo')
            ->icon('heroicon-o-eye')
            ->color('success')
            ->url(fn($record) => $record->file_path ? route('documentos.ver-pdf', ['version' => $record->id]) : '#')
            ->openUrlInNewTab()
            ->visible(fn($record) => auth()->user()->default_raci_type === 'I' ? $record->status === 'aprobado' : !empty($record->file_path));
    }

    private static function makeWorkflowTransitionAction(): ModalAction
    {
        return ModalAction::make('change_version_status')
            ->label('Avanzar Estado / Firmar')
            ->icon('heroicon-o-arrow-path')
            ->color('warning')
            ->form(fn($record) => self::buildWorkflowFormSchema($record))
            ->visible(fn($record) => self::shouldShowWorkflowAction($record))
            ->action(fn($data, $record) => self::executeWorkflowTransition($data, $record));
    }

    private static function buildWorkflowFormSchema($record): array
    {
        $user = auth()->user();
        $options = [];

        if ($user->default_raci_type === 'A' && $record->status === 'revisado') {
            return [
                \Filament\Forms\Components\Placeholder::make('info_firma')->label('🔒 Firma TISAX')->content('Se estampará tu firma electrónica inmutable.'),
                \Filament\Forms\Components\Select::make('status')->label('Acción')->options(['aprobado' => '🖋️ Autorizar y Firmar', 'draft' => '❌ Rechazar'])->reactive()->required(),
                \Filament\Forms\Components\Textarea::make('comment')->label('Comentarios')->rows(3)->required(fn($get) => $get('status') === 'draft'),
                \Filament\Forms\Components\TextInput::make('password_confirmation')->label('Contraseña')->password()->visible(fn($get) => $get('status') === 'aprobado')->required(fn($get) => $get('status') === 'aprobado')->rules(['current_password']),
            ];
        }

        if ($user->default_raci_type === 'R' && $record->status === 'draft')
            $options = ['terminado' => 'Enviar a Revisión'];
        elseif ($user->default_raci_type === 'C' && $record->status === 'terminado')
            $options = ['revisado' => 'Aceptar Revisión', 'draft' => '❌ Rechazar'];

        return [
            \Filament\Forms\Components\Select::make('status')->label('Siguiente Paso')->options($options)->reactive()->required(),
            \Filament\Forms\Components\Textarea::make('comment')->label('Comentarios')->rows(3)->required(fn($get) => $get('status') === 'draft'),
        ];
    }

    private static function shouldShowWorkflowAction($record): bool
    {
        $user = auth()->user();
        if (!$user || $user->default_raci_type === 'I')
            return false;
        return ($user->default_raci_type === 'R' && $record->status === 'draft') ||
            ($user->default_raci_type === 'C' && $record->status === 'terminado') ||
            ($user->default_raci_type === 'A' && $record->status === 'revisado');
    }

    private static function executeWorkflowTransition(array $data, $record): void
    {
        $user = auth()->user();
        $timestamp = now()->format('d/m/Y H:i');
        $nuevoComentario = !empty($data['comment']) ? "<br><small>[{$timestamp}] {$user->name}:</small> " . e($data['comment']) : "";

        if ($user->default_raci_type === 'A' && $record->status === 'revisado' && $data['status'] === 'aprobado') {
            $signatureHash = hash('sha256', $record->id . '|' . $record->file_path . '|' . $user->email . '|' . now()->toIso8601String());
            $record->signatures()->create([
                'user_id' => $user->id,
                'user_name_snapshot' => $user->name,
                'user_email_snapshot' => $user->email,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'signature_hash' => $signatureHash,
                'signed_at' => now(),
            ]);
            $record->update(['status' => 'aprobado', 'change_description' => $record->change_description . ($nuevoComentario ?: "<br><small>[{$timestamp}]</small> Documento firmado por CISO.")]);
        } else {
            $record->update(['status' => $data['status'], 'change_description' => $record->change_description . $nuevoComentario]);
        }
        Notification::make()->title('Flujo actualizado')->success()->send();
    }

    private static function executeMassWorkflow(Collection $records): void
    {
        $user = auth()->user();
        $contador = 0;
        foreach ($records as $record) {
            if ($user->default_raci_type === 'R' && $record->status === 'draft') {
                $record->update(['status' => 'terminado']);
                $contador++;
            } elseif ($user->default_raci_type === 'C' && $record->status === 'terminado') {
                $record->update(['status' => 'revisado']);
                $contador++;
            } elseif ($user->default_raci_type === 'A' && $record->status === 'revisado') {
                $hash = hash('sha256', $record->id . '|' . $record->file_path . '|' . $user->email . '|' . now()->toIso8601String());
                $record->signatures()->create([
                    'user_id' => $user->id,
                    'user_name_snapshot' => $user->name,
                    'user_email_snapshot' => $user->email,
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'signature_hash' => $hash,
                    'signed_at' => now(),
                ]);
                $record->update(['status' => 'aprobado']);
                $contador++;
            }
        }
        $contador > 0 ? Notification::make()->title('Lote Procesado')->body("{$contador} registros actualizados.")->success()->send() : Notification::make()->title('Sin cambios')->warning()->send();
    }
}