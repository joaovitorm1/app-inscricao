<?php

namespace App\Http\Controllers\Pages\Adm\Config\Cadastro;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoOcupacionalRequest;
use App\Models\GrupoOcupacional;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

use App\Models\Edital;

class GrupoOcupacionalController extends Controller{

   /* VIEW TABELA CADASTROS */
   public function tabelaGrupoOcupacionalCadastrados(){
      return view('adm/tabela/listaGruposOcupacionais');
   }


   /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarGruposOcupacionaisCadastrados(){

      $lista = GrupoOcupacional::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* LISTAR OS REQUESITOS */
   public function listarGrupoOcupacionalCadastradosPorEdital($id){
      
      $lista = GrupoOcupacional::whereAtivoAndEdital_id(1,$id)->orderBy('nome', 'ASC')->get()->toArray();
      return Response::json($lista, 200);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroGrupoOcupacional(){
      $editais = Edital::all()->where('ativo', 1);

      return view('adm/cadastros/formCadastroGrupoOcupacional', [
         'editais' => $editais
      ]);
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(GrupoOcupacionalRequest $request){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $grupo = GrupoOcupacional::create($validacao);

      $grupo->nome = $request->nome;
      
      $grupo->edital()->associate($editalBD);

      $grupo->save();

      return redirect()->route('grupoOcupacional.tabela.adm')
            ->with('sucesso', 'Cadastro efetuado com sucesso!');
      
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar($id){
      $editais = Edital::all()->where('ativo', 1);

      $grupo = GrupoOcupacional::find($id);

      if($grupo){
         return view('adm/edicao/formEditarGrupoOcupacional', [
            'grupo' => $grupo,
            'editais' => $editais
         ]);

      }else{
         return redirect()->route('grupoOcupacional.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(GrupoOcupacionalRequest $request, $id){
      $editalBD = Edital::find($request->edital)->get()->first();

      $validacao = $request->validated();

      $grupo = GrupoOcupacional::find($id);

      $grupo->nome = $request->nome;

      $grupo->edital()->associate($editalBD);

      $grupo->save();
      
      return redirect()->route('grupoOcupacional.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus($id){
      $grupo = GrupoOcupacional::find($id);

      $grupo->ativo = 1 - $grupo->ativo;
      $grupo->save();

      if($grupo->ativo > 0){
         return redirect()->route('grupoOcupacional.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{
         return redirect()->route('grupoOcupacional.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }

}