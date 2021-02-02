<?php

namespace App\Http\Controllers\Pages;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidatoRequest;
use App\Http\Requests\RequisitosRequest;
use App\Http\Requests\CargoCandidatoRequest;
use App\Http\Requests\CargoRequest;
use App\Http\Requests\EnderecoRequest;
use App\Http\Requests\TituloCandRequest;
use App\Models\Candidato;
use App\Models\Cargo;
use App\Models\Edital;
use App\Models\RequisitoCandidato;
use App\Models\Local;
use App\Models\Endereco;
use App\Models\LocalCargo;
use App\Models\TipoCargo;
use App\Models\Requisito as ModelsRequisito;
use App\Models\CargoRequisito;
use App\Models\Titulo;
use App\Models\TituloCandidato;
use App\Models\ExperienciaProfissional;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\Local as AdapterLocal;
use Maatwebsite\Excel\Concerns\ToArray;
use App\Models\TipoDocumento;

class InscricaoController extends Controller{

   /* FORMULÁRIO DE CADASTRO de pessoa */
   public function formDadosPessoais($edital){
      //$edital = Edital::find($edital);
      
      $edital = Edital::find($edital);
      $documento = TipoDocumento::all();
      return view('form/formDadosPessoais',['edital'=>$edital
      ,"documento"=>$documento]);
   }

    /* FORMULÁRIO QUE RECEBE CADASTRO E ENVIA PARA PROXIMA TABELA */
   public function cadastraCandidato(CandidatoRequest $request){
      $validacao = $request->validated(); //volta para o formulário caso esteja errado
      
      
      $cpfedital=candidato::whereCpfAndEdital_id($request->cpf,$request->edital_id)->delete();
      if($cpfedital===null){
      $candidato = Candidato::create($validacao);
      $candidato->nome = $request->nome;
      $candidato->cpf = $request->cpf;
      $candidato->tipodoc_id = $request->tipodoc_id;
      $candidato->numerodoc = $request->numerodoc;
      $candidato->orgao_expedidor = $request->orgao_expedidor;
      $candidato->telefone = $request->telefone;
      $candidato->edital_id = 1;
      $candidato->data_nascimento = $request->data_nascimento;
      $candidato->save();
      session(['candidato' => $candidato]);
      //dd($candidato->toArray());

      //$cand = $candidato->toArray();
      return  redirect()->route('inscricao.formEndereco',[
         'candidato'=> $candidato,
      ]);
      }else{
         $candidato = Candidato::create($validacao);
         $candidato->nome = $request->nome;
         $candidato->cpf = $request->cpf;
         $candidato->tipodoc_id = $request->tipodoc_id;
         $candidato->numerodoc = $request->numerodoc;
         $candidato->orgao_expedidor = $request->orgao_expedidor;
         $candidato->telefone = $request->telefone;
         $candidato->edital_id = 1;
         $candidato->data_nascimento = $request->data_nascimento;
         $candidato->save();
         session(['candidato' => $candidato]);
         //dd($candidato->toArray());
   
         //$cand = $candidato->toArray();
         return  redirect()->route('inscricao.formEndereco',[
            'candidato'=> $candidato,
         ]);
      }
      
   }
   /* FORMULÁRIO DE CADASTRO de pessoa */
   public function formEndereco($candidato){
      return view('form/formEndereco',['candidato'=>$candidato]);
   }

   /* FORMULÁRIO QUE RECEBE CADASTRO E ENVIA PARA PROXIMA TABELA */
   public function cadastraEndereco(EnderecoRequest $request){
     $idCandidado = session()->get('candidato');
     $validacao = $request->validated(); //volta para o formulário caso esteja errado
     $candidato = Candidato::find($idCandidado);
     $endereco = Endereco::create($validacao);
     $endereco->cep = $request->cep;
     $endereco->logradouro = $request->logradouro;
     $endereco->endereco = $request->endereco;
     $endereco->complemento = $request->complemento;
     $endereco->cidade = $request->cidade;
     $endereco->bairro = $request->bairro;
     $endereco->estado = $request->estado;

     //$candidato[0]->endereco()->associate($endereco);
     $endereco->candidato()->associate($candidato[0]);
     $endereco->save();
     return redirect()->route('inscricao.formVaga',$endereco);
  }
  public function formVaga($dados){
      $idCandidado = session()->get('candidato');
      $candidato = Candidato::find($idCandidado);
      $edital = Edital::find($candidato[0]->edital_id);
      $local= LocalCargo::where('edital_id',$edital->id)->get();
      return view('form/formEscolhaVaga',[
         'locais'=>$local
         ]);
   }
   /* LISTAR OS REQUESITOS */
   public function listaCargo($id){
      $lista = Cargo::where('local_cargo_id',$id)->get();
      return Response::json($lista,200);
   }
   /* FORMULÁRIO QUE RECEBE CADASTRO E ENVIA PARA PROXIMA TABELA */
   public function cadastraVaga(CargoCandidatoRequest $request){
      $idCandidado = session()->get('candidato');
      $validacao = $request->validated(); //volta para o formulário caso esteja errado
      $candidato = Candidato::find($idCandidado);
      $candidato[0]->cargo_id=$request->cargo;
      $candidato[0]->save();
      return redirect()->route('inscricao.formRequisito',[
         'candidato'=> $candidato[0]
         ]);
   }

