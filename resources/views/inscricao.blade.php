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

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Seleção do Cargo/Função Desejada</h3>

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
                            </div>
                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Dados Pessoais</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="number" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Documento de Identificação </label>
                                            <select class="form-control select2" style="width: 100%;" required>
                                                <option selected>RG</option>
                                                <option>CNH</option>
                                                <option>Passaporte</option>
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nº documento</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Orgão Expedidor</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            <label>CEP</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>logradouro</label>
                                            <select class="form-control select2" style="width: 100%;" required>
                                                <option selected>Rua</option>
                                                <option>Avenida</option>
                                                <option>Via</option>
                                                <option>Viela</option>
                                                <option>Trevo</option>
                                                <option>Praça</option>
                                                <option>Parque</option>
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Número</label>
                                            <input type="number" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Complemento</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Formação </h3>

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
                                            <button class="btn btn-md btn-primary" id="btn-adicionar-escolaridade" title="Adicionar">Adicionar</button>
                                        </div>

                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Escolaridade</label>
                                            <select class="form-control select2" style="width: 100%;" required>
                                                <option value="" selected>Alfabetizado</option>
                                                <option value="">Educação infantil</option>
                                                <option value="">Ensino Fundamental</option>
                                                <option value="">Ensino Médio</option>
                                                <option value="">Ensino Superior</option>
                                                <option value="">Pós-graduação</option>
                                                <option value="">Mestrado</option>
                                                <option value="">Doutorado</option>
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Situação</label>
                                            <select class="form-control select2" style="width: 100%;" required>
                                                <option value="" selected>Completo</option>
                                                <option value="">Incompleto</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Ano de Conclusão</label>
                                            <input type="number" class="form-control" required>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <hr/>

                        </div>

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Experiências Profissionais </h3>

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
                                            <button class="btn btn-md btn-primary" id="btn-adicionar-escolaridade" title="Adicionar">Adicionar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr/>

                        </div>

                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Confirmações </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Declaro que não participo de gerência ou administração de sociedade privada, personificada ou não personificada, nem exerço o comércio, nos
                                                termos do Inciso X do Art. 117 da Lei nº 8.112/1990.
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Declaro como verdadeiros os dados preenchidos, estando ciente de que qualquer declaração falsa ou omissão da verdade implica na possibilidade de
                                                aplicação das sanções cominadas no artigo 299 do Código Penal Brasileiro.
                                            </label>
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
</body>
</html>
