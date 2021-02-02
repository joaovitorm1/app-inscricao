<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Requisito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('requisito', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->unique();
            $table->integer('quantidade');
            $table->float('pontos');
            $table->boolean('ativo')->default(0);
            $table->unsignedBigInteger('edital_id')->nullable();
            $table->foreign('edital_id')->references('id')->on('edital')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('requisito');
    }
}
