@extends('layouts.landing')

@section('content')
@if (Session::has('msj-exitoso'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>{{ Session::get('msj-exitoso') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::has('msj-erroneo'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong>{{ Session::get('msj-erroneo') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@if(!empty($cursos_favoritos))
<div>
  <h3 class="text-primary text-center mt-5 mb-5">CURSOS FAVORITOS</h3>
  
</div>
<div class="container-fluid">
  <div class="row">
        @foreach ($cursos_favoritos as $favorito)
            <div class="col-md-3" style="margin-top: 20px;">
                @if (!is_null($favorito->cover))
                <img src="{{ asset('uploads/images/courses/covers/'.$favorito->cover) }}" class="card-img-top" alt="..." style="height: 200px;"> 
                @else
                    <img src="{{ asset('uploads/images/courses/covers/default.png') }}" class="card-img-top" alt="..." height="200px">
                @endif
                <div class="card-body" style="background-color: #2f343a;">
                    <h6 class="card-title text-white" style="margin-top: -15px;"> <i class="far fa-play-circle" style="font-size: 16px; color: #6fd843;"></i> {{ $favorito->title }}</h6>
                    <h6 class="text-right"><img src="{{ asset('images/icons/heart.svg') }}" alt="" height="20px" width="20px"></h6>
                </div>
            </div>
        @endforeach
</div>
</div>
@else

<div class="section-title-landing text-center"><h3 class="mt-5 mb-5">NO SE ENCONTRARON FAVORITOS</h3></div>

@endif  




  {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 " style="padding-left: 30px;">
                    <div style="text-align: center; font-size: 34px; color: white; font-weight: bold; border: solid #919191 1px; background-color: #222326; margin-bottom: 10px; height: 330px; padding: 120px 15px;">
                        <i class="fa fa-user"></i><br>
                        739 Referidos
                    </div>
                    <div style="text-align: center; font-size: 25px; color: white; font-weight: bold; background-color: #6AB742; height: 60px; padding: 10px 10px;">
                        Panel de referidos
                    </div>
                </div>
                <div class="col-8" style=" background:url('http://localhost:8000/images/banner_referidos.png');">
                    <!--<img src="{{ asset('images/banner_referidos.png') }}" alt="" style="height: 400px; width:100%; opacity: 1; background: transparent linear-gradient(90deg, #2A91FF 0%, #2276D0A1 54%, #15498000 100%) 0% 0% no-repeat padding-box;">-->
                    <div style="font-size: 50px; width: 50%; padding: 80px 40px 80px 80px; color: white; line-height: 55px;">EL QUE QUIERE SUPERARSE, NO VE OBSTÁCULOS, VE SUEÑOS.</div>
                </div>
            </div>
        </div><br><br>
    @endif
    {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
@endsection
