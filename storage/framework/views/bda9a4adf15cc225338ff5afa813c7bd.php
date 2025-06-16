<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4"><?php echo e($modalMode === 'create' ? 'Nuevo Proyecto' : 'Editar Proyecto'); ?></h2>
        <form wire:submit.prevent="saveProyecto">
            <div class="mb-4">
                <label class="block text-gray-700">Título</label>
                <input type="text" wire:model.defer="titulo" class="w-full border rounded px-3 py-2 mt-1" />
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
                <label class="block text-gray-700">Temática</label>
                <textarea wire:model.defer="tematica" class="w-full border rounded px-3 py-2 mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Líneas RSU</label>
                <textarea wire:model.defer="lineas_rsu" class="w-full border rounded px-3 py-2 mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">ODS (2-10)</label>
                <input type="text" wire:model="ods_search" placeholder="Buscar ODS por nombre..." class="w-full border rounded px-3 py-2 mt-1" />
                <div class="mt-2">
                    <!--[if BLOCK]><![endif]--><?php if($ods_search): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->searchOds($ods_search); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between bg-gray-100 rounded px-2 py-1 mb-1">
                                <span><?php echo e($ods->nombre); ?></span>
                                <button type="button" wire:click="addOdsToProyecto(<?php echo e($ods->id); ?>)" class="text-blue-600 text-xs">Agregar</button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <button type="button" wire:click="showOdsRegisterModal" class="text-blue-600 text-xs mt-2">Registrar nuevo ODS</button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mt-2">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $objetivos_desarrollo_sostenible; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $ods = App\Models\Objetivos_desarrollo_sostenible::find($id); ?>
                        <!--[if BLOCK]><![endif]--><?php if($ods): ?>
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span><?php echo e($ods->nombre); ?></span>
                            <button type="button" wire:click="removeOdsFromProyecto(<?php echo e($ods->id); ?>)" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['objetivos_desarrollo_sostenible'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 gap-2">
                <div>
                    <label class="block text-gray-700">Localidad</label>
                    <input type="text" wire:model.defer="ubicacion_localidad" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
                <div>
                    <label class="block text-gray-700">Distrito</label>
                    <input type="text" wire:model.defer="ubicacion_distrito" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
                <div>
                    <label class="block text-gray-700">Provincia</label>
                    <input type="text" wire:model.defer="ubicacion_provincia" class="w-full border rounded px-3 py-2 mt-1" />
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
                <textarea wire:model.defer="acciones_concretas" class="w-full border rounded px-3 py-2 mt-1"></textarea>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Fecha Inicio</label>
                    <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-3 py-2 mt-1" />
                </div>
                <div>
                    <label class="block text-gray-700">Fecha Término</label>
                    <input type="date" wire:model.defer="fecha_termino" class="w-full border rounded px-3 py-2 mt-1" />
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
                    <!--[if BLOCK]><![endif]--><?php if($docente_search): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->searchDocentes($docente_search); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between bg-gray-100 rounded px-2 py-1 mb-1">
                                <span><?php echo e($docente->nombres); ?> <?php echo e($docente->apellidos); ?> (<?php echo e($docente->dni); ?>)</span>
                                <button type="button" wire:click="$set('docente_tutor_id', <?php echo e($docente->id); ?>)" class="text-blue-600 text-xs">Seleccionar</button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <!--[if BLOCK]><![endif]--><?php if($docente_tutor_id): ?>
                    <div class="mt-2 text-green-700 text-sm">Docente seleccionado: <?php echo e(optional(App\Models\Docente::find($docente_tutor_id))->nombres); ?> <?php echo e(optional(App\Models\Docente::find($docente_tutor_id))->apellidos); ?></div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['docente_tutor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Equipo de Estudiantes (2-4)</label>
                <input type="text" wire:model="estudiante_search" placeholder="Buscar estudiante por nombre, apellido o código..." class="w-full border rounded px-3 py-2 mt-1" />
                <div class="mt-2">
                    <!--[if BLOCK]><![endif]--><?php if($estudiante_search): ?>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->searchEstudiantes($estudiante_search); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between bg-gray-100 rounded px-2 py-1 mb-1">
                                <span><?php echo e($est->nombres); ?> <?php echo e($est->apellidos); ?> (<?php echo e($est->codigo_universidad); ?>)</span>
                                <button type="button" wire:click="addEstudianteToEquipo(<?php echo e($est->id); ?>)" class="text-blue-600 text-xs">Agregar</button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        <button type="button" wire:click="showEstudianteRegisterModal" class="text-blue-600 text-xs mt-2">Registrar nuevo estudiante</button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mt-2">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $equipo_estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $est = App\Models\Estudiantes::find($id); ?>
                        <!--[if BLOCK]><![endif]--><?php if($est): ?>
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span><?php echo e($est->nombres); ?> <?php echo e($est->apellidos); ?> (<?php echo e($est->codigo_universidad); ?>)</span>
                            <button type="button" wire:click="removeEstudianteFromEquipo(<?php echo e($est->id); ?>)" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['equipo_estudiantes'];
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
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded"><?php echo e($modalMode === 'create' ? 'Crear' : 'Actualizar'); ?></button>
            </div>
        </form>
    </div>
</div>

<!--[if BLOCK]><![endif]--><?php if($showOdsModal): ?>
    <?php echo $__env->make('livewire.partials.ods-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/proyecto-modal.blade.php ENDPATH**/ ?>