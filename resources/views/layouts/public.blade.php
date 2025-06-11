<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Gestión de RSU') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-900 via-blue-700 to-blue-500 min-h-screen flex flex-col">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <img src="/images/logo.png" alt="Logo RSU" class="h-10">
            <span class="text-xl font-bold text-blue-900">{{ config('app.name', 'RSU') }}</span>
        </div>
        <div class="space-x-4">
            <a href="/" class="text-blue-900 hover:underline">Inicio</a>
            <a href="{{ route('proyeccion.social') }}" class="text-blue-900 hover:underline">Proyección Social</a>
            <a href="{{ route('seguimiento.egresado') }}" class="text-blue-900 hover:underline">Seguimiento Egresado</a>
            <a href="{{ route('extension.universitaria') }}" class="text-blue-900 hover:underline">Extensión Universitaria</a>
            <a href="{{ route('responsabilidad.social') }}" class="text-blue-900 hover:underline">Responsabilidad Social</a>
            <a href="{{ route('login') }}" class="text-blue-900 hover:underline font-semibold">Iniciar sesión</a>
        </div>
    </nav>
    <main class="flex-1 flex flex-col items-center justify-center p-6">
        {{ $slot ?? '' }}
    </main>
    <footer class="bg-white text-center text-xs text-blue-900 py-4 shadow-inner opacity-80">
        &copy; {{ date('Y') }} Universidad. Todos los derechos reservados.
    </footer>
</body>
</html>
