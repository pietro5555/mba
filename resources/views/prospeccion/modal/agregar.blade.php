<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabelT">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelT">Agregar Prospecto</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('prospeccion-guardar')}}" method="post">
          {{ csrf_field() }}
          

            <div class="form-group col-xs-12 col-sm-12">
              <label>Fuente de Prospecto (*)</label>
              <select name="persona_natural" class="form-control" required>
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
              <select name="estado" class="form-control" required>
            <option value="Nuevo Prospecto">Nuevo Prospecto</option>
            <option value="Presentación de Negocio">Presentación de Negocio</option>
            <option value="Seguimiento">Seguimiento</option>
              <option value="Calificado para vinculación">Calificado para vinculación</option>
               <option value="No calificado/No interesado">No calificado/No interesado</option>
              </select>
            </div>
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Correo electronico (*)</label>
              <input class="form-control" type="email" name="user_email" value="{{old('user_email')}}" required>
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Nombre (*)</label>
              <input class="form-control" type="text" name="firstname" required value="{{old('firstname')}}">
            </div>
            
             <div class="form-group col-xs-12 col-sm-6">
              <label>Apellido (*)</label>
              <input class="form-control" type="text" name="lastname" required value="{{old('lastname')}}">
            </div>
            
            <div class="form-group col-xs-12 col-sm-12">
              <label>Direccion (*)</label>
              <input class="form-control" type="text" name="direccion" required value="{{old('direccion')}}">
              
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Ciudad (*)</label>
              <input class="form-control" type="text" name="ciudad" required value="{{old('ciudad')}}">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Estado (*)</label>
              <input class="form-control" type="text" name="local" required value="{{old('estado')}}">
            </div>
            
            
             <div class="form-group col-xs-12 col-sm-6">
              <label>País (*)</label>
              <input class="form-control" type="text" name="pais" required value="{{old('pais')}}">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <label>Telefono (*)</label>
              <input class="form-control" type="number" name="telefono" required value="{{old('telefono')}}">
            </div>
            
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tipo de usuario (*)</label>
           <select name="tipo" class="form-control" required>
            <option value="Normal">Referido</option>
            @if($cliente->cliente == '1')
            <option value="Cliente">Cliente</option>
            @endif
                    </select>
            </div>
              </div>
            
            <div class="form-group col-xs-12 col-sm-12">
            <label class="control-labe">Patrocinador (Opcional)</label>
                <input class="form-control" type="number" name="referred_id" />
                </div>
            
            
            {{-- no binario --}}
                                    @if ($estructura != 'binaria')
                                    <div class="form-group col-xs-12 col-sm-12">
                                        <label class="control-label" style="text-align: center;">ID Posicionamiento
                                            (Opcional)</label>
                                        <input class="form-control"
                                            type="number" name="position_id" />
                                    </div>
                                    @else
                                    {{-- binario --}}
                                        <div class=" form-group col-xs-12 col-sm-12">
                                            <label class="" for="">Lado a Ingresar (*)</label>
                                            <select class="form-control " name="ladomatriz" required>
                                                <option value="" disabled selected>Selecciones una opcion</option>
                                                <option value="D">Derecha</option>
                                                <option value="I">Izquierda</option>
                                            </select>
                                        </div>    
                                    @endif
                
                
                <div class="form-group col-xs-12 col-sm-12">
      <label>Perfil del Prospecto (Opcional)</label>
      <textarea class="form-control" rows="2" name="perfil">
          
      </textarea>
    </div>                        
            
            <div class="form-group col-xs-12 col-sm-12">
      <label>Comentarios y Observaciones(Opcional)</label>
      <textarea class="form-control" rows="2" name="comentario">
          
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