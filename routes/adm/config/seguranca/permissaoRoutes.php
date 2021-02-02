<?php

namespace routes\adm\config\seguranca;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Seguranca\PermissaoController;

/* Grupos de Rotas a área Administrativa de Segurança */
Route::prefix('/adm/config/seguranca/permissao')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [PermissaoController::class, 'tabelaPermissaoCadastrados'])
        ->name('permissao.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [PermissaoController::class, 'listarPermissoesCadastrados'])
        ->name('permissao.lista');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [PermissaoController::class, 'formCadastroPermissao'])
        ->name('permissao.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [PermissaoController::class, 'cadastrar'])
        ->name('permissao.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [PermissaoController::class, 'visualizar'])
        ->name('permissao.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [PermissaoController::class, 'editar'])
        ->name('permissao.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [PermissaoController::class, 'atualizarStatus'])
        ->name('permissao.atualizar.adm');
});