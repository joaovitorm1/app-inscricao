<?php

use App\Http\Controllers\Pages\InscricaoController;
use Illuminate\Support\Facades\Route;

/* Grupos de Rotas a área Administrativa */
Route::prefix('/inscricao')->group(function () {

    /* Rota para Cadastro */
    Route::get('/{edital}', 
        [InscricaoController::class, 'formDadosPessoais'])
        ->name('inscricao.dadosPessoais');
    
       
    
    /* POST PARA CADASTRAR CANDIDATO */
    Route::post('/cadastracandidato', 
        [InscricaoController::class, 'cadastraCandidato'])
        ->name('inscricao.cadastroCandidato'); 
    
    /* Rota para Cadastro Do Endereço do Candidato */
    Route::get('/endereco/{candidato}', 
        [InscricaoController::class, 'formEndereco'])
        ->name('inscricao.formEndereco');

    /* POST PARA CADASTRAR ENDEREÇO DO CANDIDATO */
    Route::post('/cadastraendereco', 
        [InscricaoController::class, 'cadastraEndereco'])
        ->name('inscricao.cadastraEndereco');

    /* Rota para Cadastro Do Vaga do Candidato */
    Route::get('/vaga/{dados}', 
    [InscricaoController::class, 'formVaga'])
    ->name('inscricao.formVaga');
    Route::POST('/inscricao/cargo/lista/', 
    [InscricaoController::class, 'listaCargo'])
    ->name('inscricao.listaCargo');
    
    /* Rota para Cadastro */
    Route::get('cargo/{id}', 
        [InscricaoController::class, 'listaCargo'])
        ->name('inscricao.listaCargo');
        
    /* POST PARA CADASTRAR VAGA DO CANDIDATO */
    Route::post('/cadastravaga', 
        [InscricaoController::class, 'cadastraVaga'])
        ->name('inscricao.cadastraVaga');

    /* Rota para Cadastro Do Requisito do Candidato */
    Route::get('/requisito/{candidato}', 
    [InscricaoController::class, 'formRequisito'])
    ->name('inscricao.formRequisito');

    /* POST PARA CADASTRAR VAGA DO CANDIDATO */
    Route::post('/cadastrarequisito', 
        [InscricaoController::class, 'cadastraRequisito'])
        ->name('inscricao.cadastraRequisito');

    /* Rota para Cadastro Do Requisito do Candidato */
    Route::get('/titulo/{candidato}', 
    [InscricaoController::class, 'formTitulo'])
    ->name('inscricao.formtitulo');
    /* Rota para Cadastro Do Requisito do Candidato */
    Route::get('/titulo/lista/{id}', 
    [InscricaoController::class, 'listTitulo'])
    ->name('inscricao.listTitulo');

    /* POST PARA CADASTRAR VAGA DO CANDIDATO */
    Route::post('/cadastratitulo', 
        [InscricaoController::class, 'cadastraTitulo'])
        ->name('inscricao.cadastraTitulo');
        /* Rota para Cadastro Do Requisito do Candidato */
    Route::get('/experiencia/{candidato}', 
    [InscricaoController::class, 'formExperiencia'])
    ->name('inscricao.formexperiencia');
    /* POST PARA CADASTRAR VAGA DO CANDIDATO */
    Route::post('/cadastraexperiencia', 
        [InscricaoController::class, 'cadastraExperiencia'])
        ->name('inscricao.cadastraExperiencia');
    Route::get('/Comprovante/{candidato}', 
        [InscricaoController::class, 'comprovante'])
        ->name('inscricao.comprovante');
});