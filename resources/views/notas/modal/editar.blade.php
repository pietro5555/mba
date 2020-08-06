<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelT">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('notas-editar')}}" method="post">
          {{ csrf_field() }}
          
          <input type="hidden" name="id" id="id">

            <div class="form-group col-xs-12 col-sm-12">
              <label>Titulo</label>
              <input class="form-control" type="text" name="titulo" required id="titulo">
            </div>
            
            
            <div class="col-sm-6">
            <label>Fecha desde</label>
            <input class="form-control" type="date"
              name="inicio" required  id="inicio"/>

          </div>

          <div class="col-sm-6">
            <label>Fecha hasta</label>
            <input class="form-control" type="date"
              name="fin" required  id="fin"/>
          </div>
            
            
            <div class="col-md-12">
          <label>Contenido</label>
          <textarea class="summer" type="textarea" cols="50" rows="10"
            name="contenido" required>
              
              </textarea>
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