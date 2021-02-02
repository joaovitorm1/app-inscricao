@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Editar Local Cargo')

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
            Formulário para Edição de Local Cargo
        @endslot
    @endcomponent

        <section class="content">
            <div class="container-fluid">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Dados do <b>Local</b></h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="edital">Edital</label>
                                                <select name="edital" id="select-edital-atualizar" class="form-control select2 @error('edital') is-invalid @enderror" style="width: 100%;" required @if($editais->isEmpty()) disabled @endif>
                                                    @if($editais->isEmpty()) 
                                                        <option value="0"> NÃO HÁ EDITAIS CADASTRADOS/ATIVOS </option>
                                                    @else
                                                        <option value="0">Selecione o Edital</option>
                                                        @foreach($editais as $edital)
                                                            @if($local->edital->id == $edital->id)
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
                                                <input id="id" name="id" type="number" class="form-control @error('id') is-invalid @enderror" value="{{ $local->id }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label for="nome">Nome</label>
                                                <input id="nome" name="nome" type="text" class="form-control @error('nome') is-invalid @enderror" value="{{ $local->nome  }}" readonly>
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
                                    <button class="btn btn-primary" id="btn-atualizar-local" title="Atualizar">Atualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection

@section('js-pagina')
    <script src={{asset("/js/pages/formCadastroLocalCargo.js")}}></script>
    <script>
        @component('components.alert') @endcomponent
    </script>
@endsection
