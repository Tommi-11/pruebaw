<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Docentes</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="openModal('create')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Docente</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por nombre, apellido o DNI..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Nombres</th>
                    <th class="py-2 px-4 text-center uppercase">Apellidos</th>
                    <th class="py-2 px-4 text-center uppercase">DNI</th>
                    <th class="py-2 px-4 text-center uppercase">Facultad</th>
                    <th class="py-2 px-4 text-center uppercase">Departamento</th>
                    <th class="py-2 px-4 text-center uppercase">Celular</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top"><?php echo e($docente->id); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800"><?php echo e($docente->nombres); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($docente->apellidos); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($docente->dni); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($docente->facultad->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($docente->departamento); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($docente->celular); ?></td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <button wire:click="openModal('edit', <?php echo e($docente->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($docente->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="px-4 py-6 text-center text-gray-500">No hay docentes registrados.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($docentes->links()); ?>

    </div>

    <!-- Modal -->
    <!--[if BLOCK]><![endif]--><?php if($modalOpen): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4"><?php echo e($modalMode === 'create' ? 'Nuevo Docente' : 'Editar Docente'); ?></h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Nombres</label>
                    <input type="text" wire:model.defer="nombres" class="w-full border rounded px-3 py-2 mt-1" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Apellidos</label>
                    <input type="text" wire:model.defer="apellidos" class="w-full border rounded px-3 py-2 mt-1" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">DNI</label>
                    <input type="text" wire:model.defer="dni" class="w-full border rounded px-3 py-2 mt-1" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['dni'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Facultad</label>
                    <select wire:model.defer="facultad_id" class="w-full border rounded px-3 py-2 mt-1">
                        <option value="">Seleccione una facultad</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $facultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($facultad->id); ?>"><?php echo e($facultad->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['facultad_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Departamento</label>
                    <input type="text" wire:model.defer="departamento" class="w-full border rounded px-3 py-2 mt-1" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['departamento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Celular</label>
                    <input type="text" wire:model.defer="celular" class="w-full border rounded px-3 py-2 mt-1" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['celular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="closeModal" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="saveDocente" class="bg-blue-600 text-white px-4 py-2 rounded"><?php echo e($modalMode === 'create' ? 'Crear' : 'Actualizar'); ?></button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Confirm Delete Modal -->
    <!--[if BLOCK]><![endif]--><?php if($confirmingDelete): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Docente</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este docente?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="$set('confirmingDelete', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteDocente" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/docentes.blade.php ENDPATH**/ ?>