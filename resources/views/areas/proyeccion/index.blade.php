{{-- resources/views/areas/proyeccion/index.blade.php --}}
@extends('layouts.app')
@section('content')
@can('viewAny', App\Models\ProyeccionSocial::class)
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Proyectos de Proyección Social</h1>
    @can('create', App\Models\ProyeccionSocial::class)
    <a href="{{ route('proyeccion.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Proyecto</a>
    @endcan
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="py-2 px-4">Proyecto</th>
                <th class="py-2 px-4">Beneficiarios</th>
                <th class="py-2 px-4">Responsable</th>
                <th class="py-2 px-4">Estado</th>
                <th class="py-2 px-4">Fechas</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyeccion)
                <tr>
                    <td class="py-2 px-4">{{ $proyeccion->proyecto }}</td>
                    <td class="py-2 px-4">{{ $proyeccion->beneficiarios }}</td>
                    <td class="py-2 px-4">{{ optional($proyeccion->responsable)->name ?? '-' }}</td>
                    <td class="py-2 px-4">{{ ucfirst($proyeccion->estado) }}</td>
                    <td class="py-2 px-4">{{ $proyeccion->fecha_inicio }} - {{ $proyeccion->fecha_fin }}</td>
                    <td class="py-2 px-4">
                        @can('update', $proyeccion)
                        <a href="{{ route('proyeccion.edit', $proyeccion) }}" class="text-blue-600">Editar</a>
                        @endcan
                        @can('delete', $proyeccion)
                        <form action="{{ route('proyeccion.destroy', $proyeccion) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2" onclick="return confirm('¿Eliminar este proyecto?')">Eliminar</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $proyectos->links() }}</div>
</div>
@endcan
@endsection
