<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProyeccionSocial;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProyeccionSocialPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole('proyeccion-manager') || $user->can('view proyeccionsocial');
    }
    public function view(User $user, ProyeccionSocial $proyeccion)
    {
        return $user->hasRole('proyeccion-manager') || $user->can('view proyeccionsocial');
    }
    public function create(User $user)
    {
        return $user->hasRole('proyeccion-manager') || $user->can('create proyeccionsocial');
    }
    public function update(User $user, ProyeccionSocial $proyeccion)
    {
        return $user->hasRole('proyeccion-manager') || $user->can('edit proyeccionsocial');
    }
    public function delete(User $user, ProyeccionSocial $proyeccion)
    {
        return $user->hasRole('proyeccion-manager') || $user->can('delete proyeccionsocial');
    }
}
