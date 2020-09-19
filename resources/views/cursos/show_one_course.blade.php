@extends('layouts.landing')

@section('content')
   <div class="title-page-one_course col-md border-bottom-2"><span>
      <h6 class=""><span>Cursos > </span><span> {{ $curso->category->title }} ></span><span>{{ $curso->title }}</span></h6>
      <hr style="border: 1px solid #707070;opacity: 1;" />
   </div>

   {{-- BANNER --}}
   <div class="container-fluid">
      <video class="d-flex w-100" controls crossorigin playsinline poster="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" id="player">
         <!-- Video files -->
         <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576"/>
         <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720"/>
         <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080"/>
         <!-- Caption files -->
         <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default/>
         <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"/>

         <!-- Fallback for browsers that don't support the <video> element -->
         <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
      </video>
   </div>
   {{-- FIN DEL BANNER --}}
   <hr style="border: 1px solid #707070;opacity: 1;" />

   {{-- SECCIÓN ACERCA DEL CURSO--}}
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-8">
                  <h3 class="text-white">{{ $curso->title }}</h3>
               </div>
               <div class="col-md-4">
                  <button type="button" class="btn btn-success play-course-button col-xs"><i class="fa fa-play"></i> ACCEDER AL CURSO</button>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  @if (number_format($curso->promedio, 0) >= 1)
                     <i class="fa fa-star text-warning"></i>
                  @else
                     <i class="fa fa-star-o text-secondary"></i>
                  @endif
                  @if (number_format($curso->promedio, 0) >= 2)
                     <i class="fa fa-star text-warning"></i>
                  @else
                     <i class="fa fa-star-o text-secondary"></i>
                  @endif
                  @if (number_format($curso->promedio, 0) >= 3)
                     <i class="fa fa-star text-warning"></i>
                  @else
                     <i class="fa fa-star-o text-secondary"></i>
                  @endif
                  @if (number_format($curso->promedio, 0) >= 4)
                     <i class="fa fa-star text-warning"></i>
                  @else
                     <i class="fa fa-star-o text-secondary"></i>
                  @endif
                  @if (number_format($curso->promedio, 0) >= 5)
                     <i class="fa fa-star text-warning"></i>
                  @else
                     <i class="fa fa-star-o text-secondary"></i>
                  @endif

               </div>
            </div>
            <div class="row">
               <div class="col-md-12 mt-2">
                  <div class="row">
                     <div class="col-md-4">
                        <h6 class="text-white"> <img src="{{ asset('images/icons/icon-user.svg') }}" alt="" height="30px" width="30px">  1296 Alumnos</h6>
                     </div>
                     <div class="col-md-4">
                        <h6 class="text-white"> <img src="{{ asset('images/icons/icon-book-video.svg') }}" height="30px" width="30px"> {{ $curso->lessons_count }} Lecciones</h6>
                     </div>
                     <div class="col-md-4">
                        <h6 class="text-white"> <img src="{{ asset('images/icons/clock.svg') }}" height="30px" width="30px"> {{$curso->hours}}h {{$curso->minutes}}m {{$curso->seconds}}s</h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 mt-2">
                  <h6 class="text-white"><img src="{{ asset('images/icons/calendar.svg') }}" height="30px" width="30px">  Fecha de salida: {{ date('d-m-Y', strtotime($curso->created_at)) }}</h6>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid mt-4">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
                  <h4 class="text-white ml-5">ACERCA DEL CURSO</h4>
                  <hr style="border: 1px solid #707070; opacity: 1;" />
                  <div class="col-md-12">
                     <div class="col-md-12 justify-content-center p-2 ml-4" style="color: white;">
                        {!! $curso->description !!}

                        <div class="container-fluid pt-4">
                           <div class="row featurette">
                              <div class="col-md-7 order-md-2">
                                 <h5 class="featurette-heading text-white">Mentor</h5>
                                 <h3 class="featurette-heading text-primary">{{ $curso->mentor->display_name }}</h3>
                                 <h6 class="featurette-heading text-white">{{ $curso->mentor->profession }}</h6>
                                 <p class="lead about-course-text">{{ $curso->mentor->about }}</p>
                                 <a href="" class="text-primary">Ver perfil <i class=" fa fa-angle-right"> </i></a>
                              </div>
                              <div class="col-md-5 order-md-1">
                                 <img src="{{ asset('uploads/avatar/'.$curso->mentor->avatar) }}" alt="" class="featurette-image img-fluid mx-auto ml-2" width="409" height="370">
                              </div>
                           </div>
                        </div>
                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   {{-- FIN SECCIÓN ACERCA DEL CURSO--}}

   {{-- SECCIÓN LECCIONES--}}
   <div class="container-fluid pt-4">
      <div class="col-md-12 section-title-category">
         <h3 class="ml-4">LECCIONES</h3>
      </div>
      <hr style="border: 1px solid #707070;opacity: 1;" />
      
      <div class="col-md-10">
         <div class="full margin_bottom_30">
            <div class="accordion border_circle">
               <div class="bs-example">
                  <div class="panel-group" id="accordion">
                     @php $cont = 0; @endphp
                     @foreach ($curso->lessons as $leccion)
                        @php $cont++; @endphp
                        <div class="panel panel-default">
                           <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$leccion->id}}">
                              <div class="col-md-12 p-2 accordion-seccion-leccion align-items-center">
                                 <div class="row">
                                    <div class="col-md-2">
                                       <div class="cuadrado"><h2 class="text-white"> @if ($cont < 10) 0{{ $cont }} @else {{ $cont }} @endif</h2></div>
                                    </div>
                                    <div class="col-md-8">
                                       <p class="panel-title about-course-text"> <h5 class="about-course-text"> {{ $leccion->title }}</h5></p>
                                    </div>
                                    <div class="col-md-2">
                                       <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div id="collapse-{{$leccion->id}}" class="panel-collapse collapse in">
                              <div class="panel-body">
                                 <div class="row">
                                    <div class="col-md-12 m-2">
                                       <p class="about-course-text panel-title">{{ $leccion->description }}</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   {{-- FIN SECCIÓN LECCIONES--}}

   {{-- SECCIÓN VALORACIONES--}}
   @if ($curso->ratings_count > 0)
      <div class="container-fluid p-2 pt-5">
         <div class="row">
            <div class="col-md-10">
               <h3 class="text-white ml-5">VALORACIONES</h3>
               <hr style="border: 1px solid #707070;opacity: 1;" />
               @foreach ($curso->ratings as $valoracion)
                  <div class="row m-4 pt-4 border-bottom">  
                     <div class="col-md-2">
                        <div class="circle"><h2 class="text-white"> JD</h2></div>
                     </div>
                     <div class="col-md-8">
                        <div class="row">
                           <div class="col-md-12 mt-2">
                              <div class="row">
                                 <div class="col-md-4">
                                    <h5 class="text-white font-weight-bold">{{ $valoracion->user->display_name }}</h5>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    @if ($valoracion->points >= 1) 
                                       <i class="fa fa-star text-warning"></i> 
                                    @else
                                       <i class="fa fa-star-o text-secondary"></i>
                                    @endif
                                    @if ($valoracion->points >= 2) 
                                       <i class="fa fa-star text-warning"></i> 
                                    @else
                                       <i class="fa fa-star-o text-secondary"></i>
                                    @endif
                                    @if ($valoracion->points >= 3) 
                                       <i class="fa fa-star text-warning"></i> 
                                    @else
                                       <i class="fa fa-star-o text-secondary"></i>
                                    @endif
                                    @if ($valoracion->points >= 4) 
                                       <i class="fa fa-star text-warning"></i> 
                                    @else
                                       <i class="fa fa-star-o text-secondary"></i>
                                    @endif
                                    @if ($valoracion->points >= 5) 
                                       <i class="fa fa-star text-warning"></i> 
                                    @else
                                       <i class="fa fa-star-o text-secondary"></i>
                                    @endif
                                    <h6 class="text-secondary">{{ date('d-m-Y', strtotime($valoracion->date)) }}</h6>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-8">
                              <h6 class="text-secondary">{{ $valoracion->comment }}</h6>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   @endif
   {{-- FIN SECCIÓN VALORACIONES--}}
@endsection
