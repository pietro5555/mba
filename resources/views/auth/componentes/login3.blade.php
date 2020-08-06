<style>
.bg-color{
    background-color: #0000FF!important;
}
.pag{
    padding: 20px 20px;
}

input[type="email"]
{
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #0000FF;
}

input[type="password"]
{
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #0000FF;
}

hr {
  height: 1px;
  background-color: #eeefee;
}
</style>

<div class="col-md-12" style="margin-top:20px;">
    <div class="col-md-5 col-xs-12">
        <div class="card text-white bg-color" align="center">
           <img src="{{ asset('assets/img/logo-light.png') }}" alt="" style="height: 120px;">
        </div>
        <div class="card-body" style="background-color: white;">
            <div class="pag" id="inicio">
                
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
                
            <h2><strong>Inicio de Sesión</strong></h2>
            <h4><strong>¿Eres un nuevo usuario? </strong><a href="{{request()->root()}}/aut/register?ref=1" target="_black">Crear una cuenta</a></h4>
            
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                
                
             <div class="form-group has-feedback" style="margin-top:40px;">
                <label for="email" class="">Dirección de correo electrónico</label>
                <input type="email" class="form-control" placeholder="Dirección de correo electrónico" name="user_email" value="{{old('user_email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>    
                
             <div class="input-group">    
                <label for="password" class="">Contraseña</label>
                </div>
                
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon" style="border-radius: 20px;"> <span class="fa fa-eye-slash icon" onclick="mostrarPassword()"></span> </span>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="password" ID="txtPassword" style="border-radius: 20px;">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            </div> 
                
                <button type="submit" class="btn btn-primary btn-block" style="border-radius: 20px;">
                                    Iniciar Sesion
                </button>
                
                <hr>
                <a href="javascript:;" onclick="toggle()" class="btn btn-primary btn-block" style="border-radius: 20px;">¿Se te olvidó tu contraseña?</a>
                
                <a href="{{$enlace}}" target="_black" class="btn btn-success btn-block" style="border-radius: 20px;">Ir a la web</a>        
                
                
            </form>
            
            </div>
            
            {{-- olvido contraseña --}}
        <form class="forget-form" action="{{route('autenticacion.clave')}}" method="post" style="display:none;"
            id="recuperar">
            {{ csrf_field() }}
            <h4 class="login-box-msg"><strong>Olvido su Contraseña</strong></h4>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Direccion de correo" name="email">
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