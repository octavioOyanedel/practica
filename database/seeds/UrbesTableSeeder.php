<?php

use Illuminate\Database\Seeder;

class UrbesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Urbe::create(['nombre' => 'Los Andes']);
		App\Urbe::create(['nombre' => 'La Ligua']);
		App\Urbe::create(['nombre' => 'Quillota']);
		App\Urbe::create(['nombre' => 'San Antonio']);
		App\Urbe::create(['nombre' => 'San Felipe']);
		App\Urbe::create(['nombre' => 'Valparaíso']);
		App\Urbe::create(['nombre' => 'Marga Marga']);
    }
}

