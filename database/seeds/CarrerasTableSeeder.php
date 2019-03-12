<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Carrera::create(['nombre' => 'Ingeniería de Ejecución en Informática']);
        App\Carrera::create(['nombre' => 'Ingeniería en Electrónica con Mención en Computación y Redes']);
    }
}
