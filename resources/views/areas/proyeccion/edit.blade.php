{{-- resources/views/areas/proyeccion/edit.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Editar Proyecto de Proyección Social</h1>
    <form action="{{ route('proyeccion.update', $proyeccion) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Proyecto</label>
            <input type="text" name="proyecto" class="border rounded w-full px-3 py-2" value="{{ $proyeccion->proyecto }}" required>
        </div>
        <div class="mb-4">
            <label class="block">Beneficiarios</label>
            <input type="text" name="beneficiarios" class="border rounded w-full px-3 py-2" value="{{ $proyeccion->beneficiarios }}">
        </div>
        <div class="mb-4">
            <label class="block">Responsable</label>
            <select name="responsable_id" class="border rounded w-full px-3 py-2" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" @if($proyeccion->responsable_id == $usuario->id) selected @endif>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Estado</label>
            <select name="estado" class="border rounded w-full px-3 py-2">
                <option value="pendiente" @if($proyeccion->estado=='pendiente') selected @endif>Pendiente</option>
                <option value="en_progreso" @if($proyeccion->estado=='en_progreso') selected @endif>En Progreso</option>
                <option value="finalizado" @if($proyeccion->estado=='finalizado') selected @endif>Finalizado</option>
                <option value="cancelado" @if($proyeccion->estado=='cancelado') selected @endif>Cancelado</option>
            </select>
        </div>
        <div class="mb-4 flex gap-4">
            <div class="w-1/2">
                <label class="block">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="border rounded w-full px-3 py-2" value="{{ $proyeccion->fecha_inicio }}">
            </div>
            <div class="w-1/2">
                <label class="block">Fecha Fin</label>
                <input type="date" name="fecha_fin" class="border rounded w-full px-3 py-2" value="{{ $proyeccion->fecha_fin }}">
            </div>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('proyeccion.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endsection
