<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.header-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="flex-1 w-full">
        <!-- Banner principal -->
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Bienvenidos a la Oficina General de Responsabillidad Social Universitaria</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">La Oficina General de Responsabilidad Social Universitaria (OGRSU) es el organismo de más alto nivel en la UNASAM en el ámbito de Responsabilidad Social. Se define como un órgano de línea de gestión ética y eficaz del impacto generado por la universidad en la sociedad, derivado de sus funciones académica, de investigación y de servicios de extensión. Su principal encargo es planificar, orientar, coordinar y organizar las actividades que se desarrollarán en sus distintas direcciones y en las unidades de RSU de cada facultad.</p>
                        <!-- <a href="#info" class="inline-block bg-white text-blue-800 font-semibold px-6 py-2 rounded shadow hover:bg-blue-50 transition">Conoce más</a> -->
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>

        <!-- Sección Nuestro Propósito - Diseño moderno y formal -->
        <section class="bg-gradient-to-r from-blue-800 to-blue-600 py-12 rounded-2xl shadow-xl mb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-serif font-bold text-white mb-4">Nuestro Propósito</h2>
                    <p class="text-xl text-blue-100">Objetivos Generales de la OGRSU</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-8">
                    <p class="text-lg text-white mb-6 leading-relaxed">
                        La OGRSU busca regular la propuesta, diseño, ejecución y evaluación de los programas 
                        y proyectos de RSU con la participación de toda la comunidad universitaria. 
                        Sus objetivos principales son:
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <h3 class="text-blue-200 font-semibold mb-3">Clima Laboral</h3>
                            <p class="text-white text-sm">Contribuir al buen clima laboral para mejorar continuamente los fines educativos y cognitivos</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <h3 class="text-blue-200 font-semibold mb-3">Gobierno Institucional</h3>
                            <p class="text-white text-sm">Fomentar la ética, transparencia e inclusión para el buen gobierno institucional</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <h3 class="text-blue-200 font-semibold mb-3">Desarrollo Regional</h3>
                            <p class="text-white text-sm">Posicionar a la UNASAM como actor clave en el desarrollo de Ancash y promotor de transformación social</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <h3 class="text-blue-200 font-semibold mb-3">Campus Sostenible</h3>
                            <p class="text-white text-sm">Crear un campus sostenible y responsable en todas sus dimensiones</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <h3 class="text-blue-200 font-semibold mb-3">Investigación Comunitaria</h3>
                            <p class="text-white text-sm">Fomentar la investigación que involucra a la comunidad desde el diseño y ejecución de acciones</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <h3 class="text-blue-200 font-semibold mb-3">Difusión del Conocimiento</h3>
                            <p class="text-white text-sm">Producir y difundir públicamente los conocimientos generados en la investigación especializada</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        

        <!-- Sección Principios y Valores - Diseño moderno -->
        <section class="bg-gradient-to-r from-green-700 to-green-600 py-12 rounded-2xl shadow-xl mb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-serif font-bold text-white mb-4">Principios y Valores</h2>
                    <p class="text-xl text-green-100">Fundamentos éticos de la gestión universitaria</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Dignidad</h3>
                            <p class="text-green-100 text-sm">Construcción de personas autónomas con razón y conciencia</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Libertad</h3>
                            <p class="text-green-100 text-sm">Respeto de derechos y libertades de la comunidad universitaria</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Democracia</h3>
                            <p class="text-green-100 text-sm">Participación libre y responsable en la toma de decisiones</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Solidaridad</h3>
                            <p class="text-green-100 text-sm">Fortalecimiento de la identidad y reconocimiento colectivo</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Equidad</h3>
                            <p class="text-green-100 text-sm">Igualdad de oportunidades para el desarrollo integral</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Sostenibilidad</h3>
                            <p class="text-green-100 text-sm">Desarrollo permanente del capital humano e institucional</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Transparencia</h3>
                            <p class="text-green-100 text-sm">Ejercicio abierto y verificable de las funciones universitarias</p>
                        </div>
                        
                        <div class="bg-white/5 p-6 rounded-lg border border-white/10">
                            <div class="text-green-300 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-white mb-2">Ética</h3>
                            <p class="text-green-100 text-sm">Alineamiento con valores morales y costumbres sociales</p>
                        </div>
                    </div>
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



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sisogrsu1\resources\views/home.blade.php ENDPATH**/ ?>