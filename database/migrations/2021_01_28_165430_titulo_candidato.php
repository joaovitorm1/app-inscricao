<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TituloCandidato extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('titulo_candidato', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->date('data_conclusao');
            $table->unsignedBigInteger('titulo_id')->nullable();
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('titulo_id')->references('id')->on('titulo')->onDelete('cascade');   
            $table->foreign('candidato_id')->references('id')->on('candidato')->onDelete('cascade');      
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('titulo_candidato');
    }
}
