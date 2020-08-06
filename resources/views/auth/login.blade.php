@extends('layouts.auth')

@section('content')

@php
$enlace = trim(str_replace('/mioficina', ' ', request()->root()));
@endphp

<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
</script>

@if($settings->login == 1)

@include('auth.componentes.login1')

@elseif($settings->login == 2)

@include('auth.componentes.login2')

@elseif($settings->login == 3)

@include('auth.componentes.login3')

@endif

@push('script')
<script type="text/javascript">
    function toggle() {
        $('#inicio').toggle('slow')
        $('#recuperar').toggle('slow')
    }
    
</script>
@endpush
@endsection	