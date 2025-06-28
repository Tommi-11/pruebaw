<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoriaDocumento;
use App\Models\Documentos as DocumentosModel;

class DocumentosForm extends Component
{
    public $documentoId;
    public $titulo;
    public $categoria_id;
    public $formato;
    public $tamano_mb;
    public $categorias = [];

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'categoria_id' => 'required|exists:categorias_documentos,id',
        'formato' => 'required|string|max:10',
        'tamano_mb' => 'required|numeric',
    ];

    protected $listeners = ['closeModal' => 'closeModal'];

    public function mount($documentoId = null)
    {
        $this->categorias = CategoriaDocumento::all();
        if ($documentoId) {
            $doc = DocumentosModel::findOrFail($documentoId);
            $this->documentoId = $doc->id;
            $this->titulo = $doc->titulo;
            $this->categoria_id = $doc->categoria_id;
            $this->formato = $doc->formato;
            $this->tamano_mb = $doc->tamano_mb;
        }
    }

    public function create()
    {
        $this->validate();
        DocumentosModel::create([
            'titulo' => $this->titulo,
            'categoria_id' => $this->categoria_id,
            'formato' => $this->formato,
            'tamano_mb' => $this->tamano_mb,
            'user_id' => auth()->id(),
        ]);
        $this->emitUp('closeModal');
    }

    public function update()
    {
        $this->validate();
        $doc = DocumentosModel::findOrFail($this->documentoId);
        $doc->update([
            'titulo' => $this->titulo,
            'categoria_id' => $this->categoria_id,
            'formato' => $this->formato,
            'tamano_mb' => $this->tamano_mb,
        ]);
        $this->emitUp('closeModal');
    }

    public function closeModal()
    {
        $this->reset(['titulo', 'categoria_id', 'formato', 'tamano_mb', 'documentoId']);
        $this->emitUp('showCreateModal', false);
    }

    public function render()
    {
        return view('livewire.documentos-form', [
            'categorias' => $this->categorias,
            'documentoId' => $this->documentoId,
        ]);
    }
}
