<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Categoria::create(['nombre' =>'Cursando']);
        App\Categoria::create(['nombre' =>'Titulado']);
        App\Categoria::create(['nombre' =>'Egresado']);
    }
}
