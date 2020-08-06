<!-- Modal de la firma -->   
<div class="modal fade" id="servidor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Servidor Externo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-servidor')}}" method="post">
          {{ csrf_field() }}
          

           <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Configuracion smtp</label>
          <input name="driver" class="form-control" type="text" value="{{env('MAIL_DRIVER')}}" required >
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Servidor de correo</label>
          <input name="host" class="form-control" type="text" value="{{env('MAIL_HOST')}}" required >
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Puerto</label>
          <input name="port" class="form-control" type="number" value="{{env('MAIL_PORT')}}" required >
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Nombre de usuario de correo</label>
          <input name="username" class="form-control" type="text" value="{{env('MAIL_USERNAME')}}" required >
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Nombre Para el Correo</label>
          <input name="from_name" class="form-control" type="text" value="{{env('MAIL_FROM_NAME')}}" required >
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Clave del Correo</label>
          <input name="password" class="form-control" type="password" required >
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