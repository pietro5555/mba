<!-- Modal editar individual -->   
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-save-nota')}}" method="post">
          {{ csrf_field() }} 
       <input type="hidden" class="form-control" name="id" value="1">
                
            <div class="col-md-12">
                <div class="form-group">
                    <label>Agregar Nota</label>
                    
            <textarea class="form-control form-control-solid placeholder-no-fix summernote" type="textarea" cols="30" rows="10" autocomplete="off"
            name="nota" required>
              {{(!empty($ganancias->nota)) ? $ganancias->nota : '' }}</textarea>
            </div>
              </div>
              
               <button type="submit" class="btn btn-primary btn-block">Agregar Nota</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 