<!-- Modal editar individual -->   
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Puntos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-edit-puntos')}}" method="post">
          {{ csrf_field() }} 
 <input type="hidden" class="form-control" name="id" valie="1">
                
            <div class="col-md-12">
                <div class="form-group">
                    <label>ID del Producto a editar</label>
            <input type="number" class="form-control" name="producto" required>
            </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                    <label>Valor en puntos a editar</label>
            <input type="number" class="form-control" step="any" name="puntos" required>
            </div>
              </div>
               
               <button type="submit" class="btn btn-primary btn-block">Editar Producto</button>
        </form>
        
        
        <form action="{{route('setting-crear-puntos')}}" method="post">
          {{ csrf_field() }} 
 <input type="hidden" class="form-control" name="id" valie="1">
                
            <div class="col-md-12">
                <div class="form-group">
                    <label>ID del Producto a agregar</label>
            <input type="number" class="form-control" name="producto" required>
            </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                    <label>Valor en puntos a agregar</label>
            <input type="number" class="form-control" step="any" name="puntos" required>
            </div>
              </div>
               
               <button type="submit" class="btn btn-primary btn-block">Agregar Producto</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 