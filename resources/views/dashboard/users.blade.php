{{-- resources/views/dashboard/users.blade.php --}}
<x-layouts.app pageTitle="Gestión de Usuarios">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Lista de Usuarios</h2>
        @php
            // Ejemplo de uso de permisos avanzados con Spatie
            // Solo los usuarios con permiso 'edit users' pueden ver el botón para agregar usuarios
        @endphp
        @if(auth()->user()->can('edit users'))
            <button onclick="openUserModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Usuario</button>
        @endif
    </div>

    <div class="mb-4">
        <input type="text" id="searchUser" placeholder="Buscar usuario..." class="border px-3 py-2 rounded w-full md:w-1/3 focus:ring-blue-500 focus:border-blue-500" onkeyup="filterUsers()">
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Correo</th>
                    <th class="py-3 px-4 text-left">Rol</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody id="usersTable" class="divide-y divide-gray-200">
                {{-- Ejemplo: solo los usuarios con permiso 'edit users' pueden ver la columna de acciones --}}
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        @can('edit users')
                            <td>
                                <button class="text-blue-600">Editar</button>
                                <button class="text-red-600">Eliminar</button>
                            </td>
                        @endcan
                    </tr>
                    {{-- Ejemplo de formulario para asignar rol, solo visible para administradores --}}
                    @include('dashboard.partials.assign-role', ['user' => $user])
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de usuario -->
    <div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
            <h3 class="text-xl font-semibold mb-4" id="modalTitle">Agregar/Editar Usuario</h3>
            <form id="userForm">
                <input type="hidden" id="userId">
                <div class="mb-4">
                    <label for="userName" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="userName" name="userName" class="mt-1 border px-3 py-2 rounded w-full shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="userEmail" class="block text-sm font-medium text-gray-700">Correo</label>
                    <input type="email" id="userEmail" name="userEmail" class="mt-1 border px-3 py-2 rounded w-full shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="userRole" class="block text-sm font-medium text-gray-700">Rol</label>
                    <input type="text" id="userRole" name="userRole" class="mt-1 border px-3 py-2 rounded w-full shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeUserModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">Cancelar</button>
                    <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    // Datos de ejemplo en "JSON"
    let users = [
        { id: 1, name: 'Juan Perez', email: 'juan@uni.edu', role: 'Administrador' },
        { id: 2, name: 'Ana Ruiz', email: 'ana@uni.edu', role: 'Docente' },
        { id: 3, name: 'Carlos Soto', email: 'carlos@uni.edu', role: 'Estudiante' }
    ];

    function renderUsers() {
        const tbody = document.getElementById('usersTable');
        tbody.innerHTML = '';
        const searchQuery = document.getElementById('searchUser').value.toLowerCase();
        const filteredUsers = users.filter(user => 
            user.name.toLowerCase().includes(searchQuery) || 
            user.email.toLowerCase().includes(searchQuery) || 
            user.role.toLowerCase().includes(searchQuery)
        );

        if (filteredUsers.length === 0) {
            tbody.innerHTML = `<tr><td colspan="4" class="text-center py-4 text-gray-500">No se encontraron usuarios.</td></tr>`;
            return;
        }

        filteredUsers.forEach(user => {
            tbody.innerHTML += `
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4">${user.name}</td>
                    <td class="py-3 px-4">${user.email}</td>
                    <td class="py-3 px-4">${user.role}</td>
                    <td class="py-3 px-4 whitespace-nowrap">
                        <button onclick="editUser(${user.id})" class="text-blue-600 hover:text-blue-800 mr-2 font-medium">Editar</button>
                        <button onclick="deleteUser(${user.id})" class="text-red-600 hover:text-red-800 font-medium">Eliminar</button>
                    </td>
                </tr>`;
        });
    }

    function openUserModal(isEdit = false) {
        const modal = document.getElementById('userModal');
        const form = document.getElementById('userForm');
        const title = document.getElementById('modalTitle');
        modal.classList.remove('hidden');
        form.reset();
        document.getElementById('userId').value = '';
        title.textContent = isEdit ? 'Editar Usuario' : 'Agregar Usuario';
    }

    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
    }

    function editUser(id) {
        const user = users.find(u => u.id === id);
        if (user) {
            document.getElementById('userId').value = user.id;
            document.getElementById('userName').value = user.name;
            document.getElementById('userEmail').value = user.email;
            document.getElementById('userRole').value = user.role;
            openUserModal(true);
        }
    }

    document.getElementById('userForm').onsubmit = function(e) {
        e.preventDefault();
        const id = document.getElementById('userId').value;
        const name = document.getElementById('userName').value;
        const email = document.getElementById('userEmail').value;
        const role = document.getElementById('userRole').value;

        if (id) {
            // Editar usuario existente
            const userIndex = users.findIndex(u => u.id === parseInt(id));
            if (userIndex !== -1) {
                users[userIndex] = { ...users[userIndex], name, email, role };
            }
        } else {
            // Agregar nuevo usuario
            users.push({ id: Date.now(), name, email, role });
        }

        closeUserModal();
        renderUsers();
    };

    function deleteUser(id) {
        if (confirm('¿Estás seguro de eliminar este usuario?')) {
            users = users.filter(u => u.id !== id);
            renderUsers();
        }
    }

    function filterUsers() {
        renderUsers();
    }

    // Renderizado inicial
    document.addEventListener('DOMContentLoaded', renderUsers);
    </script>
    @endpush
</x-layouts.app>
