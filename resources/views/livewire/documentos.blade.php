<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Documentos</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="showCreateModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Documento</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por título..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Título</th>
                    <th class="py-2 px-4 text-center uppercase">Categoría</th>
                    <th class="py-2 px-4 text-center uppercase">Formato</th>
                    <th class="py-2 px-4 text-center uppercase">Tamaño (MB)</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($documentos as $doc)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $doc->id }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800">{{ $doc->titulo }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $doc->categoria->nombre ?? '-' }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $doc->formato }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800">{{ $doc->tamano_mb }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <a href="{{ Storage::url($doc->path_archivo) }}" target="_blank" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Ver</a>
                            <button wire:click="showEditModal({{ $doc->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $doc->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay documentos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $documentos->links() }}
    </div>

    <!-- Modal de Crear/Editar -->
    @if($modalOpen)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Documento' : 'Editar Documento' }}</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Título</label>
                    <input type="text" wire:model.defer="titulo" class="w-full border rounded px-3 py-2 mt-1" />
                    @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Archivo PDF</label>
                    <input type="file" wire:model="archivo_pdf" accept="application/pdf" class="w-full border rounded px-3 py-2 mt-1" />
                    @error('archivo_pdf') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Categoría</label>
                    <select wire:model.defer="categoria_id" class="w-full border rounded px-3 py-2 mt-1">
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="{{ $modalMode === 'create' ? 'create' : 'update' }}" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Confirm Delete Modal -->
    @if($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Documento</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este documento?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="$set('confirmingDelete', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteDocumento" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    @endif
</div>
