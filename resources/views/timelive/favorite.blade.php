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

<div class="col-md-12">
  <h2 class="text-white mt-5 mb-5">EVENTOS FAVORITOS</h2>
  @if(!empty($eventos_favoritos))
  <div class="container-fluid">
  <div class="row">
        @foreach ($eventos_favoritos as $favorito)
            <div class="col-md-3" style="margin-top: 20px;">
                @if (!is_null($favorito->image))
                <img src="{{ asset('uploads/images/banner/'.$favorito->image) }}" class="card-img-top" alt="..." style="height: 200px;"> 
                @else
                    <img src="{{ asset('uploads/images/banner/default.png') }}" class="card-img-top" alt="..." height="200px">
                @endif
                <div class="card-body" style="background-color: #2f343a;">
                    <h6 class="card-title text-white" style="margin-top: -15px;"> <i class="far fa-play-circle" style="font-size: 16px; color: #6fd843;"></i> {{ $favorito->title }}</h6>
                    <h6 class="text-secondary">   {{strftime("%d de %B",strtotime($favorito->date) )}}</h6>
                    <h6 class="text-right"><img src="{{ asset('images/icons/heart.svg') }}" alt="" height="20px" width="20px"></h6>
                </div>
            </div>
        @endforeach
</div>
</div>
 
  @else

<div><h5 class="mt-5 mb-5 text-primary">No se encontraron eventos favoritos</h5></div>

@endif 
</div>



<div class="col-md-12">
  <h2 class="text-white mt-5 mb-5">CURSOS FAVORITOS</h2>
  @if(!empty($cursos_favoritos))
  <div class="container-fluid">
  <div class="row">
        @foreach ($cursos_favoritos as $favorito)
            <div class="col-md-4 mt-1">
                    @if (!is_null($favorito->cover))
                    <img src="{{ asset('uploads/images/courses/covers/'.$favorito->cover) }}" class="card-img-top img-opacity" alt="..."> 
                    @else
                        <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top img-opacity" alt="...">
                    @endif
                   <div class="card-img-overlay ml-1 mr-1">
                        <div class="container-fluid">
                        <div class="row card-carousel-text mr-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9 p-0">
                                        <h6>
                                            <a href="{{ route('courses.show', [$favorito->slug, $favorito->id]) }}" class="text-white"><i class="text-success fa fa-play-circle"></i>{{ $favorito->title }}</a>
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="far fa-user-circle text-white"><p class="text-center text-white" style="font-size: 10px;">{{ $favorito->views }}</p></i>
                                            </div>
                                            <div class="col-md-6">
                                                <i class="far fa-thumbs-up text-white"><p class="text-center text-white" style="font-size: 10px;">{{ $favorito->likes }}</p></i>
                                            </div>
                                        </div>
                                                            
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <h6>
                                            <a href="{{ url('courses/category/'.$favorito->category_id) }}" class="subtitle-cat">{{$favorito->category->title}} </a>
                                        </h6>
                                    </div>
                                    <div class="col-md-2">

                                        <h6 class="text-right"><img src="{{ asset('images/icons/heart.svg') }}" alt="" height="20px" width="20px"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                   </div>
        @endforeach
</div>
</div>
@else

<div class="section-title-landing text-center"><h5 class="mt-5 mb-5">No se encontraron cursos favoritos</h5></div>

@endif 
</div>



  {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 " style="padding-left: 30px;">
                    <div style="text-align: center; font-size: 34px; color: white; font-weight: bold; border: solid #919191 1px; background-color: #222326; margin-bottom: 10px; height: 330px; padding: 120px 15px;">
                        <i class="fa fa-user"></i><br>
                        {{$directos}} Referidos
                    </div>
                   <a href="{{url('/admin')}}" style="text-decoration: none;"> 
                    <div style="text-align: center; font-size: 25px; color: white; font-weight: bold; background-color: #6AB742; height: 60px; padding: 10px 10px;">
                        Panel de referidos
                    </div>
                   </a> 
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
