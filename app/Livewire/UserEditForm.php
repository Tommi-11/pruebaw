<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class UserEditForm extends Component
{
    public $userId, $name, $email, $role_id;
    public $roles;
    protected $listeners = ['editUser' => 'loadUser'];

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function loadUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::findOrFail($this->userId);
        $oldData = $user->toArray();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->withProperties(['old' => $oldData, 'attributes' => $user->toArray()])
            ->log('Usuario actualizado');
        session()->flash('success', 'Usuario actualizado correctamente.');
        $this->emit('userCreated');
        $this->reset(['userId', 'name', 'email', 'role_id']);
    }

    public function render()
    {
        return view('livewire.user-edit-form', [
            'roles' => $this->roles,
        ]);
    }
}
