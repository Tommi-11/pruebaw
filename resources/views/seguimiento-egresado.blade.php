@extends('layouts.app')

@section('content')
    @include('layouts.header-nav')
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Seguimiento y Certificación al Egresado</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">Esta área se instituye para fomentar y facilitar oportunidades y relaciones sociales y laborales que apoyen el desarrollo de la vida profesional del egresado de la UNASAM. Su función es mantener una vinculación permanente con ellos.</p>
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>

        <section class="mb-12">
            <!-- Objetivo Principal -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Objetivo Principal</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Servir de enlace entre instituciones públicas, privadas y egresados de la UNASAM para facilitar 
                    su inserción laboral, manteniendo una vinculación permanente que impulse su desarrollo profesional.
                </p>
            </div>

            <!-- Funciones Principales -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Funciones Principales</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Base de Datos Actualizada</h3>
                            <p class="text-gray-600">Mantenemos un registro permanente del perfil y necesidades de nuestros egresados.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Monitoreo Laboral</h3>
                            <p class="text-gray-600">Seguimiento continuo de la inserción laboral y medición de empleabilidad.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Gestión de Bolsa de Trabajo</h3>
                            <p class="text-gray-600">Coordinación de ofertas laborales según perfiles académicos y experiencia.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="bg-blue-100 p-3 rounded-lg shrink-0">
                            <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-blue-900 mb-2">Alianzas Estratégicas</h3>
                            <p class="text-gray-600">Colaboración con instituciones para mejorar nuestra plataforma virtual.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Servicio Destacado -->
            <div class="bg-blue-50 rounded-xl shadow-lg p-8">
                <h2 class="text-3xl font-serif font-semibold text-blue-900 mb-6">Bolsa de Trabajo UNASAM</h2>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">¿Qué es?</h3>
                        <p class="text-gray-600">Plataforma de vinculación laboral que conecta egresados con oportunidades profesionales acordes a su formación académica.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Funcionamiento</h3>
                        <ul class="list-disc pl-6 space-y-2 text-gray-600">
                            <li>Recepción y clasificación de ofertas laborales</li>
                            <li>Emparejamiento inteligente por perfiles académicos</li>
                            <li>Notificaciones personalizadas a egresados</li>
                            <li>Sistema de postulación cronológica</li>
                        </ul>
                    </div>

                    <div class="bg-white p-4 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-900 mb-3">Vigencia</h3>
                        <p class="text-gray-600">
                            Registro activo por 
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">5 años</span>
                            desde la fecha de egreso
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
