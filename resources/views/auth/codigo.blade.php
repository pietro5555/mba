@extends('layouts.auth')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="" style="height: 170px;">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        
        
   <div class="alert alert-info" role="alert">
    <h5>Por favor revise su correo electronico se le a enviado un codigo</h5>
    </div>
   

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
    
    <form class="login-form" method="POST" action="{{ route('login.veri-cod') }}" id="inicio" name="formulario">
            {{ csrf_field() }}
            <h4 class="login-box-msg"><strong>Inicio de Sesión</strong></h4>
            
            <input type="hidden" name="iduser" value="{{$user->ID}}">
            
            <input type="text" class="form-control" placeholder="Codigo" name="codigo">
            
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary btn-block btn-agn">Iniciar Sesión</button>
                </div>
                <!-- /.col -->
            </div>
            <br>
        </form> 
    </div>
</div>

@endsection