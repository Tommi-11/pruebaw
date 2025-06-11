{{-- resources/views/dashboard/partials/assign-role.blade.php --}}
{{-- Formulario para asignar rol a un usuario. Solo visible para administradores --}}
@if(auth()->user()->can('edit users'))
    <form action="{{ route('users.assignRole', $user->id) }}" method="POST" class="mb-2">
        @csrf
        <label for="role" class="block text-sm font-medium text-gray-700">Rol:</label>
        <select name="role" id="role" class="border rounded px-2 py-1">
            @foreach(Spatie\Permission\Models\Role::all() as $role)
                <option value="{{ $role->name }}" @if($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">Asignar</button>
    </form>
@endif
