<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\Adm\HomeAdmController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da web para seu aplicativo.
| Essas rotas são carregadas pelo RouteServiceProvider dentro de um grupo
| que contém o grupo de middleware "web". Agora crie algo ótimo!
|
*/

/* Rota para a raiz do Homecontroller */
//Route::get('/', [Homecontroller::class, 'index'])->name('inicio'); //Laravel >= 8+
Route::get('/', [HomeController::class, 'index'])->name('inicio');

/* Rota para a página com o formulário de cadastro de candidatos */
Route::get('/adm', [HomeAdmController::class, 'loginAdm'])->name('loginAdm.add');
