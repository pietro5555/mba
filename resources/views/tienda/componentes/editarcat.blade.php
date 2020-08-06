<!-- Modal editar -->   
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('tienda-actualizarcat')}}" method="post">
          {{ csrf_field() }} 

        <input type="hidden" class="form-control" name="id" id="id">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Nombre de la categoria</label>
            <input type="text" class="form-control" name="nombre" id="cat" >
            </div>
              </div>

               
               <button type="submit" class="btn btn-primary btn-block">Modificar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 