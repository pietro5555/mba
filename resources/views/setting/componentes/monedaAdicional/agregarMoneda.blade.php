<div class="modal fade" id="monedaAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Monedas Nuevas</h4>
            </div>
            <div class="modal-body">
                <form class="" action="{{route('setting-save-monedas-adicional')}}" method="post">
                    {{ csrf_field() }}
                    
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="">Cantidad de monedas agregar</label>
                        <input type="number" name="niveles" class="form-control" max="3" id="niveles" required onkeyup="monedaniveles()">
                    </div>
                    
                    <div class="col-xs-12 col-sm-12" style="background:#fff" id="valor">

                   </div>
                    
                    <div class="row form-group col-xs-12 col-sm-12" style="background:#fff" id="valor2">

                   </div>
                   
                   <button type="submit" class="btn green btn-block"> Guardar
                        </button>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>