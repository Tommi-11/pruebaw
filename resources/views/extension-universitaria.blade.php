@extends('layouts.app')

@section('content')
    @include('layouts.header-nav')
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Extensión Universitaria</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">Es la encargada de promover, organizar y desarrollar eventos científicos, tecnológicos y culturales. Difunde los valores sociales y artísticos, y articula el conocimiento acumulado en la universidad con las distintas necesidades de la sociedad.</p>
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>
        <section class="mb-12">
            <!-- Objetivos -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Objetivos</h2>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Promoción Cultural</h3>
                            <p class="text-gray-600">Difundimos el arte y preservamos los valores culturales para fortalecer nuestra identidad institucional.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Formación Continua</h3>
                            <p class="text-gray-600">Optimizamos servicios de capacitación tecnológica y profesional para el desarrollo laboral.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Vinculación Comunitaria</h3>
                            <p class="text-gray-600">Organizamos eventos y convenios para fortalecer nuestro vínculo institucional con la sociedad.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Funciones Principales -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Funciones Principales</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Políticas Institucionales</h3>
                            <p class="text-gray-600">Establecemos lineamientos para la extensión universitaria.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Eventos Académicos</h3>
                            <p class="text-gray-600">Organizamos actividades de divulgación científica y cultural.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 19.477 5.754 19 7.5 19s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 19.477 18.247 19 16.5 19c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Educación Continua</h3>
                            <p class="text-gray-600">Desarrollamos diplomados, seminarios y cursos de actualización.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Orientación Vocacional</h3>
                            <p class="text-gray-600">Guiamos a estudiantes secundarios en su elección profesional.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modalidades -->
            <div class="bg-blue-50 rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Modalidades de Extensión</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-4 rounded-lg text-center">
                        <div class="bg-blue-100 w-12 h-12 rounded-lg mx-auto mb-3 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 19.477 5.754 19 7.5 19s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 19.477 18.247 19 16.5 19c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900">Orientación Vocacional</h3>
                    </div>

                    <div class="bg-white p-4 rounded-lg text-center">
                        <div class="bg-blue-100 w-12 h-12 rounded-lg mx-auto mb-3 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900">Educación Continua</h3>
                    </div>

                    <div class="bg-white p-4 rounded-lg text-center">
                        <div class="bg-blue-100 w-12 h-12 rounded-lg mx-auto mb-3 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900">Promoción Cultural</h3>
                    </div>

                    <div class="bg-white p-4 rounded-lg text-center">
                        <div class="bg-blue-100 w-12 h-12 rounded-lg mx-auto mb-3 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-blue-900">Centros de Arte</h3>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
