<div class="modal fade" id="redsocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Redes Sociales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-editar-red')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }} 
            
            <input type="hidden" name="id" id="id">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Link</label>
            <input type="text" class="form-control" name="link" id="link" required>
            </div>
              </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Color</label>
            <input type="text" class="form-control" name="color" id="color" required>
            </div>
               </div>

               <div class="col-md-12">
                <div class="form-group">
                    <label>Icono</label>
            <input type="text" class="form-control" name="icono1" id="icono" required>
            </div>
               </div>
               
               <div class="col-md-12">
                <div class="form-group">
                    <label>Imagen</label>
            <input type="file" name="imagen1">
            </div>
              </div>
               
               <button type="submit" class="btn btn-info btn-block">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 