<!-- Modal editar -->   
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Plantilla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-save-seguriti')}}" method="post">
          {{ csrf_field() }} 

         <input type="hidden" class="form-control" name="id" value="1">
         
         
         <div class="form-group">
            <label for="">Contenido del Correo</label>
            <textarea name="correo" class="summernote" cols="30" rows="10">{{(!empty($seguridad->contenido)) ? $seguridad->contenido : '' }}</textarea>
            <p class="help-block">Las Variables de abajo son dinamica, al colocar esas variables se colocara la informacion perteneciente a los usuarios</p>
            </div>
            
            <div class="form-group">
                <label for="">Variables que pueden usar</label>
                <span class="var">@nombre</span>
                <span class="var">@correo</span>
                <span class="var">@codigo</span>
            </div>
                            
               
               <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>