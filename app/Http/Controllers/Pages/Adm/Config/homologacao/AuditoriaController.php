<?php

namespace App\Http\Controllers\Pages\Adm\Config\Homologacao;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Symfony\Component\HttpFoundation\Request;
use Carbon\Carbon;

use App\Models\homologacao\Auditoria;

class AuditoriaController extends Controller{

    /* FUNÇÕES PARA VISUALIZAR OS CADASTROS */
    public function visualizarTabelaAuditoria(Request $request){
        $msg = 'Usuario: '.$request->get_current_user.' | Acessou os registros de auditoria';
      
        $this->gravaAuditoria($request, $msg);

        return view('adm/tabela/listaAuditoria');
    }

    /* LISTAR OS GRUPOS OCUPACIONAIS */
   public function listarAuditoriaCadastradas(Request $request){
        $msg = 'Usuario: '.$request->get_current_user.' | Acessou o JSON de registros de auditoria';
        
        $this->gravaAuditoria($request, $msg);

        $lista = Auditoria::all();

        return Datatables::of($lista)
            ->addIndexColumn()
            ->addColumn('Ação', function($row){ return ""; })
            ->rawColumns(['Ação'])
            ->make(true);
   }

    public function consultarAuditoria(){
        return view('adm/forms-consultas/formConsultaAuditoria');
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
