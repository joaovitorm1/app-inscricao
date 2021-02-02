@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Lista de Inscrições Total')

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
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Relação de quantitativo de inscrito por vaga</h3>
                        </div>

                        <div class="card-body">
                            <table id="tabela-inscricoes" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>Cargo</th>
                                    <th>Vagas</th>
                                    <th>Inscritos</th>
                                    <th class="text-center">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Professor Educação Básica - Matemática</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>6</td>
                                    </tr>
                                    <tr>
                                    <td>Professor Educação Básica - Português</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>6</td>
                                    </tr>
                                    <tr>
                                    <td>Professor Educação Básica - História</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>6</td>
                                    </tr>
                                    <tr>
                                    <td>Professor Educação Básica - Artes</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>6</td>
                                    </tr>
                                    <tr>
                                    <td>Professor Educação Básica - Geografia</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>6</td>
                                    </tr>
                                    <tr>
                                    <td>Professor Educação Básica - Inglês</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>1</td>
                                    </tr>
                                    <tr>
                                    <td>Professor Educação Básica - Redação</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>5</td>
                                    </tr>
                                    <tr>
                                    <td>Médico Plantonista - UPA</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>9</td>
                                    </tr>

                                    <tr>
                                    <td>Médico Plantonista - Hospital</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>12,52</td>
                                    </tr>

                                    <tr>
                                    <td>MédMédicoio Plantonista - SAMU</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>15,75</td>
                                    </tr>

                                    <tr>
                                    <td>Médico Saúde da Família</td>
                                    <td>10</td>
                                    <td>95</td>
                                    <td>85,33</td>
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
                "dom": 'Bfrtip'
                , "responsive": false
                , "lengthChange": true
                , "autoWidth": true
                , "searching": true
                , "info": true
                , "buttons": {
                    "buttons": [{
                        "extend": "excel"
                        , "className": "btn-primary"
                        , "text": "Gerar E<u>x</u>cel"
                        , "key": {
                            "key": "x"
                            , "altKey": true
                        }
                    }
                    , {
                        "extend": "pdf"
                        , "className": "btn-primary"
                        , "text": "Gerar <u>P</u>DF"
                        , "key": {
                            "key": "p"
                            , "altKey": true
                        }
                    }
                    , {
                        "extend": "print"
                        , "className": "btn-primary"
                        , "text": "<u>I</u>mprimir"
                        , "key": {
                            "key": "i"
                            , "altKey": true
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
