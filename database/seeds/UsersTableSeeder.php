<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Ximena Barrueto Martínez',
        	'email' => 'sind1@pucv.cl',
        	'password' => bcrypt('secret'),
        	'clase_id' => 1
        ]);

        App\User::create([
        	'name' => 'Osvaldo León Montenegro',
        	'email' => 'osvaldo.leon@pucv.cl',
        	'password' => bcrypt('secret'),
        	'clase_id' => 2
        ]);
    }
}
