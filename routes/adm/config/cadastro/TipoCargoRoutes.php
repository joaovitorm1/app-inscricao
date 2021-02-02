<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\TipoCargoController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/tipo-cargo')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [TipoCargoController::class, 'tabelaTipoCargoCadastrados'])
        ->name('tipoCargo.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [TipoCargoController::class, 'listarTipoCargosCadastrados'])
        ->name('tipoCargo.lista');
    
        /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::get('/lista/edital/{id}', 
        [TipoCargoController::class, 'listarTiposCargosCadastradosPorEdital'])
        ->name('tipoCargo.lista.edital');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [TipoCargoController::class, 'formCadastroTipoCargo'])
        ->name('tipoCargo.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [TipoCargoController::class, 'cadastrar'])
        ->name('tipoCargo.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [TipoCargoController::class, 'visualizar'])
        ->name('tipoCargo.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [TipoCargoController::class, 'editar'])
        ->name('tipoCargo.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [TipoCargoController::class, 'atualizarStatus'])
        ->name('tipoCargo.atualizar.adm');
});