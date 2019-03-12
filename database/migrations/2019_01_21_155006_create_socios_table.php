<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->char('rut',9);
            $table->enum('genero',['Dama','Varón']);
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedInteger('celular')->nullable();
            $table->unsignedInteger('fijo')->nullable();
            $table->string('correo')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_pucv')->nullable();
            $table->unsignedInteger('anexo')->nullable();
            $table->unsignedInteger('numero_socio')->nullable();
            $table->date('fecha_sind1')->nullable();
            $table->unsignedInteger('sede_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->unsignedInteger('cargo_id')->nullable();
            $table->unsignedInteger('urbe_id')->nullable();
            $table->unsignedInteger('comuna_id')->nullable();
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
        Schema::dropIfExists('socios');
    }
}
