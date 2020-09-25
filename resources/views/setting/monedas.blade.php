@extends('layouts.dashboardnew')

@section('content')

{{-- Monedas Adicionales --}}
<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
        <h3 class="white">Monedas Adicionales</h3>
        
        <div class="col-md-3">
        <button class="btn btn-primary btn-block float-right" data-toggle="modal" data-target="#monedaAgregar">Agregar Monedas</button>
        </div>
        
        <div class="col-md-3">
        <button class="btn btn-primary btn-block float-right" id="modal">Editar Monedas</button>
        </div>
        
        <div class="col-md-3">
        <button class="btn btn-danger btn-block float-right" id="modal3">Eliminar Monedas</button>
        </div>
      </div>
    
    <div class="box-body">
     
      
      <div class="col-xs-12 col-sm-12 white">
                <h5>Monedas</h5>
                @if(!empty($monedaAdicional))
                <div class="row">
                @foreach($monedaAdicional->configuracion as $item)
                
                    <div class="col-xs-4">
                        <label for="">Identificador de la moneda</label>
                        <input type="text" readonly class="form-control" value="{{$item->cont}}">
                    </div>
                    
                    <div class="col-xs-4">
                        <label for="">Nombre de la moneda</label>
                        <input type="text" readonly class="form-control" value="{{$item->nombre}}">
                    </div>
                    
                    <div class="col-xs-4">
                        <label for="">Valor de la moneda</label>
                        @if($item->posicion == '1')
                        <input type="text" readonly class="form-control" value="{{$item->simbolo}} {{$item->moneda}}">
                        @else
                        <input type="text" readonly class="form-control" value="{{$item->moneda}} {{$item->simbolo}}">
                        @endif
                    </div>
                @endforeach
                </div>                    
                @endif

            </div>
     
      </div>
    </div>
   </div>
  </div>
 </div>
</div>


<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
            {{-- informacion  --}}
            <div class="col-xs-12 mostrar">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Información de la Moneda Principal del Sistema </h3>
                            <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Agregar</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-4 col-xs-12 ch white">
                            <h3>Moneda Principal</h3>
                            <h5>
                                @empty(!$monedap)
                                @if ($monedap->principal)
                                {{$monedap->nombre}}
                                @endif
                                @endempty
                            </h5>
                        </div>
                        <div class="col-sm-4 col-xs-12 ch white">
                            <h3>Simbolo de la moneda</h3>
                            <h5>
                                @empty(!$monedap)
                                @if ($monedap->principal)
                                {{$monedap->simbolo}}
                                @endif
                                @endempty
                            </h5>
                        </div>
                        <div class="col-sm-4 col-xs-12 ch kl white">
                            <h3>Mostrar antes o despues del monto</h3>
                            <h5>
                                @empty(!$monedap)
                                @if ($monedap->principal)
                                @if ($monedap->mostrar_a_d == 0)
                                Despues
                                @else
                                Antes
                                @endif
                                @endif
                                @endempty
                            </h5>
                        </div>
                        {{-- tablas --}}
                        <div class="col-xs-12">
                            <hr>
                        </div>
                        <table id="mytable" class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        ID
                                    </th>
                                    <th class="text-center">
                                        Nombre
                                    </th>
                                    <th class="text-center">
                                        Simbolo
                                    </th>
                                    <th class="text-center">
                                        Mostrar
                                    </th>
                                    <th class="text-center">
                                        Principal
                                    </th>
                                    <th class="text-center">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @empty(!$monedas)
                                @foreach($monedas as $moneda)
                                <tr>
                                    <td class="text-center">
                                        {{ $moneda->id }}
                                    </td>
                                    <td class="text-center">
                                        {{ $moneda->nombre }}
                                    </td>
                                    <td class="text-center">
                                        {{ $moneda->simbolo }}
                                    </td>
                                    <td class="text-center">
                                        @if ($moneda->mostrar_a_d == 0)
                                        Despues del monto
                                        @else
                                        Antes del monto
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('setting-update-moneda-principal', ['id' => $moneda->id, 'estado' => ($moneda->principal == 1) ? 0 : 1])}}"
                                            name="button"
                                            class="btn {{ ($moneda->principal == 1) ? 'btn-danger' : 'btn-primary' }} alerta" data-id="{{$moneda->id}}" data-estado="{{($moneda->principal == 1) ? 0 : 1}}">{{
                                                    ($moneda->principal == 1) ? 'No Ser Principal' : 'Ser Principal' }}</a>
                                    </td>
                                    <td class="text-center">
                                        {{-- <button value="{{$pago->id}}" class="btn btn-primary"
                                        onclick="getForm(this.value)">
                                        <i class="fa fa-edit"></i> </button> --}}
                                        <a class="btn btn-danger delete"
                                            href="{{route('setting-delete-moneda', ['id' => $moneda->id])}}" data-id="{{$moneda->id}}">
                                            <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- informacion fin --}}
            {{-- formulario --}}
            <div class="col-xs-12 mostrar" style="display:none;">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la moneda del Sistema</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="" action="{{route('setting-save-monedas')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group col-sm-12 ptr">
                                <label for="" class="white">Nombre de la Moneda</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12 ptr">
                                <label for="" class="white">Simbolo de la Moneda</label>
                                <input type="text" class="form-control" name="simbolo" required>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12 ptr">
                                <label for="" class="white">Mostrar Antes o Despues del Monto</label>
                                <select class="form-control" name="mostrar" required>
                                    <option value="" selected disabled>Seleccione una Opción</option>
                                    <option value="1">Antes</option>
                                    <option value="0">Depues</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 ji">
                                <div class="form-group col-sm-6">
                                    <button class="btn btn-danger btn-block mostrar" style="display:none;"
                                        onclick="toggle()">Cancelar</button>
                                </div>
                                <div class="form-group col-sm-6"> <button type="submit" class="btn btn-success btn-block">
                                        Guardar <span class="glyphicon glyphicon-floppy-disk"></span></div>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- formulario fin --}}
        </div>
    </div>
