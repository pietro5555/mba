@extends('layouts.install')

@section('content')
<div class="login-box">
    {{-- <div class="login-logo">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="">
    </div> --}}
    <div class="login-box-body">
        <form action="{{route('install-save-step1')}}" method="POST">
            {{ csrf_field() }}
            <legend>
                <h3 class="text-center">Primer paso de instalación</h3>
            </legend>
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
            <div class="form-group">
                <label for="">Servidor</label>
                <input type="text" required name="servidor" value="localhost" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Puerto</label>
                <input type="number" required name="puerto" value="3306" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nombre de la base de datos</label>
                <input type="text" required name="basedato" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Usuario de la base de datos</label>
                <input type="text" required name="usuario" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Contraseña de la base de datos</label>
                <input type="text" required name="clave" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-success col-sm-12">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection