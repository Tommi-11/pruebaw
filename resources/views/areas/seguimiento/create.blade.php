{{-- resources/views/areas/seguimiento/create.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Nuevo Seguimiento de Egresado</h1>
    <form action="{{ route('seguimiento.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block">Egresado</label>
            <select name="egresado_id" class="border rounded w-full px-3 py-2" required>
                <option value="">Seleccione...</option>
                @foreach($egresados as $egresado)
                    <option value="{{ $egresado->id }}">{{ $egresado->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Año</label>
            <input type="number" name="anio" class="border rounded w-full px-3 py-2" min="1900" max="{{ date('Y') }}" required>
        </div>
        <div class="mb-4">
            <label class="block">Estado</label>
            <select name="estado" class="border rounded w-full px-3 py-2">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="certificado">Certificado</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block">Certificaciones</label>
            <textarea name="certificaciones" class="border rounded w-full px-3 py-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('seguimiento.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endsection
