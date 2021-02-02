<?php

namespace routes\adm\config\cadastro;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Cadastro\GrupoOcupacionalController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm/config/cadastro/grupo-ocupacional')->group(function () {
    /* Rota para listar Cadastro */
    Route::get('/lista', 
        [GrupoOcupacionalController::class, 'tabelaGrupoOcupacionalCadastrados'])
        ->name('grupoOcupacional.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [GrupoOcupacionalController::class, 'listarGruposOcupacionaisCadastrados'])
        ->name('grupoOcupacional.lista');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::get('/lista/edital/{id}', 
        [GrupoOcupacionalController::class, 'listarGrupoOcupacionalCadastradosPorEdital'])
        ->name('grupoOcupacional.lista.edital');

    /* VAI PARA O FORMULÁRIO DE NOVO ITEM */
    Route::get('/novo', 
        [GrupoOcupacionalController::class, 'formCadastroGrupoOcupacional'])
        ->name('grupoOcupacional.novo.adm');

    /* CADASTRA O NOVO ITEM */
    Route::post('/cadastrar', 
        [GrupoOcupacionalController::class, 'cadastrar'])
        ->name('grupoOcupacional.cadastrar.adm');

    /* VAI PARA O FORMULÁRIO DE EDIÇÃO DE ITEM */
    Route::get('/editar/{id}', 
        [GrupoOcupacionalController::class, 'visualizar'])
        ->name('grupoOcupacional.editar.adm');

    /* EDITA O ITEM */
    Route::post('/editar/{id}', 
        [GrupoOcupacionalController::class, 'editar'])
        ->name('grupoOcupacional.editar.adm');

    /* ATUALIZA O STATUS */
    Route::get('/atualizarStatus/{id}', 
        [GrupoOcupacionalController::class, 'atualizarStatus'])
        ->name('grupoOcupacional.atualizar.adm');
});