<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e($titulo ?? 'Nuevo mensaje de contacto'); ?></title>
</head>
<body>
    <h2><?php echo e($titulo ?? 'Nuevo mensaje de contacto'); ?></h2>
    <p><strong>Correo electrónico:</strong> <?php echo e($email); ?></p>
    <p><strong>Asunto:</strong> <?php echo e($asunto); ?></p>
    <p><strong>Mensaje:</strong></p>
    <p><?php echo e($mensaje); ?></p>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/emails/contacto_rsu.blade.php ENDPATH**/ ?>