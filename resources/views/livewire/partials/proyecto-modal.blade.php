<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4">{{ $modalMode === 'create' ? 'Nuevo Proyecto' : 'Editar Proyecto' }}</h2>
        <form wire:submit.prevent="saveProyecto">
            <div class="mb-4">
                <label class="block text-gray-700">Título</label>
                <input type="text" wire:model.defer="titulo" class="w-full border rounded px-3 py-2 mt-1" oninput="capitalizarPrimeraLetra(this)" />
                @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Temática</label>
                <textarea wire:model.defer="tematica" class="w-full border rounded px-3 py-2 mt-1"oninput="capitalizarPrimeraLetra(this)"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Líneas RSU</label>
                <textarea wire:model.defer="lineas_rsu" class="w-full border rounded px-3 py-2 mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">ODS (2-10)</label>
                <input type="text" wire:model="ods_search" placeholder="Buscar ODS por nombre..." class="w-full border rounded px-3 py-2 mt-1" />
                <div class="mt-2">
                    @if($ods_search)
                        @foreach($this->searchOds($ods_search) as $ods)
                            <div class="flex items-center justify-between bg-gray-100 rounded px-2 py-1 mb-1">
                                <span>{{ $ods->nombre }}</span>
                                <button type="button" wire:click="addOdsToProyecto({{ $ods->id }})" class="text-blue-600 text-xs">Agregar</button>
                            </div>
                        @endforeach
                        <button type="button" wire:click="showOdsRegisterModal" class="text-blue-600 text-xs mt-2">Registrar nuevo ODS</button>
                    @endif
                </div>
                <div class="mt-2">
                    @foreach($objetivos_desarrollo_sostenible as $id)
                        @php $ods = App\Models\Objetivos_desarrollo_sostenible::find($id); @endphp
                        @if($ods)
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span>{{ $ods->nombre }}</span>
                            <button type="button" wire:click="removeOdsFromProyecto({{ $ods->id }})" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        @endif
                    @endforeach
                </div>
                @error('objetivos_desarrollo_sostenible') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-2">
                <div>
                    <label class="block text-gray-700">Localidad</label>
                    <input type="text" wire:model.defer="ubicacion_localidad" class="w-full border rounded px-3 py-2 mt-1" onkeypress="return soloLetras(event)" oninput="ponerMayusculasCadaPalabra(this)" />
                </div>
                <div>
                    <label class="block text-gray-700">Distrito</label>
                    <input type="text" wire:model.defer="ubicacion_distrito" class="w-full border rounded px-3 py-2 mt-1" onkeypress="return soloLetras(event)" oninput="ponerMayusculasCadaPalabra(this)" />
                </div>
                <div>
                    <label class="block text-gray-700">Provincia</label>
                    <input type="text" wire:model.defer="ubicacion_provincia" class="w-full border rounded px-3 py-2 mt-1" onkeypress="return soloLetras(event)" oninput="ponerMayusculasCadaPalabra(this)"/>
                </div>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Beneficiarios Mínimo</label>
                    <input type="number" wire:model.defer="beneficiarios_numero_minimo" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
                <div>
                    <label class="block text-gray-700">Beneficiarios Máximo</label>
                    <input type="number" wire:model.defer="beneficiarios_numero_maximo" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Acciones Concretas</label>
                <textarea wire:model.defer="acciones_concretas" class="w-full border rounded px-3 py-2 mt-1" oninput="capitalizarPrimeraLetra(this)"></textarea>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Fecha Inicio</label>
                    <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-3 py-2 mt-1" id="fecha1" onchange="actualizarFecha2Min()"/>
                </div>
                <div>
                    <label class="block text-gray-700">Fecha Término</label>
                    <input type="date" wire:model.defer="fecha_termino" class="w-full border rounded px-3 py-2 mt-1" id="fecha2" />
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Estado</label>
                <select wire:model.defer="estado" class="w-full border rounded px-3 py-2 mt-1">
                    <option value="Registrado">Registrado</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="En Curso">En Curso</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="Con Informe">Con Informe</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Docente Tutor</label>
                <input type="text" wire:model="docente_search" placeholder="Buscar docente por nombre, apellido o DNI..." class="w-full border rounded px-3 py-2 mt-1" />
                <div class="mt-2">
                    @if($docente_search)
                        @foreach($this->searchDocentes($docente_search) as $docente)
                            <div class="flex items-center justify-between bg-gray-100 rounded px-2 py-1 mb-1">
                                <span>{{ $docente->nombres }} {{ $docente->apellidos }} ({{ $docente->dni }})</span>
                                <button type="button" wire:click="$set('docente_tutor_id', {{ $docente->id }})" class="text-blue-600 text-xs">Seleccionar</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                @if($docente_tutor_id)
                    <div class="mt-2 text-green-700 text-sm">Docente seleccionado: {{ optional(App\Models\Docente::find($docente_tutor_id))->nombres }} {{ optional(App\Models\Docente::find($docente_tutor_id))->apellidos }}</div>
                @endif
                @error('docente_tutor_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Equipo de Estudiantes (2-4)</label>
                <input type="text" wire:model="estudiante_search" placeholder="Buscar estudiante por nombre, apellido o código..." class="w-full border rounded px-3 py-2 mt-1" />
                <div class="mt-2">
                    @if($estudiante_search)
                        @foreach($this->searchEstudiantes($estudiante_search) as $est)
                            <div class="flex items-center justify-between bg-gray-100 rounded px-2 py-1 mb-1">
                                <span>{{ $est->nombres }} {{ $est->apellidos }} ({{ $est->codigo_universidad }})</span>
                                <button type="button" wire:click="addEstudianteToEquipo({{ $est->id }})" class="text-blue-600 text-xs">Agregar</button>
                            </div>
                        @endforeach
                        <button type="button" wire:click="showEstudianteRegisterModal" class="text-blue-600 text-xs mt-2">Registrar nuevo estudiante</button>
                    @endif
                </div>
                <div class="mt-2">
                    @foreach($equipo_estudiantes as $id)
                        @php $est = App\Models\Estudiantes::find($id); @endphp
                        @if($est)
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span>{{ $est->nombres }} {{ $est->apellidos }} ({{ $est->codigo_universidad }})</span>
                            <button type="button" wire:click="removeEstudianteFromEquipo({{ $est->id }})" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        @endif
                    @endforeach
                </div>
                @error('equipo_estudiantes') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">{{ $modalMode === 'create' ? 'Crear' : 'Actualizar' }}</button>
            </div>
        </form>
    </div>
</div>

@if($showOdsModal)
    @include('livewire.partials.ods-modal')
@endif



