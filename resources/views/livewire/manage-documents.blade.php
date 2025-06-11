<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold text-blue-900 mb-4">Gestión de Documentos</h2>
    @if (session()->has('success'))
        <div class="mb-4 text-green-700 font-semibold">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="upload" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div>
            <label class="block text-sm font-medium text-blue-900">Título</label>
            <input type="text" wire:model="titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
            @error('titulo') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Categoría</label>
            <input type="text" wire:model="categoria" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500" required />
            @error('categoria') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-blue-900">Archivo PDF</label>
            <input type="file" wire:model="file" accept="application/pdf" class="mt-1 block w-full text-sm" required />
            @error('file') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-3 flex justify-end">
            <button type="submit" class="py-2 px-6 bg-blue-700 hover:bg-blue-900 text-white font-semibold rounded-md shadow transition">Subir documento</button>
        </div>
    </form>
    <div class="mb-4 flex justify-between items-center">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar por título o categoría..." class="w-1/2 rounded-md border-gray-300 shadow-sm focus:border-blue-500" />
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4">Título</th>
                    <th class="py-2 px-4">Categoría</th>
                    <th class="py-2 px-4">Subido por</th>
                    <th class="py-2 px-4">Fecha</th>
                    <th class="py-2 px-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documentos as $doc)
                    <tr class="border-b hover:bg-blue-50">
                        <td class="py-2 px-4">{{ $doc->titulo }}</td>
                        <td class="py-2 px-4">{{ $doc->categoria ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $doc->user->name ?? '-' }}</td>
                        <td class="py-2 px-4">{{ $doc->created_at->format('d/m/Y') }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('documentos.download', $doc) }}" class="text-blue-700 hover:underline" target="_blank">Descargar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
