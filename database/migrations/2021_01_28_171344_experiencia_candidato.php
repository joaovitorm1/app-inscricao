<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExperienciaCandidato extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('experiencia-profissional', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('função',100);
            $table->integer('meses');
            $table->boolean('ativo')->default(1);
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
        Schema::dropIfExists('experiencia_candidato');
    }
}
