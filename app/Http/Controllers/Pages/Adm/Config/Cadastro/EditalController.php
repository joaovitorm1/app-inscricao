<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditalRequest;
use App\Models\Cargo;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Edital;

class EditalController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaEditalCadastrados(){
      return view('adm/tabela/listaEditais');
   }


   /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarEditaisCadastrados(){

      $lista = Edital::all();

      return DataTables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroEdital(){
      return view('adm/cadastros/formCadastroEdital');
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(EditalRequest $request){

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $edital = Edital::create($validacao);

      $edital->numero = $request->numero;
      $edital->nome = $request->nome;
      $edital->descricao = $request->descricao;
      $edital->responsavel = $request->responsavel;
      $edital->dataInicial = $request->dataInicial;
      $edital->dataFinal = $request->dataFinal;
      $edital->link = $request->link;
      
      $edital->save();

      return redirect()->route('edital.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');

   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $edital = Edital::find($id);

      if($edital){
         return view('adm/edicao/formEditarEdital', [
            'edital' => $edital
         ]);

      }else{
         return redirect()->route('edital.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(EditalRequest $request, $id){
      $validacao = $request->validated();

      $edital = Edital::find($id);

      $edital->numero = $request->numero;
      $edital->nome = $request->nome;
      $edital->descricao = $request->descricao;
      $edital->responsavel = $request->responsavel;
      $edital->dataInicial = $request->dataInicial;
      $edital->dataFinal = $request->dataFinal;
      $edital->link = $request->link;

      $edital->save();
      
      return redirect()->route('edital.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $edital = Edital::find($id);

      $edital->ativo = 1 - $edital->ativo;
      $edital->save();

      if($edital->ativo > 0){
         return redirect()->route('edital.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('edital.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
   }

   /* AÇÃO PARA VER */
   public function ver($id){
      $edital = Edital::find($id);
      
      $cargos = Cargo::all()->where('edital',$id);


      if($edital){
         return view('adm/cadastros/verEdital', [
            'edital' => $edital,
            'cargos' => $cargos
         ]);

      }else{
         return redirect()->route('edital.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }
   
}
