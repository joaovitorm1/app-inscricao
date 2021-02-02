<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\CargoRequest;
use App\Http\Requests\RequistoRequest;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Cargo;
use App\Models\Edital;
use App\Models\TipoCargo;
use App\Models\GrupoOcupacional;
use App\Models\LocalCargo;

class CargoController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaCargoCadastrados(){
      return view('adm/tabela/listaCargos');
   }

   /* LISTAR OS REQUESITOS */
   public function listarCargosCadastrados(){

      $lista = Cargo::with("grupoOcupacional")->get()->toArray();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroCargo(){
      $gruposOcupacionais = GrupoOcupacional::all()->where('ativo', 1);
      $editais = Edital::all()->where('ativo', 1);

      return view('adm/cadastros/formCadastroCargo',[
         'gruposOcupacionais' => $gruposOcupacionais,
         'editais' => $editais,
         'requisitos' => [],
         'titulos' => []
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(CargoRequest $request){
      
      $editalBD = Edital::find($request->edital)->get()->first();
      $cargoBD = TipoCargo::find($request->tipoCargo)->get()->first();
      $localBD = LocalCargo::find($request->localCargo)->get()->first();
      $grupoOcupacionalBD = GrupoOcupacional::find($request->grupoOcupacional)->get()->first();

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $cargo = Cargo::create($validacao);

      $cargo->nome = $request->nome;
      $cargo->cargaHoraria = $request->cargaHoraria;
      $cargo->quantidade = $request->quantidade;
      $cargo->salario = $request->salario;

      $cargo->edital()->associate($editalBD);
      $cargo->tipoCargo()->associate($cargoBD);
      $cargo->localCargo()->associate($localBD);
      $cargo->grupoOcupacional()->associate($grupoOcupacionalBD);
      
      $cargo->save();

      return redirect()->route('cargo.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');

   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $rqt = Cargo::find($id);

      if($rqt){
         return view('adm/edicao/formEditarCargo', [
            'requisito' => $rqt
         ]);

      }else{
         return redirect()->route('cargo.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(RequistoRequest $request, $id){
      $validacao = $request->validated();

      $rqt = Cargo::find($id);

      $rqt->nome = $request->nome;
      $rqt->quantidade = $request->quantidade;
      $rqt->pontos = $request->pontos;
      $rqt->save();
      
      return redirect()->route('cargo.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $rqt = Cargo::find($id);

      $rqt->ativo = 1 - $rqt->ativo;
      $rqt->save();

      if($rqt->ativo > 0){
         return redirect()->route('cargo.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('cargo.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }
}
