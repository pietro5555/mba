<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta http-equiv="Expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />

<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>

    <title>{{ $settings->name }}</title>
    {{-- carga todos los estilos generales --}}
    @include('layouts.include.styles')
  </head>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        var base_url = '{{ url('/') }}';
        var assetsPath = base_url + '/assets';
    </script>

</head>
<body class="login" style="background-image: url('{{ asset('assets/bg.jpg') }}');">


    <div class="login-box" style="width: 480px;">

    
        <div class="login-box-body">

            <div class="justify-content-center">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item mr-1">
                        <a class="nav-link active" href="#acceso" data-toggle="tab">ACCESO</a>
                    </li>
                    <li class="nav-item mr-1">
                        <a class="nav-link" href="#registro" data-toggle="tab">REGISTRO</a>
                    </li>
                </ul>
                <div class="tab-content shadow-lg">
                    <div class="tab-pane" rol="tabpanel" id="acceso">
                        
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
                        <form class="login-form" method="POST" action="{{ route('login') }}" id="inicio" name="formulario">
                            {{ csrf_field() }}
                           
                            <div class="form-group has-feedback" style="margin-top: 20px">
                                <label for="usr" style="color:white; font: 120% sans-serif;">Nombre de Identificación</label>
                                <input type="email" class="form-control"  name="user_email" value="{{old('user_email')}}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                           
                            <div class="form-group has-feedback">
                                <label for="usr" style="color:white; font: 120% sans-serif;">Usuaurio o Email</label>
                                <input type="email" class="form-control"  name="user_email" value="{{old('user_email')}}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr" style="color:white; font: 120% sans-serif;">Contraseña</label>
                                <input type="password" class="form-control" name="password" ID="txtPassword" style="border-radius: 20px;">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            
                            <div class="social">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fa fa-facebook-f"></i>
                                    <label>Acceder con Facebook</label>
                                </button>
                                <button class="btn btn-icon btn-round btn-dribbble">
                                    <i class="fa fa-dribbble"></i>
                                    <label>Acceder con Google</label>
                                </button>                               
                            </div>
                            <div class="row" style="margin-top: 10px; ">
                                <!-- /.col -->
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-agn">ACCEDER</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <br>
                            <div class="justify-content-center">
                                <a href="javascript:;" onclick="toggle()">¿Perdiste tu Contraseña?</a>
                                <br>
                                {{--<a href="javascript:;" data-toggle="modal" data-target="#myModal" class="text-center">Registrar Licencia</a>--}}
                            </div>
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox">
                                    <span class="form-check-sign"></span>
                                        {{ __('Estoy de acuerdo con los') }}
                                    <a href="#something">{{ __('términos y condiciones') }}</a>.
                                </label>
                                @if ($errors->has('agree_terms_and_conditions'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('agree_terms_and_conditions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </form>            
                    </div>
                    
                    <div class="tab-pane" role="tabpanel" id="registro">
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
                        <form class="login-form" method="POST" action="{{ route('login') }}" id="inicio" name="formulario">
                            {{ csrf_field() }}
                            <div class="social">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fa fa-facebook-f"></i>
                                    <label>Registrar con Facebook</label>
                                </button>
                                <button class="btn btn-icon btn-round btn-dribbble">
                                    <i class="fa fa-dribbble"></i>
                                    <label>Registrar con Google</label>
                                </button>                               
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr">Nombre de Identificación</label>
                                <input type="email" class="form-control"  name="user_email" value="{{old('user_email')}}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                           
                            <div class="form-group has-feedback">
                                <label for="usr">Usuaurio o Email</label>
                                <input type="email" class="form-control"  name="user_email" value="{{old('user_email')}}">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr">Contraseña</label>
                                <input type="password" class="form-control" name="password" ID="txtPassword" style="border-radius: 20px;">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="usr">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="confirm_password" ID="txtPassword" style="border-radius: 20px;">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-agn">ACCEDER</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <br>
                            <div class="justify-content-center">
                                <a href="javascript:;" onclick="toggle()">¿Perdiste tu Contraseña?</a>
                                <br>
                                {{--<a href="javascript:;" data-toggle="modal" data-target="#myModal" class="text-center">Registrar Licencia</a>--}}
                            </div>
                            <div class="form-check text-left">
                                <label class="form-check-label">
                                    <input class="form-check-input" name="agree_terms_and_conditions" type="checkbox">
                                    <span class="form-check-sign"></span>
                                        {{ __('Estoy de acuerdo con los') }}
                                    <a href="#something">{{ __('términos y condiciones') }}</a>.
                                </label>
                                @if ($errors->has('agree_terms_and_conditions'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('agree_terms_and_conditions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </form>            
                    </div>
                
                </div>
                
            </div>

        </div>
    </div>


</body>

{{-- llama a todo los script generales --}}
@include('layouts.include.script')

@stack('script')
</html>
