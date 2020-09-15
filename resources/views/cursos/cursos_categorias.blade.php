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
    <div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="col mb-2">
            <div class="title-page-course col-md text-center"><span class="text-white">
            <h3><span class="text-white">Cursos sobre</span><span class="text-primary"> "{{$category_name->title}}"</span></h3>
            </div>
        </div>     
             
        <div class="row">
            @if ($courses->count() > 0)
                @foreach ($courses as $curso)
                    <div class="col-md-3" style="margin-top: 20px;">
                        @if (!is_null($curso->cover))
                        <img src="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" class="card-img-top" alt="..." style="height: 200px;"> 
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top" alt="..." height="200px">
                        @endif
                        <div class="card-body" style="background-color: #2f343a;">
                            <h6 class="card-title" style="margin-top: -15px;"> <i class="far fa-play-circle" style="font-size: 16px; color: #6fd843;"></i> {{ $curso->title }}</h6>
                
                            <h6 style="font-size: 10px; margin-left: 20px; margin-top: -10px;">{{ $curso->category->title }} ({{ $curso->subcategory->title }})</h6>
                
                            <h6 align="right" style="margin-bottom: -20px;"> 
                                <i class="icon fa fa-eye text-right" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">{{$curso->views}}</p></i>
                                <i class="far fa-comment-alt" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">346</p></i>
                                <i class="fas fa-share-alt" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">{{$curso->shares}}</p></i>
                                <i class="far fa-thumbs-up" style="font-size: 16px;"><p style="font-size: 10px;">{{$curso->likes}}</p></i>
                            </h6>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="container-fluid">
                <h3>
                    No se encontraron cursos relacionados con la búsqueda...
                </h3>
            </div>
                
            @endif
        </div>
    </div>


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
                                <div class="new-course-title">{{ $cursoNuevo->title }}</div>
                                <div class="row">
                                    <div class="col-12 col-xl-6 new-course-category">{{ $cursoNuevo->category->title }}</div>
                                    <div class="col-12 col-xl-6" style="font-size: 16px;">
                                        <div class="row row-cols-3">
                                            <div class="col text-right no-padding-sides">

                                                <i class="far fa-user-circle"></i><br>
                                                <span class="new-course-items-text">{{$cursoNuevo->views}}</span>
                                            </div>
                                            <div class="col text-center no-padding-sides">
                                                <i class="fas fa-share-alt"></i><br>
                                                <span class="new-course-items-text">{{$cursoNuevo->shares}}</span>
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




 {{-- SECCIÓN TUS MENTORES--}}
<div class="section-landing">
    <div class="col-lg-6 offset-lg-3">
        <h4 class=" section-title-landing text-primary text-center">TUS MENTORES</h4>
    </div>
    <div class="container-fluid">
        <div class="row d-flex flex-row p-2">
            @foreach ($mentores as $mentor)
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('uploads/images/avatar/'.$mentor->avatar) }}" class="" alt="" height="164px" width="164px">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">{{$mentor->nombre}}</h4>
                                <p class="card-text">{{$mentor->categoria}}</p>
                                <br>
                                <p class="card-text text-lg-right"><a href="{{ url('cursos/mentor/'.$mentor->mentor_id) }}" class="col-sm-lg text-sm-left card-text" >Ver perfil</a>  <i class=" fa fa-angle-right"> </i></p>
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