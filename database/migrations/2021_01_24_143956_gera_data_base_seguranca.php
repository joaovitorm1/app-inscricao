<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GeraDataBaseSeguranca extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('permissao', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->unique();
            $table->string('descricao',100);
            $table->boolean('ativo')->default(0);
        });

        Schema::create('grupo-usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100)->unique();
            $table->string('descricao',100);
            $table->boolean('ativo')->default(0);
        });

        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('login',100)->unique();
            $table->string('senha',200);
            $table->boolean('ativo')->default(0);
            $table->unsignedBigInteger('grupoUsuarios_id')->nullable();
            $table->foreign('grupoUsuarios_id')->references('id')->on('grupo-usuarios');
        });

        Schema::create('grupo_permissoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupoUsuarios_id')->nullable();
            $table->unsignedBigInteger('permissao_id')->nullable();
            $table->foreign('grupoUsuarios_id')->references('id')->on('grupo-usuarios');
            $table->foreign('permissao_id')->references('id')->on('permissao');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
       /*Sequencia de Exclusão*/
       Schema::dropIfExists('grupo_permissoes');
       Schema::dropIfExists('grupo-usuarios');
       Schema::dropIfExists('usuario');
       Schema::dropIfExists('permissao');
    }
}
