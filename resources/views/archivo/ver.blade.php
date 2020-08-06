@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        <h4>Archivos</h4>
      </div>
      @if(Auth::user()->rol_id == 0)
      <a href="{{ route('archivo.subir') }}" class="btn btn-primary btn-block" id="btn">Agregar Nuevo Material</a>
      @endif
    </div>
    <div class="box-body">
      @foreach($archivo as $archi)
      @if($archi->imagen_muestra != null)
      <div class="col-sm-2">

        <img src="{{asset('imagenmaterial/'.$archi->imagen_muestra)}}" alt="" class="circular-herramienta"
          >
      </div>
      @endif

      <div class="col-sm-10">
        <h3 class="margin-herramienta">{{$archi->titulo}}</h3>
        <br>
        <p class="margin-herramienta">{!! $archi->contenido !!}</p>
        <p class="margin-herramienta">{{$archi->created_at->diffForHumans()}}</p>

        @if(!empty($archi->archivo))
        <a href="{{route('archivo.ver-descargar', $archi->id)}}" class="btn btn-primary">
         <i class="fas fa-cloud-download-alt"></i>
        </a>    
        @endif
        
        @if(Auth::user()->rol_id == '0')
        <a href="{{ route('archivo.ver-mejorar', $archi->id) }}" class="btn btn-info"><span
            class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            
        <a href="{{ route('archivo.destruir', $archi->id) }}" class="btn btn-danger"><span
            class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        @endif
        <hr>
      </div>

      @endforeach

    </div>
  </div>
</div>
@endsection