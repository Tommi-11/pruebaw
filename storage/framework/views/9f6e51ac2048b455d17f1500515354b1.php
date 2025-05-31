


<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['pageTitle' => 'Gestión de Cargos']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['pageTitle' => 'Gestión de Cargos']); ?>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Lista de Cargos</h2>
        <button onclick="openRoleModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Cargo</button>
    </div>
    <div class="mb-4">
        <input type="text" id="searchRole" placeholder="Buscar cargo..." class="border px-3 py-2 rounded w-full md:w-1/3" onkeyup="filterRoles()">
    </div>
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Descripción</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody id="rolesTable" class="divide-y divide-gray-200">
                <!-- Cargos se renderizarán aquí por JS -->
            </tbody>
        </table>
    </div>

    <!-- Modal de cargo -->
    <div id="roleModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
            <h3 class="text-xl font-semibold mb-4">Agregar/Editar Cargo</h3>
            <form id="roleForm">
                <input type="hidden" id="roleId">
                <div class="mb-4">
                    <label for="roleName" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="roleName" name="roleName" class="mt-1 border px-3 py-2 rounded w-full shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="roleDesc" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="text" id="roleDesc" name="roleDesc" class="mt-1 border px-3 py-2 rounded w-full shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeRoleModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400 text-gray-800">Cancelar</button>
                    <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
    // Datos de ejemplo
    let roles = [
        {id: 1, name: 'Administrador', desc: 'Acceso total al sistema'},
        {id: 2, name: 'Docente', desc: 'Gestión académica'},
        {id: 3, name: 'Estudiante', desc: 'Acceso a materias y notas'}
    ];

    function renderRoles() {
        let tbody = document.getElementById('rolesTable');
        tbody.innerHTML = '';
        const filteredRoles = roles.filter(r => {
            const q = document.getElementById('searchRole').value.toLowerCase();
            return r.name.toLowerCase().includes(q) || r.desc.toLowerCase().includes(q);
        });

        if (filteredRoles.length === 0) {
            tbody.innerHTML = `<tr><td colspan="3" class="text-center py-4 text-gray-500">No se encontraron cargos.</td></tr>`;
            return;
        }

        filteredRoles.forEach(role => {
            tbody.innerHTML += `<tr class="hover:bg-gray-50">
                <td class='py-3 px-4'>${role.name}</td>
                <td class='py-3 px-4'>${role.desc}</td>
                <td class='py-3 px-4 whitespace-nowrap'>
                    <button onclick="editRole(${role.id})" class='text-blue-600 hover:text-blue-800 mr-2 font-medium'>Editar</button>
                    <button onclick="deleteRole(${role.id})" class='text-red-600 hover:text-red-800 font-medium'>Eliminar</button>
                </td>
            </tr>`;
        });
    }

    function openRoleModal() {
        document.getElementById('roleModal').classList.remove('hidden');
        document.getElementById('roleForm').reset();
        document.getElementById('roleId').value = '';
    }

    function closeRoleModal() {
        document.getElementById('roleModal').classList.add('hidden');
    }

    function editRole(id) {
        let role = roles.find(r => r.id === id);
        if (role) {
            document.getElementById('roleId').value = role.id;
            document.getElementById('roleName').value = role.name;
            document.getElementById('roleDesc').value = role.desc;
            openRoleModal();
        }
    }

    document.getElementById('roleForm').onsubmit = function(e) {
        e.preventDefault();
        let id = document.getElementById('roleId').value;
        let name = document.getElementById('roleName').value;
        let desc = document.getElementById('roleDesc').value;

        if (id) { // Editar
            let roleIndex = roles.findIndex(r => r.id == id);
            if (roleIndex !== -1) {
                roles[roleIndex] = {...roles[roleIndex], name, desc};
            }
        } else { // Agregar
            roles.push({id: Date.now(), name, desc});
        }

        closeRoleModal();
        renderRoles();
    };

    function deleteRole(id) {
        roles = roles.filter(r => r.id !== id);
        renderRoles();
    }

    function filterRoles() {
        renderRoles();
    }

    // Render inicial
    document.addEventListener('DOMContentLoaded', renderRoles);
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\sisogrsu\resources\views/dashboard/roles.blade.php ENDPATH**/ ?>