<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\RequisitoController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/requisitos')->group(function () {
    /* Rota para listar Cadastro de REQUISITOS */
    Route::get('/lista', 
        [RequisitoController::class, 'tabelaRequisitosCadastrados'])
        ->name('requisito.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [RequisitoController::class, 'listarRequisitosCadastrados'])
        ->name('requisito.lista');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::get('/lista/edital/{id}', 
    [RequisitoController::class, 'listarRequisitosCadastradosPorEdital'])
        ->name('requisito.lista.edital');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [RequisitoController::class, 'formCadastroRequisito'])
        ->name('requisito.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [RequisitoController::class, 'cadastrar'])
        ->name('requisito.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [RequisitoController::class, 'visualizar'])
        ->name('requisito.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [RequisitoController::class, 'editar'])
        ->name('requisito.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [RequisitoController::class, 'atualizarStatus'])
        ->name('requisito.atualizar.adm');
});