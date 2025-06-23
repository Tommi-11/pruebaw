<?php

namespace App\Livewire;

use App\Models\Noticias as NoticiaModel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Noticias extends Component
{
    use WithPagination, WithFileUploads;

    public $modalOpen = false;
    public $modalMode = 'create';
    public $noticiaId;
    public $titulo, $descripcion, $imagen_path, $fecha_publicacion, $user_id, $area_origen;
    public $confirmingDelete = false;
    public $noticiaToDelete;
    public $search = '';
    public $imagen_upload;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'imagen_upload' => 'nullable|image|max:5120', // 5MB
        'area_origen' => 'required|string',
    ];

    public function render()
    {
        $noticias = NoticiaModel::query()
            ->when($this->search, function($query) {
                $query->where('titulo', 'like', '%'.$this->search.'%');
            })
            ->orderByDesc('fecha_publicacion')
            ->paginate(10);
        return view('livewire.noticias', compact('noticias'));
    }

    public function openModal($mode = 'create', $id = null)
    {
        $this->resetValidation();
        $this->reset(['titulo','descripcion','imagen_path','fecha_publicacion','area_origen','noticiaId']);
        $this->modalMode = $mode;
        if ($mode === 'edit' && $id) {
            $noticia = NoticiaModel::findOrFail($id);
            $this->noticiaId = $noticia->id;
            $this->titulo = $noticia->titulo;
            $this->descripcion = $noticia->descripcion;
            $this->imagen_path = $noticia->imagen_path;
            $this->fecha_publicacion = $noticia->fecha_publicacion;
            $this->area_origen = $noticia->area_origen;
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
        $this->validate();
        $data = [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'area_origen' => $this->area_origen,
            'user_id' => Auth::id(),
            'fecha_publicacion' => now(),
        ];
        if ($this->imagen_upload) {
            $data['imagen_path'] = $this->imagen_upload->store('noticias', 'public');
        } elseif ($this->modalMode === 'edit' && $this->noticiaId) {
            $noticia = NoticiaModel::findOrFail($this->noticiaId);
            $data['imagen_path'] = $noticia->imagen_path;
        }
        if ($this->modalMode === 'create') {
            NoticiaModel::create($data);
        } else if ($this->modalMode === 'edit' && $this->noticiaId) {
            $noticia = NoticiaModel::findOrFail($this->noticiaId);
            $noticia->update($data);
        }
        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $this->noticiaToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function deleteNoticia()
    {
        NoticiaModel::destroy($this->noticiaToDelete);
        $this->confirmingDelete = false;
    }
}
