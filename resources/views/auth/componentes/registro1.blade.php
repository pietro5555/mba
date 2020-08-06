<div class="col-md-6 col-sm-offset-3">
     <div class="content">
            <form class="login-form" method="POST" action="{{ route('autenticacion.save-register') }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="box-body" style="background-color: #{{$settings->colorfondo}};">
                    
        <div class="login-logo">
        <a href="{{route('login')}}">    
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="" style="height: 100px;">
        </a>
        
        {{-- mensajes del sistema --}}
        @include('layouts.include.mensajes')
      
         </div>
         
         <div class="linea-borderlan">
            <h3 class="box-title claro">
                @if ( request()->ref != null )
                @php
                $referred = DB::table($settings->prefijo_wp.'users')
                ->select('display_name')
                ->where('ID', '=', request()->ref)
                ->first();
                @endphp
                @if ($referred != null)
                <p cla ss="refer">Registro Referido por: <strong>{{  $referred->display_name }}</strong></p>
                @endif
                @endif
            </h3>
         </div>
         
         <div class="row" style="margin-top: 35px;">
             
             <div class="alert alert-danger" style="display: none;" id="errorEdad">
                <span><strong>¡¡Debe ser mayor de edad para registrarse!!</strong></span>
            </div>
            
            <input type="hidden" name="tip" value="2">
                   
            @foreach($campos as $campo)
                @if($campo->tip == 0 || $campo->tip == 2)
                    @if($campo->tipo == 'select')
                     <div class="col-md-12 col-xs-12 pag">
                         <div class="negro">
                            <label class="claro" for="">{{$campo->label}} {{($campo->requerido == 1) ? '(*)' : '(Opcional)'}}</label>
                                <select class="form-control select2" name="{{$campo->nameinput}}"
                                    {{($campo->requerido == 1) ? 'required' : ' '}}>
                                    <option value="" disabled selected>Selecciones una opcion</option>
                                    @foreach($valoresSelect as $valores)
                                     @if ($valores['idselect'] == $campo->id)
                                    <option value="{{$valores['valor']}}">{{$valores['valor']}}</option>
                                     @endif
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    @elseif($campo->tipo == 'number')
                        <div class="col-md-12 col-xs-12 pag">
                          <div class="negro">
                            <label class="claro" for="">{{$campo->label}} {{($campo->requerido == 1) ? '(*)' : '(Opcional)'}}</label>
                               <input class="con bajo" step="1" type="{{$campo->tipo}}" name="{{$campo->nameinput}}"
                                            min="{{(!empty($campo->min)) ? $campo->min : ''}}"
                                            max="{{(!empty($campo->max)) ? $campo->max : ''}}"
                                            {{($campo->requerido == 1) ? 'required' : ' '}}
                                            value="{{old($campo->nameinput)}}">
                        </div>
                    @else
                    @if($campo->input_edad == 1)
                        <div class="col-md-12 col-xs-12 pag">
                          <div class="negro">
                            <label class="claro" for="">{{$campo->label}} {{($campo->requerido == 1) ? '(*)' : '(Opcional)'}}</label>
                                <input class="con bajo" type="{{$campo->tipo}}"
                                            name="{{$campo->nameinput}}" value="{{old($campo->nameinput)}}"
                                            onblur="validarEdad(this.value)"
                                            {{($campo->requerido == 1) ? 'required' : ' '}}>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12 col-xs-12 pag">
                          <div class="negro">
                            <label class="claro" for="">{{$campo->label}} {{($campo->requerido == 1) ? '(*)' : '(Opcional)'}}</label>
                                <input class="con bajo " type="{{$campo->tipo}}"
                                            name="{{$campo->nameinput}}" value="{{old($campo->nameinput)}}"
                                            minlength="{{(!empty($campo->min)) ? $campo->min : ''}}"
                                            maxlength="{{(!empty($campo->max)) ? $campo->max : ''}}"
                                            {{($campo->requerido == 1) ? 'required' : ' '}}>
                            </div>                
                        </div>
                    @endif
                    @endif
                    @endif
                    @endforeach
        
        
        <div class="col-md-12 col-xs-12 pag">
            <div class="negro">
          <label class="claro">Correo Electrónico (*)</label>
            <input class="con bajo" type="text" autocomplete="off" name="user_email" required oncopy="return false" onpaste="return false" />
            </div>
        </div>

        <div class="col-md-12 col-xs-12 pag">
            <div class="negro">
            <label class="claro">Confirmación de Correo Electrónico (*)</label>
                <input class="con bajo" type="text" autocomplete="off" name="user_email_confirmation" required oncopy="return false" onpaste="return false" />
            </div>    
        </div>


        <div class="col-md-12 col-xs-12 pag">
            <div class="negro">
            <label class="claro">Contraseña (*)</label>
                <input class="con bajo" type="password" autocomplete="off" name="password" required oncopy="return false" onpaste="return false" />
            </div>    
        </div>

        <div class="col-md-12 col-xs-12 pag">
            <div class="negro">
            <label class="claro">Confirmación de Contraseña (*)</label>
             <input class="con bajo" type="password" autocomplete="off" name="password_confirmation" required oncopy="return false" onpaste="return false" />
            </div> 
        </div>            

       <div class="col-md-12 col-xs-12 pag">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="terms" class="custom-control-input" id="customCheck1" {{ old('terms') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="customCheck1" style="color: #c5baba;">Leo los <a href="{{asset('assets/terminosycondiciones.pdf')}}" style="color:white" download>TÉRMINOS DE USO</a> </label>
            </div>
        </div>
        
        @if (request()->ref == null)
            <div class="col-md-12 col-xs-12 pag">
                <div class="negro">
                <div class="alert alert-info">
                    <button class="close" data-close="alert"></button>
                        <span>
                        Si no sabes cual es el ID de su Patrocinador, por favor Coloque el 1
                        </span>
                </div>
                                        
            <label class="claro">ID Patrocinador (*)</label>
            <input class="con bajo" type="text" required pattern="[0-9]*"
                autocomplete="off" name="referred_id" oncopy="return false"
                onpaste="return false" />
               </div>
            </div>  
                                    
         @else
         <input type="hidden" name="referred_id" value="{{ request()->ref }}" />
         @endif
         
        
        {{-- no binario --}}
        @if ($estructura != 'binaria')
            @if($settings->posicionamiento == 0)
            <div class="col-md-12 col-xs-12 pag">
              <div class="negro">    
                <label class="claro">ID Posicionamiento (Opcional)</label>
                <input class="con bajo" type="number" autocomplete="off" name="position_id"  oncopy="return false" onpaste="return false" />
              </div>
            </div>    
            @endif
        @else
                                    
        {{-- Link de binario  --}}
        @if (!empty(request()->lado))
        <input type="hidden" name="ladomatriz" value="{{request()->lado}}" />
        @endif
                                    
         @if(empty(request()->lado))
            {{-- binario --}}
            <div class="col-md-6 col-xs-12 pag">
                <div class="negro">  
                 <label class="claro" for="">Lado a Ingresar (*)</label>
                <select class="form-control " name="ladomatriz" required>
                <option value="" disabled selected>Selecciones una opcion</option>
                <option value="D">Derecha</option>
                <option value="I">Izquierda</option>
                </select>
              </div>
            </div>
            @endif
        @endif 
        
         @if (empty(request()->tipouser))
          <input type="hidden" name="tipouser" value="Normal" />
         @else
          <input type="hidden" name="tipouser" value="{{ request()->tipouser }}" />
         @endif
                
                
         @if (request()->ref == null)
                
         @else
         <input type="hidden" name="referred_id" value="{{ request()->ref }}" />
         @endif
       
       
       <div class="col-md-12 col-xs-12 pag">
                    
                <button class="nuevo-info col-md-6 col-xs-6 btn-block" type="submit" id="btn">Crear una cuenta</button>
                </div>
                
                <div class="col-md-12 col-xs-12 page">
                    <p>¿Tienes cuenta? Haga click <a href="{{route('login')}}" class="blanco-claro">aquí</a> para iniciar sesion</p>
                </div>
                
                <div class="col-md-12 col-xs-12 page">
                    <p>Sistema Creado por: 2019 © Sineval MLM 13.0 - Desarrollado por <a target="_blank"
                            href="https://sinergiared.com/" class="blanco-claro">Sinergia</a> & Valdusoft</p>
                </div>
                
                   </div>
                 </div>
              </div>
            </form>
        </div>

</div>