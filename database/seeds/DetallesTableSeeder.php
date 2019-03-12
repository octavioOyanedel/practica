<?php

use Illuminate\Database\Seeder;

class DetallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Detalle::create(['nombre' => 'Bono Navidad', 'concepto_id' =>1]);
		App\Detalle::create(['nombre' => 'Previred', 'concepto_id' =>1]);
		App\Detalle::create(['nombre' => 'Aguilnaldo Fiestas Patrias', 'concepto_id' =>1]);
		App\Detalle::create(['nombre' => 'Remuneración', 'concepto_id' =>1]);
		App\Detalle::create(['nombre' => 'Gratificación', 'concepto_id' =>1]);
		App\Detalle::create(['nombre' => 'Aporte de Estudios', 'concepto_id' =>2]);
		App\Detalle::create(['nombre' => 'Devolución  Cuota Cena Aniversario', 'concepto_id' =>3]);
		App\Detalle::create(['nombre' => 'Gasto Aniversario Sindicato', 'concepto_id' =>3]);
		App\Detalle::create(['nombre' => 'Día del Niño', 'concepto_id' =>3]);
		App\Detalle::create(['nombre' => 'Actividades Baby Fútbol', 'concepto_id' =>3]);
		App\Detalle::create(['nombre' => 'Escuela de Fútbol', 'concepto_id' =>4]);
		App\Detalle::create(['nombre' => 'Escuela de Básquetbol', 'concepto_id' =>4]);
		App\Detalle::create(['nombre' => 'Asesor Jurídico', 'concepto_id' =>5]);
		App\Detalle::create(['nombre' => 'Asesor RR.PP', 'concepto_id' =>5]);
		App\Detalle::create(['nombre' => 'Asesor Legal', 'concepto_id' =>5]);
		App\Detalle::create(['nombre' => 'Asesor RR.LL', 'concepto_id' =>5]);
		App\Detalle::create(['nombre' => 'Transferencias Cotizaciones PUCV', 'concepto_id' =>6]);
		App\Detalle::create(['nombre' => 'Transferencias Cotizaciones CFT', 'concepto_id' =>6]);
		App\Detalle::create(['nombre' => 'Transferencia Cuota Mortuoria', 'concepto_id' =>6]);
		App\Detalle::create(['nombre' => 'Aporte Aniversario', 'concepto_id' =>6]);
		App\Detalle::create(['nombre' => 'Aporte Desayuno PUCV', 'concepto_id' =>6]);
		App\Detalle::create(['nombre' => 'Depositos en Efectivo', 'concepto_id' =>6]);
		App\Detalle::create(['nombre' => 'Cuota Mortuoria', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Presentes Años de Servicio', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Celebración Día de la Mujer', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Traspaso de Fondos a Scotiabank', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Traspaso de Fondos a Banco Estado', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Beneficio Nacimiento', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Insumos Oficina Librería', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Traspaso Fondo Social', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Negociación Colectiva', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Asamblea Socios', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Pago Prestamo', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Celebración Cumpleaños', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Gastos Elecciones', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Pago Juicio', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Funeral', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Reliquidación', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Club de Campo', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Gasto Huelga', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'CONATUCH', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Pagos Varios', 'concepto_id' =>7]);
		App\Detalle::create(['nombre' => 'Presentes Navidad', 'concepto_id' =>7]);
    }
}
