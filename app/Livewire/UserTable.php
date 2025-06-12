<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Roles;

class UserTable extends Component
{
    use WithPagination;
    public $search = '';
    public $showModal = false;
    public $showDeleteModal = false;
    public $userId;
    public $nombres;
    public $apellidos;
    public $email;
    public $role_id;
    public $roles = [];
    public $isEdit = false;
    public $confirmingDeleteId;

    protected $rules = [
        'nombres' => 'required|string',
        'apellidos' => 'required|string',
        'email' => 'required|email',
        'role_id' => 'required|exists:roles,id',
    ];

    public function mount()
    {
        $this->roles = Roles::all();
    }

    public function render()
    {
        $users = User::with('role')
            ->where(function($q) {
                $q->where('nombres', 'like', "%{$this->search}%")
                  ->orWhereHas('role', function($qr) {
                      $qr->where('nombre', 'like', "%{$this->search}%");
                  });
            })
            ->orderBy('role_id', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15);
        return view('livewire.user-table', compact('users'));
    }

    public function openModal($id = null)
    {
        $this->resetValidation();
        $this->reset(['nombres','apellidos','email','role_id','userId']);
        $this->isEdit = false;
        if ($id) {
            $user = User::findOrFail($id);
            $this->userId = $user->id;
            $this->nombres = $user->nombres;
            $this->apellidos = $user->apellidos;
            $this->email = $user->email;
            $this->role_id = $user->role_id;
            $this->isEdit = true;
        }
        $this->showModal = true;
    }

    public function saveUser()
    {
        $this->validate();
        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->update([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'email' => $this->email,
                'role_id' => $this->role_id,
            ]);
        } else {
            User::create([
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'email' => $this->email,
                'role_id' => $this->role_id,
                'password' => bcrypt('12345678'), // default password
            ]);
        }
        $this->showModal = false;
    }

    public function confirmDelete($id)
    {
        $this->confirmingDeleteId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->confirmingDeleteId)->delete();
        $this->showDeleteModal = false;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
