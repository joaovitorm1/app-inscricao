<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Edital extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
       /* */
       Schema::create('edital', function (Blueprint $table) {
        $table->id();
        $table->string('nome',100)->unique();
        $table->string('numero',50);
        $table->string('responsavel',100);
        $table->string('descricao',2550);
        $table->date('dataInicial');
        $table->date('dataFinal');
        $table->string('link',500);
        $table->boolean('ativo')->default(0);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('edital');
    }
}
