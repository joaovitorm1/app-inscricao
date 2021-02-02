<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App-Inscrições | Inscrição Candidatos</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{asset("/plugins/fontawesome-free/css/all.min.css")}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("/css/adminlte.min.css")}}>
</head>
<body class="hold-transition layout-top-nav">
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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form action="{{ route('inscricao.cadastraVaga') }}" method="POST">
            @csrf
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Seleção do Cargo</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>local</label>
                                            <select class="form-control select2" name="local" id="local" on=""style="width: 100%; @error('local') is-invalid @enderror" required>
                                                
                                                    <option selected value="0">Selecione</option>
                                                    @foreach ($locais as $local)
                                                        <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                                    @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cargo">Cargo</label>
                                            <select name="cargo" id="cargo" class="form-control select2 cargo" style="width: 100%;" required disabled>
                                                <option>SELECIONAR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->

            <div class="content-header">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-1">
                            <button class="btn btn-danger" id="btn-cancelar" title="Adicionar">Cancelar </button>
                        </div>

                        <div class="col-1">
                            <button class="btn btn-primary" id="btn-cadastrar" title="Adicionar">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>
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
        <!-- JS com lista em json que chama a lista de cargos -->
    <script src={{asset("/js/pages/listaCargo.js")}}></script>
</body>
</html>
