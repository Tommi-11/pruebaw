<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Nuevo ODS</h2>
        <form wire:submit.prevent="saveNewOds">
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" wire:model.defer="newOds.nombre" class="w-full border rounded px-3 py-2 mt-1" />
                @error('newOds.nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Descripción</label>
                <textarea wire:model.defer="newOds.descripcion" class="w-full border rounded px-3 py-2 mt-1"></textarea>
                @error('newOds.descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="$set('showOdsModal', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Registrar y Agregar</button>
            </div>
        </form>
    </div>
</div>
