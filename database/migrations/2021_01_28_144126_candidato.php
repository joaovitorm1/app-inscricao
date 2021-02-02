<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('candidato', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('cpf',16);
            $table->string('telefone',20);
            $table->string('numerodoc',25);
            $table->date('data_nascimento');
            $table->string('orgao_expedidor',20);
            $table->string('inscricao',100)->nullable();
            $table->timestamp('data_cadastro');
            $table->timestamp('data_atualizar')->nullable();
            $table->unsignedBigInteger('tipodoc_id')->nullable();
            $table->unsignedBigInteger('edital_id')->nullable();
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('edital_id')->references('id')->on('edital');
            $table->foreign('cargo_id')->references('id')->on('cargo');
            $table->foreign('tipodoc_id')->references('id')->on('tipo-documento');         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('candidato');
    }
}
