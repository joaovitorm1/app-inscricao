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
                        <h1 class="m-0"> Formulário de Inscrição - Seletivo 01/2021 - <br> <small> acesso em 18/01/2021 </small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Edital</a></li>
                            <li class="breadcrumb-item active">Inscrição</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <form action="{{ route('inscricao.cadastraEndereco') }}" method="POST">
            @csrf
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header">
                              <h3 class="card-title">Dados Endereço</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-3">
                             <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" class="form-control cep @error('cep') is-invalid @enderror" value="{{ old('cep') }}" required onblur="pesquisacep(this.value);" id="cep" required>
                             </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                             <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" name="cidade" id="cidade" class="form-control @error('cidade') is-invalid @enderror" value="{{ old('cidade') }}" required required>
                             </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="uf">Estado</label>
                                    <input name="estado"type="text" id="uf" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado') }}"  required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="logradouro">logradouro</label>
                                    <select class="form-control select2 @error('logradouro') is-invalid @enderror" name="logradouro" id="logradouro" style="width: 100%;" required>
                                        <option value="rua" selected>Rua</option>
                                        <option value="avenida">Avenida</option>
                                        <option value="Via">Via</option>
                                        <option value="Viela">Viela</option>
                                        <option value="Trevo">Trevo</option>
                                        <option value="Praça">Praça</option>
                                        <option value="Parque">Parque</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" name="endereco" class="form-control  @error('endereco') is-invalid @enderror" id="endereco" required>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="numero">Número</label>
                                    <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{ old('numero') }}" id="numero" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" name="complemento" class="form-control  @error('complemento') is-invalid @enderror" value="{{ old('complemento') }}" id="complemento">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" name="bairro" class="form-control  @error('bairro') is-invalid @enderror" value="{{ old('bairro') }}" id="bairro" required>
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
                    <a class="btn btn-danger" href="" id="btn-cancelar" title="Adicionar">Volta </a>
                </div>

                <div class="col-1">
                    <button class="btn btn-primary"  title="Adicionar">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.content -->
</form>
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
<!-- Bootstrap 4 -->
<script src={{asset("/plugins/jQuery-Mask-Plugin/jquery.mask.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("/js/adminlte.min.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("/js/demo.js")}}></script>
<!--js da pagina -->
<script src={{asset("/js/pages/inscricao.js")}}></script>
</body>
</html>