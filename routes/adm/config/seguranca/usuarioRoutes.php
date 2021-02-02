<?php

namespace routes\adm\config\seguranca;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\adm\config\seguranca\UsuarioController;

/* Grupos de Rotas a área Administrativa de Segurança */
Route::prefix('/adm/config/seguranca/usuario')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [UsuarioController::class, 'tabelaUsuariosCadastrados'])
        ->name('usuario.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [UsuarioController::class, 'listarUsuariosCadastrados'])
        ->name('usuario.lista');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [UsuarioController::class, 'formCadastroUsuario'])
        ->name('usuario.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [UsuarioController::class, 'cadastrar'])
        ->name('usuario.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [UsuarioController::class, 'visualizar'])
        ->name('usuario.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [UsuarioController::class, 'editar'])
        ->name('usuario.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [UsuarioController::class, 'atualizarStatus'])
        ->name('usuario.atualizar.adm');
});