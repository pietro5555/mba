@extends('layouts.login.inicio')

@section('content')

 <!-- Main content -->
  <section class="content">
      
    {{-- seccion de los cuadros informativos --}}
    @include('inicio.componentes.cuadros')
    
    {{-- seccion de transferencias --}}
    @include('inicio.componentes.transferencia')
    
     {{-- seccion de noticias --}}
    @include('inicio.componentes.noticias')
      
  </section>

@endsection

@include('usuario.componentes.scritpTable')