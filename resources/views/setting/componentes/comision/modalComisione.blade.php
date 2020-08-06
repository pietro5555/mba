{{-- modal de bono por activacion --}}
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Bono por Activación y Comision Primera Compra</h4>
        </div>
        <div class="modal-body">
          {{-- Bono Activacion --}}
          <form class="" action="{{route ('setting-save-bono')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- Tipo de pago del bono --}}
            <div class="form-group">
              <label for="">Tipo de pago del bono</label>
              <select name="tipobono" class="form-control" id="opcion" onchange="seleccionado()">
                <option value="" disabled selected>Selecione una Opcion</option>
                <option value="fijo">Monto Fijo</option>
                <option value="porcentaje">Por Porcentaje</option>
                <option value="niveles">Niveles</option>
              </select>
            </div>
            {{-- productos e bonos --}}
            <div class="form-group col-xs-12">
              <div class="row">
                {{-- producto --}}
                <div id="categoria">
                <div class="form-group col-xs-6">
                  <label for="">Producto Activador</label>
                  <input type="number" min="0" class="form-control" id="producto">
                </div>
                {{-- bono --}}
                <div class="form-group col-xs-6">
                  <label for="">Bono a pagar</label>
                  <input type="number" min="0" step="any" class="form-control" id="monto">
                </div>
                <div class="col-xs-6">
                  <button type="button" class="btn btn-success btn-block" onclick="agregarProducto()">Agregar Producto</button>  
                </div>
                <div class="col-xs-6">
                    <button type="button" class="btn btn-danger btn-block" onclick="borrarTodo()">Borrar Todo</button>  
                </div>
                
              {{-- producto y bonos --}}
              <div class="form-group">
                <label for="">Productos y bono</label>
                <input type="text" class="form-control" readonly required id="bono" name="bono">
              </div>
            </div>
            </div>
            </div>
            
            <div id="ocultar" style="display:none;">
            <div class="form-group col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Cantidad de Niveles</label>
          <input class="form-control" type="text" name="cantidad" id="cantidad" onkeyup="nivelacion()" />
        </div>
        
          <div class="form-group">
              <label for="">Tipo ganancia</label>
              <select name="tipo" class="form-control">
                <option value="" disabled selected>Selecione una Opcion</option>
                <option value="fijo">Monto Fijo</option>
                <option value="porcentaje">Por Porcentaje</option>
              </select>
            </div>
        
        <div class="form-group col-sm-12 col-xs-12" id="muestra">
  
        </div>
            </div>
            {{-- quien lo recive --}}
            <div class="form-group">
              <label for="">¿De quien recibir este bono?</label>
              <select name="recibir" class="form-control">
                <option value="" disabled selected>Selecione una Opcion</option>
                <option value="1">Los Directos</option>
                <option value="0">Todos los Usuarios de en red</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
          </form>
          {{-- Primera Compra --}}
          <form class="" action="{{route ('setting-save-primara-compra')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="">Aceptar Comision en Primera Compra</label>
              <select name="primera_compra" class="form-control">
                <option value="" disabled selected>Selecione una Opcion</option>
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
          </form>
          {{-- Recibir comision por activacion --}}
          <form class="" action="{{route ('setting-save-get-comision')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="">Como va a recibir la comision el usuario despues que se active</label>
              <select name="get_comision" class="form-control">
                <option value="" disabled selected>Selecione una Opcion</option>
                <option value="1">Recibir comision desde la fecha de activación</option>
                <option value="2">Recibir comision desde el primer dia del mes</option>
              </select>
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
  
  {{-- modal de id de productos --}}
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Productos que no generan comision</h4>
          </div>
          <div class="modal-body">
            {{-- agregar id --}}
            <form class="" action="{{route ('setting-save-producto')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="">Agregar ID Producto</label>
                <input type="number" name="idproducto" value="{{ old('idproducto') }}" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
              </div>
            </form>
            {{-- eliminar id --}}
            <form class="" action="{{route ('setting-delete-producto')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="">Eliminar Id de Producto</label>
                @php
                $array = explode(', ', $settings->id_no_comision);
                @endphp
                <select name="idproducto_elimanar" class="form-control">
                  <option disabled selected>Seleccione una Opcion</option>
                  @foreach ($array as $item)
                  <option value="{{trim($item)}}">{{trim($item)}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block">Borrar</button>
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