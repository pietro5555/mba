<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->name }} - {{ $title }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- el admin escoje los estilos para todo el sistema--}}
    @include('layouts.include.admin_estilos.universal')
    
    {{-- carga todos los estilos generales --}}
    @include('layouts.include.styles')
    {{-- para que los estilos de las paginas se carguen en el dashboard --}}
    @stack('style')
</head>

<body class="hold-transition skin-blue sidebar-mini" style="background-image: url('{{ asset('assets/formulario.png') }}');">

    {{-- header --}}
    {{--@include('layouts.include.headernew')--}}
    
    {{-- sidebar --}}
    @include('layouts.include.sidebarnew')
      
    @yield('content')
    
    {{-- sidebar derecho --}}
    @include('layouts.include.sidebarnewright')

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
 
</body>
{{-- llama a todo los script generales --}}
@include('layouts.include.script')
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en, es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
                    }
            </script>
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