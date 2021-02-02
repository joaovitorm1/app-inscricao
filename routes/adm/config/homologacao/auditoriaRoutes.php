<?php

namespace routes\adm\config\homologacao;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\Adm\Config\Homologacao\AuditoriaController;

/* Grupos de Rotas a área Administrativa de Segurança */
Route::prefix('/adm/config/auditoria')->group(function () {
    /* Rota para vialização de toda a auditoria do sistema */
    Route::get('/listar',
        [AuditoriaController::class, 'visualizarTabelaAuditoria'])
        ->name('auditoria.tabela.adm');

    /* GERA OS DADOS PARA A TABELA DE LISTAGEM */
    Route::post('/lista', 
        [AuditoriaController::class, 'listarAuditoriaCadastradas'])
        ->name('auditoria.lista');

    /* Rota para formulario para consulta de auditoria no sistema*/
    Route::get('/consultar',
        [AuditoriaController::class, 'consultarAuditoria'])
        ->name('formAuditoria.consulta.adm');
});