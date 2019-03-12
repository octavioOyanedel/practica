<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contables', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->increments('id');
            $table->date('fecha');
            $table->unsignedInteger('numero_contabilidad');
            $table->unsignedInteger('cheque')->unique();
            $table->unsignedInteger('monto');
            $table->unsignedInteger('banco_id');
            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('concepto_id');
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
        Schema::dropIfExists('contables');
    }
}
