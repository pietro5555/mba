@extends('layouts.auth')

@section('content')


<div class="login-box" style="width: 460px;">
    
    @if (Session::has('msj'))
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button>
            <span>
                {{Session::get('msj')}}
            </span>
        </div>
        @endif
        
    <div class="login-box-body">
            <form action="{{route('install-encript')}}" method="POST">
                    {{ csrf_field() }}
                    
                     <legend>
                        <h3 class="text-center">Registrar Licencia</h3>
                    </legend>
                    
                    <div class="form-group col-md-12">
                        <label for="">Licencia</label>
                        <input type="text" required name="licencia" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Fecha de la Licencia</label>
                        <input type="date" required name="fecha" class="form-control">
                    </div>
     
                    <hr>
                    
                    
                <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    
                </form>
    </div>
</div>                
                    
@endsection