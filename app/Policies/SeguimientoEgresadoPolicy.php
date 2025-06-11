<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SeguimientoEgresado;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeguimientoEgresadoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any seguimiento egresado.
     */
    public function viewAny(User $user)
    {
        // Only users with the 'seguimiento-manager' role or permission can view
        return $user->hasRole('seguimiento-manager') || $user->can('view seguimientoegresado');
    }

    /**
     * Determine whether the user can view the seguimiento egresado.
     */
    public function view(User $user, SeguimientoEgresado $seguimiento)
    {
        // Only users with the 'seguimiento-manager' role or permission can view
        return $user->hasRole('seguimiento-manager') || $user->can('view seguimientoegresado');
    }

    /**
     * Determine whether the user can create seguimiento egresado.
     */
    public function create(User $user)
    {
        return $user->hasRole('seguimiento-manager') || $user->can('create seguimientoegresado');
    }

    /**
     * Determine whether the user can update the seguimiento egresado.
     */
    public function update(User $user, SeguimientoEgresado $seguimiento)
    {
        return $user->hasRole('seguimiento-manager') || $user->can('edit seguimientoegresado');
    }

    /**
     * Determine whether the user can delete the seguimiento egresado.
     */
    public function delete(User $user, SeguimientoEgresado $seguimiento)
    {
        return $user->hasRole('seguimiento-manager') || $user->can('delete seguimientoegresado');
    }
}
