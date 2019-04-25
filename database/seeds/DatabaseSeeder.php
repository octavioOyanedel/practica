<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClasesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(SedesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(UrbesTableSeeder::class);
        $this->call(ComunasTableSeeder::class);
        $this->call(ConceptosTableSeeder::class);
        $this->call(DetallesTableSeeder::class);
        $this->call(BancosTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(ParentescosTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(EstablecimientosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(TitulosTableSeeder::class);
        $this->call(CuentasTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(BancariosTableSeeder::class);
	$this->call(RentasTableSeeder::class);
	$this->call(SociosTableSeeder::class);
    }
}
