<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CargoTitulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('cargo_titulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('titulo_id')->nullable();
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('titulo_id')->references('id')->on('titulo')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('titulo_cargo');
    }
}
