@extends('layouts.landing')

@section('content')
@stack('styles')


<div class="bg-dark-gray">

  {{-- Encabezado o titulo --}}
  @include('live.components.cabezera')

  {{-- Video --}}
  @include('live.components.video')

</div>

{{-- mensajes de aviso --}}
@include('live.components.avisos')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 pl-0">
      <div class="row ml-0">
        
        {{-- Seccion del Informacion del Mentor --}}
        @include('live.components.seccionMentor')

        @if($menuResource)
        <!--Menu de los opciones -->
        @include('live.components.menu')

          {{-- Tabs del menu --}}
          @include('live.components.tabs')
        @endif
        
    </div>
  </div>

</div>

{{-- Modal agregar Recursos Video--}}
@include('live.components.modal.agregarRecursosVideo')

{{-- Modal Agregar Recurso Archivo --}}
@include('live.components.modal.agregarRecursosArchivo')

{{-- Modal Agregar Recursos Presentacion --}}
@include('live.components.modal.agregarRecursosPresentacion')

{{-- Modal Agregar Recursos Encuestas --}}
@include('live.components.modal.agregarRecursosEncuestas')

{{-- Modal Habilitar Recursos --}}
@include('live.components.modal.habilitarRecursos')


{{-- Modal Agregar Ofertas --}}
@include('live.components.modal.agregarRecursosOfertas')

{{-- Scrips de la seccion de live --}}
@include('live.components.scritpsLive')
@endsection
