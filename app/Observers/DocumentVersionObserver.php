<?php

namespace App\Observers;

use App\Models\DocumentVersion;
use App\Models\User;
use App\Notifications\DocumentStatusChanged;
use Filament\Notifications\Notification as FilamentNotification; // 🚀 Alerta de la campanita
use Filament\Actions\Action as NotificationAction; // 🚀 Corrección de namespace del Botón
use Illuminate\Support\Facades\Notification as LaravelNotification;

class DocumentVersionObserver
{
    /**
     * Se ejecuta automáticamente cada vez que se guarda/actualiza una versión.
     */
    public function updated(DocumentVersion $documentVersion): void
    {
        // 🔍 Candado: Solo actúa si lo que cambió fue la columna 'status'
        if ($documentVersion->isDirty('status')) {

            $currentStatus = $documentVersion->status;
            $oldStatus = $documentVersion->getOriginal('status');
            $userId = auth()->id(); // ID del usuario autenticado en la sesión de la UI

            /*
            |--------------------------------------------------------------------------
            | 🔒 CONTROL AUTOMÁTICO DE FECHAS Y AUDITORÍA TISAX
            |--------------------------------------------------------------------------
            */
            // Desactivamos temporalmente eventos para actualizar las columnas en la BD sin causar bucles
            $documentVersion->withoutEvents(function () use ($documentVersion, $currentStatus, $userId) {

                // 1. Al pasar a 'terminado' (el Responsable termina su borrador)
                if ($currentStatus === 'terminado') {
                    $documentVersion->update([
                        'created_by_id' => $documentVersion->created_by_id ?? $documentVersion->user_id ?? $userId,
                    ]);
                }

                // 2. Al pasar a 'revisado' (el Revisor Técnico/Consultado lo evalúa)
                if ($currentStatus === 'revisado') {
                    $documentVersion->update([
                        'reviewed_by_id' => $userId,
                        'reviewed_at' => $documentVersion->reviewed_at ?? now(),
                        'last_reviewed_at' => now(), // Siempre se actualiza con la hora exacta actual
                    ]);
                }

                // 3. Al pasar a 'aprobado' (el CISO firma y da el visto bueno definitivo)
                if ($currentStatus === 'aprobado') {
                    $documentVersion->update([
                        'approved_at' => now(),
                    ]);
                }
            });

            // Una vez guardadas las fechas, preparamos las alertas del sistema
            $documentName = $documentVersion->document?->name ?? $documentVersion->file_name;
            $newStatus = strtoupper($currentStatus);

            // Rescatamos el comentario del historial (limpiando etiquetas HTML si las hay)
            $comentario = strip_tags($documentVersion->change_description);

            /*
            |--------------------------------------------------------------------------
            | 🟢 1. OBTENER ÚNICAMENTE USUARIOS ACTIVOS DE LA MATRIZ RACI
            |--------------------------------------------------------------------------
            */
            $usersToNotify = User::query()
                ->whereIn('default_raci_type', ['R', 'A', 'C', 'I'])
                ->where('is_active', true) // 🔒 FILTRO DE SEGURIDAD: Solo usuarios activos
                ->get();

            /*
            |--------------------------------------------------------------------------
            | 🟢 2. ENVÍO DEL CORREO ELECTRÓNICO A USUARIOS ACTIVOS
            |--------------------------------------------------------------------------
            */
            if ($usersToNotify->isNotEmpty()) {
                LaravelNotification::send($usersToNotify, new DocumentStatusChanged($documentVersion, $oldStatus, $comentario));
            }

            /*
            |--------------------------------------------------------------------------
            | 3. ENVÍO A LA CAMPANITA DE FILAMENT (Base de Datos)
            |--------------------------------------------------------------------------
            */
            // Recorremos a cada usuario activo para encenderle el contador rojo de su campanita en /dashboard
            foreach ($usersToNotify as $user) {

                FilamentNotification::make()
                    ->id('status_change_' . $documentVersion->id)
                    ->title('Control Documental TISAX')
                    ->body("El documento **{$documentName}** avanzó a **{$newStatus}**.")
                    ->icon('heroicon-o-document-text')
                    ->iconColor('info')

                    // 🚀 BOTÓN INTERACTIVO: Envía al usuario directo a la URL de tu panel dashboard
                    ->actions([
                        NotificationAction::make('view')
                            ->label('Ver Historial')
                            ->button()
                            ->url(url("/dashboard/document-versions?activeTab={$documentVersion->status}")) // Redirección correcta
                            ->markAsRead(), // Al darle clic, quita el punto rojo de "no leído"
                    ])
                    ->sendToDatabase($user); // Se guarda en la BD para este usuario
            }
        }
    }
}