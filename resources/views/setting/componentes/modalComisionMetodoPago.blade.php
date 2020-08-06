<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comisiones de Metodo de Pago</h4>
      </div>
      <div class="modal-body">
        {{-- seccion comision de transferencia --}}
        <form class="" action="{{route ('setting-comision-pago')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tipo de Comision</label>
            <select name="tipotransferencia" class="form-control" required>
              <option value="" selected disabled>Seleccione una Opción</option>
              <option value="0">Monto fijo</option>
              <option value="1">Monto por porcentaje</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Comision Por Transferencia</label>
            <input type="number" name="transferencia" value="{{ old('transferencia') }}" min="1" class="form-control" >
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
        </form>
        {{-- seccion de activar botones --}}
        <form class="" action="{{route ('setting-botones')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="row">
              <div class="col-xs-12 col-md-6">
                <label for="trans">
                  <input id="trans" type="checkbox" value="{{($Botones->btn_transferencia == 1) ? 2 : 1}}" name="btn_transferencia">
                  {{($Botones->btn_transferencia == 1) ? 'Desactivar' : 'Activar'}} Boton de Transferencia
                </label>
              </div>
              <div class="col-xs-12 col-md-6">
                <label for="retir">
                  <input id="retir" type="checkbox" value="{{($Botones->btn_retiro == 1) ? 2 : 1}}"  name="btn_retiro">
                  {{($Botones->btn_retiro == 1) ? 'Desactivar' : 'Activar'}} Boton de Retiro
                </label>
              </div>
              <div class="col-xs-12 col-md-6">
                <label for="maxi">
                  <input id="maxi" type="checkbox" value="{{($Botones->btn_masivo == 1) ? 2 : 1}}" name="btn_masivo">
                  {{($Botones->btn_masivo == 1) ? 'Desactivar' : 'Activar'}} Boton de Pago Masivo
                </label>
              </div>
              <div class="col-xs-12 col-md-6">
                <label for="all">
                  <input id="all" type="checkbox" value="{{($Botones->btn_todo == 1) ? 2 : 1}}" name="btn_todo">
                  {{($Botones->btn_todo == 1) ? 'Desactivar' : 'Activar'}} Boton de Pagar todo
                </label>
              </div>
              
              <div class="col-xs-12 col-md-6">
                <label for="all">
                  <input id="all" type="checkbox" value="{{($Botones->btn_liquida == 1) ? 2 : 1}}" name="btn_liquida">
                  {{($Botones->btn_liquida == 1) ? 'Desactivar' : 'Activar'}} Boton de Liquidaciones
                </label>
              </div>
              
              <div class="col-xs-12 col-md-6">
                <label for="all">
                  <input id="all" type="checkbox" value="{{($Botones->btn_monto == 1) ? 2 : 1}}" name="btn_monto">
                  {{($Botones->btn_monto == 1) ? 'Desactivar' : 'Activar'}} Boton de Pagar minimo y maximo
                </label>
              </div>
            </div>
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
