<?php

namespace App\Policies;

use App\Models\DocumentVersion;
use App\Models\User;

class DocumentVersionPolicy
{
    /**
     * Quiénes pueden ver el listado de versiones en la tabla.
     */
    public function viewAny(User $user): bool
    {
        // Todos pueden entrar a la tabla, pero luego filtraremos las filas visibles.
        return true;
    }

    /**
     * Quiénes pueden ver el modal de detalles (ViewAction).
     */
    public function view(User $user, DocumentVersion $documentVersion): bool
    {
        // El Informado (I) SOLO puede ver el documento si ya está aprobado
        if ($user->default_raci_type === 'I') {
            return $documentVersion->status === 'aprobado';
        }

        // R, C y A pueden ver los detalles en cualquier momento
        return true;
    }

    /**
     * Quiénes pueden subir/crear una nueva versión.
     */
    public function create(User $user): bool
    {
        // Solo el Responsable (R) inicia el flujo creando versiones
        return $user->default_raci_type === 'R';
    }

    /**
     * Quiénes pueden editar los campos de la versión (EditAction).
     */
    public function update(User $user, DocumentVersion $documentVersion): bool
    {
        // Solo el Responsable (R) puede editar, y ÚNICAMENTE si está en borrador (draft)
        return $user->default_raci_type === 'R' && $documentVersion->status === 'draft';
    }

    /**
     * Quiénes pueden borrar una versión (DeleteAction).
     */
    public function delete(User $user, DocumentVersion $documentVersion): bool
    {
        // Solo el Responsable (R) puede borrar su propio borrador
        return $user->default_raci_type === 'R' && $documentVersion->status === 'draft';
    }
}