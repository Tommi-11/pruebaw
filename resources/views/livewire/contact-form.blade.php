<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold text-blue-900 mb-4">Formulario de Contacto</h2>
    @if($success)
        <div class="mb-4 text-green-700 font-semibold">¡Mensaje enviado correctamente!</div>
    @endif
    <form wire:submit.prevent="submit" class="space-y-4">
        <div class="flex gap-2">
            <div class="w-1/2">
                <label class="block text-sm font-medium text-blue-900">Nombres</label>
                <input type="text" wire:model="nombres" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
                @error('nombres') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="w-1/2">
                <label class="block text-sm font-medium text-blue-900">Apellidos</label>
                <input type="text" wire:model="apellidos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
                @error('apellidos') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Correo electrónico</label>
            <input type="email" wire:model="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
            @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Área de destino</label>
            <select wire:model="area" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required>
                <option value="">Selecciona un área</option>
                @foreach($areas as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('area') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Asunto</label>
            <input type="text" wire:model="asunto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
            @error('asunto') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Mensaje</label>
            <textarea wire:model="mensaje" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required></textarea>
            @error('mensaje') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="py-2 px-6 bg-blue-700 hover:bg-blue-900 text-white font-semibold rounded-md shadow transition">Enviar</button>
        </div>
    </form>
</div>
