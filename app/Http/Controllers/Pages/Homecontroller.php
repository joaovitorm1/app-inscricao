<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Edital;

class Homecontroller extends Controller{

    public function index(){
        $edital= Edital::all()->where("ativo",1);
        return view('index',['edital'=>$edital]);
    }

    public function inscricao(){
        return view('inscricao');
    }
}
