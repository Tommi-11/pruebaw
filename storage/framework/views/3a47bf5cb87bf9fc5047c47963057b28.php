<nav class="h-full bg-blue-900 text-white w-64 flex-shrink-0 flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-blue-800">
        <?php echo e(config('app.name', 'RSU')); ?>

    </div>
    <ul class="flex-1 p-4 space-y-2">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 rounded hover:bg-blue-800 <?php echo e(request()->routeIs('dashboard') ? 'bg-blue-800' : ''); ?>">Dashboard</a>
        </li>
        <?php if(auth()->user() && auth()->user()->role && auth()->user()->role->name === 'Administrador'): ?>
            <li>
                <a href="<?php echo e(route('admin.usuarios')); ?>" class="block px-4 py-2 rounded hover:bg-blue-800 <?php echo e(request()->routeIs('admin.usuarios') ? 'bg-blue-800' : ''); ?>">Usuarios</a>
            </li>
        <?php endif; ?>
        <li>
            <a href="<?php echo e(route('proyeccion.social')); ?>" class="block px-4 py-2 rounded hover:bg-blue-800 <?php echo e(request()->routeIs('proyeccion.social') ? 'bg-blue-800' : ''); ?>">Proyección Social</a>
        </li>
        <li>
            <a href="<?php echo e(route('seguimiento.egresado')); ?>" class="block px-4 py-2 rounded hover:bg-blue-800 <?php echo e(request()->routeIs('seguimiento.egresado') ? 'bg-blue-800' : ''); ?>">Seguimiento Egresado</a>
        </li>
        <li>
            <a href="<?php echo e(route('extension.universitaria')); ?>" class="block px-4 py-2 rounded hover:bg-blue-800 <?php echo e(request()->routeIs('extension.universitaria') ? 'bg-blue-800' : ''); ?>">Extensión Universitaria</a>
        </li>
        <li>
            <a href="<?php echo e(route('responsabilidad.social')); ?>" class="block px-4 py-2 rounded hover:bg-blue-800 <?php echo e(request()->routeIs('responsabilidad.social') ? 'bg-blue-800' : ''); ?>">Responsabilidad Social</a>
        </li>
    </ul>
    <div class="p-4 border-t border-blue-800">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-blue-800">Cerrar sesión</button>
        </form>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>