<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaDocumentoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias_documentos')->insert([
            ['nombre' => 'Normativos', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Requisitos', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
