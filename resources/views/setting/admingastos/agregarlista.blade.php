<!-- Agregar a la lista -->   
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-save-administrador')}}" method="post">
          {{ csrf_field() }} 
          
          
          <div class="col-md-12">
                    <label>Nombre de la categoria</label>
            <input type="text" class="form-control" name="nombre" required>
               </div>
               
               <div class="col-md-12">
             <label class="control-label ">Tipo de categoria</label>
        <select class="form-control" name="tipo">
        <option value="1">Ingresos</option>
        <option value="2">Gastos</option>
        </select>
        </div>
        
       
               
            <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">   
               <button type="submit" class="btn btn-info btn-block">Agregar</button>
               </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 