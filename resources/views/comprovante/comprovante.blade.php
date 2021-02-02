<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App-Inscrições | Inscrição Candidatos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{asset("css/estilodeimpressao.css")}} type="text/css" media="print"/>
    <link rel="stylesheet" href={{asset("/plugins/fontawesome-free/css/all.min.css")}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("/css/adminlte.min.css")}}>
</head>
<body class="hold-transition layout-top-nav" >
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="/inscricao" class="navbar-brand">
                    <img src={{asset("/img/AdminLTELogo.png")}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">App Inscrições</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>
        <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="body">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="container-fluid text-uppercase">
                    <div class="row">
                        <div class="col-12">
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-1">
                                        <img width="100px;" src="https://portoseguro.ba.gov.br/images/logo.png">
                                    </div>
                                    <div class="col-9 text-center">
                                        <h4>Comprovante de Inscrição</h4>
                                        <h5><strong>{{ $edital->nome}} - {{ $edital->numero}}</strong></h5>
                                    </div>
                                    <div class="col-2">
                                        <small class="float-right">Data: {{$candidato->data_cadastro}}</small>
                                    </div>
                                </div>

                                <hr>

                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        Nome:
                                        <address>
                                            <strong>{{ $candidato->nome}}</strong><br>
                                        </address>
                                    </div>
                                
                                    <div class="col-sm-3 invoice-col">
                                        Nº Inscrição:
                                        <address>
                                            <strong>{{ $candidato->inscricao}}</strong><br>
                                        </address>
                                    </div>

                                    <div class="col-sm-3 invoice-col">
                                        Nº CPF:
                                        <address>
                                            <strong>{{ $candidato->cpf}}</strong><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        Cargo:
                                        <address>
                                            <strong>{{ $cargo->nome}}</strong><br>
                                        </address>
                                    </div>
                                
                                    <div class="col-sm-3 invoice-col">
                                        Local:
                                        <address>
                                            <strong>{{ $local->nome}}</strong><br>
                                        </address>
                                    </div>

                                    <div class="col-sm-3 invoice-col">
                                        Tipo Cargo:
                                        <address>
                                            <strong>{{ $tipocargo->nome}}</strong><br>
                                        </address>
                                    </div>
                                    <button class="btn btn-default" onclick="abs();"><i class="fas fa-print"></i>Imprimir</button>
                                    <button type="button" class="btn btn-primary float-right" id="btnPrint"  style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Gera PDF
                                    </button>
                                </div>
                                <!-- /.row -->
                                
                                <!-- this row will not appear when printing -->
                                    <div class="col-12">
                                       
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
            <strong>Copyright &copy; 2021 Prefeitura Municipal de Porto Seguro.</strong>
            Todos os direitos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Versão</b> 1.0.0-rc
            </div>
        </footer>
    </div>
<!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src={{asset("/plugins/jquery/jquery.min.js")}}></script>
    <!-- Bootstrap 4 -->
    <script src={{asset("/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- AdminLTE App -->
    <script src={{asset("/js/adminlte.min.js")}}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{asset("/js/demo.js")}}></script>
    <script src={{asset("/js/pages/comprovante.js")}}></script>
</body>
</html>
</html>
