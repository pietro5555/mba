<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->name }} - 'Oops!'</title>

{{-- carga todos los estilos generales --}}
    @include('layouts.include.styles')
    
    <style>
        .color{
            color:white;
        }
    </style>
</head>

<body style="background-color: #403b3b;">
    
   <div class="col-xs-12 col-md-8 col-md-offset-2" style="margin-top:100px;">
       
            <div class="box-body">
                <h1 style="color:#f39c12;"><i class="fas fa-exclamation-triangle"></i> Oops! Algo a salido mal</h1>
                <h3 class="color">Lo sentimos algo a salido mal para regresar al sistema por favor presione el boton regresar si desea contactar a soporte de Sinergia red Internacional presione el boton soporte</h3>
                
                <div class="col-md-6">
                    <a href="{{ url('/') }}" class="btn btn-info btn-block">Regresar</a>
                </div>    
                <div class="col-md-6">
                    <a href="https://sinergiared.com/clientes" class="btn btn-danger btn-block" target="_black">Soporte</a>
                </div> 
            </div>
            
   </div>  
   
  </body> 
   </html>