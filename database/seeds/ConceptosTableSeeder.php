<?php

use Illuminate\Database\Seeder;

class ConceptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Concepto::create(['nombre' => 'Secretaria']);
		App\Concepto::create(['nombre' => 'Estudios']);
		App\Concepto::create(['nombre' => 'Aniversario']);
        App\Concepto::create(['nombre' => 'Deportes']);
		App\Concepto::create(['nombre' => 'Asesorías']);
		App\Concepto::create(['nombre' => 'Aportes']);
		App\Concepto::create(['nombre' => 'Gestión Sindical']);
    }
}
