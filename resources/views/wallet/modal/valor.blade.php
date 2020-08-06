<div class="modal fade" id="valores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Valor del canje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('cambio-valores')}}" method="post">
          {{ csrf_field() }}

          <div class="col-md-12">
        
             <label>Valor del Canje</label>
              <input class="form-control" type="number" name="porcentaje" value="{{$settings->total_canje}}"/>
           
        </div>

               
               <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 