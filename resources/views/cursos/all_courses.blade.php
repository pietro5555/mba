@extends('layouts.landing')
@push('scripts')
    <script>
        function loadMoreCoursesNew($accion){
            if ($accion == 'next'){
                var route = $(".btn-arrow-next").attr('data-route');
            }else{
                var route = $(".btn-arrow-previous").attr('data-route');
            }

            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#new-courses-section").html(ans);
                }
            });
        }
    </script>
@endpush


@section('content')
    <div class="section-landing mt-3" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="col mb-4 mt-4">
            <div class="title-page-course col-md-12"><span class="text-white">
            <h2>Mis cursos</h2>
            </div>
        </div>


            @if ($cursos->count() > 0)
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

 <div class="carousel-inner">

  <div class="carousel-item active">
    <div class="row">

@php
$contador=0;
$total =0;
@endphp
@foreach($cursos as $recommended)
@php
$contador++;
$total++;
@endphp
@if($contador <= 3)
<div class="col-md-4" style="margin-top: 20px;">
  @if (!empty($recommended->thumbnail_cover))
 <img src="{{ asset('uploads/images/courses/covers/'.$recommended->thumbnail_cover) }}" class="card-img-top img-prox-events" alt="...">
 @else
 <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top img-prox-events" alt="...">
  @endif
 <div class="card-img-overlay clearfix">

<div class="row ml-0 d-flex h-100">
    <div class="col-md-9 my-auto" style="margin-bottom: 7px !important">
        <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><img src="{{ asset('images/icons/video-player-green.svg') }}" alt="" height="20px" width="20px"> <a href="{{ route('courses.show', [$recommended->slug, $recommended->id]) }}" class="text-white"> {{$recommended->title}}</a></h6>
    </div>
    <div class="col-md-3 my-auto" style="margin-bottom: 7px !important">
        <h6 class="text-white w-100">
            <i class="far fa-user-circle text-center">
                <p style="font-size: 10px;">{{ $recommended->users->count() }}</p>
            </i>
        </h6>
    </div>
</div>
</div>
 </div>
@endif
@endforeach
</div>
</div>

@if($total >= 4)
<div class="carousel-item">
    <div class="row">

@php
$segundo =0;
@endphp
@foreach($cursos as $recommended)
@php
$segundo++;
@endphp

@if($segundo >= 4 && $segundo <= 6)

<div class="col-md-4" style="margin-top: 20px;">
  @if (!is_null($recommended->thumbnail_cover))
 <img src="{{ asset('uploads/images/courses/covers/'.$recommended->thumbnail_cover) }}" class="card-img-top img-prox-events" alt="...">
 @else
 <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top img-prox-events" alt="...">
  @endif
<div class="card-img-overlay clearfix">

<div class="row ml-0 d-flex h-100">
    <div class="col-md-9 my-auto" style="margin-bottom: 7px !important">
        <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><img src="{{ asset('images/icons/video-player-green.svg') }}" alt="" height="20px" width="20px"> <a href="{{ route('courses.show', [$recommended->slug, $recommended->id]) }}" class="text-white"> {{$recommended->title}}</a></h6>
    </div>
    <div class="col-md-3 my-auto" style="margin-bottom: 7px !important">
        <h6 class="text-white w-100">
            <i class="far fa-user-circle text-center">
                <p style="font-size: 10px;">{{ $recommended->users->count() }}</p>
            </i>
        </h6>
    </div>
</div>
</div>
 </div>
@endif
@endforeach
</div>
</div>
<div class="carousel-item">
    <div class="row">

@php
$tercero =0;
@endphp
@foreach($cursos as $recommended)
@php
$tercero++;
@endphp

@if($tercero >= 7 && $tercero <= 9)

<div class="col-md-4" style="margin-top: 20px;">
  @if (!is_null($recommended->thumbnail_cover))
 <img src="{{ asset('uploads/images/courses/covers/'.$recommended->thumbnail_cover) }}" class="card-img-top img-prox-events" alt="...">
 @else
 <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top img-prox-events" alt="...">
  @endif
<div class="card-img-overlay clearfix">

<div class="row ml-0 d-flex h-100">
    <div class="col-md-9 my-auto" style="margin-bottom: 7px !important">
        <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><img src="{{ asset('images/icons/video-player-green.svg') }}" alt="" height="20px" width="20px"> <a href="{{ route('courses.show', [$recommended->slug, $recommended->id]) }}" class="text-white"> {{$recommended->title}}</a></h6>
    </div>
    <div class="col-md-3 my-auto" style="margin-bottom: 7px !important">
        <h6 class="text-white w-100">
            <i class="far fa-user-circle text-center">
                <p style="font-size: 10px;">{{ $recommended->users->count() }}</p>
            </i>
        </h6>
    </div>
</div>
</div>
 </div>
@endif
@endforeach
</div>
</div>
@endif

</div>

@if($total >= 3)
<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
<i class="fas fa-chevron-circle-left"></i>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
<i class="fas fa-chevron-circle-right"></i>
<span class="sr-only">Next</span>
</a>
@endif

</div>

@else
<div class="row">
  No se encontraron cursos recomendados...
</div>

@endif
<!--Carrusel-->
</div>




        {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
  @if (!Auth::guest())
        <div class="pt-4">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-12 pl-4 pr-4">
                    <div class="referrers-box">
                        <i class="fa fa-user referrers-icon" style="color: white;"></i><br>
                        {{ $refeDirec }} Referidos
                    </div>
                    <a href="{{url('/admin')}}" style="color: white; text-decoration: none;">
                     <div class="referrers-button">
                        Panel de referidos
                     </div>
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block d-xl-block referrers-banner">
                    <div class="referrers-banner-text">EL QUE QUIERE SUPERARSE, NO VE OBSTÁCULOS, VE SUEÑOS.</div>
                </div>
            </div>
        </div><br><br>
    @endif
    {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
@endsection
