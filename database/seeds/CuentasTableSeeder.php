<?php

use Illuminate\Database\Seeder;

class CuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Cuenta::create(['nombre' => 'Cuenta Corriente']);
        App\Cuenta::create(['nombre' => 'Cuenta Ahorro']);
        App\Cuenta::create(['nombre' => 'Cuenta Vista']);
    }
}
