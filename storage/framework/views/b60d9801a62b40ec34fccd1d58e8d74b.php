<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2"><?php echo e($noticia->titulo); ?></h1>
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <span class="mr-2">Área: <?php echo e($noticia->area_origen); ?></span>
            <span class="mr-2">|</span>
            <span>Publicado: <?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i')); ?></span>
        </div>
        <?php if($noticia->imagen_path): ?>
            <img src="<?php echo e(Storage::url($noticia->imagen_path)); ?>" class="mb-4 w-full max-h-80 object-cover rounded shadow" />
        <?php endif; ?>
        <div class="prose max-w-none">
            <?php echo $noticia->descripcion; ?>

        </div>
    </div>
    <div class="mt-6">
        <a href="<?php echo e(route('noticias')); ?>" class="text-blue-700 hover:underline">&larr; Volver al listado</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/livewire/noticia-show.blade.php ENDPATH**/ ?>