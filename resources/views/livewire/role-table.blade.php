<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Cargos</h2>
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Cargo</button>
    </div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar cargo..." class="border px-3 py-2 rounded w-1/3">
    </div>
    <table class="min-w-full bg-white rounded-lg shadow">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Descripción</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $role)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $role->nombre }}</td>
                    <td class="py-2 px-4">{{ $role->descripcion }}</td>
                    <td class="py-2 px-4">
                        <button wire:click="openModal({{ $role->id }})" class="text-blue-600 hover:underline mr-2">Editar</button>
                        <button wire:click="confirmDelete({{ $role->id }})" class="text-red-600 hover:underline">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center py-4 text-gray-500">No se encontraron cargos.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $roles->links() }}</div>

    <!-- Modal Crear/Editar Cargo -->
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ $isEdit ? 'Editar Cargo' : 'Agregar Cargo' }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <label class="block text-sm font-medium">Nombre</label>
                <input type="text" wire:model.defer="nombre" class="mt-1 border px-3 py-2 rounded w-full" required>
                @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Descripción</label>
                <input type="text" wire:model.defer="descripcion" class="mt-1 border px-3 py-2 rounded w-full">
                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('showModal', false)" class="px-4 py-2 rounded bg-gray-200">Cancelar</button>
            <button wire:click="saveRole" class="px-4 py-2 rounded bg-blue-600 text-white ml-2">Guardar</button>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal Confirmar Eliminación -->
    <x-dialog-modal wire:model="showDeleteModal">
        <x-slot name="title">Eliminar Cargo</x-slot>
        <x-slot name="content">
            ¿Está seguro que desea eliminar este cargo?
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('showDeleteModal', false)" class="px-4 py-2 rounded bg-gray-200">Cancelar</button>
            <button wire:click="deleteRole" class="px-4 py-2 rounded bg-red-600 text-white ml-2">Eliminar</button>
        </x-slot>
    </x-dialog-modal>
</div>
