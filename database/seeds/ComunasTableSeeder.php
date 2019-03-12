<?php

use Illuminate\Database\Seeder;

class ComunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Comuna::create(['nombre' => 'Calle Larga', 'urbe_id' =>1]);
		App\Comuna::create(['nombre' => 'Los Andes', 'urbe_id' =>1]);
		App\Comuna::create(['nombre' => 'Rinconada', 'urbe_id' =>1]);
		App\Comuna::create(['nombre' => 'San Esteban', 'urbe_id' =>1]);
		App\Comuna::create(['nombre' => 'Cabildo', 'urbe_id' =>2]);
		App\Comuna::create(['nombre' => 'La Ligua', 'urbe_id' =>2]);
		App\Comuna::create(['nombre' => 'Papudo', 'urbe_id' =>2]);
		App\Comuna::create(['nombre' => 'Petorca', 'urbe_id' =>2]);
		App\Comuna::create(['nombre' => 'Zapallar', 'urbe_id' =>2]);
		App\Comuna::create(['nombre' => 'Hijuelas', 'urbe_id' =>3]);
		App\Comuna::create(['nombre' => 'La Calera', 'urbe_id' =>3]);
		App\Comuna::create(['nombre' => 'La Cruz', 'urbe_id' =>3]);
		App\Comuna::create(['nombre' => 'Nogales', 'urbe_id' =>3]);
		App\Comuna::create(['nombre' => 'Quillota', 'urbe_id' =>3]);
		App\Comuna::create(['nombre' => 'Algarrobo', 'urbe_id' =>4]);
		App\Comuna::create(['nombre' => 'Cartagena', 'urbe_id' =>4]);
		App\Comuna::create(['nombre' => 'El Quisco', 'urbe_id' =>4]);
		App\Comuna::create(['nombre' => 'El Tabo', 'urbe_id' =>4]);
		App\Comuna::create(['nombre' => 'San Antonio', 'urbe_id' =>4]);
		App\Comuna::create(['nombre' => 'Santo Domingo', 'urbe_id' =>4]);
		App\Comuna::create(['nombre' => 'Catemu', 'urbe_id' =>5]);
		App\Comuna::create(['nombre' => 'Llay-Llay', 'urbe_id' =>5]);
		App\Comuna::create(['nombre' => 'Panquehue', 'urbe_id' =>5]);
		App\Comuna::create(['nombre' => 'Putaendo', 'urbe_id' =>5]);
		App\Comuna::create(['nombre' => 'San Felipe', 'urbe_id' =>5]);
		App\Comuna::create(['nombre' => 'Santa María', 'urbe_id' =>5]);
		App\Comuna::create(['nombre' => 'Casablanca', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Concón', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Juan Fernández', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Puchuncaví', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Quintero', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Valparaíso', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Viña del Mar', 'urbe_id' =>6]);
		App\Comuna::create(['nombre' => 'Limache', 'urbe_id' =>7]);
		App\Comuna::create(['nombre' => 'Olmué', 'urbe_id' =>7]);
		App\Comuna::create(['nombre' => 'Quilpué', 'urbe_id' =>7]);
		App\Comuna::create(['nombre' => 'Villa Alemana', 'urbe_id' =>7]);
    }
}
