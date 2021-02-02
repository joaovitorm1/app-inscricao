<?php

namespace routes\adm\config;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\InscricoesAdmController;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/adm')->group(function () {

    /* Grupos de Rotas para o menu Inscrições da área administrativa  */
    Route::prefix('/inscricoes')->group(function () {

        /* Rota para a classificação por cargos */
        Route::get('/classificacao/cargo', 
            [InscricoesAdmController::class, 'classificacaoPorCargos'])->name('classificacaoPorCargos.adm');

        /* Rota para o formulário de geração de curriculos */
        Route::get('/curriculos', 
            [InscricoesAdmController::class, 'formImpressaoCurriculo'])->name('formImpressaoCurriculo.adm');

        /* Rota para o formulário de geração de curriculos */
        Route::get('/curriculo/{inscricao}/{cpf}', 
            [InscricoesAdmController::class, 'impressaoCurriculo']);
    });
});