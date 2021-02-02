<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\TituloRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

use App\Models\Titulo;
use App\Models\Edital;

class TituloController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaTituloCadastrados(){
      return view('adm/tabela/listaTitulos');
   }


   /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarTitulosCadastrados(){

      $lista = Titulo::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* LISTAR OS REQUESITOS */
   public function listarTitulosCadastradosPorEdital($id){
      
      $lista = Titulo::whereAtivoAndEdital_id(1,$id)->orderBy('nome', 'ASC')->get()->toArray();
      return Response::json($lista, 200);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroTitulo(){
      $editais = Edital::all()->where('ativo', 1);

      return view('adm/cadastros/formCadastroTitulo', [
         'editais' => $editais
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(TituloRequest $request){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $titulo = Titulo::create($validacao);

      $titulo->nome = $request->nome;
      $titulo->qtd_max = $request->qtdmax;
      $titulo->quantidade = $request->quantidade;
      $titulo->pontos = $request->pontos;

      $titulo->edital()->associate($editalBD);
      
      $titulo->save();

      return redirect()->route('titulo.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
      
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $editais = Edital::all()->where('ativo', 1);
      
      $titulo = Titulo::find($id);

      if($titulo){
         return view('adm/edicao/formEditarTitulo', [
            'titulo' => $titulo,
            'editais' => $editais
         ]);

      }else{
         return redirect()->route('titulo.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(TituloRequest $request, $id){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated();

      $titulo = Titulo::find($id);

      $titulo->nome = $request->nome;
      $titulo->qtd_max = $request->qtdmax;
      $titulo->quantidade = $request->quantidade;
      $titulo->pontos = $request->pontos;

      $titulo->edital()->associate($editalBD);

      $titulo->save();
      
      return redirect()->route('titulo.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $titulo = Titulo::find($id);

      $titulo->ativo = 1 - $titulo->ativo;
      $titulo->save();

      if($titulo->ativo > 0){
         return redirect()->route('titulo.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('titulo.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }

}