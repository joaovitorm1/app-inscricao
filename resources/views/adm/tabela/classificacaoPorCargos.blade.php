@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Classificação Por Cargos')

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
            Inscritos Por Vaga
        @endslot
    @endcomponent

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Selecione o <b>Cargo</b> e o <b>Local</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Cargo</label>
                                            <select class="form-control select2" style="width: 100%;" required>
                                                <option selected>Selecione</option>
                                                <option>Professor Ensino Fundamento - Português</option>
                                                <option>Professor Ensino Fundamento - Matemática</option>
                                                <option>Professor Ensino Fundamento - Artes</option>
                                                <option>Professor Ensino Fundamento - Inglês</option>
                                                <option>Professor Ensino Fundamento - Educação Física</option>
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Local</label>
                                            <select class="form-control select2" style="width: 100%;" required>
                                                <option selected>Selecione</option>
                                                <option>Sede</option>
                                                <option>Zona Rural</option>
                                                <option>Sede - Cambolo</option>
                                                <option>Sede - Campinho</option>
                                                <option>Sede - Fontana</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row justify-content-end">
                                    <div class="col-1">
                                        <button class="btn btn-primary" id="btn-cadastrar" title="Buscar">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tabela-inscricoes" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>Nome do Candidato</th>
                                        <th>Número da Inscrição</th>
                                        <th>Cargo-Local</th>
                                        <th>Pontuação</th>
                                        <th class="text-center">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lucas Matos e Souza</td>
                                            <td>A2021C033V15L01I002</td>
                                            <td>Professor Ensino Fundamental - Cambolo</td>
                                            <td>10</td>
                                            <td></td>
                                        </tr>
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
    <script src={{asset("/js/adminlte.min.js")}}></script>
    {{-- <script src={{asset("/js/demo.js")}}></script> --}}
    <!-- Page specific script -->
    <script>
        $(function() {
            $table = $("#tabela-inscricoes").DataTable({
                //"dom": 'lBtipr',
                "dom": 'Bfrtip',
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                "info": true,
                "buttons": {
                    "buttons": [{
                        "extend": "excel",
                        "className": "btn-primary",
                        "text": "Gerar E<u>x</u>cel",
                        "key": {
                            "key": "x",
                            "altKey": true
                        }
                    },
                    {
                        "extend": "pdf",
                        "className": "btn-primary",
                        "text": "Gerar <u>P</u>DF",
                        "key": {
                            "key": "p",
                            "altKey": true
                        }
                    },
                    {
                        "extend": "print",
                        "className": "btn-primary",
                        "text": "<u>I</u>mprimir",
                        "key": {
                            "key": "i",
                            "altKey": true
                        }
                    }
                    ]
                }
                , "language": {
                    url: '{{URL::asset("/plugins/datatables/pt_BR.json")}}'
                }
            });

            //}).buttons().container().appendTo('#tabela-inscricoes_wrapper col-sm-12:eq(0)');

            $table.buttons().container()
                .appendTo($('.col-sm-6:eq(0)', $table.table().container()));


        });

    </script>
@endsection
