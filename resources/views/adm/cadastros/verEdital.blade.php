@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Edição de Edital')

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
            Cadastro de Edital
        @endslot
    @endcomponent

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Dados <b>Principais</b> do Edital</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="id">Id</label>
                                        <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $edital->id }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <input id="numero" name="numero" type="text" class="form-control @error('numero') is-invalid @enderror" value="{{ $edital->numero }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ $edital->nome }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <textarea  id="descricao" name="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="4" cols="50" readonly>{{ $edital->descricao }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="responsavel">Orgão Responsável</label>
                                        <input id="responsavel" name="responsavel" type="text" class="form-control @error('responsavel') is-invalid @enderror" value="{{ $edital->responsavel }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dataInicial">Data Inicial</label>
                                        <input id="dataInicial" name="dataInicial" type="date" class="form-control @error('dataInicial') is-invalid @enderror" value="{{ $edital->dataInicial }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dataFinal">Data Final</label>
                                        <input id="dataFinal" name="dataFinal" type="date" class="form-control @error('dataFinal') is-invalid @enderror" value="{{ $edital->dataFinal }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="link">Link do Edital no Diário Oficial</label>
                                        <input id="link" name="link" type="text" class="form-control @error('link') is-invalid @enderror" value="{{ $edital->link }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><b>Vagas</b> do Edital</h3>
                        </div>
                        <div class="card">
                        <div class="card-body">
                            <table id="tabela-editais" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Vagas</th>
                                        <th>Quantidade</th>
                                        <th>Grupo Ocupacional</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-pagina')
    <script>
        @component('components.alert') @endcomponent
    </script>
@endsection
