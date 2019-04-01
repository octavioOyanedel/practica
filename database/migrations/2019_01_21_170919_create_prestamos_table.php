<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->unsignedInteger('numero_prestamo')->unique();
            $table->unsignedInteger('cheque')->unique();
            $table->unsignedInteger('monto');
            $table->unsignedInteger('cuotas');
            $table->unsignedInteger('socio_id');
            $table->unsignedInteger('renta_id');
            $table->unsignedInteger('estado_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
