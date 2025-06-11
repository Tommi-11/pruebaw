<?php
// app/Http/Controllers/UserRoleController.php
// Controlador para asignar roles y permisos a usuarios.

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRoleController extends Controller
{
    // Solo accesible por administradores
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);
        $user = User::findOrFail($userId);
        $user->syncRoles([$request->role]); // Asigna el rol seleccionado y elimina otros
        return back()->with('success', 'Rol asignado correctamente.');
    }

    // Ejemplo: asignar permisos específicos (opcional)
    public function assignPermission(Request $request, $userId)
    {
        $request->validate([
            'permission' => 'required|exists:permissions,name',
        ]);
        $user = User::findOrFail($userId);
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permiso asignado correctamente.');
    }
}
