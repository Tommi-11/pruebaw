@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto py-8">
    <div class="bg-white rounded shadow p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $noticia->titulo }}</h1>
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <span class="mr-2">Área: {{ $noticia->area_origen }}</span>
            <span class="mr-2">|</span>
            <span>Publicado: {{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y H:i') }}</span>
        </div>
        @if($noticia->imagen_path)
            <img src="{{ Storage::url($noticia->imagen_path) }}" class="mb-4 w-full max-h-80 object-cover rounded shadow" />
        @endif
        <div class="prose max-w-none">
            {!! $noticia->descripcion !!}
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('noticias') }}" class="text-blue-700 hover:underline">&larr; Volver al listado</a>
    </div>
</div>
@endsection
