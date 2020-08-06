<div class="modal fade" id="myModalAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cantidad de Puntos para la Recompra</h4>
            </div>
            <div class="modal-body">
                <form class="" action="{{route('setting-recompra')}}" method="post">
                    {{ csrf_field() }}
                   <input type="hidden" class="form-control" name="puntos" value="1">
                   
                    <div class="col-md-12">
                <div class="form-group">
                    <label>Cantidad de Puntos para la recompra</label>
            <input type="text" class="form-control" name="recompra" required>
            </div>
              </div>
              <button type="submit" class="btn btn-info">Agregar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>