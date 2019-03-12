<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Estado::create(['nombre' => 'Pagada']);
        App\Estado::create(['nombre' => 'Pendiente']);
    }
}
