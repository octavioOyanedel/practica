<?php

use Illuminate\Database\Seeder;

class ClasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Clase::create(['nombre' => 'Administrador']);
        App\Clase::create(['nombre' => 'Invitado']);
    }
}
