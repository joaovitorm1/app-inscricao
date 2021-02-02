<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;


use App\Http\Controllers\Controller;
use App\Http\Requests\LocalCargoRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

use App\Models\Edital;
use App\Models\LocalCargo;

class LocalCargoController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaLocaisCargosCadastrados(){
      return view('adm/tabela/listaLocaisCargo');
   }

   /* LISTAR OS REQUESITOS */
   public function listarLocaisCargosCadastrados(){

      $lista = LocalCargo::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* LISTAR OS REQUESITOS */
   public function listarLocaisCargosCadastradosPorEdital($id){
      
      $lista = LocalCargo::whereAtivoAndEdital_id(1,$id)->orderBy('nome', 'ASC')->get()->toArray();

      return Response::json($lista, 200);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroLocalCargo(){
      $editais = Edital::all()->where('ativo', 1);

      return view('adm/cadastros/formCadastroLocalCargo', [
         'editais' => $editais
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(LocalCargoRequest $request){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $local = LocalCargo::create($validacao);

      $local->nome = $request->nome;

      $local->edital()->associate($editalBD);

      $local->save();

      return redirect()->route('localCargo.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
      
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $local = LocalCargo::find($id);

      $editais = Edital::all()->where('ativo', 1);

      if($local){
         return view('adm/edicao/formEditarLocalCargo', [
            'local' => $local,
            'editais' => $editais
         ]);

      }else{
         return redirect()->route('localCargo.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(LocalCargoRequest $request, $id){
      $validacao = $request->validated();

      $local = LocalCargo::find($id);

      $local->nome = $request->nome;
      
      $local->save();
      
      return redirect()->route('localCargo.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $local = LocalCargo::find($id);

      $local->ativo = 1 - $local->ativo;

      $local->save();

      if($local->ativo > 0){
         return redirect()->route('localCargo.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('localCargo.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }
}
