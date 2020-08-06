@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            
            <div class="col-md-3">
             <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                data-target="#myModal">
                                Agregar Metodo
             </button>
            </div>
                            
            <div class="col-md-3">                
             <button type="button" class="btn btn-info btn-block" data-toggle="modal"
                                data-target="#procesadores">
                                Cargar Datos procesadores de pago
             </button>
            </div>
            
            <div class="col-md-3"> 
              <div class="btn-group dropup">
                        <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">
                          Asignar Pagos con Paypal
                        </button>
                        <ul class="dropdown-menu">
                          <li><a data-toggle="modal" data-target="#urlpaypal">Url con paypal</a></li>
                          
                          <li><a data-toggle="modal" data-target="#scriptpaypal">Agregar Boton de paypal</a></li>
                          
                        </ul>
              </div>
            </div>          
            
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            Nombre del metodo
                        </th>
                        <th class="text-center">
                            Medio de pago
                        </th>
                        <th class="text-center">
                            Estado
                        </th>
                        <th class="text-center">
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($metodos as $metodo)
                    <tr>
                        <td class="text-center">
                            {{ $metodo->id }}
                        </td>
                        <td class="text-center">
                            {{ $metodo->nombre }}
                        </td>
                        <td class="text-center">
                            @if($metodo->medio_pago == '1')
                            Billetera
                            @else
                            Otro metodo
                            @endif
                        </td>
                        <td class="text-center">
                           @if($metodo->activo == '1')
                           Habilitado
                           @else
                           Inhabilitado
                           @endif
                        </td>
                        <td class="text-center">
                            @if($metodo->activo == '1')
                            <a href="{{route('link-cambio', $metodo->id)}}"
                                class="btn btn-warning alerta" data-id="{{$metodo->id}}">Inhabilitar</a>
                            <a href="{{route('link-borrar', $metodo->id)}}"
                                class="btn btn-danger delete" data-id="{{$metodo->id}}">Eliminar</a>
                            @else
                            <a href="{{route('link-cambio', $metodo->id)}}"
                                class="btn btn-info alerta" data-id="{{$metodo->id}}">Habilitar</a>
                           <a href="{{route('link-borrar', $metodo->id)}}"
                                class="btn btn-danger delete" data-id="{{$metodo->id}}">Eliminar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



{{-- Crear nuevo metodo de pago --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Metodo de Pago</h4>
      </div>
      <div class="modal-body">
        <form class="" action="{{route ('metodo.subir')}}" method="post"> 
          {{ csrf_field() }}
          
          
          <div class="form-group">
            <label for="">Nombre del metodo</label>
            <input type="text" name="nombre" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Se descontara de:</label>
            <select class="form-control" name="medio_pago" required>
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="1">Billetera</option>
              <option value="2">Paypal</option>
              <option value="0">Otro Metodo</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="">Activar</label>
            <select class="form-control" name="activo" required>
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="1">SI</option>
              <option value="0">NO</option>
            </select>
          </div>
          
           <div class="form-group">
            <label for="">Link a donde pueden ingresar para pagar</label>
            <input type="text" name="link" class="form-control">
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>



{{-- Agregar ID secreto y demas datos de los procesadores --}}
<div class="modal fade" id="procesadores" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cargar Datos procesadores de pago</h4>
      </div>
      <div class="modal-body">
        <form class="" action="{{route ('pago.payal')}}" method="post"> 
          {{ csrf_field() }}
          
          <h4>Procesador de Pago Paypal</h4>
          
          <div class="form-group">
            <label for="">Cliente ID</label>
            <input type="text" name="cliente" class="form-control" required>
          </div>
          
          
          <div class="form-group">
            <label for="">Clave Secreta</label>
            <input type="text" name="secreto" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label for="">Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar Paypal</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

{{-- Url con paypal --}}
<div class="modal fade" id="urlpaypal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelT">Url de paypal</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-paypal-boton')}}" method="post">
          {{ csrf_field() }}
            
            <input name="id" type="hidden" id="iduse">
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Ingrese la url de paypal</label>
              <input name="paypal" type="text" class="form-control" value="{{$settings->paypal}}" required>
            </div>
         
            
            <div class="form-group col-xs-12">
              <button type="submit" class="btn green btn-block">Aceptar</button>
            </div>
          
        </form>
      </div>
      
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  {{-- script de paypal --}}
<div class="modal fade" id="scriptpaypal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelT">Boton de paypal</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-paypal-script')}}" method="post">
          {{ csrf_field() }}
            
            <input name="id" type="hidden" id="iduse">
            
            <div class="col-xs-12 col-sm-12">
              <label>Ingrese el html de paypal</label>
             <textarea name="htmlpaypal" class="form-control" rows="3" required>{{(!empty($settings->htmlpaypal)) ? $settings->htmlpaypal : '' }}</textarea>
            </div>
            
            <div class="col-xs-12 col-sm-12">
              <label>Ingrese el script de paypal</label>
             <textarea name="scriptpaypal" class="form-control" rows="3" required>{{(!empty($settings->scriptpaypal)) ? $settings->scriptpaypal : '' }}</textarea>
            </div>
         
            
            <div class="form-group col-xs-12">
              <button type="submit" class="btn green btn-block">Aceptar</button>
            </div>
          
        </form>
      </div>
      
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">
    
     $('.alerta').on('click',function(e){
 e.preventDefault();
 
   var ID = $(this).attr('data-id');
   
   Swal.fire({
  title: 'Esta seguro de realizar esta acción , tenga en cuenta que se realizarán los cambios ',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'cambio/'+ID;
    }
  });
});


$('.delete').on('click',function(e){
 e.preventDefault();
 
   var ID = $(this).attr('data-id');
   
   Swal.fire({
  title: 'Esta seguro de realizar esta acción , tenga en cuenta que se realizarán los cambios ',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'borrar/'+ID;
    }
  });
});
</script>
@endpush