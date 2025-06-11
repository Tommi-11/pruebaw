{{-- resources/views/areas/extension/index.blade.php --}}
@extends('layouts.app')
@section('content')
@can('viewAny', App\Models\ExtensionUniversitaria::class)
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Eventos de Extensión Universitaria</h1>
    @can('create', App\Models\ExtensionUniversitaria::class)
    <a href="{{ route('extension.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Nuevo Evento</a>
    @endcan
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif
    <table class="min-w-full bg-white rounded shadow">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="py-2 px-4">Evento</th>
                <th class="py-2 px-4">Responsable</th>
                <th class="py-2 px-4">Participantes</th>
                <th class="py-2 px-4">Estado</th>
                <th class="py-2 px-4">Fechas</th>
                <th class="py-2 px-4">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $extension)
                <tr>
                    <td class="py-2 px-4">{{ $extension->evento }}</td>
                    <td class="py-2 px-4">{{ optional($extension->responsable)->name ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $extension->participantes }}</td>
                    <td class="py-2 px-4">{{ ucfirst($extension->estado) }}</td>
                    <td class="py-2 px-4">{{ $extension->fecha_inicio }} - {{ $extension->fecha_fin }}</td>
                    <td class="py-2 px-4">
                        @can('update', $extension)
                        <a href="{{ route('extension.edit', $extension) }}" class="text-blue-600">Editar</a>
                        @endcan
                        @can('delete', $extension)
                        <form action="{{ route('extension.destroy', $extension) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2" onclick="return confirm('¿Eliminar este evento?')">Eliminar</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $eventos->links() }}</div>
</div>
@endcan
@endsection
