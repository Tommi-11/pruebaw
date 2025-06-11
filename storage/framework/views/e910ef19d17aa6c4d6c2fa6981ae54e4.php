<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

        <!-- Styles -->
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    </head>
    <body class="bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 min-h-screen flex flex-col justify-center items-center">
        <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg mt-8">
            <div class="flex flex-col items-center mb-6">
                <img src="/images/logo.png" alt="Logo RSU" class="h-16 mb-2">
                <h1 class="text-2xl font-bold text-blue-900 mb-1"><?php echo e(config('app.name', 'Sistema de Gestión de RSU')); ?></h1>
                <span class="text-sm text-blue-700 font-semibold tracking-wide">Gestión Universitaria Responsable</span>
            </div>
            <?php echo e($slot); ?>

        </div>
        <footer class="mt-8 text-white text-xs opacity-80">&copy; <?php echo e(date('Y')); ?> Universidad. Todos los derechos reservados.</footer>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/layouts/guest.blade.php ENDPATH**/ ?>