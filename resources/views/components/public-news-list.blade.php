<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold text-blue-900 mb-6">Noticias y Eventos</h2>
    <div class="grid gap-6">
        @foreach($noticias as $noticia)
            <div class="bg-white rounded shadow p-6 flex flex-col md:flex-row gap-4">
                @if($noticia->imagen_path)
                    <img src="{{ asset('storage/' . $noticia->imagen_path) }}" alt="Imagen noticia" class="h-32 w-32 object-cover rounded mb-2 md:mb-0">
                @endif
                <div class="flex-1">
                    <div class="text-lg font-semibold text-blue-900">{{ $noticia->titulo }}</div>
                    <div class="text-xs text-gray-500 mb-2">{{ \Carbon\Carbon::parse($noticia->fecha_publicacion)->format('d/m/Y') }}</div>
                    <div class="text-gray-700">{{ $noticia->descripcion }}</div>
                </div>
            </div>
        @endforeach
        @if($noticias->isEmpty())
            <div class="text-center text-gray-500">No hay noticias publicadas.</div>
        @endif
    </div>
</div>
