<style>
    .mejora{
    background-color: transparent;
    width: 96%;
    height: 40px;
    margin-left: 10px;
    border: 1px solid #363840;
    color: #fff;
    padding: 20px;
    }

    .mejora-select{
    background-color: transparent;
    width: 96%;
    height: 40px;
    margin-left: 10px;
    border: 1px solid #363840;
    color: #333;
    }
    
    
</style>

<h3 class="text-white">Registrate para disfrutar de tu compra</h3>
<h6 class="text-white">Si ya estás registrado puedes <a href="#" onclick="toggle()">entrar</a></h6>

<div class="col-md-12 mostrar" style="margin-top: 30px;">
<form class="login-form" method="POST" action="{{ route('aut-shoping') }}" name="formulario">
                            {{ csrf_field() }}
                                                  
    <div class="form-group has-feedback" style="margin-top:10px;">
        <label for="usr" class="text-white" style="font: 16px sans-serif;">Número de Afiliación</label>
        <input type="number" class="mejora"  name="ID" value="{{old('ID')}}" placeholder="Número de Afiliación">
    </div>

    <div class="form-group has-feedback">
        <label for="usr" class="text-white" style="font: 16px sans-serif;">Contraseña</label>
        <input type="password" class="mejora" name="password" ID="txtPassword" placeholder="Contraseña">
    </div>                           
                
    <div class="row" style="margin-top: 10px; ">
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block" style="padding: 5px;">Acceder</button>
        </div>
    </div>
     <br>
</form> 
</div>


<div class="col-xs-12 mostrar" style="display:none;">
   <form class="login-form" method="POST" action="{{ route('autenticacion.save-register') }}" name="formulario">
                            {{ csrf_field() }}
                                                  
    <input name="validar" type="hidden" value="oculto">
                           <input name="shoping" type="hidden" value="shoping">

                           <div class="form-group has-feedback">
                                <label for="usr" class="text-white">Usuario</label>
                                <input type="text" class="mejora"  name="nameuser" value="{{old('nameuser')}}" placeholder="Usuario">
                            </div>
                           
                            <div class="form-group has-feedback">
                                <label for="usr" class="text-white">Correo Electronico</label>
                                <input type="email" class="mejora"  name="user_email" value="{{old('user_email')}}" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr" class="text-white">Contraseña</label>
                                <input type="password" class="mejora" name="password" ID="txtPassword" placeholder="Contraseña">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr" class="text-white">Confirmar contraseña</label>
                                <input type="password" class="mejora" name="password_confirmation" ID="txtPassword" placeholder="Confirmar Contraseña">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="patrocinador" class="text-white">ID Patrocinador (Opcional)</label>
                                <input type="number" class="mejora" name="referred_id" ID="patrocinador" value="{{ (request()->ref != null) ? request()->ref : 1 }}" >
                            </div>

                            <div class="form-group has-feedback">
                                <label for="usr" class="text-white">País</label>
                                <select class="mejora-select" name="pais" required >
                                <option value="" selected disabled>Seleccion un país</option>
                             @foreach($paises as $pais)
                              <option value="{{$pais->nombre}}">{{$pais->nombre}}</option>
                             @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="form-check text-left" style="margin-bottom: 20px;">
                                <label class="form-check-label" style="color:white;">
                                    <input class="form-check-input text-white" name="terms" type="checkbox" required>
                                    Acepto las politicas de privacidad y los términos de datos.
                                </label>
                            </div>
                            
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block" style="padding: 5px;">Registrarme</button>
                                </div>
                            </div>
                            <br>
</form> 
</div>

