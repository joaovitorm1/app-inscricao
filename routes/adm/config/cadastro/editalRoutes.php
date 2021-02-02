<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\EditalController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/edital')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [EditalController::class, 'tabelaEditalCadastrados'])
        ->name('edital.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [EditalController::class, 'listarEditaisCadastrados'])
        ->name('edital.lista');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [EditalController::class, 'formCadastroEdital'])
        ->name('edital.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [EditalController::class, 'cadastrar'])
        ->name('edital.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [EditalController::class, 'visualizar'])
        ->name('edital.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [EditalController::class, 'editar'])
        ->name('edital.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [EditalController::class, 'atualizarStatus'])
        ->name('edital.atualizar.adm');

    /* EDITA O ITEM */
    Route::get('/visualizar/{id}', 
        [EditalController::class, 'ver'])
        ->name('edital.visualizar.adm');
});