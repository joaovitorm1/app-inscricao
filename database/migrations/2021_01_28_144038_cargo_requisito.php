<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CargoRequisito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('cargo_requisito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requisito_id')->nullable();
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('requisito_id')->references('id')->on('requisito')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('requisito_cargo');
    }
}
