<div class="modal fade" id="recarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recargar Billetera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('wallet.amount')}}" method="post">
          {{ csrf_field() }} 

       <input type="hidden" class="form-control" name="id" id="id">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Cantidad a Recargar</label>
            <input type="number" step="any" class="form-control" name="cantidad">
            </div>
              </div>

           
               
               <button type="submit" class="btn btn-primary btn-block">Recargar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 