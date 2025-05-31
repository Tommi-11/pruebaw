{{-- resources/views/components/dashboard-header.blade.php --}}
<header class="flex items-center justify-between pb-4 border-b border-gray-200">
    <h1 class="text-2xl font-semibold text-gray-800">Dashboard Principal</h1>
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cerrar sesión</button>
        </form>
    </div>
</header>