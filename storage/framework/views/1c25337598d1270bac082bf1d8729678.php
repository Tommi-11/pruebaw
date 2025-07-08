<div x-data="{ showNewEstudianteForm: false }" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <button type="button" wire:click="$set('showEstudianteModal', false)" class="absolute top-2 right-2 text-gray-400 hover:text-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <h2 class="text-xl font-bold text-blue-900 mb-4">Seleccionar Estudiantes</h2>
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.400ms="estudiante_search" placeholder="Buscar estudiante por nombre, apellido o código..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="mb-2 flex flex-wrap gap-2">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $equipo_estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $est = App\Models\Estudiantes::find($estId); ?>
                <!--[if BLOCK]><![endif]--><?php if($est): ?>
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full flex items-center">
                    <span><?php echo e($est->nombres); ?> <?php echo e($est->apellidos); ?></span>
                    <button wire:click="removeEstudianteFromEquipo(<?php echo e($est->id); ?>)" class="ml-2 text-red-500 hover:text-red-700" title="Quitar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="mb-4 text-sm text-gray-600">
            Seleccionados: <span class="font-semibold text-blue-700"><?php echo e(count($equipo_estudiantes)); ?></span> / <?php echo e($beneficiarios_numero_maximo ?? 4); ?>

            <!--[if BLOCK]><![endif]--><?php if(count($equipo_estudiantes) < 2): ?>
                <span class="text-red-600 ml-2">(Mínimo 2 estudiantes)</span>
            <?php endif; ?>
            <?php if(count($equipo_estudiantes) > ($beneficiarios_numero_maximo ?? 4)): ?>
                <span class="text-red-600 ml-2">(Máximo <?php echo e($beneficiarios_numero_maximo ?? 4); ?> estudiantes)</span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="overflow-y-auto max-h-56 mb-4 border rounded">
            <ul>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->searchEstudiantes($estudiante_search); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex items-center justify-between px-3 py-2 border-b hover:bg-blue-50">
                        <div>
                            <span class="font-semibold text-blue-800"><?php echo e($est->nombres); ?> <?php echo e($est->apellidos); ?></span>
                            <span class="text-gray-500 text-xs ml-2"><?php echo e($est->codigo_universidad); ?></span>
                        </div>
                        <button wire:click="addEstudianteToEquipo(<?php echo e($est->id); ?>)" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50" <?php if(in_array($est->id, $equipo_estudiantes) || count($equipo_estudiantes) >= ($beneficiarios_numero_maximo ?? 4)): ?> disabled <?php endif; ?>>
                            Agregar
                        </button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php if(count($this->searchEstudiantes($estudiante_search)) == 0): ?>
                    <li class="px-3 py-2 text-gray-500">No se encontraron estudiantes.</li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>
        <div class="mb-4">
            <button @click="showNewEstudianteForm = !showNewEstudianteForm" class="text-blue-700 hover:underline flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Estudiante
            </button>
            <div x-show="showNewEstudianteForm" class="mt-3 bg-blue-50 p-4 rounded">
                <form wire:submit.prevent="saveNewEstudiante">
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Nombres</label>
                        <input type="text" wire:model.defer="newEstudiante.nombres" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="255">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.nombres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Apellidos</label>
                        <input type="text" wire:model.defer="newEstudiante.apellidos" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="255">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Código Universidad</label>
                        <input type="text" wire:model.defer="newEstudiante.codigo_universidad" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="20">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.codigo_universidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">DNI</label>
                        <input type="text" wire:model.defer="newEstudiante.dni" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="15">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Celular</label>
                        <input type="text" wire:model.defer="newEstudiante.celular" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" maxlength="20">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Facultad</label>
                        <select wire:model.defer="newEstudiante.facultad_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Seleccione una facultad</option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = App\Models\Facultades::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($facultad->id); ?>"><?php echo e($facultad->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.facultad_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" @click="showNewEstudianteForm = false" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="button" wire:click="$set('showEstudianteModal', false)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 mr-2">Cerrar</button>
            <button type="button" wire:click="$set('showEstudianteModal', false)" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800" <?php if(count($equipo_estudiantes) < 2 || count($equipo_estudiantes) > ($beneficiarios_numero_maximo ?? 4)): ?> disabled <?php endif; ?>>Confirmar selección</button>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/estudiante-modal.blade.php ENDPATH**/ ?>