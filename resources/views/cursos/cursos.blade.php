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

    <div class="title-page-course col-md"><span class="text-white">
        <h3><span class="text-white">Hola</span><span class="text-primary"> {{$username}}</span><span class="text-white"> ¡Nos alegra verte hoy!</span></h3>
    </div>

    {{-- BANNER --}}
<div class="container-fluid banner-course">
    @foreach ($last_course as $ultimo)
    
<div class="button-container">

    <img src="{{ asset('uploads/images/courses/covers/'.$ultimo->cover) }}" class="course-banner-img" alt="..." height="550px" width= "1600px" class="img-fluid" />
     <button type="button" class="btn btn-primary play-course-button col-xs"><i class="fa fa-play"></i> CONTINUAR CURSO</button>
</div>

 <div class="container-fluid pl-0 pr-0 course-banner-caption">
    <div class="row">
        <div class="col-md-10">
            <h4 class="text-white text-uppercase ml-4">
                {{$ultimo->title}}
            </h4>
            <p class="col-md-8 description-course text-justify pl-0 ml-4">
                {{$ultimo->description}}
            </p>
            <div class="row">
                <div class="col-md-12 mb-2">
                <a href="{{ route('courses.show', [$ultimo->slug, $ultimo->course_id]) }}" class="btn btn-primary float-right text-uppercase mr-2"><i class="fa fa-play"></i> Continuar curso</a>
            </div>
            </div>
            
            
            <div class="progress col-xs progress-course-bar">
            <div class="progress-bar" role="progressbar" aria-valuenow="{{$ultimo->progress}}"
                aria-valuemin="0" aria-valuemax="100" style="width:{{$ultimo->progress}}%">
            </div>
</div>
        </div>
    </div>
</div>
@endforeach
</div>
    {{-- FIN DEL BANNER --}}

     {{-- SECCIÓN TUS CURSOS--}}
<div>
<div class="section-title-courses">Tus Cursos</div>
<hr style="border: 1px solid #707070;opacity: 1;" />
</div>

     <div class="container-fluid mt-2 p-2">
        
         <div class="card-deck">
            @foreach ($cursos as $curso)
             <div class="card mb-4">
                
                <img class="card-img-top" src="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" alt="card-image-cap" height="207px">
                <div class="card-body p-2">
                <div class="row align-items-start">
                    <h6 class="col-sm"><a href="{{ route('courses.show', [$curso->slug, $curso->id]) }}" class="text-secondary text-sm">{{$curso->title}}</a>
                    </h6>
                    
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
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
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
         </div>

     </div>
    {{-- FIN SECCIÓN TUS CURSOS--}}
{{-- SECCIÓN RECOMENDACIONES--}}
<div class="section-landing">
        
<div class="col">
        <h3><span class="text-primary">Recomendados,</span><span class="text-white"> según tus intereses.</span></h3>                   
</div>

<div class="row">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">

<div class="carousel-item active">
<div class="row">
@php
$contador =0;
@endphp
@foreach ($cursosRecomendados as $recommended)
@php
$contador++;
@endphp

@if($contador <= 3)

 <div class="col-md-4 mt-1">
   @if (!is_null($recommended->cover))
     <img src="{{ asset('uploads/images/courses/covers/'.$recommended->cover) }}" class="card-img-top carousel-image" alt="...">
    @else
        <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top carousel-image" alt="...">
    @endif
   <div class="card-img-overlay">
    <div><h5 class="card-title">{{$recommended->display_name}}</h5></div>
    <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  {{$recommended->title}}</h6>
            <h6 class="ml-4 subtitle-cat">{{$recommended->category->title}}</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">{{$recommended->views}}</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">{{$recommended->likes}}</p></i>
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
@foreach ($cursosRecomendados as $recommended)
@php
$segundo++;
@endphp

@if($segundo >= 4 && $segundo <= 6)

 <div class="col-md-4 mt-1">
    @if (!is_null($recommended->cover))
     <img src="{{ asset('uploads/images/courses/covers/'.$recommended->cover) }}" class="card-img-top carousel-image" alt="...">
    @else
        <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top carousel-image" alt="...">
    @endif
  
   <div class="card-img-overlay">
    <div><h5 class="card-title">{{$recommended->display_name}}</h5></div>
    <div class="row card-carousel-text">
        <div class="col-md-9">
            <h6 class="col-sm"><i class="text-success fa fa-play-circle"></i>  {{$recommended->title}}</h6>
            <h6 class="ml-4 subtitle-cat">{{$recommended->category->title}}</h6>
         </div>
        <div class="col-md-3">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">{{$recommended->views}}</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">{{$recommended->likes}}</p></i>
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
@foreach ($cursosRecomendados as $recommended)
@php
$tercero++;
@endphp

