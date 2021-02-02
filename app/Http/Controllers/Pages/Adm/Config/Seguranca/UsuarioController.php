<?php

namespace App\Http\Controllers\Pages\Adm\Config\Seguranca;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\GrupoUsuarios;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Usuario;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaUsuariosCadastrados(){
      return view('adm/tabela/listaUsuarios');
   }

   /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarUsuariosCadastrados(){

      $lista = Usuario::with("grupos")->get()->toArray();

      //dd($lista);
      
      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroUsuario(){
      $gruposUsuarios = GrupoUsuarios::all()->where('ativo', 1);
      
      return view('adm/cadastros/formCadastroUsuario', [
         'gruposUsuarios' => $gruposUsuarios
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(UsuarioRequest $request){
      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      //dd($validacao);

      $usuario = Usuario::create($validacao);

      $usuario->login = $request->login;
      $usuario->senha = password_hash($request->senha, PASSWORD_DEFAULT);

      $usuario->save();

      $usuario->grupos()->attach($request->grupo);
      
      return redirect()->route('usuario.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $usuario = Usuario::with('grupos')->findOrFail($id);

      //dd($usuario->grupos->toArray()[0]['id']);

      $gruposUsuarios = GrupoUsuarios::all()->where('ativo', 1);
      
      if($usuario){
         return view('adm/edicao/formEditarUsuario', [
            'usuario' => $usuario,
            'grupoUsuarios' => $gruposUsuarios
         ]);

      }else{
         return redirect()->route('usuario.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(HttpRequest $request, $id){

      /* NECESSÁRIO NOVA VALIDAÇÃO POR CONTA DA SENHA */
      $validacao = Validator::make($request->all(), [
         'login' => [
             'required',
             'max:100',
             'unique:usuario,login,'.$id],
         'grupo' => ['exists:grupousuarios,id']
      ]);

      if ($validacao->fails()) {
         return redirect()
            ->back()
            ->withErrors($validacao)
            ->withInput();
      }

      $usuario = Usuario::find($id);

      $usuario->login = $request->login;

      //dd($request->senha);

      if($request->senha != null){ // verifica se a senha foi alterada
         $usuario->senha = password_hash($request->senha, PASSWORD_DEFAULT); // muda a senha do seu usuario
      }

      $usuario->save();

      $usuario->grupos()->sync($request->grupo);
      
      return redirect()->route('usuario.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $usuario = Usuario::find($id);

      $usuario->ativo = 1 - $usuario->ativo;
      $usuario->save();

      if($usuario->ativo > 0){
         return redirect()->route('usuario.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('usuario.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }
}