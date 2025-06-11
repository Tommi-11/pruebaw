<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Correo</th>
                <th class="py-2 px-4">Rol</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border-b hover:bg-blue-50">
                    <td class="py-2 px-4">{{ $user->id }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->role->name ?? '-' }}</td>
                    <td class="py-2 px-4">
                        <button wire:click="editUser({{ $user->id }})" class="text-blue-700 hover:underline">Editar</button>
                        <button wire:click="delete({{ $user->id }})" class="text-red-600 hover:underline ml-2">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
