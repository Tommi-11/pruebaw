{{-- resources/views/areas/seguimiento/edit.blade.php --}}
@extends('layouts.app')
@section('content')
@can('update', $seguimiento)
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Editar Seguimiento de Egresado</h1>
    <form action="{{ route('seguimiento.update', $seguimiento) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block">Egresado</label>
            <select name="egresado_id" class="border rounded w-full px-3 py-2" required>
                @foreach($egresados as $egresado)
                    @if($egresado && isset($egresado->name))
                        <option value="{{ $egresado->id }}" @if($seguimiento->egresado_id == $egresado->id) selected @endif>{{ $egresado->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('egresado_id')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Año</label>
            <input type="number" name="anio" class="border rounded w-full px-3 py-2" min="1900" max="{{ date('Y') }}" value="{{ $seguimiento->anio }}" required>
            @error('anio')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Estado</label>
            <select name="estado" class="border rounded w-full px-3 py-2">
                <option value="activo" @if($seguimiento->estado=='activo') selected @endif>Activo</option>
                <option value="inactivo" @if($seguimiento->estado=='inactivo') selected @endif>Inactivo</option>
                <option value="certificado" @if($seguimiento->estado=='certificado') selected @endif>Certificado</option>
            </select>
            @error('estado')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block">Certificaciones</label>
            <textarea name="certificaciones" class="border rounded w-full px-3 py-2">{{ $seguimiento->certificaciones }}</textarea>
            @error('certificaciones')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('seguimiento.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endcan
@if(!auth()->user()->can('update', $seguimiento))
<div class="container mx-auto py-6 text-center text-red-600">
    No tiene permiso para editar este registro.
</div>
@endif
@endsection
