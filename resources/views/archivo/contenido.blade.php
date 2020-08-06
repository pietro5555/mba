@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        <h3 class="panel-title">Blog y Artículos</h3>
      </div>
      @if (Auth::user()->rol_id == '0')
      <a href="{{ route('archivo.noticias') }}" class="btn btn-primary btn-block" id="btn">Agregar Nuevos Artículos</a>
      @endif
    </div>
    <div class="box-body">
      @foreach($contenido as $archi)
      
      @if($archi->imagen != null)
      <div class="col-sm-2">

        <img src="{{asset('imagen/'.$archi->imagen)}}" alt="" class="circular-herramienta">
      </div>
      @endif

      <div class=" col-sm-{{($archi->imagen != null) ? '10' : '12'}}">
        <h3 class="titulo-herramienta">{{$archi->titulo}}</h3>
        <br>
        <p class="otros-herramienta">{!! $archi->contenido !!}</p>
        <p class="otros-herramienta">{{$archi->created_at->diffForHumans()}}</p>

        @if(Auth::user()->rol_id == '0')
        <a href="{{ route('archivo.actualizar', $archi->id) }}" class="btn btn-info"><span
            class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="{{ route('archivo.eliminar', $archi->id) }}" class="btn btn-danger"><span
            class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        @endif
        <hr>
      </div>

      @endforeach
    </div>
  </div>
</div>




@endsection