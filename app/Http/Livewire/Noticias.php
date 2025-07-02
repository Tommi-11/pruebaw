<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Noticias;
use Illuminate\Support\Facades\Storage;

class Noticias extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $modalOpen = false;
    public $showDeleteModal = false;
    public $modalMode = 'create';
    public $noticiaId;
    public $titulo, $tipo, $fecha, $contenido, $imagen, $imagen_actual;
    public $confirmingDelete = false;
    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'tipo' => 'required|in:noticia,evento',
        'fecha' => 'required|date',
        'contenido' => 'required|string',
        'imagen' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        $noticias = Noticias::where('titulo', 'like', '%'.$this->search.'%')
            ->orWhere('tipo', 'like', '%'.$this->search.'%')
            ->orderByDesc('fecha')
            ->paginate(10);
        return view('livewire.noticias', [
            'noticias' => $noticias
        ]);
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['titulo','tipo','fecha','contenido','imagen','imagen_actual','noticiaId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $noticia = Noticias::findOrFail($id);
            $this->noticiaId = $noticia->id;
            $this->titulo = $noticia->titulo;
            $this->tipo = $noticia->tipo;
            $this->fecha = $noticia->fecha;
            $this->contenido = $noticia->contenido;
            $this->imagen_actual = $noticia->imagen;
        }
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function saveNoticia()
    {
        $data = $this->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|in:noticia,evento',
            'fecha' => 'required|date',
            'contenido' => 'required|string',
            'imagen' => $this->modalMode === 'create' ? 'nullable|image|max:2048' : 'nullable|image|max:2048',
        ]);

        if ($this->imagen) {
            $imagenPath = $this->imagen->store('noticias', 'public');
        } else {
            $imagenPath = $this->imagen_actual ?? null;
        }

        if ($this->modalMode === 'create') {
            Noticias::create([
                'titulo' => $this->titulo,
                'tipo' => $this->tipo,
                'fecha' => $this->fecha,
                'contenido' => $this->contenido,
                'imagen' => $imagenPath,
            ]);
        } else {
            $noticia = Noticias::findOrFail($this->noticiaId);
            $noticia->update([
                'titulo' => $this->titulo,
                'tipo' => $this->tipo,
                'fecha' => $this->fecha,
                'contenido' => $this->contenido,
                'imagen' => $imagenPath,
            ]);
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->noticiaId = $id;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
    }

    public function deleteNoticia()
    {
        $noticia = Noticias::findOrFail($this->noticiaId);
        if ($noticia->imagen) {
            Storage::disk('public')->delete($noticia->imagen);
        }
        $noticia->delete();
        $this->showDeleteModal = false;
    }
}
