<!-- Modal de la firma -->   
<div class="modal fade" id="firma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Firma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('correo-firmado')}}" method="post">
          {{ csrf_field() }}
          
          <div class="col-md-12">
   <div class="alert alert-info" role="alert">
    <h5>Debe agregar nombre de la empresa, teléfono, dirección de la empresa, código postal, sitio web.</h5>
    </div>
  </div>

           <div class="col-sm-12">
          <label class="control-label">Agregar Firma</label>
          <textarea cols="30" rows="10"
            name="fir" required >
              {{(!empty($firma)) ? $firma : '' }}</textarea>
        </div>

               
               <button type="submit" class="btn btn-primary btn-block">Agregar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 