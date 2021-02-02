<?php

namespace App\Http\Controllers\Pages\Adm\Config\Seguranca;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissaoRequest;
use App\Models\homologacao\Auditoria;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Permissao;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;

class PermissaoController extends Controller{
   

   /* VIEW TABELA CADASTROS */
   public function tabelaPermissaoCadastrados(Request $request){

      $msg = 'Usuario: '.$request->get_current_user.' | Acessou os registros de permissão de usuário';
      
      $this->gravaAuditoria($request, $msg);

      return view('adm/tabela/listaPermissoes');
   }


   /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarPermissoesCadastrados(Request $request){

      $msg = 'Usuario: '.$request->get_current_user.' | Acessou o JSON de permissões de usuário';
      
      $this->gravaAuditoria($request, $msg);

      $lista = Permissao::all();

      return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

   /* FORMULÁRIO DE CADASTROS */
   public function formCadastroPermissao(Request $request){
      $msg = 'Usuario: '.$request->get_current_user.' | Acessou o formulário de cadastro de permissões de usuário';
      
      $this->gravaAuditoria($request, $msg);

      return view('adm/cadastros/formCadastroPermissao');
   }

   /* AÇÃO PARA CADASTRO */
   public function cadastrar(PermissaoRequest $request){
      
      $validacao = $request->validated(); //volta para o formulário caso esteja errado

      $permissao = Permissao::create($validacao);

      $permissao->nome = $request->nome;
      $permissao->descricao = $request->descricao;
      
      $permissao->save();


      if($permissao->id){
         $msg = 'Usuario: '.$request->get_current_user.' | Cadastrou a Permissão de usuário: '.$permissao;
      
         $this->gravaAuditoria($request, $msg);
      }

      return redirect()->route('permissao.tabela.adm')
         ->with('sucesso', 'Cadastro efetuado com sucesso!');
   }

   /* AÇÃO PARA EDIÇÃO */
   public function visualizar(Request $request, $id){
      $permissao = Permissao::find($id);

      if($permissao){
         $msg = 'Usuario: '.$request->get_current_user.' | Visualizou informações a Permissão de '.
            'usuário: '.$permissao;
      
         $this->gravaAuditoria($request, $msg);

         return view('adm/edicao/formEditarPermissao', [
            'permissao' => $permissao
         ]);

      }else{

         $msg = 'Usuario: '.$request->get_current_user.' | Buscou por visualização de informações'.
           ' da Permissão de usuário com o Id: '.$id.' sem sucesso';
      
         $this->gravaAuditoria($request, $msg);

         return redirect()->route('permissao.listar.adm')
            ->with('atencao', 'Cadastro não localizado!');
      }
   }

   /* AÇÃO PARA EDIÇÃO */
   public function editar(PermissaoRequest $request, $id){
      $validacao = $request->validated();

      $permissao = Permissao::find($id);

      $permissao->nome = $request->nome;
      $permissao->descricao = $request->descricao;

      $permissao->save();

      $msg = 'Usuario: '.$request->get_current_user.' | Atualizou informações da Permissão de '.
            'usuário: '.$permissao;
      
      $this->gravaAuditoria($request, $msg);
      
      return redirect()->route('permissao.tabela.adm')
            ->with('sucesso', 'Cadastro atualizado com sucesso!');
   }

   /* AÇÃO ATUALIZAR STATUS */
   public function atualizarStatus(Request $request, $id){
      $permissao = Permissao::find($id);

      $permissao->ativo = 1 - $permissao->ativo;
      $permissao->save();

      if($permissao->ativo > 0){
         $msg = 'Usuario: '.$request->get_current_user.' | Habilitou a Permissão de '.
            'usuário ID: '.$permissao->id.' | nome:'.$permissao->nome;
      
         $this->gravaAuditoria($request, $msg);

         return redirect()->route('permissao.tabela.adm')
         ->with('atencao', 'Cadastro ativado com sucesso!');

      }else{

         $msg = 'Usuario: '.$request->get_current_user.' | Desabilitou a Permissão de '.
         'usuário ID: '.$permissao->id.' | nome:'.$permissao->nome;
   
         $this->gravaAuditoria($request, $msg);

         return redirect()->route('permissao.tabela.adm')
            ->with('atencao', 'Cadastro desativado com sucesso!');
      }
      
   }

   protected function gravaAuditoria(Request $request, $mensagem){
      $auditoria = new Auditoria();

      $auditoria->ip = $request->getClientIp();
      $auditoria->nome_maquina = $request->getRequestUri();
      $auditoria->data_acesso = Carbon::now()->tz('America/Sao_Paulo')->toDateTimeString();
      $auditoria->registro = $mensagem;

      $auditoria->save();
   }
}