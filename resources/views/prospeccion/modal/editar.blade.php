<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelT">Editar Prospecto</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('prospeccion-editar')}}" method="post">
          {{ csrf_field() }}
          
          <input name="id" id="id" type="hidden">
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Fuente de Prospecto (*)</label>
              <select name="persona_natural" class="form-control" id="natural" required>
            <option value="Google">Google</option>
            <option value="Redes sociales">Redes sociales</option>
             <option value="Blog">Blog</option>
              <option value="Contacto personal">Contacto personal</option>
               <option value="Contacto en evento">Contacto en evento</option>
                <option value="otros">otros</option>
              </select>
            </div>
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Estado (*)</label>
              <select name="estado" class="form-control" id="estado" required>
            <option value="Nuevo Prospecto">Nuevo Prospecto</option>
            <option value="Presentación de Negocio">Presentación de Negocio</option>
            <option value="Seguimiento">Seguimiento</option>
              <option value="Calificado para vinculación">Calificado para vinculación</option>
               <option value="No calificado/No interesado">No calificado/No interesado</option>
              </select>
            </div>
            
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Correo electronico (*)</label>
              <input class="form-control" type="email" name="user_email" id="email" required>
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Nombre (*)</label>
              <input class="form-control" type="text" name="firstname" required id="nombre">
            </div>
            
             <div class="form-group col-xs-12 col-sm-6">
              <label>Apellido (*)</label>
              <input class="form-control" type="text" name="lastname" required id="apellido">
            </div>
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Direccion (*)</label>
              <input class="form-control" type="text" name="direccion" required id="dire">
              
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Ciudad (*)</label>
              <input class="form-control" type="text" name="ciudad" required id="ciudad">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Estado (*)</label>
              <input class="form-control" type="text" name="local" required id="local">
            </div>
            
            
             <div class="form-group col-xs-12 col-sm-6">
              <label>País (*)</label>
              <input class="form-control" type="text" name="pais" required id="pais">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Telefono (*)</label>
              <input class="form-control" type="number" name="telefono" required id="telefono">
            </div>
            
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tipo de usuario (*)</label>
           <select name="tipo" class="form-control" id="tipo" required>
            <option value="Normal">Referido</option>
            @if($cliente->cliente == '1')
            <option value="Cliente">Cliente</option>
            @endif
                    </select>
            </div>
              </div>
            
            <div class="form-group col-xs-12 col-sm-12">
            <label class="control-labe">Patrocinador (Opcional)</label>
                <input class="form-control" type="number" name="referred_id" id="referred"/>
                </div>
            
            {{-- no binario --}}
                                    @if ($estructura != 'binaria')
                                    <div class="form-group col-xs-12 col-sm-12">
                                        <label class="control-label">ID Posicionamiento
                                            (Opcional)</label>
                                        <input class="form-control"
                                            type="number" name="position_id"  id="posicion"/>
                                    </div>
                                    @else
                                    {{-- binario --}}
                                        <div class=" form-group col-xs-12 col-sm-12">
                                            <label class="" for="">Lado a Ingresar (*)</label>
                                            <select class="form-control " name="ladomatriz" required id="matriz">
                                                <option value="" disabled selected>Selecciones una opcion</option>
                                                <option value="D">Derecha</option>
                                                <option value="I">Izquierda</option>
                                            </select>
                                        </div>    
                                    @endif
                                    
                                    
                <div class="form-group col-xs-12 col-sm-12">
      <label>Perfil del Prospecto (Opcional)</label>
      <textarea class="form-control" rows="2" name="perfil" id="perfil">
          
      </textarea>
    </div>       
    
                <div class="form-group col-xs-12 col-sm-12">
      <label>Comentario y Observaciones (Opcional)</label>
      <textarea class="form-control" rows="2" name="comentario" id="comen">
          
      </textarea>
    </div>    
    
            
            <div class="form-group col-xs-12">
              <button type="submit" class="btn green btn-block">Actualizar</button>
            </div>
          
        </form>
      </div>
      
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>