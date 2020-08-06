@extends('layouts.dashboardnew')

@section('content')

{{-- seccion de busquedad --}}
@include('usuario.componentes.filtroPorFecha', ['ruta' => 'buscarpersonalorder', 'form' => ''])

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
            <th class="text-center">Fecha</th>
            <th class="text-center">Concepto</th>
            <th class="text-center">Total</th>
            <th class="text-center">Estado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compras as $compra)
          <tr>
          <td class="text-center">
            {{$compra['ordenID']}}
          </td>
          <td class="text-center">
            {{date('d-m-Y', strtotime($compra['fechaOrden']))}}
          </td>
          <td class="text-center">
            {{$compra['items']}}
          </td>
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['total']}}
             @else
                {{$compra['total']}} {{$moneda->simbolo}}
             @endif
          </td>
          <td class="text-center">
            {{$compra['estadoCompra']}}
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