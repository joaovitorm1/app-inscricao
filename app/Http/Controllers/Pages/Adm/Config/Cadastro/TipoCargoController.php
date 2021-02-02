<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;


use App\Http\Controllers\Controller;
use App\Http\Requests\TipoCargoRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

use App\Models\Edital;
use App\Models\TipoCargo;

class TipoCargoController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaTipoCargoCadastrados(){
      return view('adm/tabela/listaTipoCargo');
   }

   /* LISTAR OS REQUESITOS */
   public function listarTipoCargosCadastrados(){

      $lista = TipoCargo::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* LISTAR OS REQUESITOS */
   public function listarTiposCargosCadastradosPorEdital($id){
      
      $lista = TipoCargo::whereAtivoAndEdital_id(1,$id)->orderBy('nome', 'ASC')->get()->toArray();

      return Response::json($lista, 200);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroTipoCargo(){
      $editais = Edital::all()->where('ativo', 1);

      return view('adm/cadastros/formCadastroTipoCargo', [
         'editais' => $editais
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(TipoCargoRequest $request){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $tipo = TipoCargo::create($validacao);

      $tipo->nome = $request->nome;

      $tipo->edital()->associate($editalBD);

      $tipo->save();

      return redirect()->route('tipoCargo.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
      
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $tipo = TipoCargo::find($id);

      $editais = Edital::all()->where('ativo', 1);

      if($tipo){
         return view('adm/edicao/formEditartipoCargo', [
            'tipo' => $tipo,
            'editais' => $editais
         ]);

      }else{
         return redirect()->route('tipoCargo.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(TipoCargoRequest $request, $id){
      $validacao = $request->validated();

      $tipo = TipoCargo::find($id);

      $tipo->nome = $request->nome;
      
      $tipo->save();
      
      return redirect()->route('tipoCargo.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $tipo = TipoCargo::find($id);

      $tipo->ativo = 1 - $tipo->ativo;

      $tipo->save();

      if($tipo->ativo > 0){
         return redirect()->route('tipoCargo.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('tipoCargo.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }
}
