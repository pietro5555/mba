<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Prospecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('prospeccion-insertar')}}" method="post">
          {{ csrf_field() }} 

 <input type="hidden" class="form-control" name="id" id="iduser">
              
              <div class="col-md-12">
                <div class="form-group">
                    <label>Clave</label>
            <input type="password" class="form-control" name="password" required placeholder="Clave">
            </div>
              </div>
               
               <button type="submit" class="btn btn-info btn-block">Agregar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 