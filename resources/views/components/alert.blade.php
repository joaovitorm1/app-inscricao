@if(session('sucesso'))
   <script>
      toastr.success('{{session('sucesso')}}');
   </script>
@endif

@if(session('erro'))
   <script>
      toastr.error('{{session('erro')}}');
   </script>
@endif

@if(session('aviso'))
   <script>
      toastr.info('{{session('aviso')}}');
   </script>
@endif

@if(session('atencao'))
   <script>
      toastr.warning('{{session('atencao')}}');
   </script>
@endif

@if ($errors->any())
   @foreach ($errors->all() as $error)
      toastr.error('{{$error}}');
   @endforeach
@endif