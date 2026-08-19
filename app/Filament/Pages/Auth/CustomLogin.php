<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Illuminate\Validation\ValidationException;

class CustomLogin extends BaseLogin
{
    public function authenticate(): ?LoginResponse
    {
        // 1. Obtener los datos del formulario de inicio de sesión
        $data = $this->form->getState();

        // 2. Buscar al usuario por correo
        $user = User::where('email', $data['email'])->first();

        // 3. Si existe y está inactivo (is_active = 0), lanzar la excepción antes de autenticar
        if ($user && !$user->is_active) {
            throw ValidationException::withMessages([
                'data.email' => 'Tu usuario se encuentra inactivo o bloqueado. Contacta al administrador del sistema.',
            ]);
        }

        // 4. Proceder con el flujo normal de Filament
        return parent::authenticate();
    }
}