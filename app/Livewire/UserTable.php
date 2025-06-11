<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class UserTable extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::with('role')->get();
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => $this->users,
        ]);
    }

    public function getListeners()
    {
        return [
            'userCreated' => 'refreshUsers',
        ];
    }

    public function refreshUsers()
    {
        $this->users = \App\Models\User::with('role')->get();
    }

    public function delete($id)
    {
        $user = \App\Models\User::find($id);
        if ($user) {
            $userData = $user->toArray();
            $user->delete();
            activity()
                ->causedBy(Auth::user())
                ->withProperties(['attributes' => $userData])
                ->log('Usuario eliminado');
            $this->refreshUsers();
            session()->flash('success', 'Usuario eliminado correctamente.');
        }
    }

    public function editUser($id)
    {
        $this->emit('editUser', $id);
    }
}
