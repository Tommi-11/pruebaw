<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; // Asegúrate de importar el modelo User
use App\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['id' => 1], ['name' => 'Administrador']);
        $userRole = Role::firstOrCreate(['id' => 2], ['name' => 'Usuario']);

        // Verificar y crear usuario administrador
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role_id' => 1,
            ]);
            $this->command->info('Usuario administrador creado exitosamente.');
        }

        // Verificar y crear usuario regular 1
        if (!User::where('email', 'user1@example.com')->exists()) {
            User::create([
                'name' => 'Usuario Regular 1',
                'email' => 'user1@example.com',
                'password' => Hash::make('12345'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role_id' => 2,
            ]);
            $this->command->info('Usuario regular 1 creado exitosamente.');
        }

        // Verificar y crear usuario regular 2
        if (!User::where('email', 'user2@example.com')->exists()) {
            User::create([
                'name' => 'Usuario Regular 2',
                'email' => 'user2@example.com',
                'password' => Hash::make('12345'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role_id' => 2,
            ]);
            $this->command->info('Usuario regular 2 creado exitosamente.');
        }        
    }
}
