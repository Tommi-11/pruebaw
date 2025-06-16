<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.header-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Responsabilidad Social Universitaria</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">La oficina de Responsabilidad Social Universitaria se encarga de programar, organizar y evaluar las iniciativas de RSU que se vinculan con el entorno de la universidad. Es un órgano de apoyo a la OGRSU y coordina directamente con las Unidades de RSU de las Facultades.</p>
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>

        <!-- secciones de Funciones Principales, Sobre los Proyectos y Programas de RSU -->
        
        <section class="mb-12">
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Funciones Principales</h2>
                
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Sensibilización Comunitaria</h3>
                            <p class="text-gray-600">Promovemos la conciencia sobre conductas responsables con la sociedad y medio ambiente en toda la comunidad universitaria.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Participación Activa</h3>
                            <p class="text-gray-600">Impulsamos la integración en actividades sociales y ambientales a través de programas estructurados.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Gestión de Recursos</h3>
                            <p class="text-gray-600">Fomentamos el uso responsable de recursos y compromiso social en todas las facultades y dependencias.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Integración Curricular</h3>
                            <p class="text-gray-600">Proponemos la inclusión del tema de RSU en el proyecto educativo de cada carrera profesional.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Apoyo Técnico</h3>
                            <p class="text-gray-600">Brindamos asistencia especializada para actividades de desarrollo social realizadas por docentes, estudiantes y administrativos.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Proyectos y Programas de RSU</h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Proyectos de RSU</h3>
                        <p class="text-gray-600">Iniciativas focalizadas para solucionar problemas específicos en comunidades, con una duración máxima de 1 a 6 meses.</p>
                        <div class="mt-4 text-blue-700 font-medium">Ejemplos:</div>
                        <ul class="list-disc pl-5 text-gray-600">
                            <li>Campañas de educación ambiental</li>
                            <li>Programas de alimentación comunitaria</li>
                            <li>Talleres de capacitación técnica</li>
                        </ul>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Programas de RSU</h3>
                        <p class="text-gray-600">Conjunto estructurado de proyectos que contribuyen al desarrollo sostenible y bienestar social a largo plazo.</p>
                        <div class="mt-4 text-blue-700 font-medium">Componentes:</div>
                        <ul class="list-disc pl-5 text-gray-600">
                            <li>Estrategias de impacto continuo</li>
                            <li>Alianzas interinstitucionales</li>
                            <li>Seguimiento y evaluación permanente</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/responsabilidad-social.blade.php ENDPATH**/ ?>