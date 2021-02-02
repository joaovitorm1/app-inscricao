<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TituloCargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('titulo_cargo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('titulo_id')->nullable();
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('titulo_id')->references('id')->on('titulo');
            $table->foreign('cargo_id')->references('id')->on('cargo');
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
