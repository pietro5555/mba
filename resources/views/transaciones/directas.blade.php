@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Lista de Ordenes</h3>
    </div>
    <div class="box-body">
      <table id="mytable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">Orden</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Concepto</th>
            <th class="text-center">Total</th>
            <th class="text-center">Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datos as $dato)
          <tr>
          <td class="text-center">
            {{$dato['orden']}}
          </td>
          <td class="text-center">
            {{$dato['usuario']}}
          </td>
          <td class="text-center">
            {{$dato['fecha']}}
          </td>
          <td class="text-center">
            {{$dato['productos']}}
          </td>
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$dato['total']}}
             @else
                {{$dato['total']}} {{$moneda->simbolo}}
             @endif
          </td>
          <td class="text-center">
            {{$dato['estado']}}
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

{{-- script que activa el datatable --}}
@include('usuario.componentes.scritpTable')