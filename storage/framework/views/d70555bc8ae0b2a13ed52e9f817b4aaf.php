<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <?php $role = auth()->user()->role->name ?? ''; ?>
                <?php if($role === 'Administrador'): ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="p-6 bg-blue-100 rounded shadow">
                            <div class="text-2xl font-bold text-blue-900">Usuarios</div>
                            <div class="text-4xl mt-2"><?php echo e(\App\Models\User::count()); ?></div>
                        </div>
                        <div class="p-6 bg-green-100 rounded shadow">
                            <div class="text-2xl font-bold text-green-900">Proyectos</div>
                            <div class="text-4xl mt-2"><?php echo e(\App\Models\Proyecto::count()); ?></div>
                        </div>
                        <div class="p-6 bg-yellow-100 rounded shadow">
                            <div class="text-2xl font-bold text-yellow-900">Noticias</div>
                            <div class="text-4xl mt-2"><?php echo e(\App\Models\Noticia::count()); ?></div>
                        </div>
                    </div>
                <?php elseif($role === 'Encargado de Área'): ?>
                    <div class="text-lg text-blue-900 font-semibold">Bienvenido, Encargado de Área. Aquí verás tus proyectos y reportes asignados.</div>
                <?php elseif($role === 'Colaborador'): ?>
                    <div class="text-lg text-green-900 font-semibold">Bienvenido, Colaborador. Consulta tus actividades y tareas aquí.</div>
                <?php else: ?>
                    <div class="text-lg text-gray-700 font-semibold">Bienvenido al sistema. Consulta la información disponible según tu perfil.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/dashboard.blade.php ENDPATH**/ ?>