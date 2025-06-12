<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Usuarios</h2>
        <button wire:click="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Usuario</button>
    </div>
    <div class="mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar usuario o rol..." class="border px-3 py-2 rounded w-1/3">
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full bg-white shadow">
            <thead class="bg-blue-900 text-white rounded-lg">
                <tr>
                    <th class="py-2 px-4">Nombre</th>
                    <th class="py-2 px-4">Correo</th>
                    <th class="py-2 px-4">Rol</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $user->nombres }} {{ $user->apellidos }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->role->nombre ?? '-' }}</td>
                        <td class="py-2 px-4">
                            <button wire:click="openModal({{ $user->id }})" class="text-blue-600 hover:underline mr-2">Editar</button>
                            <button wire:click="confirmDelete({{ $user->id }})" class="text-red-600 hover:underline">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4 text-gray-500">No se encontraron usuarios.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>

    <!-- Modal Crear/Editar Usuario -->
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ $isEdit ? 'Editar Usuario' : 'Agregar Usuario' }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <label class="block text-sm font-medium">Nombres</label>
                <input type="text" wire:model.defer="nombres" class="mt-1 border px-3 py-2 rounded w-full" required>
                @error('nombres') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Apellidos</label>
                <input type="text" wire:model.defer="apellidos" class="mt-1 border px-3 py-2 rounded w-full" required>
                @error('apellidos') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Correo</label>
                <input type="email" wire:model.defer="email" class="mt-1 border px-3 py-2 rounded w-full" required>
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Cargo</label>
                <select wire:model.defer="role_id" class="mt-1 border px-3 py-2 rounded w-full" required>
                    <option value="">Seleccione un cargo</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                    @endforeach
                </select>
                @error('role_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('showModal', false)" class="px-4 py-2 rounded bg-gray-200">Cancelar</button>
            <button wire:click="saveUser" class="px-4 py-2 rounded bg-blue-600 text-white ml-2">Guardar</button>
        </x-slot>
    </x-dialog-modal>

    <!-- Modal Confirmar Eliminación -->
    <x-dialog-modal wire:model="showDeleteModal">
        <x-slot name="title">Eliminar Usuario</x-slot>
        <x-slot name="content">
            ¿Está seguro que desea eliminar este usuario?
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$set('showDeleteModal', false)" class="px-4 py-2 rounded bg-gray-200">Cancelar</button>
            <button wire:click="deleteUser" class="px-4 py-2 rounded bg-red-600 text-white ml-2">Eliminar</button>
        </x-slot>
    </x-dialog-modal>
</div>
