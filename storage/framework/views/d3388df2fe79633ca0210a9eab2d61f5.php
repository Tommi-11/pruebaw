
<aside class="w-64 bg-blue-900 text-white flex flex-col min-h-screen rounded-r-3xl shadow-xl">
    <div class="p-6 text-2xl font-bold border-b border-blue-800 rounded-tr-3xl">
        <span class="tracking-wide">CONTROL OGRSU</span>
    </div>
    <nav class="flex-1 px-4 py-6">
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Panel Principal</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('dashboard') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">home</span> Inicio
                    </a>
                </li>
            </ul>
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión de Usuarios</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="<?php echo e(route('users.index')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('users.index') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">people</span> Usuarios
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('roles.index')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('roles.index') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">badge</span> Cargos
                    </a>
                </li>
            </ul>
        </div>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión Responsabilidad Social</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="<?php echo e(route('facultades')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('facultades') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">apartment</span> Facultades
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('objetivos-desarrollo-sostenible')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('objetivos-desarrollo-sostenible') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">eco</span> Objetivos de Desarrollo Sostenible
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('estudiantes')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('estudiantes') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">school</span> Estudiantes
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('docentes')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('docentes') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">person</span> Docentes
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('proyectos')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('proyectos') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">assignment</span> Proyectos
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('noticias')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('noticias') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">article</span> Noticias
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('documentos')); ?>" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 <?php echo e(request()->routeIs('documentos') ? 'bg-blue-800 ring-2 ring-blue-400' : ''); ?>">
                        <span class="material-icons mr-2">description</span> Documentos
                    </a>
                </li>
            </ul>
        </div>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión Académica</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="#" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 opacity-60 cursor-not-allowed">
                        <span class="material-icons mr-2">school</span> Carreras
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 opacity-60 cursor-not-allowed">
                        <span class="material-icons mr-2">class</span> Materias
                    </a>
                </li>
            </ul>
        </div>
        <div class="mb-4">
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Gestión Administrativa</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="#" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 opacity-60 cursor-not-allowed">
                        <span class="material-icons mr-2">business_center</span> Proyectos
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <span class="text-xs font-semibold text-blue-200 uppercase pl-2">Reportes</span>
            <ul class="mt-2 space-y-1">
                <li>
                    <a href="#" class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-800 opacity-60 cursor-not-allowed">
                        <span class="material-icons mr-2">bar_chart</span> Estadísticas
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</aside><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/components/sidebar-menu.blade.php ENDPATH**/ ?>