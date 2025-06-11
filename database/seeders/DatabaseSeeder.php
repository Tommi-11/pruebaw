<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User; // Asegúrate de importar el modelo User


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Verificar y crear usuario administrador
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
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
            ]);
            $this->command->info('Usuario regular 2 creado exitosamente.');
        }        

        $this->call(PermissionSeeder::class); // Seeder de roles y permisos Spatie
    }
}
