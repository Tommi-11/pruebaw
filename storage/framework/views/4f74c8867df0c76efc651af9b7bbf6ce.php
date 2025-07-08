
<div x-data="{ showNewOdsForm: false }" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
        <button type="button" wire:click="$set('showOdsModal', false)" class="absolute top-2 right-2 text-gray-400 hover:text-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <h2 class="text-xl font-bold text-blue-900 mb-4">Seleccionar Objetivos de Desarrollo Sostenible (ODS)</h2>
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.400ms="ods_search" placeholder="Buscar ODS..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <div class="mb-2 flex flex-wrap gap-2">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $objetivos_desarrollo_sostenible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $odsId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $ods = App\Models\Objetivos_desarrollo_sostenible::find($odsId); ?>
                <!--[if BLOCK]><![endif]--><?php if($ods): ?>
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full flex items-center">
                    <span><?php echo e($ods->nombre); ?></span>
                    <button wire:click="removeOdsFromProyecto(<?php echo e($ods->id); ?>)" class="ml-2 text-red-500 hover:text-red-700" title="Quitar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </span>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="mb-4 text-sm text-gray-600">
            Seleccionados: <span class="font-semibold text-blue-700"><?php echo e(count($objetivos_desarrollo_sostenible)); ?></span> / 10
            <!--[if BLOCK]><![endif]--><?php if(count($objetivos_desarrollo_sostenible) < 2): ?>
                <span class="text-red-600 ml-2">(Mínimo 2 ODS)</span>
            <?php endif; ?>
            <?php if(count($objetivos_desarrollo_sostenible) > 10): ?>
                <span class="text-red-600 ml-2">(Máximo 10 ODS)</span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
        <div class="overflow-y-auto max-h-56 mb-4 border rounded">
            <ul>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->searchOds($ods_search); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex items-center justify-between px-3 py-2 border-b hover:bg-blue-50">
                        <div>
                            <span class="font-semibold text-blue-800"><?php echo e($ods->nombre); ?></span>
                            <span class="text-gray-500 text-xs ml-2"><?php echo e($ods->descripcion); ?></span>
                        </div>
                        <button wire:click="addOdsToProyecto(<?php echo e($ods->id); ?>)" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50" <?php if(in_array($ods->id, $objetivos_desarrollo_sostenible) || count($objetivos_desarrollo_sostenible) >= 10): ?> disabled <?php endif; ?>>
                            Agregar
                        </button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php if(count($this->searchOds($ods_search)) == 0): ?>
                    <li class="px-3 py-2 text-gray-500">No se encontraron ODS.</li>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </ul>
        </div>
        <div class="mb-4">
            <button @click="showNewOdsForm = !showNewOdsForm" class="text-blue-700 hover:underline flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo ODS
            </button>
            <div x-show="showNewOdsForm" class="mt-3 bg-blue-50 p-4 rounded">
                <form wire:submit.prevent="saveNewOds">
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Nombre</label>
                        <input type="text" wire:model.defer="newOds.nombre" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required maxlength="255">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newOds.nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-blue-900">Descripción</label>
                        <textarea wire:model.defer="newOds.descripcion" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required></textarea>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newOds.descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="flex justify-end gap-2 mt-2">
                        <button type="button" @click="showNewOdsForm = false" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="button" wire:click="$set('showOdsModal', false)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 mr-2">Cerrar</button>
            <button type="button" wire:click="$set('showOdsModal', false)" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800" <?php if(count($objetivos_desarrollo_sostenible) < 2 || count($objetivos_desarrollo_sostenible) > 10): ?> disabled <?php endif; ?>>Confirmar selección</button>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/ods-modal.blade.php ENDPATH**/ ?>