</div>

@include('setting.componentes.monedaAdicional.agregarMoneda')
@include('setting.componentes.monedaAdicional.editarMoneda')
@include('setting.componentes.monedaAdicional.eliminarMoneda')

@endsection

@push('script')

<script type="text/javascript">
    function toggle() {
        $('.mostrar').toggle('slow')
    }
</script>

<script type="text/javascript">
    
    function monedaniveles() {
    $('#valor').empty()
    $('#valor2').empty()
    let niveles = $('#niveles').val()
    
 if(niveles <= 3){    
    for (var i = 0; i < niveles; i++) {
        $('#valor2').append(
            '<div class="form-group col-xs-12 col-sm-3">' +
              '<label for="">Nombre de la moneda : ' + (i + 1) + '</label>' +
              '<input type="text" class="form-control" required name="nombre' + (i + 1) + '">' +
             '</div>'+
             
             '<div class="form-group col-xs-12 col-sm-3">' +
              '<label for="">Valor de la moneda: ' + (i + 1) + '</label>' +
              '<input type="number" class="form-control" step="any" required min="0" name="moneda' + (i + 1) + '">' +
              '</div>'+
             
             '<div class="form-group col-xs-12 col-sm-3">' +
              '<label for="">Simbolo de la  moneda: ' + (i + 1) + '</label>' +
              '<input type="text" class="form-control" required  name="simbolo' + (i + 1) + '">' +
              '</div>'+
              
              '<div class="form-group col-xs-12 col-sm-3">' +
              '<label for="">Agregue 1 para el simbolo al principio o 0 para el final: ' + (i + 1) + '</label>' +
              '<input type="text" class="form-control" required  min="0" max="1" name="posicion' + (i + 1) + '">' +
              '</div>'
        )
     }
  }else if(niveles > 3){
      $('#valor').append(
    '<div class="form-group col-xs-12 col-sm-12">' +
      '<div class="alert alert-warning" role="alert">' +
       '<h4> <b>Aviso:</b> Solo puede agregar maximo 3 monedas</h4>' +
       '</div>'+
       '</div>'
      )
  }
}
    
     $('.alerta').on('click',function(e){
 e.preventDefault();


   var ID = $(this).attr('data-id');
   var estado = $(this).attr('data-estado');
   
   Swal.fire({
  title: '¿Esta seguro(a) de realizar esta acción? Los cambios que realice pueden afectar la imagen y funcionamiento del sistema.',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'updatemoneda/'+ID+'/'+estado;
    }
  });
});


$('.delete').on('click',function(e){
 e.preventDefault();
 
   var ID = $(this).attr('data-id');
   
   Swal.fire({
  title: '¿Esta seguro(a) de realizar esta acción? Los cambios que realice pueden afectar la imagen y funcionamiento del sistema.',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'deletemoneda/'+ID;
    }
  });
});
</script>
@endpush