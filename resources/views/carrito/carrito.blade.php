@extends('layouts.dashboardnew')

@section('content')

@guest
<div class="col-sm-10 col-sm-offset-1">
<div class="alert alert-warning" role="alert">
    <h4 style="text-align:center;"><a href="{{$enlace}}" target="_black">Quiere seguir Comprando solo pulse aqui <i class="glyphicon glyphicon-shopping-cart"></i></a></h4>
</div>
</div>
 @else
 @if($carritos->isNotEmpty())
<div class="col-sm-12"><a href="{{request()->root().'/tienda'}}">
<div class="alert alert-warning" role="alert">
    <h4 style="text-align:center;">Quiere seguir Comprando solo pulse aqui</h4>
</div>
</a>
</div>
@endif
 @endguest

@guest
<div class="col-sm-10 col-sm-offset-1">
    @else
    <div class="col-xs-12">
    @endguest
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                           Nombre del Producto
                        </th>
                       <th class="text-center">
                           Precio del Producto
                        </th>
                        @if($ivas)
                        <th class="text-center">
                           Valor Iva
                        </th>
                        @endif
                        <th class="text-center">
                           Cantidad del Producto
                        </th>
                        <th class="text-center">
                           Valor Total
                        </th>
                        <th class="text-center">
                           Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $general=0;
                    @endphp
                    @foreach ($carritos as $carrito)
                    @php
                    $general += $carrito->total;
                    @endphp
                    <tr>
                        <td class="text-center">
                            {{$carrito->producto}}
                        </td>
                        
                        <td class="text-center">
                             @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$carrito->precio}}
                            @else
                            {{$carrito->precio}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        
                        @if($ivas)
                        <td class="text-center">
                            {{$carrito->iva}}
                        </td>
                        @endif
                        
                        <td class="text-center">
                           {{$carrito->cantidad}}
                        </td>
                        
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$carrito->total}}
                            @else
                            {{$carrito->total}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        
                        <td class="text-center">
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#actualizar" onclick="seleccionar('{{$carrito->id}}','{{$carrito->cantidad}}','{{$carrito->precio}}')">Actualizar</a>
                       
                       <a href="{{route('carrito-delete', ['id' => $carrito->id])}}" class="btn btn-danger">Eliminar</a>
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
    <div class="col-sm-6 col-md-offset-3">
    <table class="mitable">
    <tr>
    @if($departamentos->isNotEmpty())                   
    <th class="text-center">Costo de Envio</th>    
    @endif
    <th class="text-center">Total General</th>
     @if (Auth::guest())
    @else
    <th class="text-center">Restante Billetera</th>
    @if($autorizado)
    <th class="text-center">Total Puntos</th>
    @endif
    @endif
  </tr>
  <tr>    
   @if($departamentos->isNotEmpty()) 
   <td class="text-center">
       @if ($moneda->mostrar_a_d)
        {{$moneda->simbolo}} {{round(($envio == null) ? 0 : $envio, 2)}}
       @else
        {{round(($envio == null) ? 0 : $envio, 2)}} {{$moneda->simbolo}}
       @endif
    </td>
    @endif
    
    <td class="text-center">
        @if ($moneda->mostrar_a_d)
        {{$moneda->simbolo}} {{$general + $envio}}
        @else
        {{$general + $envio}} {{$moneda->simbolo}}
        @endif
    </td>
    
    @if (Auth::guest())
    @else                        
    <td class="text-center">
        @if ($moneda->mostrar_a_d)
        {{$moneda->simbolo}} {{Auth::user()->wallet_amount - ($general + $envio) }}
        @else
        {{Auth::user()->wallet_amount - ($general + $envio)}} {{$moneda->simbolo}}
        @endif
    </td>
    @if($autorizado)                        
    <td class="text-center">{{$cont}}</td>            
    @endif
   @endif
    </tr>
   </table>
 </div>
 
 
 @if($departamentos->isNotEmpty())
 <div class="col-xs-12">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Region / Provincia</label>
            <select class="form-control" name="provincia" id="provincia" onchange="provinciabuscar()" required>
              <option value="" selected disabled>Seleccione una opci¨®n</option>
              
             @if($todo == null)
              @foreach($departamentos as $depart)
              <option value="{{$depart->id}}">{{$depart->nombre}}</option>
              @endforeach
              @else
              
              @foreach($departamentos as $depart)
              <option value="{{$depart->id}}" @if($todo->provincia == $depart->nombre) selected @else @endif>{{$depart->nombre}}</option>
              @endforeach
              
              @endif
              
            </select>
          </div>
          </div>
          
          <div class="col-sm-6">
              <label for="">Localidad / Cuidad</label>
        <label class="control-label">Selecciona una opcion</label>
          <select name="localidad" class="form-control" id="localidad" required onchange="almacenardatos()">
                       
            @if($todo != null)
                @foreach($capitales as $capi)
                 @if($todo->idlocalidad == $capi->departa)
                <option value="{{$capi->id}}" @if($todo->localidad == $capi->nombre) selected @else @endif>{{$capi->nombre}}</option>
                 @endif
                @endforeach
            @endif
                
          </select>
        </div> 
    </div> 
    @endif
    
            
        <div class="col-xs-12 col-sm-{{($tienda != ' ') ? '4' : '6'}}">
            <a href="{{route('carrito-cancelar')}}" class="btn red btn-block">Cancelar</a>    
        </div>
        
        @if($departamentos->isNotEmpty())
        <div class="col-xs-12 col-sm-{{($tienda != ' ') ? '4' : '6'}}">
            <button class="btn green btn-block" data-toggle="modal" data-target="#datosusuario" {{($envio != null) ? '' : 'disabled'}}>Aceptar</button>
        </div>
        @else
        
        <div class="col-xs-12 col-sm-{{($tienda != ' ') ? '4' : '6'}}">
            <button class="btn green btn-block" data-toggle="modal" data-target="#datosusuario">Aceptar</button>
        </div>
        
        @endif
        
        @if($tienda != ' ')
        <div class="col-xs-12 col-sm-4">
            <a href="{{request()->root()}}{{$tienda}}" class="btn btn-success btn-block">Ir a tienda</a>
        </div>
        @endif
        
        </div>
    </div>

</div>


<!-- Modal editar -->   
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('carrito-actualizar')}}" method="post" oninput="total.value=parseInt(precio.value)*parseInt(cantidad.value)">
          {{ csrf_field() }} 

 <input type="hidden" class="form-control" name="id" id="id">

            

               <div class="col-md-12">
                <div class="form-group">
                    <label>cantidad</label>
            <input type="number" class="form-control" name="cantidad"  id="canti" min="1">
            </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                    <label>Precio</label>
            <input type="text" class="form-control" name="precio" readonly id="preci">
            </div>
              </div>
              
               <div class="col-md-12">
                <div class="form-group">
                    <label>Total</label>
            <input type="text" class="form-control" name="total" readonly id="total">
            </div>
              </div>
              
               
               <button type="submit" class="btn btn-primary btn-block">Modificar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal datos del usuario no autenticado -->   
