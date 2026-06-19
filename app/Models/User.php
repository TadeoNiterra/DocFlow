<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

#[Fillable(['name', 'email', 'password', 'role', 'is_active', 'default_raci_type'])]
class User extends Authenticatable implements HasName
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que deben ocultarse para la serialización y seguridad de la API.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * MÉTODO CONTRACTUAL: Intercepta el renderizado de Filament en el Menú Superior y Avatar
     */
    public function getFilamentName(): string
    {
        $rolCompleto = match ($this->default_raci_type) {
            'R' => 'Responsable',
            'A' => 'Autoridad',
            'C' => 'Consultado',
            'I' => 'Informado',
            default => 'Usuario',
        };

        return "{$this->name} - {$rolCompleto}";
    }

    /**
     * Conversión automática de tipos de datos nativos de Laravel.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * 🔥 ENVÍO SEGURO Y DIRECTO EN ESPAÑOL PARA FILAMENT V5
     */
    public function sendPasswordResetNotification($token): void
    {
        // 1. Construimos la URL exacta de recuperación que pide Laravel/Filament
        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->getEmailForPasswordReset(),
        ], false));

        // 2. Creamos la estructura del MailMessage en español
        $mailMessage = (new MailMessage)
            ->subject('DocFlow - Recuperación de Contraseña')
            ->greeting('¡Hola, ' . $this->name . '!')
            ->line('Estás recibiendo este correo porque hiciste una solicitud de restablecimiento de contraseña para tu cuenta en el sistema DocFlow.')
            ->action('Restablecer Contraseña', $url)
            ->line('Este enlace de recuperación expirará en 60 minutos.')
            ->line('Si tú no realizaste esta solicitud, puedes ignorar este correo de forma segura.')
            ->salutation('Saludos cordiales, Equipo de Soporte DocFlow.');

        // 3. Encapsulamos el mensaje en una notificación en caliente para evitar problemas de caché
        $this->notify(
            new class ($mailMessage) extends Notification {
            private MailMessage $message;

            public function __construct(MailMessage $message)
            {
                $this->message = $message;
            }

            public function via(object $notifiable): array
            {
                return ['mail'];
            }

            public function toMail(object $notifiable): MailMessage
            {
                return $this->message;
            }
            }
        );
    }
}