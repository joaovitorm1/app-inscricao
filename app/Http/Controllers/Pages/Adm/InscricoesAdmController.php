<?php

namespace App\Http\Controllers\Pages\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InscricoesAdmController extends Controller{

   public function classificacaoPorCargos(){
      return view('adm/tabela/classificacaoPorCargos');
   }

   public function formImpressaoCurriculo(){
      return view('adm/forms-consultas/formImpressaoCurriculo');
   }

   public function impressaoCurriculo(){
      return view('adm/tabela/classificacaoPorCargos');
   }
}
