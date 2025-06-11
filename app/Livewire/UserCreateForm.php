<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;

class UserCreateForm extends Component
{
    public $name, $email, $password, $role_id;
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role_id' => $this->role_id,
        ]);
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->withProperties(['attributes' => $user->toArray()])
            ->log('Usuario creado');
        $this->reset(['name', 'email', 'password', 'role_id']);
        session()->flash('success', 'Usuario creado correctamente.');
        $this->emit('userCreated');
    }

    public function render()
    {
        return view('livewire.user-create-form', [
            'roles' => $this->roles,
        ]);
    }
}
