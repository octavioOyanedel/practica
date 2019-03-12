<?php

use Illuminate\Database\Seeder;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tipo::create(['nombre' => 'Ingreso']);
        App\Tipo::create(['nombre' => 'Egreso']);
    }
}
