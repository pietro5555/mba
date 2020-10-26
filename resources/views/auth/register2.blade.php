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


    #video_background {
      position: absolute;
      bottom: 0px;
      right: 0px;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1000;
      overflow: hidden;
   }
    
    
</style>

<video src="{{asset('/fondovideo/video.mp4')}}" type="video/mp4" autoplay="" muted loop="" id="video_background"></video>

 <center>
    <img src="{{asset('/images/logo-login.png')}}" style="width: 100px; height: 100px; margin-top: 80px; margin-bottom: 40px;">
</center>
            
 <div class="d-flex justify-content-center">  
    
<div class="col-md-5" style="background-color: #2a91ff; border-radius: 15px;">
    <div class="d-flex justify-content-center">
                        
      <div class="col-md-11" style="margin-top: 50px;">
          
          
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
    <a class="nav-link active color-navs" id="registro-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false" style="border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem; padding: 12px;">Registro</a>
  </li>

</ul>


<div class="tab-content" id="myTabContent">
  
  {{-- registro--}}
  <div class="tab-pane fade fade show active" id="registro" role="tabpanel" aria-labelledby="profile-tab">
      
      
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
                                <label for="patrocinador">ID Patrocinador (Si no sabe cual es su Patrocinador coloque el ID 1)</label>
                                <input type="number" class="form-control" name="referred_id" ID="patrocinador" value="{{request()->ref}}" style="border-radius: 20px;">
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
                                    <a href="{{asset('assets/terminosycondiciones.docx')}}" style="color: white;" download> Descargar Terminos y Condiciones</a>
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
