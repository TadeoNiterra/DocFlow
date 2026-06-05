<?php

namespace App\Models;

// 🚀 LA CLAVE: Importamos el contrato contractual de nombres de Filament v5
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;

// Definición estricta de campos permitidos en el sistema DocFlow
#[Fillable(['name', 'email', 'password', 'role', 'is_active', 'default_raci_type'])]
// 🚀 AGREGADO: Vinculamos formalmente el contrato "implements HasName" aquí
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
     * 🚀 MÉTODO CONTRACTUAL: Intercepta el renderizado de Filament en el Menú Superior y Avatar
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

        return "{$this->name} {$rolCompleto}";
    }

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