<?php

use Illuminate\Database\Seeder;

class ParentescosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Parentesco::create(['nombre' => 'Hijo/a']);
        App\Parentesco::create(['nombre' => 'Esposo/a']);
        App\Parentesco::create(['nombre' => 'Abuelo/a']);
    }
}
