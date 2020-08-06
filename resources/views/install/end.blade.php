@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-box-body">
        <legend>
            <h3 class="text-center">Resumen de la instalación</h3>
        </legend>
        <h4>Nombre de Sistema: <strong>{{$inicio->name}}</strong></h4>
        <h4>Correo del Sistema: <strong>{{$inicio->site_email}}</strong></h4>
        <h4>Edad minima para entrar al Sistema: <strong>{{$inicio->edad_minino}}</strong></h4>
        <h4>Nombre del Admistrador: <strong>{{$user->display_name}}</strong></h4>
        <h4>Login del Administrador: <strong>{{$user->user_email}}</strong></h4>
        <h4>Clave del Administrador: <strong>{{$inicio->slogan}}</strong></h4>
        <hr>
        <a href="{{url('login')}}" class="btn btn-primary btn-block">Finalizar</a>
    </div>
</div>
@endsection