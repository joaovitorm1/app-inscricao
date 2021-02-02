@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Formulário para Consulta de Auditoria')

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
            Gerador de Consultas à auditoria
        @endslot
    @endcomponent

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Selecione o <b>Dados</b> para consulta</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Data Inicial</label>
                                            <input type="datetime-local" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Data Final</label>
                                            <input type="datetime-local" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-1">
                                        <button class="btn btn-primary" id="btn-buscar-individual" title="Buscar">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('js-pagina')
    <script src={{asset("/js/adminlte.min.js")}}></script>
@endsection
