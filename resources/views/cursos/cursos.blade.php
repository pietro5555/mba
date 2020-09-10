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
        <h3><span class="text-white">Hola</span><span class="text-primary"> {{$username}}</span><span class="text-white"> ¡Nos alegra verte hoy!</span></h3>
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

     {{-- SECCIÓN TUS CURSOS--}}
<div>
<div class="section-title-courses">Tus Cursos</div>
<hr style="border: 1px solid #707070;opacity: 1;" />
</div>

     <div class="container-fluid mt-2 p-2">

         <div class="card-deck">
             <div class="card mb-4">
                <img class="card-img-top img-fluid" src="{{ asset('images/preview-course1.png') }}" alt="Card image cap">
                <div class="card-body p-2">
                <div class="row align-items-start">
                    <div class="col-9">Curso número 1</div>
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
                </div>                     
            </div>
        </div>
        <div class="card mb-4">
            <img class="card-img-top img-fluid" src="{{ asset('images/preview-course2.png') }}" alt="Card image cap">
            <div class="card-body p-2">
                <div class="row align-items-start">
                    <div class="col-9">Curso número 2</div>
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
                </div>                     
            </div>
        </div>
        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
        <div class="card mb-4">
            <img class="card-img-top img-fluid" src="{{ asset('images/preview-course3.png') }}" alt="Card image cap">
            <div class="card-body p-2">
                <div class="row align-items-start">
                    <div class="col-9">Curso número 3</div>
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
                </div>                     
            </div>
        </div>
        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
        <div class="card mb-4">
            <img class="card-img-top img-fluid" src="{{ asset('images/preview-course4.png') }}" alt="Card image cap">
           <div class="card-body p-2">
                <div class="row align-items-start">
                    <div class="col-9">Curso número 4</div>
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
                </div>                     
            </div>
        </div>
        <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
         <div class="w-100 d-none d-lg-block d-xl-none"><!-- wrap every 4 on lg--></div>
        <div class="">
            <div class="row h-100">
                <div class="col-sm-12 align-self-center">
                    <div class="card-block w-50 mx-auto text-primary">Ver todos mis cursos <i class="text-primary fa fa-arrow-right"></i></div>
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

 <div class="col-md-4 mt-1">
   <img src="{{ asset('images/img-recommended1.png') }}" class="card-img-top carousel-image" alt="...">
   <div class="card-img-overlay">
    <div><h5 class="card-title">Nombre Apellido</h5></div>
    <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  Nombre del curso</h6>
            <h6 class="ml-4 subtitle-cat">Categoría</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">346</p></i>
                <i class="fas fa-share-alt"><p style="font-size: 10px;">862</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">1243</p></i>
            </h6>           
        </div>
    </div>
    </div>
   </div>

  <div class="col-md-4 mt-1">
   <img src="{{ asset('images/img-recommended2.png') }}" class="card-img-top" alt="..." style="height: 320px;">
   <div class="card-img-overlay">
    <div><h5 class="card-title">Nombre Apellido</h5></div>
      <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  Nombre del curso</h6>
            <h6 class="ml-4 subtitle-cat">Categoría</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">346</p></i>
                <i class="fas fa-share-alt"><p style="font-size: 10px;">862</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">1243</p></i>
            </h6>           
        </div>
    </div>
    </div>
   </div>

  <div class="col-md-4 mt-1">
   <img src="{{ asset('images/img-recommended3.png') }}" class="card-img-top" alt="..." style="height: 320px;">
   <div class="card-img-overlay">
      <div><h5 class="card-title">Nombre Apellido</h5></div>
      <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  Nombre del curso</h6>
            <h6 class="ml-4 subtitle-cat">Categoría</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">346</p></i>
                <i class="fas fa-share-alt"><p style="font-size: 10px;">862</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">1243</p></i>
            </h6>           
        </div>
    </div>
    </div>
   </div>

</div>
</div>



