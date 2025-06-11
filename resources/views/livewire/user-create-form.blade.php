<div class="mb-6 p-4 bg-blue-50 rounded shadow">
    @if (session()->has('success'))
        <div class="mb-4 text-green-700 font-semibold">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="createUser" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-blue-900">Nombre</label>
            <input type="text" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required />
            @error('name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Correo electrónico</label>
            <input type="email" wire:model="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required />
            @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Contraseña</label>
            <input type="password" wire:model="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required />
            @error('password') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Rol</label>
            <select wire:model="role_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                <option value="">Selecciona un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2 flex justify-end">
            <button type="submit" class="py-2 px-6 bg-blue-700 hover:bg-blue-900 text-white font-semibold rounded-md shadow transition">Crear usuario</button>
        </div>
    </form>
</div>
