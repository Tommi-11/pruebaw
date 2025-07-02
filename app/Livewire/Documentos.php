<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Documentos as DocumentosModel;
use App\Models\CategoriaDocumento;

class Documentos extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $modalOpen = false;
    public $modalMode = 'create';
    public $confirmingDelete = false;
    public $documentoToDelete;
    public $titulo, $path_archivo, $formato, $tamano_mb, $categoria_id, $user_id;
    public $archivo_pdf;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'categoria_id' => 'required|exists:categorias_documentos,id',
        'archivo_pdf' => 'required|file|mimes:pdf|max:10240', // 10MB máximo
    ];

    public function render()
    {
        $documentos = DocumentosModel::with('categoria')
            ->where('titulo', 'like', '%'.$this->search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $categorias = CategoriaDocumento::all();
        return view('livewire.documentos', compact('documentos', 'categorias'));
    }

    public function showCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->modalOpen = true;
    }

    public function showEditModal($id)
    {
        $this->resetForm();
        $this->modalMode = 'edit';
        $this->documentoId = $id;
        $doc = DocumentosModel::findOrFail($id);
        $this->titulo = $doc->titulo;
        $this->categoria_id = $doc->categoria_id;
        $this->formato = $doc->formato;
        $this->tamano_mb = $doc->tamano_mb;
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->resetValidation();
    }

    public function confirmDelete($id)
    {
        $this->documentoToDelete = $id;
        $this->confirmingDelete = true;
    }

    public function deleteDocumento()
    {
        DocumentosModel::destroy($this->documentoToDelete);
        $this->confirmingDelete = false;
    }

    public function create()
    {
        $this->validate();
        $path = $this->archivo_pdf->store('documentos', 'public');
        $tamano_mb = round($this->archivo_pdf->getSize() / 1048576, 2);
        DocumentosModel::create([
            'titulo' => $this->titulo,
            'categoria_id' => $this->categoria_id,
            'formato' => 'pdf',
            'tamano_mb' => $tamano_mb,
            'user_id' => auth()->id(),
            'path_archivo' => $path,
        ]);
        $this->closeModal();
    }

    public function update()
    {
        $this->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias_documentos,id',
            'archivo_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);
        $doc = DocumentosModel::findOrFail($this->documentoId);
        $data = [
            'titulo' => $this->titulo,
            'categoria_id' => $this->categoria_id,
        ];
        if ($this->archivo_pdf) {
            $path = $this->archivo_pdf->store('documentos', 'public');
            $tamano_mb = round($this->archivo_pdf->getSize() / 1048576, 2);
            $data['formato'] = 'pdf';
            $data['tamano_mb'] = $tamano_mb;
            $data['path_archivo'] = $path;
        }
        $doc->update($data);
        $this->closeModal();
    }

    private function resetForm()
    {
        $this->titulo = '';
        $this->categoria_id = '';
        $this->archivo_pdf = null;
        $this->documentoId = null;
    }
}

// Archivo movido correctamente desde App\Http\Livewire\Documentos.php
