@push('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.css">
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.umd.js"></script>
    <script>
        // Log para verificar si el script se inyecta
        console.log('CKEditor script push loaded');
        document.addEventListener('livewire:load', function () {
            console.log('livewire:load event fired');
            if (window.editorInstance) return;
            const textarea = document.querySelector('#content');
            console.log('Textarea encontrado:', textarea);
            if (!textarea) {
                console.error('No se encontró el textarea #content');
                return;
            }
            const ClassicEditor = window.CKEditor5.ClassicEditor;
            ClassicEditor.create(textarea, {
                // Puedes agregar configuración adicional aquí si lo necesitas
            })
            .then(editor => {
                window.editorInstance = editor;
                editor.model.document.on('change:data', () => {
                    Livewire.find('{{ $this->getId() }}').set('descripcion', editor.getData());
                });
                Livewire.hook('message.processed', (message, component) => {
                    const livewireInstance = Livewire.find('{{ $this->getId() }}');
                    if (window.editorInstance && livewireInstance.get('descripcion') !== editor.getData()) {
                        window.editorInstance.setData(livewireInstance.get('descripcion') || '');
                    }
                });
            })
            .catch(error => {
                console.error('CKEditor initialization error:', error);
            });
        });
    </script>
@endpush

<div class="min-h-screen bg-gray-100 py-8">
    <div class="w-full max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">{{ $modo === 'create' ? 'Nueva Noticia' : 'Editar Noticia' }}</h1>
        <form wire:submit.prevent="save" class="space-y-8">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Título</label>
                <input type="text" wire:model.defer="titulo" class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg" />
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Contenido</label>
                <div id="editor-container">
                    <textarea name="content" id="content" cols="30" rows="10" wire:model.defer="descripcion" class="form-control" placeholder="Escribe su contenido"></textarea>
                </div>
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Área de Origen</label>
                <select wire:model.defer="area_origen" class="w-full border border-gray-300 rounded px-4 py-2 mt-1 focus:ring-2 focus:ring-blue-400 focus:outline-none text-lg">
                    <option value="">Seleccione...</option>
                    <option value="RSU">RSU</option>
                    <option value="Seguimiento al Egresado">Seguimiento al Egresado</option>
                    <option value="Proyeccion Social">Proyección Social</option>
                    <option value="Extension Universitaria">Extensión Universitaria</option>
                </select>
                @error('area_origen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-between gap-2 pt-4">
                <a href="{{ route('noticias') }}" class="bg-gray-300 px-6 py-2 rounded text-lg">Volver al listado</a>
                <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded text-lg hover:bg-blue-700">{{ $modo === 'create' ? 'Crear' : 'Actualizar' }}</button>
            </div>
        </form>
    </div>   
</div>