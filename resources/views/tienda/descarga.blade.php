<!DOCTYPE html>
<html>
<head>
  <title>{{$bancaria->titulo}}</title>
<style>
   .margen{
        width:730px; height:20px;
    }
</style>
</head>
<body>

<div class="margen">
 <center>   
 <img src="{{ asset('assets/img/logo-light.png') }}" style="width: 100px; box-shadow: 0 0px 2px rgba(0, 0, 0, 1);">
 
  <h3 style="margin-top: 5px;">Informacion Bancaria de {{$settings->name}}</h3>
  </center>

{!! $bancaria->contenido !!}

</div>

</body>