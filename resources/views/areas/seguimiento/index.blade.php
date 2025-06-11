{{-- resources/views/areas/seguimiento/index.blade.php --}}
@extends('layouts.app')
@section('content')
@can('viewAny', App\Models\SeguimientoEgresado::class)
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Seguimiento y Certificación al Egresado</h1>
    @can('create', App\Models\SeguimientoEgresado::class)
    <a href="{{ route('seguimiento.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Registro</a>
    @endcan
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="py-2 px-4">Egresado</th>
                <th class="py-2 px-4">Año</th>
                <th class="py-2 px-4">Estado</th>
                <th class="py-2 px-4">Certificaciones</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $seguimiento)
                <tr>
                    <td class="py-2 px-4">{{ optional($seguimiento->egresado)->name ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $seguimiento->anio }}</td>
                    <td class="py-2 px-4">{{ ucfirst($seguimiento->estado) }}</td>
                    <td class="py-2 px-4">{{ $seguimiento->certificaciones }}</td>
                    <td class="py-2 px-4">
                        @can('update', $seguimiento)
                        <a href="{{ route('seguimiento.edit', $seguimiento) }}" class="text-blue-600">Editar</a>
                        @endcan
                        @can('delete', $seguimiento)
                        <form action="{{ route('seguimiento.destroy', $seguimiento) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2" onclick="return confirm('¿Eliminar este registro?')">Eliminar</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $registros->links() }}</div>
</div>
@endcan
@endsection
