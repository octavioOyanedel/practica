<?php

use Illuminate\Database\Seeder;

class AspectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Aspecto::create(['nombre' => 'Interés de Préstamo']);
    }
}
