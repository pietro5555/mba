@extends('layouts.landing')

@push('scripts')
    <script>
        function loadMoreCoursesNew($accion) {
            if ($accion == 'next') {
                var route = $(".btn-arrow-next").attr('data-route');
            } else {
                var route = $(".btn-arrow-previous").attr('data-route');
            }
            $.ajax({
                url: route,
                type: 'GET',
                success: function(ans) {
                    $("#new-courses-section").html(ans);
                }
            });
        }
    </script>
@endpush

@section('content')
    @if (Session::has('msj-exitoso'))
        <div class="alert alert-success" style="margin: 5px 15px;">
            {{ Session::get('msj-exitoso') }}
        </div>
    @endif

    @if (Session::has('msj-erroneo'))
        <div class="alert alert-danger" style="margin: 5px 15px;">
            {{ Session::get('msj-erroneo') }}
        </div>
    @endif
    
    @if (!Auth::guest())
        <div class="title-page-course col-md"><span class="text-white">
            <h3><span class="text-white">Hola</span><span class="text-primary"> {{$username}}</span><span class="text-white"> ¡Nos alegra verte hoy!</span></h3>
        </div>
    @endif

    {{-- BANNER --}}
    @if (!Auth::guest())
        @if(!is_null($last_course))
            <div class="banner-course">
                <div class="button-container">
                    <img src="{{ asset('uploads/images/courses/covers/'.$last_course->cover) }}" class="course-banner-img" alt="..." height="550px" width="1600px" class="img-fluid" />
                </div>
                <div class="pl-0 pr-0 course-banner-caption">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="text-white text-uppercase ml-4">
                                <a href="{{ route('courses.show', [$last_course->slug, $last_course->id]) }}" class="text-secondary text-sm">{{$last_course->title}}</a>
                            </h4>
                            {{-- <p class="col-md-6 description-course text-justify pl-0 ml-4">
                                {{$last_course->description}}
                            </p> --}}
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <a href="{{ route('courses.show', [$last_course->slug, $last_course->course_id]) }}" class="btn btn-primary float-right text-uppercase mr-2"><i class="fa fa-play"></i> Ver Curso</a>
                                </div>
                            </div>
                            {{-- <div class="progress col-xs progress-course-bar">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$last_course->progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$last_course->progress}}%">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    {{-- FIN DEL BANNER --}}

    {{-- SECCIÓN TUS CURSOS--}}
    @if (!Auth::guest())
        @if($cursos->isNotEmpty())
            <div>
                <div class="section-title-courses">Tus Cursos</div>
                <hr style="border: 1px solid #707070;opacity: 1;" />
            </div>

            <div class="container-fluid mt-2 p-2">
                
                <div class="wrapper">
                    @foreach ($cursos as $curso)
                    <div>
                        
                            <div class="card mb-4 card-courses">
                                <img class="card-img-top" src="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" alt="card-image-cap" height="207px">
                                <div class="card-body p-2">
                                    <div class="row align-items-start">
                                        <h6 class="col-sm"><a href="{{ route('courses.show', [$curso->slug, $curso->id]) }}" class="text-secondary text-sm">{{$curso->title}}</a></h6>
                                        <div class="col-3"><img src="{{ asset('images/icons/video-player-blue.svg') }}" alt="" height="20px" width="20px"></div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    @endforeach
                    <div class="">
                        <div class="row h-100">
                            <div class="col-sm-6 col-md-12 align-self-center">
                                <div class="card-block w-50 text-primary">
                                    <a href="{{ route('client.my-courses') }}" class="font-weight-bold">Ver todos mis cursos <i class="text-primary fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        @else
            <div class="title-page-course col-md">
                <span class="text-white">
                    <h4 class=""> {{$username}} <span class="text-white"> ¡No has agregado cursos!</span></h4>
                </span>
            </div>
        @endif
    @endif
    {{-- FIN SECCIÓN TUS CURSOS--}}

    {{-- SECCIÓN RECOMENDACIONES--}}

<div class="section-landing" style="background-color: #121317;">

    <div class="col">
            @if (Auth::guest())
                <h3><span class="text-primary">Recomendados</span></h3>
            @else
                <h3><span class="text-primary">Recomendados</span><span class="text-white"> según tus intereses.</span></h3>
            @endif
        </div>

<!--Carrusel-->

@if($total > 0)
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

 <div class="carousel-inner">
  
  <div class="carousel-item active">
    <div class="row">

@php
$contador=0;
@endphp
@foreach($cursosRecomendados as $recommended)
@php
$contador++;
@endphp

@if($contador <= 3)

