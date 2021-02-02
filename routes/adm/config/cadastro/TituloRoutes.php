<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\TituloController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/titulo')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [TituloController::class, 'tabelaTituloCadastrados'])
        ->name('titulo.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [TituloController::class, 'listarTitulosCadastrados'])
        ->name('titulo.lista');
    
        /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::get('/lista/edital/{id}', 
    [TituloController::class, 'listarTitulosCadastradosPorEdital'])
        ->name('titulo.lista.edital');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [TituloController::class, 'formCadastroTitulo'])
        ->name('titulo.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [TituloController::class, 'cadastrar'])
        ->name('titulo.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [TituloController::class, 'visualizar'])
        ->name('titulo.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [TituloController::class, 'editar'])
        ->name('titulo.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [TituloController::class, 'atualizarStatus'])
        ->name('titulo.atualizar.adm');
});