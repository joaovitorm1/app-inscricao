<?php

namespace App\Http\Controllers\Pages\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdmController extends Controller{

    public function loginAdm(){
        return view('adm/login-adm');
    }

    public function index(){
        return view('adm/index-adm');
    }

    public function listaInscricoes(){
        return view('adm/listaInscricoes');
    }

    public function listaIscricoes24hr(){
        return view('adm/listaInscricoes24hr');
    }

}
