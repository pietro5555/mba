@extends('layouts.auth')

@section('content')
<div class="user-login-5" style="">
    <div class="row bs-reset">
        <div class="col-md-12 login-container bs-reset mt-login-5-bsfix">
            <div class="page-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo-light.png') }}" alt="logo" class="logo-default" /> </a>
            </div>
        </div>
    </div>
</div>

<!-- formulario -->
<div class="row">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <form class="login-form" method="POST" action="{{ route('autenticacion-new-clave') }}">
                {{ csrf_field() }}
                <legend style="text-align:center;">Nueva Clave</legend>
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
                <input type="hidden" name="iduser" value="{{$iduser}}">
                <div class="col-md-6">
                    <label for="">Nuevo Clave</label>
                    <input class="form-control" type="password" autocomplete="off" placeholder="Nueva Clave"
                        name="password" required>
                </div>
                <div class="col-md-6">
                    <label for="">Confirmar Clave</label>
                    <input class="form-control" type="password" autocomplete="off" placeholder="Confirmar Clave"
                        name="password_confirmation" required>
                </div>
                <div class="col-xs-12 text-right">
                    <button class="btn btn-success btn-block" style="float:right;" type="submit">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection