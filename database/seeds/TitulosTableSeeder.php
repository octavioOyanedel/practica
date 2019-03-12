<?php

use Illuminate\Database\Seeder;

class TitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Titulo::create(['nombre' =>'Ingeniero/a de Ejecución en Informática']);
        App\Titulo::create(['nombre' =>'Ingeniero/a en Electrónica con Mención en Computación y Redes']);
    }
}
