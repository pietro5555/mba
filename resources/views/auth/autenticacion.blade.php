@extends('layouts.auth')

@section('content')

    <div class="login-logo">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="" style="height: 170px;">
    </div>
    <!-- /.login-logo -->
    <div class="body">
    
    
    <div class="col-md-{{($mostrar == 0) ? '8' : '4'}} col-md-offset-{{($mostrar == 0) ? '2' : '4'}}">
	  <div class="box box-info">
        
		<div class="box-body">
		    
		    <form class="login-form" method="POST" action="{{ route('login.veri-2factor') }}">
		        {{ csrf_field() }}
		        
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
		        
		  <h4 class="login-box-msg"><strong>Inicio de Sesión</strong></h4>
		  
		  @if($mostrar == 0)      
		    <div class="col-md-4">
		        <img id="imgQR" src="{{$urlQR}}"/>
		    </div>
		  @endif
		    
		    
		    <div class="col-md-{{($mostrar == 0) ? '6' : '12'}}">
	
	@if($mostrar == 0)	        
	<div class="alert alert-info" role="alert">
    <h5>Escanee su codigo QR luego ingrese el codigo</h5>
    </div>
    @else
    <div class="alert alert-info" role="alert">
    <h5>Ingrese el codigo</h5>
    </div>
    @endif
		        <input name="iduser" type="hidden" value="{{$user->ID}}">
		        
		        <input type="text" name="codigo" class="form-control" placeholder="Codigo" required>
		        
		        
		  <div class="row">
                <div class="col-xs-12" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary btn-block btn-agn">Iniciar Sesión</button>
                </div>
            </div>
            
		    </div>  
		    
		    
		    
		    </form>
		    
		    </div>
		   </div>
		  </div>
		  
    </div>


@endsection