@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Editar Título')

@section('css-pagina')
 <!-- DataTables -->
    <link rel="stylesheet" href={{asset("/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}>
    <link rel="stylesheet" href={{asset("/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}>
    <link rel="stylesheet" href={{asset("/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("/css/adminlte.min.css")}}>
@endsection

@section('conteudo-principal')

    @component('components.breadcrumb')
        @slot('subTitulo')
            Formulário para Edição de Título
        @endslot
    @endcomponent

        <section class="content">
            <div class="container-fluid">
                <form method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Dados do <b>Título</b></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="edital">Edital</label>
                                                <select name="edital" id="select-edital" class="form-control select2 @error('edital') is-invalid @enderror" style="width: 100%;" required @if($editais->isEmpty()) disabled @endif>
                                                    @if($editais->isEmpty()) 
                                                        <option value="0"> NÃO HÁ EDITAIS CADASTRADOS/ATIVOS </option>
                                                    @else
                                                        <option value="0">Selecione o Edital</option>
                                                        @foreach($editais as $edital)
                                                            @if($titulo->edital->id == $edital->id)
                                                                <option value="{{ $edital->id }}" selected> {{ $edital->nome }} </option>
                                                            @else
                                                                <option value="{{ $edital->id }}"> {{ $edital->numero.' - '.$edital->nome }} </option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="id">Id</label>
                                                <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $titulo->id }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ $titulo->nome }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="qtdmax">Quantidade Máxima?</label>
                                                <select name="qtdmax" id="qtdmax" class="form-control select2 @error('qtdmax') is-invalid @enderror" style="width: 100%;" required>
                                                    @if($titulo->qtd_max == 0)
                                                        <option value="0" selected> NÃO </option>
                                                        <option value="1"> SIM </option>
                                                    @else
                                                        <option value="0"> NÃO </option>
                                                        <option value="1" selected> SIM </option>
                                                    @endif
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="quantidade">Quantidade Máxima</label>
                                                <input id="quantidade" name="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" value="{{ $titulo->quantidade }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="pontos">Pontos Por Título</label>
                                                <input id="pontos" name="pontos" type="number" step="0.01" class="form-control @error('pontos') is-invalid @enderror" value="{{ $titulo->pontos }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-header">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <button class="btn btn-primary" id="btn-cadastrar-titulo" title="Adicionar">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection

@section('js-pagina')
    <script src={{asset("/js/pages/formCadastroTitulo.js")}}></script>
    <script>
        @component('components.alert') @endcomponent
    </script>
@endsection
