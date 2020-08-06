<div class="modal fade" id="myModalRetiro" tabindex="-1" role="dialog" aria-labelledby="myModalLabelR">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelR">Retiro</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('wallet-retiro')}}" method="post">
          {{csrf_field()}}
          <div class="row" style="background:white;">
            <div class="col-xs-12 col-sm-6">
              <label for="">Seleccione un Metodo de Pago</label>
              <select name="metodopago" id="metodopago" class="form-control" onchange="metodospago()">
                <option value="" selected disabled>Selecciones un Opción</option>
                @foreach ($metodopagos as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label>Monto Disponible</label>
              <input class="form-control" type="text" name="montodisponible" readonly
                value="{{Auth::user()->wallet_amount}}">
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label id="lblcomision">Comision por Retiro</label>
              <input id="comision" class="form-control" type="text" name="comision" readonly value="">
              <input id="comisionH" class="form-control" type="hidden">
              <input id="tipo" class="form-control" type="hidden">
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label>Cantidad a Retirar</label>
              <input class="form-control" type="number" name="monto" required
                onkeyup="totalRetiro(this.value, 'tipo', 'total', 'comisionH')">
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label>Monto minimo a Retirar</label>
              <input id="monto_min" class="form-control" name="monto_min" readonly>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label>Monto final a Retirar</label>
              <input id="total" class="form-control" name="total" readonly>
              <input id="descuento" type="hidden" name="descuento">
            </div>
            <div class="form-group col-xs-12 col-sm-6" id="correo" style="display:none;">
              <label>Correo de la cuenta a asociada el metodo de pago</label>
              <input type="email" class="form-control" name="metodocorreo">
            </div>
            <div class="form-group col-xs-12 col-sm-6" id="wallet" style="display:none;">
              <label>Wallet de la cuenta asociada al metodo de pago</label>
              <input type="text" class="form-control" name="metodowallet">
            </div>
            <div class="form-group col-xs-12 col-sm-6 bancario" style="display:none;">
              <label>Datos Bancarios - Numero de Cuenta </label>
              <input type="text" class="form-control" name="cuentabanco">
            </div>
            <div class="form-group col-xs-12 col-sm-6 bancario" style="display:none;">
              <label>Datos Bancarios - Tipo de Cuenta </label>
              <input type="text" class="form-control" name="tipocuenta">
            </div>
            <div class="form-group col-xs-12 col-sm-6 bancario" style="display:none;">
              <label>Datos Bancarios - Nombre del Banco </label>
              <input type="text" class="form-control" name="nombrebanco">
            </div>
            <div class="form-group col-xs-12">
              <button id="retirar" type="submit" class="btn green btn-block" disabled>Retirar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>