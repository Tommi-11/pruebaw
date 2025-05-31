@extends('layouts.app')

@section('content')
    @include('layouts.header-nav')
    <main class="flex-1 w-full">
        <section class="my-8">
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <div class="lg:w-2/3 mb-3 lg:mb-0">
                    <div class="bg-gradient-to-r from-blue-700 to-blue-400 rounded-xl shadow-lg p-8 flex flex-col justify-center h-full">
                        <h1 class="text-3xl md:text-4xl font-serif font-bold text-white mb-2">Proyección Social</h1>
                        <p class="text-lg text-blue-100 mb-4 max-w-2xl">La oficina de Proyección Social fortalece la vinculación entre la universidad y la sociedad, promoviendo proyectos de impacto comunitario.</p>
                    </div>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/images/escudo_unasam.png" alt="Escudo Universidad" class="h-40 w-auto drop-shadow-xl">
                </div>
            </div>
        </section>
        <section class="mb-12">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-semibold mb-4 text-blue-900">Áreas de Acción</h2>
                <ul class="list-disc pl-6 mb-4 text-blue-900">
                    <li>Proyectos PSU</li>
                    <li>Convenios con instituciones</li>
                    <li>Actividades de responsabilidad social universitaria</li>
                </ul>
                <h2 class="text-xl font-semibold mb-2 text-blue-900">Noticias y Publicaciones</h2>
                <div class="space-y-4">
                    <div class="bg-blue-50 p-4 rounded">
                        <h3 class="font-bold">Convocatoria a voluntariado 2025</h3>
                        <p class="text-sm text-gray-600">¡Participa en los proyectos de proyección social! Inscríbete hasta el 15 de mayo.</p>
                    </div>
                    <div class="bg-blue-50 p-4 rounded">
                        <h3 class="font-bold">Nuevo convenio con ONG local</h3>
                        <p class="text-sm text-gray-600">Se firmó un convenio para el desarrollo de talleres comunitarios en zonas rurales.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
@endsection
