<div class="modal fade" id="cambiarestado" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelT">Cambiar Estado</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('prospeccion-cambioestado')}}" method="post">
          {{ csrf_field() }}
            
            <input name="id" type="hidden" id="iduse">
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Estado (*)</label>
              <select name="estado" class="form-control" id="cambioestado" required>
            <option value="Nuevo Prospecto">Nuevo Prospecto</option>
            <option value="Presentación de Negocio">Presentación de Negocio</option>
            <option value="Seguimiento">Seguimiento</option>
              <option value="Calificado para vinculación">Calificado para vinculación</option>
               <option value="No calificado/No interesado">No calificado/No interesado</option>
              </select>
            </div>
         
            
            <div class="form-group col-xs-12">
              <button type="submit" class="btn green btn-block">Agregar</button>
            </div>
          
        </form>
      </div>
      
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>