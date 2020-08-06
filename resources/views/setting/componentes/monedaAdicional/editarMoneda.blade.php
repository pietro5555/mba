<!-- Modal editar individual -->   
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Monedas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-update-moneda-adicional')}}" method="post">
          {{ csrf_field() }} 
                
    <div class="col-xs-12 col-sm-12">
      <div class="alert alert-warning" role="alert">
        <h4> <b>Aviso:</b>Ingrese el Identificador de la moneda la cual quiere editar </h4>
      </div>
    </div>
    
             <div class="col-md-12">
                <div class="form-group">
                    <label>Identificador (*)</label>
            <input type="text" class="form-control" name="identificador" required>
            </div>
              </div>
       
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nombre de la Moneda a editar (opcional)</label>
            <input type="text" class="form-control" name="nombre" required>
            </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                <label>Valor de la moneda (Opcional)</label>
            <input type="number" class="form-control" step="any" name="moneda">
            </div>
              </div>
              
              
              <div class="col-md-12">
                <div class="form-group">
                <label>Simbolo de la moneda (Opcional)</label>
            <input type="text" class="form-control" name="simbolo">
            </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                <label>Posicion de la moneda (Opcional)</label>
            <select class="form-control" name="posicion">
            <option value="" selected disabled>Seleccione una Opción</option>
            <option value="1">Simbolo al principio</option>
            <option value="0">Simbolo al final</option>
                    </select>
            </div>
              </div>
               
               <button type="submit" class="btn btn-primary btn-block">Editar Moneda</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 