@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-responsive">
                <thead class="info">
                    <tr>
                        <th>
                            <center>#</center>
                        </th>
                        <th>
                            <center>Usuario</center>
                        </th>
                         <th>
                            <center>ID Compra</center>
                        </th>
                        <th>
                            <center>Metodo de Pago</center>
                        </th>
                        <th>
                            <center>Nombre del Producto</center>
                        </th>
                        <th>
                            <center>Total Compra</center>
                        </th>
                       
                        <th>
                            <center>Fecha Compra</center>
                        </th>
                        <th>
                            <center>Estado</center>
                        </th>
                        <th>
                            <center>Accion</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cont = 0;
                    @endphp
                    @foreach($solicitudes as $solicitud)
                    @php
                    $cont++;
                    @endphp
                    <tr>
                        <td>
                            <center>{{ $cont }}</center>
                        </td>
                        <td>
                            <center>{{ $solicitud['usuario'] }}</center>
                        </td>
                         <td>
                            <center>{{ $solicitud['idcompra'] }}</center>
                        </td>
                         <td>
                            <center>{{ $solicitud['metodo'] }}</center>
                        </td>
                        <td>
                            <center>{{ $solicitud['product_name'] }}</center>
                        </td>
                        <td>
                            <center>
                                    @if ($moneda->mostrar_a_d)
                                        {{$moneda->simbolo}} {{ $solicitud['total'] }}
                                    @else
                                        {{ $solicitud['total'] }} {{$moneda->simbolo}}
                                    @endif
                                </center>
                        </td>
                        
                        <td>
                            <center>{{ $solicitud['fecha'] }}</center>
                        </td>

                        <td>
                            <center>{{$solicitud['estado']}}</center>
                        </td>
                        <td>
                            <center>
                                @if($solicitud['estado'] == 'En Espera')
                                <a href="{{route('tienda-accion-solicitud', ['id' => $solicitud['idcompra'], 'estado' => 'wc-completed'])}}"
                                    class="btn btn-primary aceptar" data-id="{{$solicitud['idcompra']}}" data-estado="wc-completed">Aprobar</a>
                                    
                                <a href="{{route('tienda-accion-solicitud', ['id' => $solicitud['idcompra'], 'estado' => 'wc-cancelled'])}}"
                                    class="btn btn-danger cancelar" data-id="{{$solicitud['idcompra']}}" data-estado="wc-cancelled">Rechazar</a>
                                @else
                                <a href="{{route('tienda-accion-solicitud', ['id' => $solicitud['idcompra'], 'estado' => 'wc-completed'])}}"
                                    class="btn btn-primary cancelar" disabled>Aprobar</a>
                                <a href="{{route('tienda-accion-solicitud', ['id' => $solicitud['idcompra'], 'estado' => 'wc-cancelled'])}}"
                                    class="btn btn-danger" disabled>Rechazar</a>
                                @endif
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">

$('.aceptar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        var estado = $(this).attr('data-estado');
        
   Swal.fire({
  title: 'Esta seguro que quiere aprobar esta compra',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'accionsolicitud/'+ID+'/'+estado+'/accion';
    }
  });
});



$('.cancelar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        var estado = $(this).attr('data-estado');
        
   Swal.fire({
  title: 'Esta seguro que quiere cancelar esta compra',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'accionsolicitud/'+ID+'/'+estado+'/accion';
    }
  });
});

</script>
@endpush