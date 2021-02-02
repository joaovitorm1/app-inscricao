@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Cadastro de Cargo')

@section('metadados')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

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
            Formulário de Cadastro de Cargo
        @endslot
    @endcomponent

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('cargo.cadastrar.adm') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Dados <b>Principais</b> do Cargo</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="id">Id</label>
                                                <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ old('id') }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edital">Edital</label>
                                                <select name="edital" id="select-edital" class="form-control select2 @error('edital') is-invalid @enderror" style="width: 100%;" required @if($editais->isEmpty()) disabled @endif>
                                                    @if($editais->isEmpty()) 
                                                        <option value="0"> NÃO HÁ EDITAIS CADASTRADOS/ATIVOS </option>
                                                    @else
                                                        <option value="0">SELECIONE O EDITAL</option>
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

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="grupoOcupacional">Grupo Ocupacional</label>
                                                <select name="grupoOcupacional" id="select-grupoOcupacional" class="form-control select2 @error('grupoOcupacional') is-invalid @enderror" style="width: 100%;" required disabled>
                                                    <option>SELECIONAR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipoCargo">Tipo Cargo</label>
                                                <select name="tipoCargo" id="select-tipoCargo" class="form-control select2 @error('tipo') is-invalid @enderror" style="width: 100%;" required disabled>
                                                    <option>SELECIONAR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="localCargo">Localidade</label>
                                                <select name="localCargo" id="select-localidade" class="form-control select2 @error('localidade') is-invalid @enderror" style="width: 100%;" required disabled>
                                                    <option>SELECIONAR</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="quantidade">Quantidade</label>
                                                <input id="quantidade" name="quantidade" type="number" class="form-control @error('quantidade') is-invalid @enderror" value="{{ old('quantidade') }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="cargaHoraria">Carga Horária</label>
                                                <input id="cargaHoraria" name="cargaHoraria" type="number" class="form-control @error('cargaHoraria') is-invalid @enderror" value="{{ old('cargaHoraria') }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="salario">Salário</label>
                                                <input id="salario" name="salario" type="number" step="0.01" class="form-control @error('salario') is-invalid @enderror" value="{{ old('salario') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Requisitos</b> do Cargo</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Lista Requisistos -->
                                <div id="lista-requisitos" class="card-body"></div>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Titulos</b> do Cargo</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Lista Titulos -->
                                <div id="lista-titulos" class="card-body"></div>
                            </div>
                        </div>
                    </div>

                    <div class="content-header">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <button class="btn btn-primary" id="btn-cadastrar-cargo" title="Adicionar" disabled>Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection

@section('js-pagina')
    <script>
        urlGruposOcupacionais = "{{ Str::substr(route('tipoCargo.lista.edital',['id'=>0], false),0,-1) }}";
    </script>
    <script src={{asset("/js/pages/formCadastroCargo.js")}}></script>
    <script>
        @component('components.alert') @endcomponent
    </script>
@endsection