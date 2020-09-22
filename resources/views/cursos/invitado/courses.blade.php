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
    
    <div class="title-page-course col-md"><span class="text-white">
        <h3><span class="text-white">Hola</span><span class="text-primary"> BIENVENIDO</span><span class="text-white"> ¡Nos alegra verte hoy!</span></h3>
    </div>

    {{-- BANNER --}}
<div class="container-fluid banner-course">
<div class="button-container">
    <img src="{{ asset('images/banner_cursos.png') }}" class="course-banner-img img-fluid" alt="..."/>
     <button type="button" class="btn btn-primary play-course-button col-xs"><i class="fa fa-play"></i> CONTINUAR CURSO</button>
</div>
<div class="course-banner-caption">
    <div class="row">
        <div class="col">
        <div class="title-course col-xl">NOMBRE DEL CURSO</div>
        <div class="description-course col-sm-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.</div>
        </div>
        
    </div>
   
    <br>
</div> 
<div class="progress col-xs progress-course-bar">
        <div class="progress-bar" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:70%">
        </div>
</div>
 

</div>
    {{-- FIN DEL BANNER --}}


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