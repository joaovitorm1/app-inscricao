<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequisitoCandidato extends Migration{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('requisito_candidato', function (Blueprint $table) {
            $table->id();
            $table->boolean('qtd_max')->default(0);
            $table->unsignedBigInteger('requisito_id')->nullable();
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('requisito_id')->references('id')->on('requisito')->onDelete('cascade');
            $table->foreign('candidato_id')->references('id')->on('candidato')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('requisito_candidato');
    }
}
