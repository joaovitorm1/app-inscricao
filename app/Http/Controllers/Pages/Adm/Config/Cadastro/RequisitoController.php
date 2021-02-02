<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;


use App\Http\Controllers\Controller;
use App\Http\Requests\RequistoRequest;
use App\Models\Edital;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

use App\Models\Requisito;

class RequisitoController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaRequisitosCadastrados(){
      return view('adm/tabela/listaRequisitos');
   }

   /* LISTAR OS REQUESITOS */
   public function listarRequisitosCadastrados(){

      $lista = Requisito::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* LISTAR OS REQUESITOS */
   public function listarRequisitosCadastradosPorEdital($id){
      
      $lista = Requisito::whereAtivoAndEdital_id(1,$id)->orderBy('nome', 'ASC')->get()->toArray();

      return Response::json($lista, 200);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroRequisito(){
      $editais = Edital::all()->where('ativo', 1);

      return view('adm/cadastros/formCadastroRequisito', [
         'editais' => $editais
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(RequistoRequest $request){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $rqt = Requisito::create($validacao);

      $rqt->nome = $request->nome;
      $rqt->quantidade = $request->quantidade;
      $rqt->pontos = $request->pontos;

      $rqt->edital()->associate($editalBD);

      $rqt->save();

      return redirect()->route('requisito.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
      
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $rqt = Requisito::find($id);

      $editais = Edital::all()->where('ativo', 1);

      if($rqt){
         return view('adm/edicao/formEditarRequisito', [
            'requisito' => $rqt,
            'editais' => $editais
         ]);

      }else{
         return redirect()->route('requisito.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(RequistoRequest $request, $id){
      $validacao = $request->validated();

      $rqt = Requisito::find($id);

      $rqt->nome = $request->nome;
      $rqt->quantidade = $request->quantidade;
      $rqt->pontos = $request->pontos;
      $rqt->save();
      
      return redirect()->route('requisito.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $rqt = Requisito::find($id);

      $rqt->ativo = 1 - $rqt->ativo;
      $rqt->save();

      if($rqt->ativo > 0){
         return redirect()->route('requisito.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('requisito.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }
}
