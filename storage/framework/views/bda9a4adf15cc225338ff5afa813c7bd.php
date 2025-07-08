<div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4"><?php echo e($modalMode === 'create' ? 'Nuevo Proyecto' : 'Editar Proyecto'); ?></h2>
        <form wire:submit.prevent="saveProyecto">
            <div class="mb-4">
                <label class="block text-gray-700">Título</label>
                <input type="text" wire:model.defer="titulo" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: Proyecto de Salud Comunitaria" />
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
                <textarea wire:model.defer="tematica" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['tematica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Describe la temática del proyecto"></textarea>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tematica'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Líneas RSU</label>
                <textarea wire:model.defer="lineas_rsu" maxlength="500" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['lineas_rsu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Describe las líneas RSU"></textarea>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['lineas_rsu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">ODS (2-10)</label>
                <button type="button" wire:click="showOdsRegisterModal" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">Seleccionar ODS</button>
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
                    <input type="text" wire:model.defer="ubicacion_localidad" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['ubicacion_localidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: Marian" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['ubicacion_localidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div>
                    <label class="block text-gray-700">Distrito</label>
                    <input type="text" wire:model.defer="ubicacion_distrito" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['ubicacion_distrito'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: Independencia" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['ubicacion_distrito'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div>
                    <label class="block text-gray-700">Provincia</label>
                    <input type="text" wire:model.defer="ubicacion_provincia" maxlength="255" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['ubicacion_provincia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: Ancash" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['ubicacion_provincia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Beneficiarios Mínimo</label>
                    <input type="number" wire:model.defer="beneficiarios_numero_minimo" min="0" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['beneficiarios_numero_minimo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: 2" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['beneficiarios_numero_minimo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div>
                    <label class="block text-gray-700">Beneficiarios Máximo</label>
                    <input type="number" wire:model.defer="beneficiarios_numero_maximo" min="0" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['beneficiarios_numero_maximo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Ej: 4" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['beneficiarios_numero_maximo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Acciones Concretas</label>
                <textarea wire:model.defer="acciones_concretas" maxlength="1000" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['acciones_concretas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Describe las acciones concretas del proyecto"></textarea>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['acciones_concretas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4 grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-gray-700">Fecha Inicio</label>
                    <input type="date" wire:model.defer="fecha_inicio" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div>
                    <label class="block text-gray-700">Fecha Término</label>
                    <input type="date" wire:model.defer="fecha_termino" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['fecha_termino'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fecha_termino'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Estado</label>
                <select wire:model.defer="estado" class="w-full border rounded px-3 py-2 mt-1 <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="Registrado">Registrado</option>
                    <option value="Aprobado">Aprobado</option>
                    <option value="En Curso">En Curso</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="Finalizado">Finalizado</option>
                    <option value="Con Informe">Con Informe</option>
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Docente Tutor</label>
                <button type="button" wire:click="$set('showDocenteModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">Seleccionar Docente</button>
                <div class="mt-2">
                    <!--[if BLOCK]><![endif]--><?php if($docente_tutor_id): ?>
                        <?php $docente = App\Models\Docente::find($docente_tutor_id); ?>
                        <!--[if BLOCK]><![endif]--><?php if($docente): ?>
                        <div class="flex items-center justify-between bg-green-100 rounded px-2 py-1 mb-1">
                            <span><?php echo e($docente->nombres); ?> <?php echo e($docente->apellidos); ?> (<?php echo e($docente->dni); ?>)</span>
                            <button type="button" wire:click="$set('docente_tutor_id', null)" class="text-red-600 text-xs">Quitar</button>
                        </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
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
                <button type="button" wire:click="$set('showEstudianteModal', true)" class="bg-blue-100 text-blue-800 px-3 py-2 rounded hover:bg-blue-200 mt-2">Seleccionar Estudiantes</button>
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

<!--[if BLOCK]><![endif]--><?php if($showDocenteModal): ?>
    <?php echo $__env->make('livewire.partials.docente-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->

<!--[if BLOCK]><![endif]--><?php if($showEstudianteModal): ?>
    <?php echo $__env->make('livewire.partials.estudiante-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/partials/proyecto-modal.blade.php ENDPATH**/ ?>