<div class="modal fade" id="canje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Canje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('cambio-guardar')}}" method="post">
          {{ csrf_field() }}

          <div class="col-md-12">
        
             <label>Puntos Propios</label>
              <input class="form-control" type="text" name="propio" value="{{Auth::user()->puntosPro}}" readonly/>
           
        </div>
        
        <div class="form-group col-xs-12 col-sm-12">
              <label>Monto a canjear</label>
              <input class="form-control" type="number" name="cantidad" step="any" onkeyup="totalRetiro(this.value)" >
            </div>
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Monto total a recibir</label>
              <input class="form-control" name="total" id="total" readonly>
            </div>

               
               <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 