   public function formRequisito($candidato){
      $candSession = session()->get('candidato');
      
      
      $cand = Candidato::find($candSession->id)->get()->first();
      //dd($cand->cargo_id);
      $cargo = Cargo::find($cand->cargo_id);
      $requisitos = $cargo->requisitos()->get();
      return view('form/formRequisito', [
         'cargorequisito'=>$requisitos
      ]);
   }

   /* FORMULÁRIO QUE RECEBE CADASTRO E ENVIA PARA PROXIMA TABELA */
   public function cadastraRequisito(RequisitosRequest $request){
      $candSession = session()->get('candidato');
      
      $cand = Candidato::find($candSession->id)->get()->first();

      $cand->requisitos()->attach($request->requisitos);

      $cand->save();
      return redirect()->route('inscricao.formtitulo',[
         'candidato'=> $cand
         ]);


   }
   public function formTitulo($candidato){
      $candSession = session()->get('candidato');
      
      
      $cand = Candidato::find($candSession->id)->get()->first();
      //dd($cand->cargo_id);
      return view('form/formTitulos', [
         'candidato'=>$cand
      ]);
   }
   public function listTitulo($id){
      $candSession = session()->get('candidato');      
      $cand = Candidato::find($candSession->id)->get()->first();
      
      //dd($cand->cargo_id);
      $cargo = Cargo::find($cand->cargo_id);
      $lista = $cargo->titulos()->get();
      return Response::json($lista,200);

   }


   /* FORMULÁRIO QUE RECEBE CADASTRO E ENVIA PARA PROXIMA TABELA */
   public function cadastraTitulo(TituloCandRequest $request){
      $candSession = session()->get('candidato');
      
      $cand = Candidato::find($candSession->id)->get()->first();
         $validacao = $request->validated();
         $titulo=$request->toArray();
         $contador=count($titulo['nome']);
         for($cont=0;$cont<$contador;$cont++){
         //$titulo=$request;
         $tit = new TituloCandidato;
         //dd($titulo['nome'][$cont]);
          //$tit->titulo_id =  $titulo['titulo_id'][$cont];
         $tit->nome = $titulo['nome'][$cont];
         $tit->data_conclusao = $titulo['data_conclusao'][$cont];

         $tit->candidato()->associate($cand);
        
         $titu=Titulo::find($titulo['titulo_id'][$cont]);
         $tit->titulo()->associate($titu);
         
         $tit->save();
         
         }
         return redirect()->route('inscricao.formexperiencia',[
            'candidato'=> $cand
            ]);
   }
   public function formExperiencia($candidato){
      $candSession = session()->get('candidato');
      
      
      $cand = Candidato::find($candSession->id)->get()->first();
      //dd($cand->cargo_id);
      return view('form/formExperiencia', [
         'candidato'=>$cand
      ]);
   }
   /* FORMULÁRIO QUE RECEBE CADASTRO E ENVIA PARA PROXIMA TABELA */
 
  
   public function cadastraExperiencia(Request $request){
      $candSession = session()->get('candidato');
      
      $cand = Candidato::find($candSession->id)->get()->first();
      $experiencia=$request->toArray();
      $contador=count($experiencia['cargo']);
      for($cont=0;$cont<$contador;$cont++){
         $xp = new ExperienciaProfissional;
         $xp->nome = $experiencia['cargo'][$cont];
         $xp->função = $experiencia['empresa'][$cont];
         $xp->meses = $experiencia['periodo'][$cont];
         $xp->candidato()->associate($cand);
         
         $xp->save();
      }
      $numeroinscricao = 'ps.02.2021.'.random_int(100000,9999999);;
      $cand->update(['inscricao' =>$numeroinscricao]);
      $cand->save();

      return redirect()->route('inscricao.comprovante',[
         'candidato'=> $cand
         ]);
      //VIEW
   }
   
   public function comprovante($candidato){
      $candSession = session()->get('candidato');
      
      
      $cand = Candidato::find($candSession->id)->get()->first();

      $edital = Edital::find($cand)->first();
      $cargo = Cargo::find($cand->cargo_id);
      $local= LocalCargo::find($cargo->local_cargo_id)->get()->first();
      $tipocargo=TipoCargo::find($cargo->tipo_cargo_id)->get()->first();
      //dd($cand->cargo_id);
      return view('comprovante/comprovante', [
         'candidato'=>$cand,
         'edital'=>$edital,
         'cargo'=>$cargo,
         'local'=>$local,
         'tipocargo'=>$tipocargo
      ]);
   }


}