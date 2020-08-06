 <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar tipo de verificacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-seguridad-editar')}}" method="post">
          {{ csrf_field() }} 
          
          <input type="hidden" name="id" id="id">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Tipo de verificacion</label>
           <select name="tipo" class="form-control" id="tipo" required>
            <option value="1">Una ves al dia</option>
            <option value="2">Siempre</option>
            <option value="3">Cada 30 dias</option>
                    </select>
            </div>
              </div>
              
              
              <div class="col-md-12" id="texto">
                <div class="form-group">
                <textarea class="form-control super" type="textarea" cols="30" rows="10" name="contenido" required>
              </textarea>
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