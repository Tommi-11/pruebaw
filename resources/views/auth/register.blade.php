<x-guest-layout>
    <main class="min-h-screen w-full flex items-center justify-center bg-gradient-to-br from-blue-700 to-blue-400">
        <a href="/" style="position: absolute; top: 16px; left: 16px; z-index: 1000; text-decoration: none; font-weight: bold; color: #3490dc; font-size: 18px;">&larr; Volver a inicio</a>
        <div class="w-full h-full flex flex-col items-center justify-center">
            <h2 class="mt-12 text-4xl font-serif font-bold text-white mb-8 text-center drop-shadow ">Registro de Usuario</h2>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-blue-900">Nombre completo</label>
                    <input id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-blue-900">Correo electrónico</label>
                    <input id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-blue-900">Contraseña</label>
                    <input id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-blue-900">Confirmar contraseña</label>
                    <input id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div>
                    <button type="submit" class="w-full py-2 px-4 bg-blue-700 hover:bg-blue-900 text-white font-semibold rounded-md shadow transition">Registrarse</button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-blue-700 hover:underline text-sm">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>
    </main>
</x-guest-layout>
