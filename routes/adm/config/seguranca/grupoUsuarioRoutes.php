<?php

namespace routes\adm\config\seguranca;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\adm\config\seguranca\GrupoUsuariosController;

/* Grupos de Rotas a área Administrativa de Segurança */
Route::prefix('/adm/config/seguranca/grupo')->group(function () {
    
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [GrupoUsuariosController::class, 'tabelaGrupoUsuarioCadastrados'])
        ->name('grupoUsuario.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [GrupoUsuariosController::class, 'listarGruposUsuariosCadastrados'])
        ->name('grupoUsuario.lista');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [GrupoUsuariosController::class, 'formCadastroGrupoUsuario'])
        ->name('grupoUsuario.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [GrupoUsuariosController::class, 'cadastrar'])
        ->name('grupoUsuario.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [GrupoUsuariosController::class, 'visualizar'])
        ->name('grupoUsuario.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [GrupoUsuariosController::class, 'editar'])
        ->name('grupoUsuario.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [GrupoUsuariosController::class, 'atualizarStatus'])
        ->name('grupoUsuario.atualizar.adm');
});