<div class="carousel-item">
<div class="row">

 <div class="col-md-4 mt-1">
   <img src="{{ asset('images/img-recommended4.png') }}" class="card-img-top" alt="..." style="height: 320px;">
   <div class="card-img-overlay">
      <div><h5 class="card-title">Nombre Apellido</h5></div>
      <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  Nombre del curso</h6>
            <h6 class="ml-4 subtitle-cat">Categoría</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">346</p></i>
                <i class="fas fa-share-alt"><p style="font-size: 10px;">862</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">1243</p></i>
            </h6>           
        </div>
    </div>
    </div>
  </div>

  <div class="col-md-4 mt-1">
   <img src="{{ asset('images/img-recommended5.png') }}" class="card-img-top" alt="..." style="height: 320px;">
   <div class="card-img-overlay">
      <div><h5 class="card-title">Nombre Apellido</h5></div>
      <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  Nombre del curso</h6>
            <h6 class="ml-4 subtitle-cat">Categoría</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">346</p></i>
                <i class="fas fa-share-alt"><p style="font-size: 10px;">862</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">1243</p></i>
            </h6>           
        </div>
    </div>
    </div>
   </div>

  <div class="col-md-4 mt-1">
   <img src="{{ asset('images/img-recommended6.png') }}" class="card-img-top" alt="..." style="height: 320px;">
   <div class="card-img-overlay">
      <div><h5 class="card-title">Nombre Apellido</h5></div>
      <div class="row card-carousel-text">
        <div class="col-xl-auto">
            <h6><i class="text-success fa fa-play-circle"></i>  Nombre del curso</h6>
            <h6 class="ml-4 subtitle-cat">Categoría</h6>
         </div>
        <div class="col-xl-auto">
            <h6>
                <i class="far fa-user-circle"><p style="font-size: 10px;">346</p></i>
                <i class="fas fa-share-alt"><p style="font-size: 10px;">862</p></i>
                <i class="far fa-thumbs-up"><p style="font-size: 10px;">1243</p></i>
            </h6>           
        </div>
    </div>
    </div>
   </div>

</div>
</div>
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
                            <img src="{{ asset('uploads/images/courses/covers/'.$cursoNuevo->cover) }}" class="card-img-top new-course-img" alt="...">
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top new-course-img" alt="...">
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


   

 
 {{-- SECCIÓN CURSOS POR CATEGORÍA --}}
 <div class="">
    <div class="container-fluid">
        <div class="col section-title-category">CURSOS POR CATEGORÍA
        </div>
        <!--<div class="row">
            @foreach ($courses as $course)
               <div class="col-4 mb-2">   
                     @if (!is_null($course->cover))
                            <img src="{{ asset('uploads/images/categories/covers/'.$course->cover) }}" class="card-img-top img-fluid course-category4" alt="...">
                        @else
                            <img src="{{ asset('uploads/images/categories/covers/default.png') }}" class="card-img-top img-fluid course-category4" alt="...">
                        @endif
                <div class="course-category-caption">
                        <div class="col">
                            <a href="#" class="text-white">{{$course->title}}</a>
                        </div>
                        <div class="col">
                        <h5>{{$course->courses_count}} Cursos</h5>
                        </div>
                </div>
                </div>
                
            @endforeach
        </div>-->
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
                            <a href="{{ url('cursos/category/'.$course->id) }}" class="col-sm-lg text-sm-left  text-white" >{{$course->title}}</a>
                        </div>
                        <div class="col-lg">
                        <a href="" class="text-white font-weight-bold">{{$course->courses_count}} Cursos</a>
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
        <div class="row d-flex flex-row p-2">
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor1.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor2.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row d-flex flex-row p-2">
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor4.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor5.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor6.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex flex-row p-2">
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor7.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor8.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor9.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex flex-row p-2">
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor10.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor11.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 mt-2">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor12.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <h4 class="card-title mt-4">Nombre Apellido</h4>
                                <p class="card-text">Categoría</p>
                                <br>
                                <p class="card-text text-lg-right">Ver perfil  <i class=" fa fa-angle-right"> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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