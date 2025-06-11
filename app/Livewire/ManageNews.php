<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;

class ManageNews extends Component
{
    public $titulo, $descripcion, $fecha_publicacion, $imagen, $noticiaId;
    public $noticias;
    public $editMode = false;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha_publicacion' => 'required|date',
        'imagen' => 'nullable|image|mimes:jpg,png,webp|max:5120',
    ];

    public function mount()
    {
        $this->loadNoticias();
    }

    public function loadNoticias()
    {
        $this->noticias = Noticia::orderByDesc('fecha_publicacion')->get();
    }

    public function save()
    {
        $this->validate();
        $imagenPath = null;
        if ($this->imagen) {
            $imagenPath = $this->imagen->store('noticias', 'public');
        }
        Noticia::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha_publicacion' => $this->fecha_publicacion,
            'imagen_path' => $imagenPath,
        ]);
        $this->reset(['titulo', 'descripcion', 'fecha_publicacion', 'imagen']);
        $this->loadNoticias();
        session()->flash('success', 'Noticia creada correctamente.');
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        $this->noticiaId = $noticia->id;
        $this->titulo = $noticia->titulo;
        $this->descripcion = $noticia->descripcion;
        $this->fecha_publicacion = $noticia->fecha_publicacion;
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate();
        $noticia = Noticia::findOrFail($this->noticiaId);
        $imagenPath = $noticia->imagen_path;
        if ($this->imagen) {
            if ($imagenPath) Storage::disk('public')->delete($imagenPath);
            $imagenPath = $this->imagen->store('noticias', 'public');
        }
        $noticia->update([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'fecha_publicacion' => $this->fecha_publicacion,
            'imagen_path' => $imagenPath,
        ]);
        $this->reset(['titulo', 'descripcion', 'fecha_publicacion', 'imagen', 'noticiaId', 'editMode']);
        $this->loadNoticias();
        session()->flash('success', 'Noticia actualizada correctamente.');
    }

    public function delete($id)
    {
        $noticia = Noticia::findOrFail($id);
        if ($noticia->imagen_path) Storage::disk('public')->delete($noticia->imagen_path);
        $noticia->delete();
        $this->loadNoticias();
        session()->flash('success', 'Noticia eliminada correctamente.');
    }

    public function cancelEdit()
    {
        $this->reset(['titulo', 'descripcion', 'fecha_publicacion', 'imagen', 'noticiaId', 'editMode']);
    }

    public function render()
    {
        return view('livewire.manage-news');
    }
}
