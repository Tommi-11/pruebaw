{{-- resources/views/areas/proyeccion/create.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Nuevo Proyecto de Proyección Social</h1>
    <form action="{{ route('proyeccion.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block">Proyecto</label>
            <input type="text" name="proyecto" class="border rounded w-full px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block">Beneficiarios</label>
            <input type="text" name="beneficiarios" class="border rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block">Responsable</label>
            <select name="responsable_id" class="border rounded w-full px-3 py-2" required>
                <option value="">Seleccione...</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Estado</label>
            <select name="estado" class="border rounded w-full px-3 py-2">
                <option value="pendiente">Pendiente</option>
                <option value="en_progreso">En Progreso</option>
                <option value="finalizado">Finalizado</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>
        <div class="mb-4 flex gap-4">
            <div class="w-1/2">
                <label class="block">Fecha Inicio</label>
                <input type="date" name="fecha_inicio" class="border rounded w-full px-3 py-2">
            </div>
            <div class="w-1/2">
                <label class="block">Fecha Fin</label>
                <input type="date" name="fecha_fin" class="border rounded w-full px-3 py-2">
            </div>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('proyeccion.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endsection
