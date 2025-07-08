<!-- Componente principal de Documentos: solo un root element -->
<div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Listado de Documentos</h2>
    <div class="flex justify-end mb-2">
        <button wire:click="showCreateModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Documento</button>
    </div>
    <div class="w-full md:w-1/3 mb-6">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Buscar por título..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full w-full table-auto divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 text-center uppercase w-16">#</th>
                    <th class="py-2 px-4 text-center uppercase">Título</th>
                    <th class="py-2 px-4 text-center uppercase">Categoría</th>
                    <th class="py-2 px-4 text-center uppercase">Formato</th>
                    <th class="py-2 px-4 text-center uppercase">Tamaño (MB)</th>
                    <th class="py-2 px-4 text-center uppercase">Dirección</th>
                    <th class="py-2 px-4 text-center uppercase w-40">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top"><?php echo e($doc->id); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top font-semibold text-gray-800"><?php echo e($doc->titulo); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($doc->categoria->nombre ?? '-'); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($doc->formato); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($doc->tamano_mb); ?></td>
                    <td class="px-4 py-3 whitespace-normal align-top text-gray-800"><?php echo e($doc->area_origen ?? '-'); ?></td>
                    <td class="px-4 py-3 whitespace-nowrap text-center align-top">
                        <div class="flex justify-center gap-2">
                            <a href="<?php echo e(Storage::url($doc->path_archivo)); ?>" target="_blank" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Ver</a>
                            <button wire:click="showEditModal(<?php echo e($doc->id); ?>)" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</button>
                            <button wire:click="confirmDelete(<?php echo e($doc->id); ?>)" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Eliminar</button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay documentos registrados.</td>
                </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <?php echo e($documentos->links()); ?>

    </div>

    <!-- Modal de Crear/Editar -->
    <!--[if BLOCK]><![endif]--><?php if($modalOpen): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4"><?php echo e($modalMode === 'create' ? 'Nuevo Documento' : 'Editar Documento'); ?></h2>
                <div class="mb-4">
                    <label class="block text-gray-700">Título</label>
                    <input type="text" wire:model.defer="titulo" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: Reglamento Interno" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Archivo PDF</label>
                    <input type="file" wire:model="archivo_pdf" accept="application/pdf" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['archivo_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['archivo_pdf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if($modalMode === 'edit' && $archivoActual): ?>
                        <div class="mt-4 border rounded p-3 bg-gray-50 flex items-center justify-between">
                            <div>
                                <span class="text-gray-700 font-semibold">Archivo actual:</span>
                                <a href="<?php echo e(Storage::url($archivoActual)); ?>" target="_blank" class="text-blue-600 underline ml-2">Ver PDF</a>
                            </div>
                            <button type="button" wire:click="confirmarEliminarArchivo" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-4">Eliminar</button>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <!-- Modal de Confirmación de Eliminación de Archivo -->
    <!--[if BLOCK]><![endif]--><?php if($confirmingDeleteArchivo): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Archivo</h2>
                <p class="mb-4">¿Está seguro que desea eliminar el archivo PDF de este documento? Esta acción no se puede deshacer.</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="$set('confirmingDeleteArchivo', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="eliminarArchivo" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Categoría</label>
                    <select wire:model.defer="categoria_id" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Seleccione una categoría</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['categoria_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Dirección</label>
                    <select wire:model.defer="area_origen" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['area_origen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Seleccione una dirección</option>
                        <option value="RSU">RSU</option>
                        <option value="Seguimiento al Egresado">Seguimiento al Egresado</option>
                        <option value="Proyeccion Social">Proyeccion Social</option>
                        <option value="Extension Universitaria">Extension Universitaria</option>
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['area_origen'];
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
                    <button wire:click="<?php echo e($modalMode === 'create' ? 'create' : 'update'); ?>" class="bg-blue-600 text-white px-4 py-2 rounded"><?php echo e($modalMode === 'create' ? 'Crear' : 'Actualizar'); ?></button>
                </div>
                <!-- Mensaje de éxito en modal -->
                <!--[if BLOCK]><![endif]--><?php if(session('success_message')): ?>
                    <?php if (isset($component)) { $__componentOriginal1347047ed676050ce05de3ccca425f13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1347047ed676050ce05de3ccca425f13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.exito-modal','data' => ['message' => session('success_message')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('exito-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('success_message'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1347047ed676050ce05de3ccca425f13)): ?>
<?php $attributes = $__attributesOriginal1347047ed676050ce05de3ccca425f13; ?>
<?php unset($__attributesOriginal1347047ed676050ce05de3ccca425f13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1347047ed676050ce05de3ccca425f13)): ?>
<?php $component = $__componentOriginal1347047ed676050ce05de3ccca425f13; ?>
<?php unset($__componentOriginal1347047ed676050ce05de3ccca425f13); ?>
<?php endif; ?>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Confirm Delete Modal -->
    <!--[if BLOCK]><![endif]--><?php if($confirmingDelete): ?>
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold mb-4">Eliminar Documento</h2>
                <p class="mb-4">¿Está seguro que desea eliminar este documento?</p>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" wire:click="$set('confirmingDelete', false)" class="bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button wire:click="deleteDocumento" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Mensaje de éxito global (fuera de modal) -->
    <?php if(session('success_message') && !$modalOpen): ?>
        <?php if (isset($component)) { $__componentOriginal1347047ed676050ce05de3ccca425f13 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1347047ed676050ce05de3ccca425f13 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.exito-modal','data' => ['message' => session('success_message')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('exito-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('success_message'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1347047ed676050ce05de3ccca425f13)): ?>
<?php $attributes = $__attributesOriginal1347047ed676050ce05de3ccca425f13; ?>
<?php unset($__attributesOriginal1347047ed676050ce05de3ccca425f13); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1347047ed676050ce05de3ccca425f13)): ?>
<?php $component = $__componentOriginal1347047ed676050ce05de3ccca425f13; ?>
<?php unset($__componentOriginal1347047ed676050ce05de3ccca425f13); ?>
<?php endif; ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/documentos.blade.php ENDPATH**/ ?>