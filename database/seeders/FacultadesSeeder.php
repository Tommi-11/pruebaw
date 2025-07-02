<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadesSeeder extends Seeder
{
    public function run(): void
    {
        $facultades = [
            ['nombre' => 'Facultad de Ciencias'],
            ['nombre' => 'Facultad de Ciencias, Sociales Educación y de la Comunicación'],
            ['nombre' => 'Facultad de Administración y Turismo'],
            ['nombre' => 'Facultad de Economía y Contabilidad'],
            ['nombre' => 'Facultad de Ciencias del Ambiente'],
            ['nombre' => 'Facultad de Ingeniería de Minas, Geología y Metalurgia'],
            ['nombre' => 'Facultad de Ingeniería Civil'],
            ['nombre' => 'Facultad de Ingeniería de Industrias Alimentarias'],
            ['nombre' => 'Facultad de Ciencias Agrarias'],
            ['nombre' => 'Facultad de Ciencias Medicas'],
            ['nombre' => 'Facultad de Derecho y Ciencias Políticas'],
            ['nombre' => 'Facultad de Medicina Humana'],
        ];
        DB::table('facultades')->insert($facultades);
    }
}
