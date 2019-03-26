<?php

use Illuminate\Database\Seeder;

class BancariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Bancario::create([
        	'numero_cuenta' => '0122470296',
        	'banco_id' => 1,
        	'cuenta_id' => 1,
        ]);

        App\Bancario::create([
        	'numero_cuenta' => '014000096',
        	'banco_id' => 2,
        	'cuenta_id' => 1,
        ]);
    }
}
