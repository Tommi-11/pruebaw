<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Objetivos de Desarrollo Sostenible</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Objetivo</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase w-1/4">Nombre</th>
                    <th class="py-2 px-4 text-center uppercase tracking-wider">Descripción</th>
                    <th class="py-2 px-4 text-center uppercase tracking-wider w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($objetivos as $objetivo)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">{{ $objetivo->id }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800">{{ $objetivo->nombre }}</td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-700">{{ $objetivo->descripcion }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', {{ $objetivo->id }})" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete({{ $objetivo->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">No hay objetivos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $objetivos->links() }}
    </div>

    <!-- Modal -->
    @if($modalOpen)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Objetivo' : 'Editar Objetivo' }}</h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Nombre</label>
                    <input type="text" wire:model.defer="nombre" class="w-full border rounded px-3 py-2 mt-1" onkeypress="return soloLetras(event)" oninput="ponerMayusculasCadaPalabra(this)"  />
                    @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Descripción</label>
                    <textarea wire:model.defer="descripcion" class="w-full border rounded px-3 py-2 mt-1" rows="3" onkeypress="return soloLetras(event)" oninput="capitalizarPrimeraLetra(this)"></textarea>
                    @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="saveObjetivo" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Confirm Delete Modal -->
    @if($confirmingDelete)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Objetivo</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este objetivo?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="$set('confirmingDelete', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteObjetivo" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    @endif
</div>

<script type="text/javascript">
  function soloLetras(e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toLowerCase();
    var letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    var especiales = [8, 37, 39, 46]; // retroceso, flechas, suprimir

    var tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    return letras.indexOf(tecla) != -1 || tecla_especial;
  }

  function ponerMayusculasCadaPalabra(input) {
    let palabras = input.value.toLowerCase().split(" ");
    for (let i = 0; i < palabras.length; i++) {
      if (palabras[i].length > 0) {
        palabras[i] = palabras[i][0].toUpperCase() + palabras[i].substr(1);
      }
    }
    input.value = palabras.join(" ");
  }

   function capitalizarPrimeraLetra(input) {
        let valor = input.value;
        if (valor.length > 0) {
            input.value = valor.charAt(0).toUpperCase() + valor.slice(1);
        }
    }
</script>