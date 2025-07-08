<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h2 class="text-lg font-bold mb-4">Registrar Nuevo Estudiante</h2>
        <form wire:submit.prevent="saveNewEstudiante">
            <div class="mb-4">
                <label class="block text-gray-700">Nombres</label>
                <input type="text" wire:model.defer="newEstudiante.nombres" class="w-full border rounded px-3 py-2 mt-1" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.nombres'];
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
                <input type="text" wire:model.defer="newEstudiante.apellidos" class="w-full border rounded px-3 py-2 mt-1" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.apellidos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Código Universidad</label>
                <input type="text" wire:model.defer="newEstudiante.codigo_universidad" class="w-full border rounded px-3 py-2 mt-1" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.codigo_universidad'];
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
                <input type="text" wire:model.defer="newEstudiante.dni" class="w-full border rounded px-3 py-2 mt-1" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.dni'];
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
                <input type="text" wire:model.defer="newEstudiante.celular" class="w-full border rounded px-3 py-2 mt-1" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.celular'];
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
                <select wire:model.defer="newEstudiante.facultad_id" class="w-full border rounded px-3 py-2 mt-1">
                    <option value="">Seleccione una facultad</option>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = App\Models\Facultades::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($facultad->id); ?>"><?php echo e($facultad->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newEstudiante.facultad_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" wire:click="$set('showEstudianteModal', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Registrar y Agregar</button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/estudiante-modal.blade.php ENDPATH**/ ?>