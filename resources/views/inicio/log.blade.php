@extends('layouts.login.app')

@section('content')
        
<section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
        
                    <div class="brand">
                        <img src="{{ asset('assets/img/logo-light.png') }}">
                    </div>
                      <div class="card fat">
                        <div class="card-body">
                            
            @if (Session::has('msj'))
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span>
                {{Session::get('msj')}}
            </span>
        </div>
        @endif
        
      
                            <h4 class="card-title" style="text-align:center;">Iniciar Sesion</h4>
                            
                    <form method="POST" action="{{ route('login-envio') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label text-md-right">Email</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                            </div>
                        </div>

                        
                            
                                <button type="submit" class="btn btn-info btn-block">
                                    Iniciar Sesion
                                </button>
                            
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection