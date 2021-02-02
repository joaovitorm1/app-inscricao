<?php

namespace routes\adm\config;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\HomeAdmController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/home')->group(function () {
    /* Rota para o dashboad, página inicial da área administrativa caso 
        esteja logado e autenticado */
    Route::get('/', 
        [HomeAdmController::class, 'index'])
        ->name('index.adm');

    /* Rota para a lista de inscritos por cargos */
    Route::get('/inscricoes/cargos/total', 
        [HomeAdmController::class, 'listaInscricoes'])
        ->name('listaInscricoes.adm');

    /* Rota para a lista de inscritos por cargos nas últimas 24hr */
    Route::get('/inscricoes/cargo/diario', 
        [HomeAdmController::class, 'listaIscricoes24hr'])
        ->name('listaInscricoes24hr.adm');
});