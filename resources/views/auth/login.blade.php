<x-guest-layout>
    <main class="min-h-screen w-full flex items-center justify-center bg-gradient-to-br from-blue-700 to-blue-400">
        <a href="/" style="position: absolute; top: 16px; left: 16px; z-index: 1000; text-decoration: none; font-weight: bold; color: #3490dc; font-size: 18px;">&larr; Volver a inicio</a>
        <div class="w-full h-full flex flex-col items-center justify-center">
            <h2 class="text-4xl font-serif font-bold text-white mb-8 text-center drop-shadow">Iniciar Sesión</h2>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-blue-900">Correo electrónico</label>
                    <input id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-blue-900">Contraseña</label>
                    <input id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                    <a class="text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
                <div>
                    <button type="submit" class="w-full py-2 px-4 bg-blue-700 hover:bg-blue-900 text-white font-semibold rounded-md shadow transition">Iniciar sesión</button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="text-blue-700 hover:underline text-sm">¿No tienes cuenta? Regístrate</a>
            </div>
        </div>
    </main>
</x-guest-layout>