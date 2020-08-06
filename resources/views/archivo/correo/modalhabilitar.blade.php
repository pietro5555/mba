<div class="modal fade" id="habilitarcorreo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Habilitar Correos</h4>
      </div>
      <div class="modal-body">
       
        {{-- seccion de activar botones --}}
        <form class="" action="{{route ('archivo.miscorreoactivos')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="row">
              
              <input type="hidden" value="{{Auth::user()->ID}}" name="id">
              
              <div class="col-xs-12 col-md-6">
                <label for="maxi">
                  <input id="maxi" type="checkbox" value="{{($Correos->pago == 1) ? 2 : 1}}" name="pago">
                  {{($Correos->pago == 1) ? 'Desactivar' : 'Activar'}} Correo de Pago
                </label>
              </div>
              <div class="col-xs-12 col-md-6">
                <label for="all">
                  <input id="all" type="checkbox" value="{{($Correos->compra == 1) ? 2 : 1}}" name="compra">
                  {{($Correos->compra == 1) ? 'Desactivar' : 'Activar'}} Correo de Compra
                </label>
              </div>
              
              <div class="col-xs-12 col-md-6">
                <label for="all">
                  <input id="all" type="checkbox" value="{{($Correos->pc == 1) ? 2 : 1}}" name="pc">
                  {{($Correos->pc == 1) ? 'Desactivar' : 'Activar'}} Correo de pago Compra
                </label>
              </div>
              
              <div class="col-xs-12 col-md-6">
                <label for="all">
                  <input id="all" type="checkbox" value="{{($Correos->liquidacion == 1) ? 2 : 1}}" name="liquidacion">
                  {{($Correos->liquidacion == 1) ? 'Desactivar' : 'Activar'}} Correo de Liquidacion
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
