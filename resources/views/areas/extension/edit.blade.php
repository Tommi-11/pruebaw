{{-- resources/views/areas/extension/edit.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Editar Evento de Extensión Universitaria</h1>
    <form action="{{ route('extension.update', $extension) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Evento</label>
            <input type="text" name="evento" class="border rounded w-full px-3 py-2" value="{{ $extension->evento }}" required>
        </div>
        <div class="mb-4">
            <label class="block">Responsable</label>
            <select name="responsable_id" class="border rounded w-full px-3 py-2" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" @if($extension->responsable_id == $usuario->id) selected @endif>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Participantes</label>
            <input type="text" name="participantes" class="border rounded w-full px-3 py-2" value="{{ $extension->participantes }}">
        </div>
        <div class="mb-4">
            <label class="block">Estado</label>
            <select name="estado" class="border rounded w-full px-3 py-2">
                <option value="pendiente" @if($extension->estado=='pendiente') selected @endif>Pendiente</option>
                <option value="en_progreso" @if($extension->estado=='en_progreso') selected @endif>En Progreso</option>
                <option value="finalizado" @if($extension->estado=='finalizado') selected @endif>Finalizado</option>
                <option value="cancelado" @if($extension->estado=='cancelado') selected @endif>Cancelado</option>
            </select>
        </div>
        <div class="mb-4 flex gap-4">
            <div class="w-1/2">
                <label class="block">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="border rounded w-full px-3 py-2" value="{{ $extension->fecha_inicio }}">
            </div>
            <div class="w-1/2">
                <label class="block">Fecha Fin</label>
                <input type="date" name="fecha_fin" class="border rounded w-full px-3 py-2" value="{{ $extension->fecha_fin }}">
            </div>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('extension.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endsection
