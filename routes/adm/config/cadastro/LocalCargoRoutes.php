<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\LocalCargoController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/local-cargo')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [LocalCargoController::class, 'tabelaLocaisCargosCadastrados'])
        ->name('localCargo.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [LocalCargoController::class, 'listarLocaisCargosCadastrados'])
        ->name('localCargo.lista');
    
        /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::get('/lista/edital/{id}', 
        [LocalCargoController::class, 'listarLocaisCargosCadastradosPorEdital'])
        ->name('localCargo.lista.edital');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [LocalCargoController::class, 'formCadastroLocalCargo'])
        ->name('localCargo.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [LocalCargoController::class, 'cadastrar'])
        ->name('localCargo.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [LocalCargoController::class, 'visualizar'])
        ->name('localCargo.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [LocalCargoController::class, 'editar'])
        ->name('localCargo.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [LocalCargoController::class, 'atualizarStatus'])
        ->name('localCargo.atualizar.adm');
});