<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * 🔒 Determina si el usuario puede ver el enlace en el menú lateral 
     * y listar el catálogo de usuarios del sistema.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'Administrador';
    }

    /**
     * 🔒 Determina si puede ver el detalle de un usuario específico.
     */
    public function view(User $user, User $model): bool
    {
        return $user->role === 'Administrador';
    }

    /**
     * 🔒 Determina si puede crear nuevos usuarios en DocFlow.
     */
    public function create(User $user): bool
    {
        return $user->role === 'Administrador';
    }

    /**
     * 🔒 Determina si puede modificar los datos o roles de otros usuarios.
     */
    public function update(User $user, User $model): bool
    {
        return $user->role === 'Administrador';
    }

    /**
     * 🔒 Determina si puede eliminar a un usuario del sistema.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->role === 'Administrador';
    }
}