<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrupoOcupacional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('grupo-ocupacional', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->unique();
            $table->boolean('ativo')->default(0);
            $table->unsignedBigInteger('edital_id')->nullable();
            $table->foreign('edital_id')->references('id')->on('edital');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('grupo-ocupacional');
    }
}
