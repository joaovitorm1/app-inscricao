<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Endereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('logradouro',50);
            $table->string('endereco',100);
            $table->string('numero',100);
            $table->string('complemento',100)->nullable();
            $table->string('cidade',100);
            $table->string('bairro',100);
            $table->string('estado',50);
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('candidato_id')->references('id')->on('candidato')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('endereco');
    }
}
