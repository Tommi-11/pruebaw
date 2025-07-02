@props(['id'])
<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">¿Está seguro de editar este documento?</h2>
        <div class="flex justify-end">
            <button wire:click="$emitUp('closeEditModal')" class="btn btn-secondary mr-2">Cancelar</button>
            <button wire:click="update" class="btn btn-warning">Editar</button>
        </div>
    </div>
</div>
