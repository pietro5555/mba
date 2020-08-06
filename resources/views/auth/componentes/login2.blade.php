<div class="login-box" style="width: 380px;">
    <div class="col-md-12" style="background-color:white;">
        
        <div class="login-logo">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="" style="height: 120px;">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
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
        {{-- inicio de sesion --}}
        <form class="login-form" method="POST" action="{{ route('login') }}" id="inicio" name="formulario">
            {{ csrf_field() }}
            <h4 class="login-box-msg"><strong>Inicio de Sesión</strong></h4>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="user_email" value="{{old('user_email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon" style="border-radius: 20px;"> <span class="fa fa-eye-slash icon" onclick="mostrarPassword()"></span> </span>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" ID="txtPassword" style="border-radius: 20px;">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            </div> 
            
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-agn">Iniciar Sesión</button>
                </div>
                <!-- /.col -->
            </div>
            <br>
            <a href="javascript:;" onclick="toggle()">¿Se te olvidó tu contraseña?</a>
            <a href="{{$enlace}}" target="_black" style="float:right;">Ir a la web</a>
            <br>
            {{--<a href="javascript:;" data-toggle="modal" data-target="#myModal" class="text-center">Registrar Licencia</a>--}}
        </form>
        {{-- olvido contraseña --}}
        <form class="forget-form" action="{{route('autenticacion.clave')}}" method="post" style="display:none;"
            id="recuperar">
            {{ csrf_field() }}
            <h4 class="login-box-msg"><strong>Olvido su Contraseña</strong></h4>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="button" class="btn btn-danger btn-block btn-agn" onclick="toggle()">Regresar</button>
                </div>
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block">Restablecer Contraseña</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
 </div>
</div> 


{{-- modal de licencia --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registro de Licencia</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('autenticacion-save-licencia')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <label for="">Licencia</label>
                        <input type="text" class="form-control" name="licencia" placeholder="XXXXXXXXXXXXXXX">
                        <span class="fa fa-key form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Registrar Licencia</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>