<div class="col-md-4" style="margin-top: 20px;">
  @if (!is_null($recommended->mentor->avatar))
 <img src="{{ asset('uploads/avatar/'.$recommended->mentor->avatar) }}" class="card-img-top img-prox-events" alt="..." style="height: 320px;">
 @else
 <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top" alt="..." height="200px">
  @endif
 <div class="card-img-overlay clearfix">
<div>
    <h6 class="card-title" style="font-size: 14px">{{$recommended->mentor->display_name}}</h6>
</div>
<div class="row ml-0 d-flex h-100">
    <div class="col-md-9 my-auto" style="margin-bottom: 7px !important">
        <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><img src="{{ asset('images/icons/video-player-green.svg') }}" alt="" height="20px" width="20px"> <a href="{{ route('courses.show', [$recommended->slug, $recommended->id]) }}" class="text-white"> {{$recommended->title}}</a></h6>
        <h6 class="ml-2 text-white" style="font-size: 12px">
            {{$recommended->category->title}}
        </h6>
    </div>
    <div class="col-md-3 my-auto" style="margin-bottom: 7px !important">
        <h6 class="text-white w-100">
            <i class="far fa-user-circle text-center">
                <p style="font-size: 10px;">{{ $recommended->views }}</p>
            </i>
            <i class="far fa-thumbs-up text-center">
                <p style="font-size: 10px;">{{ $recommended->likes }}</p>
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
@foreach($cursosRecomendados as $recommended)
@php
$segundo++;
@endphp

@if($segundo >= 4 && $segundo <= 6)

<div class="col-md-4" style="margin-top: 20px;">
  @if (!is_null($recommended->mentor->avatar))
 <img src="{{ asset('uploads/avatar/'.$recommended->mentor->avatar) }}" class="card-img-top img-prox-events" alt="..." style="height: 320px;">
 @else
 <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top" alt="..." height="200px">
  @endif
<div class="card-img-overlay clearfix">
<div>
    <h6 class="card-title" style="font-size: 14px">{{$recommended->mentor->display_name}}</h6>
</div>
<div class="row ml-0 d-flex h-100">
    <div class="col-md-9 my-auto" style="margin-bottom: 7px !important">
        <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><img src="{{ asset('images/icons/video-player-green.svg') }}" alt="" height="20px" width="20px"> <a href="{{ route('courses.show', [$recommended->slug, $recommended->id]) }}" class="text-white"> {{$recommended->title}}</a></h6>
        <h6 class="ml-2 text-white" style="font-size: 12px">
            {{$recommended->category->title}}
        </h6>
    </div>
    <div class="col-md-3 my-auto" style="margin-bottom: 7px !important">
        <h6 class="text-white w-100">
            <i class="far fa-user-circle text-center">
                <p style="font-size: 10px;">{{ $recommended->views }}</p>
            </i>
            <i class="far fa-thumbs-up text-center">
                <p style="font-size: 10px;">{{ $recommended->likes }}</p>
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
@foreach($cursosRecomendados as $recommended)
@php
$tercero++;
@endphp

@if($tercero >= 7 && $tercero <= 9)

<div class="col-md-4" style="margin-top: 20px;">
  @if (!is_null($recommended->mentor->avatar))
 <img src="{{ asset('uploads/avatar/'.$recommended->mentor->avatar) }}" class="card-img-top img-prox-events" alt="..." style="height: 320px;">
 @else
 <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top" alt="..." height="200px">
  @endif
<div class="card-img-overlay clearfix">
<div>
    <h6 class="card-title" style="font-size: 14px">{{$recommended->mentor->display_name}}</h6>
