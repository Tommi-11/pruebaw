<nav class="h-full bg-blue-900 text-white w-64 flex-shrink-0 flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-blue-800">
        {{ config('app.name', 'RSU') }}
    </div>
    <ul class="flex-1 p-4 space-y-2">
        <li>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-800 {{ request()->routeIs('dashboard') ? 'bg-blue-800' : '' }}">Dashboard</a>
        </li>
        @if(auth()->user() && auth()->user()->role && auth()->user()->role->name === 'Administrador')
            <li>
                <a href="{{ route('admin.usuarios') }}" class="block px-4 py-2 rounded hover:bg-blue-800 {{ request()->routeIs('admin.usuarios') ? 'bg-blue-800' : '' }}">Usuarios</a>
            </li>
        @endif
        <li>
            <a href="{{ route('proyeccion.social') }}" class="block px-4 py-2 rounded hover:bg-blue-800 {{ request()->routeIs('proyeccion.social') ? 'bg-blue-800' : '' }}">Proyección Social</a>
        </li>
        <li>
            <a href="{{ route('seguimiento.egresado') }}" class="block px-4 py-2 rounded hover:bg-blue-800 {{ request()->routeIs('seguimiento.egresado') ? 'bg-blue-800' : '' }}">Seguimiento Egresado</a>
        </li>
        <li>
            <a href="{{ route('extension.universitaria') }}" class="block px-4 py-2 rounded hover:bg-blue-800 {{ request()->routeIs('extension.universitaria') ? 'bg-blue-800' : '' }}">Extensión Universitaria</a>
        </li>
        <li>
            <a href="{{ route('responsabilidad.social') }}" class="block px-4 py-2 rounded hover:bg-blue-800 {{ request()->routeIs('responsabilidad.social') ? 'bg-blue-800' : '' }}">Responsabilidad Social</a>
        </li>
    </ul>
    <div class="p-4 border-t border-blue-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-blue-800">Cerrar sesión</button>
        </form>
    </div>
</nav>
