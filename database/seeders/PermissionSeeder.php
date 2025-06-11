<?php
// database/seeders/PermissionSeeder.php
// Este seeder crea roles y permisos básicos usando Spatie para el proyecto.

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Permisos básicos
        $permissions = [
            'edit users',
            'delete users',
            'edit roles',
            'delete roles',
        ];
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Roles y asignación de permisos
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $coordinator = Role::firstOrCreate(['name' => 'coordinator']);
        $coordinator->givePermissionTo(['edit users', 'edit roles']);

        $user = Role::firstOrCreate(['name' => 'user']);
        // Sin permisos especiales
    }
}
