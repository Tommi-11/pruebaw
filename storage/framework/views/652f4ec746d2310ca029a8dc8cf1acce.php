<div>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block">Título</label>
            <input type="text" wire:model.defer="titulo" class="input input-bordered w-full" required />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="mb-4">
            <label class="block">Categoría</label>
            <select wire:model.defer="categoria_id" class="input input-bordered w-full" required>
                <option value="">Seleccione</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="mb-4">
            <label class="block">Formato</label>
            <input type="text" wire:model.defer="formato" class="input input-bordered w-full" required />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['formato'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="mb-4">
            <label class="block">Tamaño (MB)</label>
            <input type="number" step="0.01" wire:model.defer="tamano_mb" class="input input-bordered w-full" required />
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tamano_mb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="flex justify-end">
            <button type="button" wire:click="$emitUp('closeModal')" class="btn btn-secondary mr-2">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo e($documentoId ? 'Actualizar' : 'Crear'); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/documentos-form.blade.php ENDPATH**/ ?>