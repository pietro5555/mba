@extends('layouts.dashboardnew2')

@section('content')

<link rel="stylesheet" href="{{asset('assets/css/registroexterno.css')}}">

<style>
    .claro{
      color:#{{$settings->cololetras}};  
    } 
</style>

<script>
    function validarEdad(edad) {
        var hoy = new Date();
        var cumpleanos = new Date(edad);

        var edad = hoy.getFullYear() - cumpleanos.getFullYear();
        var m = hoy.getMonth() - cumpleanos.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }

        if (edad < {
                {
                    $settings - > edad_minino
                }
            }) {
            document.getElementById("btn").disabled = true;
            document.getElementById("errorEdad").style.display = 'block';
        } else {
            document.getElementById("btn").disabled = false;
            document.getElementById("errorEdad").style.display = 'none';
        }
    }
</script>

@if($settings->registro == 1)

@include('auth.componentes.registro1')

@elseif($settings->registro == 2)

@include('auth.componentes.registro2')

@endif

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
 $(".chosen").chosen({width: "100%"});
 });
</script>
@endpush
@endsection