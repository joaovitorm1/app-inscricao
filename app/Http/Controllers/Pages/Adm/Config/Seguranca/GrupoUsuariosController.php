<?php

namespace App\Http\Controllers\Pages\Adm\Config\Seguranca;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoUsuariosRequest;
use Yajra\DataTables\Facades\DataTables;

use App\Models\GrupoUsuarios;
use App\Models\Permissao;

class GrupoUsuariosController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaGrupoUsuarioCadastrados(){
      return view('adm/tabela/listaGruposUsuarios');
   }

   /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarGruposUsuariosCadastrados(){

      $lista = GrupoUsuarios::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroGrupoUsuario(){
      $permissoes = Permissao::all()->where('ativo', 1);
      
      return view('adm/cadastros/formCadastroGrupoUsuario', [
         'permissoes' => $permissoes
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(GrupoUsuariosRequest $request){
      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      //dd($validacao);

      $grupoUsuario = GrupoUsuarios::create($validacao);

      $grupoUsuario->nome = $request->nome;
      $grupoUsuario->descricao = $request->descricao;
      $grupoUsuario->save();

      $grupoUsuario->permissoes()->attach($request->permissoes);
      
      return redirect()->route('grupoUsuario.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $grupoUsuario = GrupoUsuarios::find($id);

      $permissoes = Permissao::all()->where('ativo', 1);

      //dd($permissoes->toArray());

      $listaPermissoes = $grupoUsuario->permissoes()->get()->map(function ($item, $key) {
         return $item->id; // Retorna os IDs das permissões cadastradas no grupoUsuario
      })->toArray();

      //dd($listaPermissoes);
      
      if($grupoUsuario){
         return view('adm/edicao/formEditarGrupoUsuario', [
            'grupoUsuario' => $grupoUsuario,
            'permissoesAtivas' => $listaPermissoes,
            'permissoes' => $permissoes
         ]);

      }else{
         return redirect()->route('grupoUsuario.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(GrupoUsuariosRequest $request, $id){

      $validacao = $request->validated();

      $grupoUsuario = GrupoUsuarios::find($id);

      $grupoUsuario->nome = $request->nome;
      $grupoUsuario->descricao = $request->descricao;

      $grupoUsuario->save();

      $grupoUsuario->permissoes()->sync($request->permissoes);
      
      return redirect()->route('grupoUsuario.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $grupoUsuario = GrupoUsuarios::find($id);

      $grupoUsuario->ativo = 1 - $grupoUsuario->ativo;
      $grupoUsuario->save();

      if($grupoUsuario->ativo > 0){
         return redirect()->route('grupoUsuario.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('grupoUsuario.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }
}