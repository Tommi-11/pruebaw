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

        // Crear roles base si no existen
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'Administrador del sistema'],
            ['nombre' => 'Encargado de RSU', 'descripcion' => 'Encargado de Responsabilidad Social Universitaria'],
            ['nombre' => 'Encargado de PS', 'descripcion' => 'Encargado de Proyección Social'],
            ['nombre' => 'Encargado de SEC', 'descripcion' => 'Encargado de Seguimiento al Egresado'],
            ['nombre' => 'Encargado de EU', 'descripcion' => 'Encargado de Extensión Universitaria'],
        ];
        $roleIds = [];
        foreach ($roles as $rol) {
            $role = \App\Models\Roles::firstOrCreate(['nombre' => $rol['nombre']], $rol);
            $roleIds[$rol['nombre']] = $role->id;
        }

        // Verificar y crear usuario administrador
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'nombres' => 'Admin',
                'apellidos' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Administrador'],
            ]);
            $this->command->info('Usuario administrador creado exitosamente.');
        }

        // Verificar y crear usuario regular 1
        if (!User::where('email', 'user1@example.com')->exists()) {
            User::create([
                'nombres' => 'Usuario',
                'apellidos' => 'Regular1',
                'email' => 'user1@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Encargado de RSU'],
            ]);
            $this->command->info('Usuario regular 1 creado exitosamente.');
        }

        // Verificar y crear usuario regular 2
        if (!User::where('email', 'user2@example.com')->exists()) {
            User::create([
                'nombres' => 'Usuario',
                'apellidos' => 'Regular2',
                'email' => 'user2@example.com',
                'password' => Hash::make('12345'),
                'role_id' => $roleIds['Encargado de PS'],
            ]);
            $this->command->info('Usuario regular 2 creado exitosamente.');
        }
        
        //llamar al seeder de Objetivos de Desarrollo Sostenible
        $this->call(ObjetivosDesarrolloSostenibleSeeder::class);
        //llamar al seeder de Facultades
        $this->call(FacultadesSeeder::class);
        //llamar al seeder de Estudiantes
        $this->call(EstudiantesSeeder::class);
        //llamar al seeder de Docentes 
        $this->call(DocentesSeeder::class);
    }
}
