<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('metadados')

    <title> @yield('titulo-aplicativo') | @yield('titulo-pagina')</title>

    <!-- CSS PADRÃO -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href={{asset("/plugins/toastr/toastr.min.css")}}>
    <!-- CSS ESPECIFICO DA PÁGINA -->
   @yield('css-pagina')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

      <!-- Barra de Navegação Topo -->
      @component('components.navbarTopo') @endcomponent
      <!-- Fim da Barra de Navegação Topo -->

      <!-- Barra lateral esquerda principal -->
      @component('components.menuEsquerdo') @endcomponent
      <!-- Fim da Barra lateral esquerda principal -->

      <!-- Conteúdo da Página -->
      <div class="content-wrapper">
         <!-- Conteúdo principal -->
         @yield('conteudo-principal')
         <!-- Fim do Conteúdo principal -->
      </div>
      <!-- Fim do Conteúdo da Página -->

      <!-- Barra de Rodapé -->
      @component('components.rodape') @endcomponent
      <!-- Fim da Barra de Rodapé -->

   </div>

    <!-- JS PADRÃO -->
    <script src={{asset("plugins/jquery/jquery.min.js")}}></script>
    <script src={{asset("plugins/jquery-ui/jquery-ui.min.js")}}></script>
    <script>
       $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src={{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- Toastr -->
    <script src={{asset("/plugins/toastr/toastr.min.js")}}></script>
    <script src={{asset("/js/adminlte.min.js")}}></script>
    <!-- CSS ESPECIFICO DA PÁGINA -->
   @yield('js-pagina')

</body>
</html>
