<?php

use Illuminate\Database\Seeder;

class EstablecimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Establecimiento::create(['nombre' =>'Universidad de Chile']);
		App\Establecimiento::create(['nombre' =>'Universidad de Valparaíso']);
		App\Establecimiento::create(['nombre' =>'Universidad de Santiago de Chile']);
		App\Establecimiento::create(['nombre' =>'Pontificia Universidad Católica de Chile']);
		App\Establecimiento::create(['nombre' =>'Universidad Técnica Federico Santa María']);
		App\Establecimiento::create(['nombre' =>'Pontificia Universidad Católica de Valparaíso']);
		App\Establecimiento::create(['nombre' =>'Universidad Santo Tomás']);
		App\Establecimiento::create(['nombre' =>'Universidad de Viña del Mar']);
		App\Establecimiento::create(['nombre' =>'Universidad Tecnológica de Chile INACAP']);
		App\Establecimiento::create(['nombre' =>'Instituto Profesional DUOC UC']);
		App\Establecimiento::create(['nombre' =>'Instituto Profesional Santo Tomás']);
		App\Establecimiento::create(['nombre' =>'Instituto Profesional AIEP']);
		App\Establecimiento::create(['nombre' =>'CFT PUCV']);
		App\Establecimiento::create(['nombre' =>'Centro de Formación Técnica INACAP']);
		App\Establecimiento::create(['nombre' =>'Escuela Industrial Superior de Valparaíso']);
		App\Establecimiento::create(['nombre' =>'Colegio Salesiano Valparaíso']);
		App\Establecimiento::create(['nombre' =>'Instituto Marítimo de Valparaíso']);
    }
}
