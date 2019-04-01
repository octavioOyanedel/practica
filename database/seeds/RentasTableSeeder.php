<?php

use Illuminate\Database\Seeder;

class RentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Renta::create([
        	'interes' => 2,
        	'aspecto' => 'Interés de Préstamo',
        ]);
    }
}
