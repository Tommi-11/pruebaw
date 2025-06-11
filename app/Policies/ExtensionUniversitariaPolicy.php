<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExtensionUniversitaria;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtensionUniversitariaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole('extension-manager') || $user->can('view extensionuniversitaria');
    }
    public function view(User $user, ExtensionUniversitaria $extension)
    {
        return $user->hasRole('extension-manager') || $user->can('view extensionuniversitaria');
    }
    public function create(User $user)
    {
        return $user->hasRole('extension-manager') || $user->can('create extensionuniversitaria');
    }
    public function update(User $user, ExtensionUniversitaria $extension)
    {
        return $user->hasRole('extension-manager') || $user->can('edit extensionuniversitaria');
    }
    public function delete(User $user, ExtensionUniversitaria $extension)
    {
        return $user->hasRole('extension-manager') || $user->can('delete extensionuniversitaria');
    }
}
