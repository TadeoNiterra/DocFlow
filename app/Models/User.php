<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;

// Definición estricta de campos permitidos en el sistema DocFlow
#[Fillable(['name', 'email', 'password', 'role', 'is_active', 'default_raci_type'])]
class User extends Authenticatable
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
     * Conversión automática de tipos de datos nativos de Laravel.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Encripta automáticamente las contraseñas en SQL Server
        ];
    }
}