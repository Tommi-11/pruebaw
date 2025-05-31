
<header class="flex items-center justify-between pb-4 border-b border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Principal</h1>
    <div>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cerrar sesión</button>
        </form>
    </div>
</header><?php /**PATH C:\xampp\htdocs\sisogrsu\resources\views/components/dashboard-header.blade.php ENDPATH**/ ?>