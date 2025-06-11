<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                @php $role = auth()->user()->role->name ?? ''; @endphp
                @if($role === 'Administrador')
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="p-6 bg-blue-100 rounded shadow">
                            <div class="text-2xl font-bold text-blue-900">Usuarios</div>
                            <div class="text-4xl mt-2">{{ \App\Models\User::count() }}</div>
                        </div>
                        <div class="p-6 bg-green-100 rounded shadow">
                            <div class="text-2xl font-bold text-green-900">Proyectos</div>
                            <div class="text-4xl mt-2">{{ \App\Models\Proyecto::count() }}</div>
                        </div>
                        <div class="p-6 bg-yellow-100 rounded shadow">
                            <div class="text-2xl font-bold text-yellow-900">Noticias</div>
                            <div class="text-4xl mt-2">{{ \App\Models\Noticia::count() }}</div>
                        </div>
                    </div>
                @elseif($role === 'Encargado de Área')
                    <div class="text-lg text-blue-900 font-semibold">Bienvenido, Encargado de Área. Aquí verás tus proyectos y reportes asignados.</div>
                @elseif($role === 'Colaborador')
                    <div class="text-lg text-green-900 font-semibold">Bienvenido, Colaborador. Consulta tus actividades y tareas aquí.</div>
                @else
                    <div class="text-lg text-gray-700 font-semibold">Bienvenido al sistema. Consulta la información disponible según tu perfil.</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
