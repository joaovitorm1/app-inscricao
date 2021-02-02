@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Cadastro de Título')

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
            Formulário de Cadastro de Título
        @endslot
    @endcomponent

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('titulo.cadastrar.adm') }}" method="POST">
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
                                                            @if(old('edital') == $edital->id)
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
                                                <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ old('id') }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="qtdmax">Quantidade Máxima?</label>
                                                <select name="qtdmax" id="qtdmax" class="form-control select2 @error('qtdmax') is-invalid @enderror" style="width: 100%;" required disabled>
                                                    <option value="0"> NÃO </option>
                                                    <option value="1"> SIM </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="quantidade">Quantidade</label>
                                                <input id="quantidade" name="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" value="{{ old('quantidade') }}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="pontos">Pontos Por Título</label>
                                                <input id="pontos" name="pontos" type="number" step="0.01" class="form-control @error('pontos') is-invalid @enderror" value="{{ old('pontos') }}">
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
