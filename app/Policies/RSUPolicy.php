<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RSU;
use Illuminate\Auth\Access\HandlesAuthorization;

class RSUPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole('rsu-manager') || $user->can('view rsu');
    }
    public function view(User $user, RSU $rsu)
    {
        return $user->hasRole('rsu-manager') || $user->can('view rsu');
    }
    public function create(User $user)
    {
        return $user->hasRole('rsu-manager') || $user->can('create rsu');
    }
    public function update(User $user, RSU $rsu)
    {
        return $user->hasRole('rsu-manager') || $user->can('edit rsu');
    }
    public function delete(User $user, RSU $rsu)
    {
        return $user->hasRole('rsu-manager') || $user->can('delete rsu');
    }
}
