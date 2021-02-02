@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Lista de Local Cargo')

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
            Local Cargo Cadastrados
        @endslot
    @endcomponent

        <section class="content">
            <div class="p-3">
                <div class="col-2">
                    <a class="btn btn-primary" href="{{ route('localCargo.novo.adm') }}" role="button">Adiciona Novo</a>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tabela-locais" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nome</th>
                                            <th class="text-center">Ação</th>
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
 <!-- DataTables  & Plugins -->
    <script src={{asset("/plugins/datatables/jquery.dataTables.min.js")}}></script>
    <script src={{asset("/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
    <script src={{asset("/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
    <script src={{asset("/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
    <script src={{asset("/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}></script>
    <script src={{asset("/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}></script>
    <script src={{asset("/plugins/jszip/jszip.min.js")}}></script>
    <script src={{asset("/plugins/pdfmake/pdfmake.min.js")}}></script>
    <script src={{asset("/plugins/pdfmake/vfs_fonts.js")}}></script>
    <script src={{asset("/plugins/datatables-buttons/js/buttons.html5.min.js")}}></script>
    <script src={{asset("/plugins/datatables-buttons/js/buttons.print.min.js")}}></script>
    <script src={{asset("/plugins/datatables-buttons/js/buttons.colVis.min.js")}}></script>
    
    @component('components.alert') @endcomponent
    <!-- Page specific script -->
    <script src={{asset("/js/pages/listaLocalCargo.js")}}></script>
    <script>
        this.gerarTabela('{{URL::asset("/plugins/datatables/pt_BR.json")}}', "{{ route('localCargo.lista') }}");
    </script>

@endsection
