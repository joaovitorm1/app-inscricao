<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('cargo', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->integer('cargaHoraria');
            $table->integer('quantidade');
            $table->float('salario');
            $table->boolean('ativo')->default(0);
            $table->unsignedBigInteger('tipo_cargo_id')->nullable();
            $table->unsignedBigInteger('local_cargo_id')->nullable();
            $table->unsignedBigInteger('grupo_ocupacional_id')->nullable();
            $table->unsignedBigInteger('edital_id')->nullable();
            $table->foreign('tipo_cargo_id')->references('id')->on('tipo-cargo');
            $table->foreign('local_cargo_id')->references('id')->on('local-cargo');
            $table->foreign('grupo_ocupacional_id')->references('id')->on('grupo-ocupacional');
            $table->foreign('edital_id')->references('id')->on('edital');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('cargo');
    }
}
