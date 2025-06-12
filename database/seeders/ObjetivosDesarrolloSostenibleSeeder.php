<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetivosDesarrolloSostenibleSeeder extends Seeder
{
    public function run(): void
    {
        $objetivos = [
            ['nombre' => 'Fin de la pobreza', 'descripcion' => 'Erradicar la pobreza en todas sus formas en todo el mundo.'],
            ['nombre' => 'Hambre cero', 'descripcion' => 'Poner fin al hambre, lograr la seguridad alimentaria y la mejora de la nutrición y promover la agricultura sostenible.'],
            ['nombre' => 'Salud y bienestar', 'descripcion' => 'Garantizar una vida sana y promover el bienestar para todos en todas las edades.'],
            ['nombre' => 'Educación de calidad', 'descripcion' => 'Garantizar una educación inclusiva, equitativa y de calidad y promover oportunidades de aprendizaje durante toda la vida para todos.'],
            ['nombre' => 'Igualdad de género', 'descripcion' => 'Lograr la igualdad entre los géneros y empoderar a todas las mujeres y las niñas.'],
            ['nombre' => 'Agua limpia y saneamiento', 'descripcion' => 'Garantizar la disponibilidad de agua y su gestión sostenible y el saneamiento para todos.'],
            ['nombre' => 'Energía asequible y no contaminante', 'descripcion' => 'Garantizar el acceso a una energía asequible, segura, sostenible y moderna para todos.'],
            ['nombre' => 'Trabajo decente y crecimiento económico', 'descripcion' => 'Promover el crecimiento económico sostenido, inclusivo y sostenible, el empleo pleno y productivo y el trabajo decente para todos.'],
            ['nombre' => 'Industria, innovación e infraestructura', 'descripcion' => 'Construir infraestructuras resilientes, promover la industrialización sostenible y fomentar la innovación.'],
            ['nombre' => 'Reducción de las desigualdades', 'descripcion' => 'Reducir la desigualdad en y entre los países.'],
            ['nombre' => 'Ciudades y comunidades sostenibles', 'descripcion' => 'Lograr que las ciudades y los asentamientos humanos sean inclusivos, seguros, resilientes y sostenibles.'],
            ['nombre' => 'Producción y consumo responsables', 'descripcion' => 'Garantizar modalidades de consumo y producción sostenibles.'],
            ['nombre' => 'Acción por el clima', 'descripcion' => 'Adoptar medidas urgentes para combatir el cambio climático y sus efectos.'],
            ['nombre' => 'Vida submarina', 'descripcion' => 'Conservar y utilizar sosteniblemente los océanos, los mares y los recursos marinos para el desarrollo sostenible.'],
            ['nombre' => 'Vida de ecosistemas terrestres', 'descripcion' => 'Gestionar sosteniblemente los bosques, luchar contra la desertificación, detener e invertir la degradación de las tierras y detener la pérdida de biodiversidad.'],
            ['nombre' => 'Paz, justicia e instituciones sólidas', 'descripcion' => 'Promover sociedades pacíficas e inclusivas para el desarrollo sostenible, facilitar el acceso a la justicia para todos y construir a todos los niveles instituciones eficaces e inclusivas que rindan cuentas.'],
            ['nombre' => 'Alianzas para lograr los objetivos', 'descripcion' => 'Fortalecer los medios de ejecución y revitalizar la Alianza Mundial para el Desarrollo Sostenible.'],
        ];
        DB::table('objetivos_desarrollo_sostenible')->insert($objetivos);
    }
}
