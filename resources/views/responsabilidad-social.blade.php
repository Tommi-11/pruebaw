@extends('layouts.app')

@section('content')
    @include('layouts.header-nav')
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
        <!-- Últimas Noticias -->
        <section class="bg-gray-50 py-8 border-t border-b">
            <div class="px-0">
                <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Últimas Noticias</h2>
                <div class="swiper noticias-swiper">
                    <div class="swiper-wrapper">
                        @foreach($noticias as $noticia)
                            <div class="swiper-slide h-full">
                                <div class="bg-white rounded-lg shadow-md flex flex-col overflow-hidden h-full">
                                    <img src="{{ asset('storage/' . $noticia->imagen_path) }}" alt="Miniatura"
                                        class="w-full h-32 object-cover rounded-t-lg border-b border-blue-100 shadow-sm bg-gray-100" style="aspect-ratio: 16/9;">
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h3 class="font-semibold text-blue-800 text-lg mb-1">{{ $noticia->titulo }}</h3>
                                        <!-- <p class="text-sm text-gray-600 flex-1">{{ strip_tags($noticia->descripcion) }}</p> -->
                                        <div class="text-xs text-gray-500 mt-2">{{ $noticia->area_origen }} | {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
        {{-- Carrusel de Documentos --}}
        <h2 class="font-serif text-2xl font-bold mb-6 text-blue-900">Documentos</h2>
        <div class="swiper documentos-swiper">
            <div class="swiper-wrapper">
                @foreach($documentos as $doc)
                    <div class="swiper-slide">
                        <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                            <img src="https://cdn.jsdelivr.net/gh/edent/SuperTinyIcons/images/svg/pdf.svg" alt="PDF" class="w-16 h-16 mb-2">
                            <div class="font-semibold text-center">{{ $doc->titulo }}</div>
                            <div class="flex gap-2 mt-3">
                                <a href="{{ asset('storage/' . $doc->path_archivo) }}" target="_blank"
                                   class="inline-flex items-center px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold rounded-lg shadow transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0A9 9 0 11 3 12a9 9 0 0118 0z"/>
                                    </svg>
                                    Ver PDF
                                </a>
                                <a href="{{ asset('storage/' . $doc->path_archivo) }}" download
                                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-blue-800 text-sm font-semibold rounded-lg shadow transition-colors duration-200 border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Descargar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </main>
    @include('layouts.footer')
    @push('scripts')
        @vite(['resources/js/app.js'])
    @endpush
@endsection
