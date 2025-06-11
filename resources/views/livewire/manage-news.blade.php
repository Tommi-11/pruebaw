<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold text-blue-900 mb-4">Gestión de Noticias</h2>
    @if (session()->has('success'))
        <div class="mb-4 text-green-700 font-semibold">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div>
            <label class="block text-sm font-medium text-blue-900">Título</label>
            <input type="text" wire:model="titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
            @error('titulo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Fecha de publicación</label>
            <input type="date" wire:model="fecha_publicacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
            @error('fecha_publicacion') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-blue-900">Descripción</label>
            <textarea wire:model="descripcion" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required></textarea>
            @error('descripcion') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-blue-900">Imagen (JPG, PNG, WebP, máx 5MB)</label>
            <input type="file" wire:model="imagen" accept="image/*" class="mt-1 block w-full text-sm" />
            @error('imagen') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2 flex justify-end gap-2">
            @if($editMode)
                <button type="button" wire:click="cancelEdit" class="py-2 px-4 bg-gray-300 text-gray-800 rounded">Cancelar</button>
                <button type="submit" class="py-2 px-6 bg-yellow-600 hover:bg-yellow-800 text-white font-semibold rounded-md shadow transition">Actualizar</button>
            @else
                <button type="submit" class="py-2 px-6 bg-blue-700 hover:bg-blue-900 text-white font-semibold rounded-md shadow transition">Crear noticia</button>
            @endif
        </div>
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4">Título</th>
                    <th class="py-2 px-4">Fecha</th>
                    <th class="py-2 px-4">Imagen</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                    <tr class="border-b hover:bg-blue-50">
                        <td class="py-2 px-4">{{ $noticia->titulo }}</td>
                        <td class="py-2 px-4">{{ $noticia->fecha_publicacion }}</td>
                        <td class="py-2 px-4">
                            @if($noticia->imagen_path)
                                <img src="{{ asset('storage/' . $noticia->imagen_path) }}" alt="Imagen" class="h-12 rounded" />
                            @else
                                -
                            @endif
                        </td>
                        <td class="py-2 px-4">
                            <button wire:click="edit({{ $noticia->id }})" class="text-blue-700 hover:underline">Editar</button>
                            <button wire:click="delete({{ $noticia->id }})" class="text-red-600 hover:underline ml-2">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
