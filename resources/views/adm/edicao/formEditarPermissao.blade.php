@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Cadastro de Permissão')

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
            Formulário de Cadastro de Permissão
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
                                    <h3 class="card-title">Dados da <b>Permissão</b></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="id">Id</label>
                                                <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $permissao->id }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ $permissao->nome }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descricao">Descrição</label>
                                                <input id="descricao" name="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" value="{{ $permissao->descricao }}">
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
                                    <button class="btn btn-primary" id="btn-atualizar-permissao" title="Atualizar">Atualizar</button>
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
        @component('components.alert') @endcomponent
    </script>
@endsection
