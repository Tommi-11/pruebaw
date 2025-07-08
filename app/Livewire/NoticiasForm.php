<?php

namespace App\Livewire;

use App\Models\Noticias;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class NoticiasForm extends Component
{
    use WithFileUploads;
    public $noticiaId;
    public $titulo = '';
    public $descripcion = '';
    public $area_origen = '';
    public $modo = 'create';
    public $imagen_upload;
    public $imagen_path;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'area_origen' => 'required|string',
        'imagen_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
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
            $this->imagen_path = $noticia->imagen_path;
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
        if ($this->imagen_upload) {
            $data['imagen_path'] = $this->imagen_upload->store('miniatura-noticia', 'public');
        } elseif ($this->modo === 'edit' && $this->noticiaId) {
            $noticia = Noticias::findOrFail($this->noticiaId);
            $data['imagen_path'] = $noticia->imagen_path;
        }
        if ($this->modo === 'create') {
            $noticia = Noticias::create($data);
            $this->dispatch('show-success-modal', [
                'message' => 'Noticia creada exitosamente.'
            ]);
            $this->redirectToListado();
        } else {
            $noticia = Noticias::findOrFail($this->noticiaId);
            $noticia->update($data);
            $this->dispatch('show-success-modal', [
                'message' => 'Noticia actualizada exitosamente.'
            ]);
            $this->redirectToListado();
        }

    }

    public function redirectToListado()
    {
        // Redirige después de un pequeño delay para mostrar el modal de éxito
        $this->dispatch('redirect-after-success');
    }

    public function render()
    {
        return view('livewire.noticias-form');
    }
}
