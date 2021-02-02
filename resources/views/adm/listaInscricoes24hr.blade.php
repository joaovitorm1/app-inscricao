@extends('layouts.template-admin')

@section('titulo-aplicativo', 'App-Inscrição')

@section('titulo-pagina', 'Lista Inscritos por vagas em 24hr')

@section('css-pagina')
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href={{asset("/plugins/fontawesome-free/css/all.min.css")}}>
    <!-- DataTables -->
    <link rel="stylesheet" href={{asset("/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}>
    <link rel="stylesheet" href={{asset("/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}>
    <link rel="stylesheet" href={{asset("/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}>
    <link rel="stylesheet" href={{asset("/css/adminlte.min.css")}}>
@endsection

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Logo -->
         <a href="{{route('index.adm')}}" class="brand-link">
            <img src={{asset("img/AdminLTELogo.png")}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><b>App</b>Inscrições</span>
         </a>

         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-header">MENU</li>
                  <li class="nav-item menu-open">
                     <a href="{{route('index.adm')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Inscrições
                           <i class="fas fa-angle-left right"></i>
                           <span class="badge badge-info right">6</span>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="assets/pages/layout/top-nav.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Por Função</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                           Charts
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="assets/pages/charts/chartjs.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>ChartJS</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="assets/pages/charts/flot.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Flot</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="assets/pages/charts/inline.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Inline</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="assets/pages/charts/uplot.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>uPlot</p>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>

      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0">Inscritos Por Vaga nas ultimas 24hr.</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('index.adm')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Inscritos Por Cargo</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Relação de quantitativo de inscrito por vaga nas ultimas 24hr.</h3>
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
         <!-- /.content -->
      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
         <strong>Copyright &copy; 2021 Prefeitura Municipal de Porto Seguro.</strong>
         Todos os direitos reservados.
         <div class="float-right d-none d-sm-inline-block">
            <b>Versão</b> 1.0.0-rc
         </div>
      </footer>

   </div>

   <!-- jQuery -->
   <script src={{asset("/plugins/jquery/jquery.min.js")}}></script>
   <!-- Bootstrap 4 -->
   <script src={{asset("/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
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
   <!-- AdminLTE App -->
   <script src={{asset("/js/adminlte.min.js")}}></script>
   <!-- AdminLTE for demo purposes -->
   <script src={{asset("/js/demo.js")}}></script>
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
</body>

</html>
