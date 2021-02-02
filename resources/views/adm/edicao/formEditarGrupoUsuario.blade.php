@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Editar Grupo de Usuário')

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
            Formulário para Edição de Grupo de Usuário
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
                                    <h3 class="card-title">Dados do <b>Grupo</b></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="id">Id</label>
                                                <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $grupoUsuario->id }}"  readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ $grupoUsuario->nome }}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descricao">Descrição</label>
                                                <input id="descricao" name="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" value="{{ $grupoUsuario->descricao }}" >
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
                                    <h3 class="card-title"><b>Permissões</b> do Grupo de Usuário</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if(count($permissoes) > 0)

                                        @foreach($permissoes as $item)
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch custom-switch-on-success">
                                                        <input type="checkbox" name="permissoes[]" class="custom-control-input" @if(in_array($item->id, $permissoesAtivas)) checked @endif value="{{ $item->id }}" id="{{ $item->id }}" >
                                                        <label class="custom-control-label" for="{{ $item->id }}">{{ $item->nome.' | '. $item->descricao }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="callout callout-danger">
                                            <h5 class="text-danger"> <b>Atenção </b></h5>
                                            <p> Não há permissões habilitadas </p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-header">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <button class="btn btn-primary" id="btn-cadastrar-grupoUsuario" title="Adicionar">Cadastrar</button>
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
