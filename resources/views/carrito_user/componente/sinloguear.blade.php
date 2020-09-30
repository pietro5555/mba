<style>
    .color-navs{
    background-color: #28a745;
    color: white;
    }
    
    .nav-tabs .nav-link:hover {
    border-color: #28a745;
    color: #333;
    }
    
    
</style>

<div class="col-md-12" style="background: #363840">
        
      {{-- notificaciones --}}

      @if($errors->any())
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span>
                <ul class="no-margin">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </span>
        </div>
        <br>
        @endif         

     @if (Session::has('msj2'))
    <div class="alert alert-success">
    <button class="close" data-close="alert"></button>
        <span>
         {{Session::get('msj2')}}
        </span>
    </div>
    @endif      

    @if (Session::has('msj3'))
    <div class="alert alert-danger">
    <button class="close" data-close="alert"></button>
        <span>
         {{Session::get('msj3')}}
        </span>
    </div>
    @endif

    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active color-navs" id="acceso-tab" data-toggle="tab" href="#acceso" role="tab" aria-controls="acceso" aria-selected="true" style="border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem; padding: 12px;">Iniciar Sesion</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link color-navs" id="registro-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false" style="border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem; padding: 12px;">Registro</a>
  </li>

</ul>

<div class="tab-content" id="myTabContent">
    {{-- login --}}
  <div class="tab-pane fade show active" id="acceso" role="tabpanel" aria-labelledby="home-tab">
      
      <form class="login-form" method="POST" action="{{ route('aut-shoping') }}" name="formulario">
                            {{ csrf_field() }}
                           
                           
                            <div class="form-group has-feedback" style="margin-top:10px;">
                                <label for="usr" style="font: 16px sans-serif;">Número de Afiliación</label>
                                <input type="number" class="form-control"  name="ID" value="{{old('ID')}}" style="border-radius: 20px;">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr" style="font: 16px sans-serif;">Contraseña</label>
                                <input type="password" class="form-control" name="password" ID="txtPassword" style="border-radius: 20px;">
                            </div>                           
                
                            <div class="row" style="margin-top: 10px; ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 20px; padding: 5px;">Acceder</button>
                                </div>
                            </div>
                            <br>
                        </form>   
      
  </div>
  
  {{-- registro--}}
  <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
      
      
      <form class="login-form" method="POST" action="{{ route('autenticacion.save-register') }}" name="formulario">
                            {{ csrf_field() }}
                           
                           
                           <input name="validar" type="hidden" value="oculto">
                           <input name="shoping" type="hidden" value="shoping">

                           <div class="form-group has-feedback">
                                <label for="usr">Usuario</label>
                                <input type="text" class="form-control"  name="nameuser" value="{{old('nameuser')}}" style="border-radius: 20px;">
                            </div>
                           
                            <div class="form-group has-feedback">
                                <label for="usr">Correo Electronico</label>
                                <input type="email" class="form-control"  name="user_email" value="{{old('user_email')}}" style="border-radius: 20px;">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr">Contraseña</label>
                                <input type="password" class="form-control" name="password" ID="txtPassword" style="border-radius: 20px;">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="password_confirmation" ID="txtPassword" style="border-radius: 20px;">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="patrocinador">ID Patrocinador (Opcional)</label>
                                <input type="number" class="form-control" name="referred_id" ID="patrocinador" value="{{ (request()->ref != null) ? request()->ref : 1 }}" style="border-radius: 20px;">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="usr">País</label>
                                <select class="form-control" name="pais" required style="border-radius: 20px;">
                                <option value="" selected disabled>Seleccion un país</option>
                             @foreach($paises as $pais)
                              <option value="{{$pais->nombre}}">{{$pais->nombre}}</option>
                             @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="form-check text-left" style="margin-bottom: 20px;">
                                <label class="form-check-label" style="color:white;">
                                    <input class="form-check-input" name="terms" type="checkbox" required>
                                    Acepto las politicas de privacidad y los términos de datos.
                                </label>
                            </div>
                            
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 20px; padding: 5px;">Registrarme</button>
                                </div>
                            </div>
                            <br>
        </form>
    </div>
  </div>
</div>