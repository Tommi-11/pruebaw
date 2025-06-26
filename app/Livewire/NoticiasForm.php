<?php

namespace App\Livewire;

use App\Models\Noticias;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NoticiasForm extends Component
{
    public $noticiaId;
    public $titulo = '';
    public $descripcion = '';
    public $area_origen = '';
    public $modo = 'create';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'area_origen' => 'required|string',
    ];

    public function mount($modo = 'create', $id = null)
    {
        $this->modo = $modo;
        if ($id) {
            $noticia = Noticias::findOrFail($id);
            $this->noticiaId = $noticia->id;
            $this->titulo = $noticia->titulo;
            $this->descripcion = $noticia->descripcion;
            $this->area_origen = $noticia->area_origen;
        }
    }

    public function save()
    {
        $this->validate();
        $data = [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'area_origen' => $this->area_origen,
            'user_id' => Auth::id(),
            'fecha_publicacion' => now(),
        ];
        if ($this->modo === 'create') {
            $noticia = Noticias::create($data);
        } else {
            $noticia = Noticias::findOrFail($this->noticiaId);
            $noticia->update($data);
        }
        return redirect()->route('noticias');
    }

    public function render()
    {
        return view('livewire.noticias-form');
    }
}
