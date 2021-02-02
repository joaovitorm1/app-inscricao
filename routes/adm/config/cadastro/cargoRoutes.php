<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\CargoController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/cargo')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [CargoController::class, 'tabelaCargoCadastrados'])
        ->name('cargo.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [CargoController::class, 'listarCargosCadastrados'])
        ->name('cargo.lista');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [CargoController::class, 'formCadastroCargo'])
        ->name('cargo.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [CargoController::class, 'cadastrar'])
        ->name('cargo.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [CargoController::class, 'visualizar'])
        ->name('cargo.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [CargoController::class, 'editar'])
        ->name('cargo.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [CargoController::class, 'atualizarStatus'])
        ->name('cargo.atualizar.adm');
});