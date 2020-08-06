<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->name }} - {{ $title }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- carga todos los estilos generales --}}
    @include('layouts.include.styles')
    {{-- para que los estilos de las paginas se carguen en el dashboard --}}
    @stack('style')
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    {{-- header --}}
    @include('layouts.login.header')
    {{-- sidebar --}}
    @include('layouts.login.sidebar')
    {{-- cuerpo de la pagina --}}
    <div class="content-wrapper">
      {{-- breadcrumb --}}
      @include('layouts.include.breadcrumb')
      {{-- mensajes del sistema --}}
      <br>
      @include('layouts.include.mensajes')
      @yield('content')
    </div>
    

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
</body>
{{-- llama a todo los script generales --}}
@include('layouts.include.script')
{{-- recibe los escribe de las paginas, en el dashboard principal --}}
@stack('script')

<script>
   $('#datepicker').datepicker({
      autoclose: true
    })
</script>
<script>
   $('#datepicker2').datepicker({
      autoclose: true
    })
</script>

</html>