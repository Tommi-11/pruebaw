<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Nuevo Estudiante</h2>
        <form wire:submit.prevent="saveNewEstudiante">
            <div class="mb-4">
                <label class="block text-gray-700">Nombres</label>
                <input type="text" wire:model.defer="newEstudiante.nombres" class="w-full border rounded px-3 py-2 mt-1" />
                @error('newEstudiante.nombres') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Apellidos</label>
                <input type="text" wire:model.defer="newEstudiante.apellidos" class="w-full border rounded px-3 py-2 mt-1" />
                @error('newEstudiante.apellidos') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Código Universidad</label>
                <input type="text" wire:model.defer="newEstudiante.codigo_universidad" class="w-full border rounded px-3 py-2 mt-1" />
                @error('newEstudiante.codigo_universidad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">DNI</label>
                <input type="text" wire:model.defer="newEstudiante.dni" class="w-full border rounded px-3 py-2 mt-1" />
                @error('newEstudiante.dni') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Celular</label>
                <input type="text" wire:model.defer="newEstudiante.celular" class="w-full border rounded px-3 py-2 mt-1" />
                @error('newEstudiante.celular') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Facultad</label>
                <select wire:model.defer="newEstudiante.facultad_id" class="w-full border rounded px-3 py-2 mt-1">
                    <option value="">Seleccione una facultad</option>
                    @foreach(App\Models\Facultades::all() as $facultad)
                        <option value="{{ $facultad->id }}">{{ $facultad->nombre }}</option>
                    @endforeach
                </select>
                @error('newEstudiante.facultad_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="$set('showEstudianteModal', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Registrar y Agregar</button>
            </div>
        </form>
    </div>
</div>
