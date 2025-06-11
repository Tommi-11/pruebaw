<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;

class ManageDocuments extends Component
{
    public $titulo, $categoria, $file, $search = '';
    public $documentos;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'categoria' => 'required|string|max:100',
        'file' => 'nullable|file|mimes:pdf|max:10240',
    ];

    public function mount()
    {
        $this->loadDocumentos();
    }

    public function loadDocumentos()
    {
        $query = Documento::query();
        if ($this->search) {
            $query->where('titulo', 'like', '%'.$this->search.'%')
                  ->orWhere('categoria', 'like', '%'.$this->search.'%');
        }
        $this->documentos = $query->orderByDesc('created_at')->get();
    }

    public function updatedSearch()
    {
        $this->loadDocumentos();
    }

    public function upload()
    {
        $this->validate();
        $filename = $this->file->store('documentos', 'public');
        $documento = Documento::create([
            'titulo' => $this->titulo,
            'path' => $filename,
            'tipo_mime' => $this->file->getMimeType(),
            'tamaño' => $this->file->getSize(),
            'user_id' => Auth::id(),
            'categoria' => $this->categoria,
        ]);
        $this->reset(['titulo', 'categoria', 'file']);
        $this->loadDocumentos();
        session()->flash('success', 'Documento subido correctamente.');
    }

    public function render()
    {
        return view('livewire.manage-documents');
    }
}
