<?php

namespace App\Notifications;

use App\Models\DocumentVersion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DocumentStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;

    protected DocumentVersion $version;
    protected string $oldStatus;

    public function __construct(DocumentVersion $version, string $oldStatus)
    {
        $this->version = $version;
        $this->oldStatus = ucfirst($oldStatus);
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $documentName = $this->version->document?->name ?? $this->version->file_name;
        $newStatus = strtoupper($this->version->status);

        // 🔍 Evaluamos dinámicamente el remitente según el tipo de documento aquí mismo
        $tipoDocumento = $this->version->document?->type;
        

        return (new MailMessage)
            ->mailer('smtp') // 🔥 CONFIGURACIÓN CORRECTA: Aquí es donde pertenece el método mailer
            ->subject("DocFlow TISAX: Alerta de Cambio de Estatus [{$newStatus}]")
            ->greeting("Estimado miembro del equipo RACI,")
            ->line("Se ha registrado una actualización en el flujo de control de documentos bajo la norma de seguridad TISAX.")
            ->line("• **Documento:** {$documentName}")
            ->line("• **Versión/Revisión:** {$this->version->version_number}")
            ->line("• **Estatus Anterior:** {$this->oldStatus}")
            ->line("• **Estatus Nuevo:** {$newStatus}")
            ->action('Acceder al Panel DocFlow', url("/dashboard"))
            ->line('El sistema mantendrá el registro inmutable de esta operación en la bitácora histórica de auditoría.')
            ->salutation('Saludos cordiales, Dirección de Seguridad DocFlow.');
    }
}