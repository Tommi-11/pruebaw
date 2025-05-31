<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.header-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="flex-1 w-full">
        <!-- Banner principal -->
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Bienvenidos a la Universidad Nacional Santiago Antunez de Mayolo</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">Nuestra universidad se compromete con la excelencia académica, la formación integral y la proyección social. Descubre nuestras carreras, servicios y actividades institucionales.</p>
                        <a href="#info" class="inline-block bg-white text-blue-800 font-semibold px-6 py-2 rounded shadow hover:bg-blue-50 transition">Conoce más</a>
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>

        <!-- Últimas Noticias -->
        <section class="bg-gray-50 py-8 border-t border-b">
            <div class="px-0">
                <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Últimas Noticias</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden">
                        <img src="/img/noticia1.jpg" alt="Noticia 1" class="h-32 w-full object-cover">
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-semibold text-blue-800 text-lg mb-1">Ceremonia de Bienvenida</h3>
                            <p class="text-sm text-gray-600 flex-1">La universidad dio la bienvenida a los nuevos estudiantes del ciclo 2025-I.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden">
                        <img src="/img/noticia2.jpg" alt="Noticia 2" class="h-32 w-full object-cover">
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-semibold text-blue-800 text-lg mb-1">Reconocimiento a Docentes</h3>
                            <p class="text-sm text-gray-600 flex-1">Se reconoció la labor académica de los docentes destacados en 2024.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden">
                        <img src="/img/noticia3.jpg" alt="Noticia 3" class="h-32 w-full object-cover">
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-semibold text-blue-800 text-lg mb-1">Nueva Infraestructura</h3>
                            <p class="text-sm text-gray-600 flex-1">Inauguración del nuevo pabellón de laboratorios de ingeniería.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden">
                        <img src="/img/noticia4.jpg" alt="Noticia 4" class="h-32 w-full object-cover">
                        <div class="p-4 flex-1 flex flex-col">
                            <h3 class="font-semibold text-blue-800 text-lg mb-1">Torneo Deportivo</h3>
                            <p class="text-sm text-gray-600 flex-1">Torneo interno de fútbol universitario.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Calendario de Actividades -->
        <section class="bg-white py-8 border-t">
            <div class="px-0">
                <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Calendario de Actividades</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 rounded-lg shadow flex flex-col">
                        <div class="p-5 flex-1 flex flex-col">
                            <h4 class="font-bold mb-2 text-blue-800">Mayo 2025</h4>
                            <ul class="list-disc pl-6 text-sm text-gray-700 space-y-1">
                                <li>05 - Conferencia internacional</li>
                                <li>12 - Torneo de ajedrez</li>
                                <li>30 - Festival cultural</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-blue-50 rounded-lg shadow flex flex-col">
                        <div class="p-5 flex-1 flex flex-col">
                            <h4 class="font-bold mb-2 text-blue-800">Junio 2025</h4>
                            <ul class="list-disc pl-6 text-sm text-gray-700 space-y-1">
                                <li>03 - Campaña de salud</li>
                                <li>17 - Seminario de innovación</li>
                                <li>28 - Clausura del semestre</li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-blue-50 rounded-lg shadow flex flex-col">
                        <div class="p-5 flex-1 flex flex-col">
                            <h4 class="font-bold mb-2 text-blue-800">Julio 2025</h4>
                            <ul class="list-disc pl-6 text-sm text-gray-700 space-y-1">
                                <li>05 - Examen de admisión</li>
                                <li>15 - Inicio de ciclo académico</li>
                                <li>22 - Feria de orientación vocacional</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nuestras Plataformas Web -->
        <section class="py-8">
            <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Nuestras Plataformas Web</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow p-5 text-center flex flex-col items-center">
                    <img src="/img/plataforma1.png" alt="Sistema Académico" class="mb-3 h-12 w-auto">
                    <h5 class="font-bold text-blue-800 mb-1">Sistema Académico</h5>
                    <a href="#" class="text-blue-700 hover:underline text-sm font-medium">Ingresar</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center flex flex-col items-center">
                    <img src="/img/plataforma2.png" alt="Biblioteca Virtual" class="mb-3 h-12 w-auto">
                    <h5 class="font-bold text-blue-800 mb-1">Biblioteca Virtual</h5>
                    <a href="#" class="text-blue-700 hover:underline text-sm font-medium">Ingresar</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center flex flex-col items-center">
                    <img src="/img/plataforma3.png" alt="Aula Virtual" class="mb-3 h-12 w-auto">
                    <h5 class="font-bold text-blue-800 mb-1">Aula Virtual</h5>
                    <a href="#" class="text-blue-700 hover:underline text-sm font-medium">Ingresar</a>
                </div>
            </div>
        </section>

        <!-- Enlaces de Interés -->
        <section class="py-8">
            <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Enlaces de Interés</h2>
            <div class="flex flex-wrap gap-4 justify-center items-center">
                <img src="/img/enlace1.png" alt="Enlace 1" class="h-8 w-auto grayscale hover:grayscale-0 transition">
                <img src="/img/enlace2.png" alt="Enlace 2" class="h-8 w-auto grayscale hover:grayscale-0 transition">
                <img src="/img/enlace3.png" alt="Enlace 3" class="h-8 w-auto grayscale hover:grayscale-0 transition">
                <img src="/img/enlace4.png" alt="Enlace 4" class="h-8 w-auto grayscale hover:grayscale-0 transition">
                <img src="/img/enlace5.png" alt="Enlace 5" class="h-8 w-auto grayscale hover:grayscale-0 transition">
            </div>
        </section>
    </main>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu\resources\views/home.blade.php ENDPATH**/ ?>