</div>
<div class="row ml-0 d-flex h-100">
    <div class="col-md-9 my-auto" style="margin-bottom: 7px !important">
        <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><img src="{{ asset('images/icons/video-player-green.svg') }}" alt="" height="20px" width="20px"> <a href="{{ route('courses.show', [$recommended->slug, $recommended->id]) }}" class="text-white"> {{$recommended->title}}</a></h6>
        <h6 class="ml-2 text-white" style="font-size: 12px">
            {{$recommended->category->title}}
        </h6>
    </div>
    <div class="col-md-3 my-auto" style="margin-bottom: 7px !important">
        <h6 class="text-white w-100">
            <i class="far fa-user-circle text-center">
                <p style="font-size: 10px;">{{ $recommended->views }}</p>
            </i>
            <i class="far fa-thumbs-up text-center">
                <p style="font-size: 10px;">{{ $recommended->likes }}</p>
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

    {{--FIN SECCIÓN RECOMENDACIONES--}}


    {{-- SECCIÓN CURSOS MAS NUEVOS --}}
    @if ($cursosNuevos->count() > 0)
        <div class="section-landing new-courses-section" id="new-courses-section">
            <div class="row">
                <div class="col">
                    <div class="section-title-landing new-courses-section-title">LOS MÁS NUEVOS</div>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-outline-light btn-arrow btn-arrow-previous" @if ($previous==0) disabled @endif data-route="{{ route('landing.load-more-courses-new', [$idStart, 'previous'] ) }}" onclick="loadMoreCoursesNew('previous');"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-outline-success btn-arrow btn-arrow-next" @if ($next==0) disabled @endif data-route="{{ route('landing.load-more-courses-new', [$idEnd, 'next'] ) }}" onclick="loadMoreCoursesNew('next');"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>

            <div class="row" style="padding: 10px 30px;">
                @foreach ($cursosNuevos as $cursoNuevo)
                <div class="col-xl-4 col-lg-4 col-12" style="padding-bottom: 10px;">
                   <a href="{{ route('courses.show', [$cursoNuevo->slug, $cursoNuevo->id]) }}" style="text-decoration: none;background-color: transparent; color: white;">
                    <div class="card">
                        @if (!is_null($cursoNuevo->cover))
                        <img src="{{ asset('uploads/images/courses/covers/'.$cursoNuevo->cover) }}" class="card-img-top new-course-img" alt="..." height="462px" width="242px">
                        @else
                        <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top new-course-img" alt="..." height="462px" width="242px">
                        @endif
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="mt-auto">
                                <div class="new-course-title">{{ $cursoNuevo->title }}</div>
                                <div class="row">
                                    <div class="col-12 col-xl-6 new-course-category">{{ $cursoNuevo->category->title }}</div>
                                    <div class="col-12 col-xl-6" style="font-size: 16px;">
                                        <div class="row row-cols-3">
                                            <div class="col text-right no-padding-sides mr-2">

                                                <i class="far fa-user-circle"></i><br>
                                                <span class="new-course-items-text">{{$cursoNuevo->views}}</span>
                                            </div>
                                            <div class="col text-left no-padding-sides">
                                                    <i class="far fa-thumbs-up"></i>
                                                <br>
                                                <span class="new-course-items-text">{{$cursoNuevo->likes}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>
                @endforeach
            </div>
        </div>
    @endif
    {{-- FIN DE SECCIÓN CURSOS MÁS NUEVOS--}}


    {{-- SECCIÓN CURSOS POR CATEGORÍA --}}
    <div class="">
        <div class="container-fluid">
            <div class="col section-title-category">
                <h3>
                    CURSOS POR CATEGORÍA
                </h3>
            </div>
            <div class="row">
                @foreach ($courses as $course)
                    @if ($course->courses_count > 0)
                        <div class="col-sm-4 d-inline-flex p-2">
                            @if (!is_null($course->cover))
                                <img src="{{ asset('uploads/images/categories/covers/'.$course->cover) }}" class="card-img-top img-fluid course-category1" alt="...">
                            @else
                                <img src="{{ asset('uploads/images/categories/covers/default.png') }}" class="card-img-top img-fluid course-category1" alt="...">
                            @endif
                            <div class="course-category-caption ml-1 mr-1">
                                <div class="col-sm-lg text-sm-left font-weight-bold">
                                    <a href="{{ url('courses/category/'.$course->id) }}" class="col-sm-lg text-sm-left  text-white">{{$course->title}}</a>
                                </div>
                                <div class="col-lg">
                                    <p class="text-white font-weight-bold">{{$course->courses_count}} Cursos</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- FIN SECCIÓN CURSOS POR CATEGORÍA--}}

    {{-- SECCIÓN TUS MENTORES--}}
    @if (!Auth::guest())
        <div class="section-landing">
            <div class="col-lg-6 offset-lg-3">
                <h4 class=" section-title-landing text-primary text-center">MENTORES</h4>
            </div>
            <div class="container-fluid">
                <div class="mentor-index-seccion row d-flex flex-row p-2">
                    @foreach ($mentores as $mentor)
                    <div class="col-xs-12 mt-2">
                        <div class="card mentors-card">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <img src="{{ asset('uploads/avatar/'.$mentor->avatar)}}" class="" alt="" height="164px" width="164px">
                                </div>
                                <div class="col">
                                    <div class="card-block px-2">
                                        <h4 class="card-title mt-4">{{$mentor->nombre}}</h4>
                                        <p class="card-text">{{$mentor->categoria}}</p>
                                        <br>

                                        <p class="card-text text-lg-right"><a href="{{ url('courses/mentor/'.$mentor->mentor_id) }}" class="col-sm-lg text-sm-left card-text">Ver perfil</a> <i class=" fa fa-angle-right"> </i></p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endif
    {{-- FIN SECCIÓN TUS MENTORES--}}
@endsection