@if($tercero >= 7 && $tercero <= 9)

 <div class="col-md-4 mt-1">
    @if (!is_null($recommended->cover))
     <img src="{{ asset('uploads/images/courses/covers/'.$recommended->cover) }}" class="card-img-top carousel-image" alt="...">
    @else
        <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top carousel-image" alt="...">
    @endif
  
   <div class="card-img-overlay">
    <div><h5 class="card-title">{{$recommended->display_name}}</h5></div>
    <div class="row card-carousel-text">
        <div class="col-md-9">
            <h6 class="col-sm"><i class="text-success fa fa-play-circle"></i>  {{$recommended->title}}</h6>
            <h6 class="ml-4 subtitle-cat">{{$recommended->category->title}}</h6>
         </div>
        <div class="col-md-3">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">{{$recommended->views}}</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">{{$recommended->likes}}</p></i>
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

<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
<i class="fas fa-chevron-circle-left"></i>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
<i class="fas fa-chevron-circle-right"></i>
<span class="sr-only">Next</span>
</a>
</div>

</div>


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
                <button type="button" class="btn btn-outline-light btn-arrow btn-arrow-previous" @if ($previous == 0) disabled @endif data-route="{{ route('landing.load-more-courses-new', [$idStart, 'previous'] ) }}"  onclick="loadMoreCoursesNew('previous');"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-outline-success btn-arrow btn-arrow-next" @if ($next == 0) disabled @endif data-route="{{ route('landing.load-more-courses-new', [$idEnd, 'next'] ) }}"  onclick="loadMoreCoursesNew('next');"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
               
        <div class="row" style="padding: 10px 30px;">
            @foreach ($cursosNuevos as $cursoNuevo)
                <div class="col-xl-4 col-lg-4 col-12" style="padding-bottom: 10px;">
                    <div class="card" >
                        @if (!is_null($cursoNuevo->cover))
                            <img src="{{ asset('uploads/images/courses/covers/'.$cursoNuevo->cover) }}" class="card-img-top new-course-img" alt="..." height="462px" width="242px">
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top new-course-img" alt="..." height="462px" width="242px">
                        @endif
                        <div class="card-img-overlay d-flex flex-column">
                            <div class="mt-auto">
                                <div class="new-course-title"><a href="{{ route('courses.show', [$cursoNuevo->slug, $cursoNuevo->id]) }}" style="color: white;">{{ $cursoNuevo->title }}</a></div>
                                <div class="row">
                                    <div class="col-12 col-xl-6 new-course-category">{{ $cursoNuevo->category->title }}</div>
                                    <div class="col-12 col-xl-6" style="font-size: 16px;">
                                        <div class="row row-cols-3">
                                            <div class="col text-right no-padding-sides mr-2">

                                                <i class="far fa-user-circle"></i><br>
                                                <span class="new-course-items-text">{{$cursoNuevo->views}}</span>
                                            </div>
                                            <div class="col text-left no-padding-sides">
                                                <a href="#" class="text-white">
                                                    <i class="far fa-thumbs-up"></i>
                                                </a>
                                                <br>
                                                <span class="new-course-items-text">{{$cursoNuevo->likes}}</span>
                                            </div>
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
                            <a href="{{ url('courses/category/'.$course->id) }}" class="col-sm-lg text-sm-left  text-white" >{{$course->title}}</a>
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
<div class="section-landing">
    <div class="col-lg-6 offset-lg-3">
        <h4 class=" section-title-landing text-primary text-center">TUS MENTORES</h4>
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

                                <p class="card-text text-lg-right"><a href="{{ url('courses/mentor/'.$mentor->mentor_id) }}" class="col-sm-lg text-sm-left card-text" >Ver perfil</a>  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

</div>
</div>
 {{-- FIN SECCIÓN TUS MENTORES--}}
    
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