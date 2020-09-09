@extends('layouts.autenticador')

@section('content')
<style>
    .color-navs{
    background-color: #2877CB;
    color: white;
    }
    
    .nav-tabs .nav-link:hover {
    border-color: #2877CB #2877CB #2877CB;
    color: #333;
    }
    
    
</style>

 <center>
    <img src="{{asset('/images/logo.png')}}" style="width: 100px; height: 100px; margin-top: 80px; margin-bottom: 40px;">
</center>
            
 <div class="d-flex justify-content-center">  
    
<div class="col-md-5" style="background-color: #2a91ff; border-radius: 15px;">
    <div class="d-flex justify-content-center">
                        
      <div class="col-md-11" style="margin-top: 50px;">
          
          
          {{-- notificaciones --}}

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
    border-top-right-radius: 1.25rem; padding: 12px;">Acceso</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link color-navs" id="registro-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false" style="border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem; padding: 12px;">Registro</a>
  </li>

</ul>


<div class="tab-content" id="myTabContent">
    {{-- login --}}
  <div class="tab-pane fade show active" id="acceso" role="tabpanel" aria-labelledby="home-tab">
      
      <form class="login-form" method="POST" action="{{ route('autenticar') }}" name="formulario">
                            {{ csrf_field() }}
                           
                           
                            <div class="form-group has-feedback" style="margin-top:10px;">
                                <label for="usr" style="font: 16px sans-serif;">Número de Afiliación</label>
                                <input type="number" class="form-control"  name="ID" value="{{old('ID')}}" style="border-radius: 20px;">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr" style="font: 16px sans-serif;">Contraseña</label>
                                <input type="password" class="form-control" name="password" ID="txtPassword" style="border-radius: 20px;">
                            </div>
                            
                            
                            {{-- de momento no va --}}
                            {{--<div class="d-flex justify-content-center">

                               <a class="btn btn-light" href="{{ route('social.auth', 'facebook') }}" style="margin-right: 10px; font-size: 12px;">
                                   <img src="{{asset('/vivo/facebook.png')}}" style="width: 25px;height: 25px;margin-right: 5px;">
                                   Acceder con Facebook
                                   </a>
 
                               <a class="btn btn-light" href="{{ route('social.auth', 'google') }}" style="font-size: 12px; line-height: 25px;"><img src="{{asset('/vivo/google.png')}}" style="width: 20px;height: 20px;">
                               Acceder con Google
                               </a>
  
                            </div>--}}
                            
                            
                
                            <div class="row" style="margin-top: 10px; ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 20px; padding: 10px;">Acceder</button>
                                </div>
                            </div>
                            <br>
                            <div class="justify-content-center" style="text-align: center; margin-bottom: 40px;">
                                <a href="javascript:;" onclick="toggle()" style="color:white;">¿Perdiste tu contraseña?</a>
                                <br>
                               
                            </div>
                        </form>   
      
  </div>
  
  {{-- registro--}}
  <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
      
      
      <form class="login-form" method="POST" action="{{ route('autenticacion.save-register') }}" name="formulario">
                            {{ csrf_field() }}
                           
                           
                           <input name="validar" type="hidden" value="oculto">

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
                                <label for="usr">País</label>
                                <select class="form-control" name="pais" required style="border-radius: 20px;">
                                <option value="" selected disabled>Seleccion un país</option>
                             @foreach($paises as $pais)
                              <option value="{{$pais->nombre}}">{{$pais->nombre}}</option>
                             @endforeach
                                </select>
                            </div>
                            
                            
                            {{-- de momento no va --}}
                           {{--<div class="d-flex justify-content-center">

                               <a class="btn btn-light" href="{{ route('social.auth', 'facebook') }}" style="margin-right: 10px; font-size: 12px;">
                                   <img src="{{asset('/vivo/facebook.png')}}" style="width: 25px;height: 25px;margin-right: 5px;">
                                   Acceder con Facebook
                                   </a>
 
                               <a class="btn btn-light" href="{{ route('social.auth', 'google') }}" style="font-size: 12px; line-height: 25px;"><img src="{{asset('/vivo/google.png')}}" style="width: 20px;height: 20px;">
                               Acceder con Google
                               </a>
  
                            </div>--}}
                            
                            
                            <div class="form-check text-left" style="margin-bottom: 20px;">
                                <label class="form-check-label" style="color:white;">
                                    <input class="form-check-input" name="terms" type="checkbox" required>
                                    Acepto las politicas de privacidad y los términos de datos.
                                </label>
                            </div>
                            
                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 20px; padding: 10px;">Registrarme</button>
                                </div>
                            </div>
                            <br>
        </form>
    </div>
  </div>


     </div>
    </div>
 </div>   
</div>

<div class="col-md-12" style="text-align: center; margin-top: 30px; color: white;">
<img src="{{asset('/images/logo.png')}}" style="width: 35px; height: 35px;"> 2020 My Business Academy Pro All Rigth Reserved

</div>

@endsection 