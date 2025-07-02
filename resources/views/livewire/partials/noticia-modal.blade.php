@push('styles')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.css" />
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/45.2.0/ckeditor5-premium-features.css" />
@endpush
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/45.2.0/ckeditor5.umd.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5-premium-features/45.2.0/ckeditor5-premium-features.umd.js"></script>
@endpush
@if($modalOpen)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">
            <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nueva Noticia' : 'Editar Noticia' }}</h2>
            <div class="mb-4">
                <label class="block text-gray-700">Título</label>
                <input type="text" wire:model.defer="titulo" class="w-full border rounded px-3 py-2 mt-1" />
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Contenido</label>
                <textarea id="editor" wire:model.defer="descripcion" class="w-full border rounded px-3 py-2 mt-1 min-h-[180px]"></textarea>
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Área de Origen</label>
                <select wire:model.defer="area_origen" class="w-full border rounded px-3 py-2 mt-1">
                    <option value="">Seleccione...</option>
                    <option value="RSU">RSU</option>
                    <option value="Seguimiento al Egresado">Seguimiento al Egresado</option>
                    <option value="Proyeccion Social">Proyección Social</option>
                    <option value="Extension Universitaria">Extensión Universitaria</option>
                </select>
                @error('area_origen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button wire:click="saveNoticia" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            if (window.editorInstance) return;
            ClassicEditor.create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '/noticias/upload?_token={{ csrf_token() }}'
                }
            })
            .then(editor => {
                window.editorInstance = editor;
                editor.model.document.on('change:data', () => {
                    @this.set('descripcion', editor.getData());
                });
                Livewire.hook('message.processed', (message, component) => {
                    if (window.editorInstance) {
                        window.editorInstance.setData(@this.get('descripcion') || '');
                    }
                });
            })
            .catch(error => { console.error(error); });
        });
    </script>
@endif
