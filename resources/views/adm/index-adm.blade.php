@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Dashboard')

@section('css-pagina')
 <link rel="stylesheet" href={{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
    <link rel="stylesheet" href={{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("plugins/jqvmap/jqvmap.min.css")}}>
    <link rel="stylesheet" href={{asset("css/adminlte.min.css")}}>
    <link rel="stylesheet" href={{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
    <link rel="stylesheet" href={{asset("plugins/daterangepicker/daterangepicker.css")}}>
    <link rel="stylesheet" href={{asset("plugins/summernote/summernote-bs4.min.css")}}>
@endsection

@section('conteudo-principal')

    @component('components.breadcrumb')
        @slot('subTitulo')
            Dashboard
        @endslot
    @endcomponent

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>150</h3>

                        <p>Inscrições Totais</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('listaInscricoes.adm') }}" class="small-box-footer">Veja Mais <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3>50<sup style="font-size: 20px">+</sup></h3>

                        <p>Inscrições - 24horas</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('listaInscricoes24hr.adm') }}" class="small-box-footer">Veja Mais <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3>8,25</h3>
                        <p>Média por vagas geral</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-pagina')
 <script src={{asset("plugins/chart.js/Chart.min.js")}}></script>
    <script src={{asset("plugins/sparklines/sparkline.js")}}></script>
    <script src={{asset("plugins/jqvmap/jquery.vmap.min.js")}}></script>
    <script src={{asset("plugins/jqvmap/maps/jquery.vmap.usa.js")}}></script>
    <script src={{asset("plugins/jquery-knob/jquery.knob.min.js")}}></script>
    <script src={{asset("plugins/moment/moment.min.js")}}></script>
    <script src={{asset("plugins/daterangepicker/daterangepicker.js")}}></script>
    <script src={{asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
    <script src={{asset("plugins/summernote/summernote-bs4.min.js")}}></script>
    <script src={{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
    <script src={{asset("js/adminlte.js")}}></script>
    <script src={{asset("js/demo.js")}}></script>
    <script src={{asset("js/pages/dashboard.js")}}></script>
@endsection
