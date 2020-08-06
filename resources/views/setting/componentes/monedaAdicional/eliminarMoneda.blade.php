<!-- Modal editar individual -->   
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELiminar Monedas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-delete-moneda-adicional')}}" method="post">
          {{ csrf_field() }} 
                
    <div class="col-xs-12 col-sm-12">
      <div class="alert alert-warning" role="alert">
        <h4> <b>Aviso:</b>Ingrese el Identificador de la moneda la cual quiere eliminar </h4>
      </div>
    </div>
       
            <div class="col-md-12">
                <div class="form-group">
                    <label>Identificador de la Moneda a eliminar (*)</label>
            <input type="text" class="form-control" name="identificador" required>
            </div>
              </div>
              
              
               <button type="submit" class="btn btn-primary btn-block">ELiminar Moneda</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 