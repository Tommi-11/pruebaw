<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                {{-- Personalización visual: tarjetas para cada área --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @can('viewAny', App\Models\RSU::class)
                    <a href="{{ route('rsu.index') }}" class="block bg-blue-100 hover:bg-blue-200 rounded-lg p-6 text-center shadow transition">
                        <div class="text-3xl mb-2">📚</div>
                        <div class="font-bold">RSU</div>
                        <div class="text-sm text-gray-600">Responsabilidad Social Universitaria</div>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\SeguimientoEgresado::class)
                    <a href="{{ route('seguimiento.index') }}" class="block bg-green-100 hover:bg-green-200 rounded-lg p-6 text-center shadow transition">
                        <div class="text-3xl mb-2">🎓</div>
                        <div class="font-bold">Seguimiento Egresado</div>
                        <div class="text-sm text-gray-600">Certificación y seguimiento</div>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\ProyeccionSocial::class)
                    <a href="{{ route('proyeccion.index') }}" class="block bg-yellow-100 hover:bg-yellow-200 rounded-lg p-6 text-center shadow transition">
                        <div class="text-3xl mb-2">🤝</div>
                        <div class="font-bold">Proyección Social</div>
                        <div class="text-sm text-gray-600">Proyectos y beneficiarios</div>
                    </a>
                    @endcan
                    @can('viewAny', App\Models\ExtensionUniversitaria::class)
                    <a href="{{ route('extension.index') }}" class="block bg-purple-100 hover:bg-purple-200 rounded-lg p-6 text-center shadow transition">
                        <div class="text-3xl mb-2">🏛️</div>
                        <div class="font-bold">Extensión Universitaria</div>
                        <div class="text-sm text-gray-600">Eventos y actividades</div>
                    </a>
                    @endcan
                </div>
                {{-- Mensaje de bienvenida --}}
                <div class="mt-8 text-center text-gray-500">
                    Bienvenido, {{ Auth::user()->name }}. Selecciona un área para gestionar.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
