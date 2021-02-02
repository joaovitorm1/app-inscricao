<?php

namespace App\Http\Controllers\Pages\Adm\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SegurancaController extends Controller{

    /* FUNÇÕES PARA VISUALIZAR OS CADASTROS */
    public function listarPermissoesCadastradas(){
        return view('adm/tabela/listaPermissoes');
    }

    public function listarGruposCadastrados(){
        return view('adm/tabela/listaGruposUsuarios');
    }

    public function listarUsuariosCadastrados(){
        return view('adm/tabela/listaUsuarios');
    }


    /* FUNÇÕES PARA GERAÇÃO DE CADASTROS */
    public function formCadastroPermissao(){
        return view('adm/cadastros/formCadastroPermissao');
    }

    public function formCadastroGrupo(){
        return view('adm/cadastros/formCadastroGrupoUsuario');
    }

    public function formCadastroUsuario(){
        return view('adm/cadastros/formCadastroUsuario');
    }
}
