<!-- Modal eliminar individual -->   
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Iva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-eliminar-iva')}}" method="post">
          {{ csrf_field() }} 
                
            <div class="col-md-12">
                <div class="form-group">
                    <label>ID del Producto o Categoria a Eliminar</label>
            <input type="number" class="form-control" name="id" required>
            </div>
              </div>
              
              
               
               <button type="submit" class="btn btn-primary btn-block">Eliminar</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 