<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    {{-- traductor de google  --}}
    
@if($settings->traductor == '1')    
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit(){
new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages:
'de,en,fr,pt,zh-CN,es,ja,it,ru', layout:
google.translate.TranslateElement.FloatPosition.TOP_LEFT, gaTrack: true, gaId:
'UA-12345678-XX'}, 'google_translate_element');
}
</script><script type="text/javascript"
src="//translate.google.com/translate_a/element.js?
cb=googleTranslateElementInit"></script> 
@endif
{{-- fin traductor --}}

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->name }} - {{ $title }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />

 {{-- Mostramos el modo oscuro o el badner del home --}}
 @include('layouts.include.oscuro')

<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>
    
    {{-- el admin escoje los estilos para todo el sistema--}}
    @include('layouts.include.admin_estilos.universal')
    
    {{-- carga todos los estilos generales --}}
    @include('layouts.include.styles')
    
    {{-- para que los estilos de las paginas se carguen en el dashboard --}}
    @stack('style')
</head>
@guest
<body class="hold-transition skin-blue sidebar-mini" style="background-color: #ecf0f5;">

    {{-- header --}}
    {{--@include('layouts.include.headernew')--}}
    
    {{-- sidebar --}}
    @include('layouts.include.sidebarnew')
    
    {{-- cuerpo de la pagina --}}
    
      {{-- breadcrumb --}}
      {{--@include('layouts.include.breadcrumb')--}}
      
      {{-- mensajes del sistema --}}
      <br>
      @include('layouts.include.mensajes')
      @yield('content')
    
    {{-- sidebar derecho --}}
    @include('layouts.include.sidebarnewright')

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
 
</body>
@else
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    {{-- header --}}
    @include('layouts.include.headernew')
    {{-- sidebar --}}
    @include('layouts.include.sidebarnew')
    {{-- cuerpo de la pagina --}}
    
    <div class="content-wrapper" style="background-color: #171515;">
    
      {{-- breadcrumb --}}
      @include('layouts.include.breadcrumb')
      {{-- mensajes del sistema --}}
      <br>
      @include('layouts.include.mensajes')
      @yield('content')
    </div>
    {{-- sidebar derecho --}}
    @include('layouts.include.sidebarnewright')

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
</body>
@endguest
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