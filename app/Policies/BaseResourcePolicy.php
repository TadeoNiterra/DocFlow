<?php

namespace App\Policies;

use App\Models\User;

abstract class BaseResourcePolicy
{
    /**
     * Regla General: Si el rol es 'Usuario', no tiene acceso a este recurso.
     */
    public function viewAny(User $user): bool
    {
        return $user->role !== 'Usuario';
    }

    public function view(User $user, mixed $model = null): bool
    {
        return $user->role !== 'Usuario';
    }

    public function create(User $user): bool
    {
        return $user->role !== 'Usuario';
    }

    public function update(User $user, mixed $model = null): bool
    {
        return $user->role !== 'Usuario';
    }

    public function delete(User $user, mixed $model = null): bool
    {
        return $user->role !== 'Usuario';
    }
}