<div class="modal fade" id="datosusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Metodos de Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('carrito-aceptar')}}" method="get">
          {{ csrf_field() }}


       <div class="col-md-12">
        <div class="form-group">
            <label for="">Metodo de Pago</label>
            <select class="form-control" name="medio_pago" required id="opcion" onchange="openWindow(this)">
              <option value="" selected disabled>Seleccione una opci¨®n</option>
              @foreach($pagos as $pago)
              <option value="{{$pago->id}}" id="{{$pago->link}}">{{$pago->nombre}}</option>
              @endforeach
            </select>
          </div>
          </div>
          
          
          <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Direccion1 (*)</label>
        <input name="direccion" type="text" placeholder="Direccion" class="form-control"
             required>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Direccion2 (opcional)</label>
        <input name="direccion2" type="text" placeholder="Direccion" class="form-control"
             >
             </div>
        </div>
          
        @guest
          
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Nombre (*)</label>
        <input name="nombre" type="text" placeholder="Nombre" class="form-control"
             required>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Apellido (*)</label>
        <input name="apellido" type="text" placeholder="Apellido" class="form-control"
             required>
             </div>
        </div>
        
         <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Direccion1 (*)</label>
        <input name="direccion" type="text" placeholder="Direccion" class="form-control"
             required>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Direccion2 (opcional)</label>
        <input name="direccion2" type="text" placeholder="Direccion" class="form-control"
             >
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Departamento (*)</label>
        <input name="departamento" type="text" placeholder="Departamento" class="form-control"
             required>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Correo (*)</label>
        <input name="correo" type="email" placeholder="correo" class="form-control"
             required>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Telefono (*)</label>
        <input name="telefono" type="number" min="0" placeholder="Telefono" class="form-control"
             required>
             </div>
        </div>
        
        <div class="col-md-12">
             <div class="form-group" style="margin-bottom: 15px;">
        <label>Pais (*)</label>
        <input name="pais" type="text" placeholder="Pais" class="form-control"
             required>
             </div>
        </div>
              @endguest
               
               <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">
      seleccionar = function(id,cantidad,precio){
        $('#id').val(id);
        $('#canti').val(cantidad);
        $('#preci').val(precio);
       };  
       
       
        function openWindow(select) {
var value = select.options[select.selectedIndex].id;
if(value != ""){

window.open(value, 'newwindow')
 }
}


function provinciabuscar(){
    $('#localidad').empty()
    var pro = $('#provincia').val()
    
    $.get('{{$enlace}}/mioficina/link/envio/'+pro, function (response) {
      rangos = JSON.parse(response)
      
      $('#localidad').append($('<option>',
     {
        value: "",
        text : "Seleciona una Opcion" 
        }));
        
      rangos.forEach(item => {
  $('#localidad').append($('<option>',
     {
        value: item.id,
        text : ""+item.nombre
        }));
      })
      
    })
}

function almacenardatos(){
    var prov = $('#provincia').val()
    var local = $('#localidad').val()
    
    $.get('{{$enlace}}/mioficina/link/almacenar/'+prov+'/'+local, function (response) {
        
        location.reload();
    })
    
}
    </script>
@endpush