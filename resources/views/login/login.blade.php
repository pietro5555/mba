@extends('layouts.autenticador')

@section('content')
<style>
    .color-navs {
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

                @if (Session::has('msj-exitoso'))
                    <div class="alert alert-success">
                        <button class="close" data-close="alert"></button>
                        <span>
                            {{Session::get('msj-exitoso')}}
                        </span>
                    </div>
                @endif

                @if (Session::has('msj-erroneo'))
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span>
                        {{Session::get('msj-erroneo')}}
                    </span>
                </div>
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
                        <a class="nav-link {{(request()->act == 0) ? 'active' : ' '}} color-navs" id="acceso-tab" data-toggle="tab" href="#acceso" role="tab" aria-controls="acceso" aria-selected="true" style="border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem; padding: 12px;">Acceso</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{(request()->act == 1) ? 'active' : ' '}} color-navs" id="registro-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false" style="border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem; padding: 12px;">Registro</a>
                    </li>

                </ul>


                <div class="tab-content" id="myTabContent">
                    {{-- login --}}
                    <div class="tab-pane fade {{(request()->act == 0) ? 'active show' : ' '}}" id="acceso" role="tabpanel" aria-labelledby="home-tab">

                        <form class="login-form" method="POST" action="{{ route('autenticar') }}" name="formulario">
                            {{ csrf_field() }}


                            <div class="form-group has-feedback" style="margin-top:10px;">
                                <label for="usr" style="font: 16px sans-serif;">Número de Afiliación</label>
                                <input type="number" class="form-control" name="ID" value="{{old('ID')}}" style="border-radius: 20px;">
                            </div>

                            <div class="form-group has-feedback" style="margin-top:10px;">
                                <label for="usr" style="font: 16px sans-serif;">Contraseña</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                  <div class="input-group-text"><span class="fa fa-eye-slash icon" onclick="mostrarPassword()"></span></div>
                                 </div>
                                  <input type="password" class="form-control" id="txtPassword" name="password" >
                                </div>
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
                        <a href="#recoverModal" data-toggle="modal" style="color:white;">¿Perdiste tu contraseña?</a>
                        <br>

                    </div>
                    </form>

                </div>

                {{-- registro--}}
                <div class="tab-pane fade {{(request()->act == 1) ? 'active show' : ' '}} " id="registro" role="tabpanel" aria-labelledby="profile-tab">


                    <form class="login-form" method="POST" action="{{ route('autenticacion.save-register') }}" name="formulario">
                        {{ csrf_field() }}


                        <input name="validar" type="hidden" value="oculto">

                        <div class="form-group has-feedback">
                            <label for="usr">Usuario</label>
                            <input type="text" class="form-control" name="nameuser" value="{{old('nameuser')}}" style="border-radius: 20px;">
                        </div>

                        <div class="form-group has-feedback">
                            <label for="usr">Correo Electronico</label>
                            <input type="email" class="form-control" name="user_email" value="{{old('user_email')}}" style="border-radius: 20px;">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="usr">Contraseña</label>
                            <input type="password" class="form-control" name="password" ID="txtPassword" style="border-radius: 20px;">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="usr">Confirmar contraseña</label>
                            <input type="password" class="form-control" name="password_confirmation" ID="txtPassword" style="border-radius: 20px;">
                        </div>

                        @if(empty(request()->ref))
                            <div class="form-group has-feedback">
                            <label for="patrocinador">ID Patrocinador (Si no sabe cual es su patrocinador por favor coloque el ID 1)</label>
                            <input type="number" class="form-control" name="referred_id" ID="patrocinador" style="border-radius: 20px;">
                        </div>
                        @else
                            <div class="form-group has-feedback">
                            <label for="patrocinador">ID Patrocinador (Si no sabe cual es su patrocinador por favor coloque el ID 1)</label>
                            <input type="number" class="form-control" name="referred_id" value="{{request()->ref}}" ID="patrocinador" style="border-radius: 20px;" readonly>
                        </div>
                        @endif

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

<div class="modal fade" id="recoverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Recuperar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('recover-password') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="comment" style="color: white;">Correo Electrónico</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
  function mostrarPassword(){
        var cambio = document.getElementById("txtPassword");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 
    
</script>

@endsection