@extends('layouts.landing')

@push('styles')
   <style>
      input[type="radio"] {
         display: none;
      }
      label {
         color: grey;
      }
      .rating {
         direction: rtl;
         unicode-bidi: bidi-override;
      }
      label:hover,
      label:hover ~ label {
         color: orange;
      }
      input[type="radio"]:checked ~ label {
         color: orange;
      }
   </style>
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
               <div class="col-md-9">
                  <h3 class="text-white">{{ $curso->title }}</h3>
                  <div>
                     @if (number_format($curso->promedio, 0) >= 1)
                        <i class="fa fa-star text-warning"></i>
                     @else
                        <a href="#ratingModal" data-toggle="modal"><i class="fa fa-star-o text-secondary"></i></a>
                     @endif
                     @if (number_format($curso->promedio, 0) >= 2)
                        <i class="fa fa-star text-warning"></i>
                     @else
                       <a href="#ratingModal" data-toggle="modal"><i class="fa fa-star-o text-secondary"></i></a>
                     @endif
                     @if (number_format($curso->promedio, 0) >= 3)
                        <i class="fa fa-star text-warning"></i>
                     @else
                        <a href="#ratingModal" data-toggle="modal"><i class="fa fa-star-o text-secondary"></i></a>
                     @endif
                     @if (number_format($curso->promedio, 0) >= 4)
                        <i class="fa fa-star text-warning"></i>
                     @else
                        <a href="#ratingModal" data-toggle="modal"><i class="fa fa-star-o text-secondary"></i></a>
                     @endif
                     @if (number_format($curso->promedio, 0) >= 5)
                        <i class="fa fa-star text-warning"></i>
                     @else
                     <a href="#ratingModal" data-toggle="modal"><i class="fa fa-star-o text-secondary"></i></a>
                        
                     @endif
                  </div>
               </div>

               @if ( (Auth::guest()) || (is_null($progresoCurso)) )
                  <div class="col-md-3 text-center">
                     <h5 class="text-white">COSTO</h5>
                     <h2 class="text-success">{{ $curso->price }} USD</h2>
                  </div>
               @endif
            </div>

            <div class="row">
               <div class="col-md-9 mt-2">
                  <div class="row">
                     <div class="col-md-4">
                        <h6 class="text-white"> <img src="{{ asset('images/icons/icon-user.svg') }}" alt="" height="30px" width="30px">  {{ $curso->users_count }} Alumnos</h6>
                     </div>
                     <div class="col-md-4">
                        <h6 class="text-white"> <img src="{{ asset('images/icons/icon-book-video.svg') }}" height="30px" width="30px"> {{ $curso->lessons_count }} Lecciones</h6>
                     </div>
                     <div class="col-md-4">
                        <h6 class="text-white"> 
                           <img src="{{ asset('images/icons/clock.svg') }}" height="30px" width="30px">
                           @if ($curso->duration > 0)
                              {{ $curso->hours }}h {{ $curso->minutes }}m
                           @else
                              0h 0m
                           @endif
                        </h6>
                     </div>
                     <div class="col-md-4 mt-2">
                        <h6 class="text-white"><img src="{{ asset('images/icons/calendar.svg') }}" height="30px" width="30px">  Fecha de salida: {{ date('d-m-Y', strtotime($curso->created_at)) }}</h6>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 mt-2 text-center">
                  @if (Auth::guest())
                     <a href="{{route('shopping-cart.store', [$curso->id])}}" class="btn btn-success play-course-button btn-block" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> AGREGAR AL CARRITO</a>
                  @else
                     @if (is_null($progresoCurso))
                        @if (is_null(Auth::user()->membership_id))
                           <a href="{{route('shopping-cart.store', [$curso->id])}}" class="btn btn-success play-course-button btn-block" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> AGREGAR AL CARRITO</a>
                        @else
                        <a href="{{route('client.courses.add', $curso->id)}}" class="btn btn-success play-course-button btn-block" ><i class="fa fa-plus-circle" aria-hidden="true"></i> AGREGAR A MIS CURSOS</a>
                        @endif
                     @else
                     <a href="#" data-toggle="modal" class="btn btn-info play-course-button btn-block"><i class="fa fa-list"></i> VER LECCIONES</a>
                        @if (is_null($miValoracion))
                           <a href="#ratingModal" data-toggle="modal" class="btn btn-info play-course-button btn-block"><i class="fa fa-star"></i> VALORAR</a>
                        @endif
                        @if ($progresoCurso->certificate == 1)
                           <a href="{{ route('client.courses.get-certificate', $curso->id) }}" class="btn btn-primary play-course-button btn-block"><i class="fas fa-certificate"></i> OBTENER CERTIFICADO</a>
                        @else
                           @if (!is_null($curso->evaluation))
                              <a href="{{ route('client.courses.take-evaluation', [$curso->slug, $curso->id]) }}" class="btn btn-primary play-course-button btn-block"><i class="far fa-file-alt"></i> PRESENTAR EVALUACIÓN</a>
                           @endif   
                        @endif
                     @endif
                  @endif
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
                  <h4 class="text-white ml-5">ACERCA DEL CURSO </h4>
                  <hr style="border: 1px solid #707070; opacity: 1;" />
                  <div class="col-md-12">
                     <div class="col-md-12 justify-content-center p-2 ml-4" style="color: white;">
                        {!! $curso->description !!}

                        <div class="container-fluid pt-4">
                           <div class="row featurette">
                              <div class="col-md-9 order-md-2">
                                 <h5 class="featurette-heading text-white">Mentor</h5>
                                 <h3 class="featurette-heading text-primary">{{ $curso->mentor->display_name }}</h3>
                                 <h6 class="featurette-heading text-white">{{ $curso->mentor->profession }}</h6>
                                 <p class="lead about-course-text">{{ $curso->mentor->about }}</p>
                                 <a href="#" class="text-primary">Ver perfil <i class=" fa fa-angle-right"> </i></a>
                              </div>
                              <div class="col-md-3 order-md-1">
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
   <div class="container-fluid pt-4 pb-4">
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
                                       <h5 class="panel-title about-course-text"> <a href="{{ route('lesson.show', [$leccion->slug, $leccion->id, $curso->id]) }}" class="about-course-text">{{ $leccion->title }}</a></h5>
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

   <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" style="background-color: black;">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Valorar Curso</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="{{ route('client.courses.rate') }}" method="POST">
               @csrf
               <input type="hidden" name="course_id" value="{{ $curso->id }}">
               <input type="hidden" name="course_slug" value="{{ $curso->slug }}">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="comment" style="color: white;">Comentario</label>
                     <textarea class="form-control" name="comment" id="comment" rows="3" style="background-color: #1C1D21;" required></textarea>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-4">
                           <label for="comment" style="color: white;">Puntuación</label>
                        </div>
                        <div class="col-8 text-right"> 
                           <p class="rating text-right">
                              <input id="radio1c" type="radio" name="points" value="5"><label for="radio1c"><i class="fa fa-star"></i></label>
                              <input id="radio2c" type="radio" name="points" value="4"><label for="radio2c"><i class="fa fa-star"></i></label>
                              <input id="radio3c" type="radio" name="points" value="3"><label for="radio3c"><i class="fa fa-star"></i></label>
                              <input id="radio4c" type="radio" name="points" value="2"><label for="radio4c"><i class="fa fa-star"></i></label>
                              <input id="radio5c" type="radio" name="points" value="1"><label for="radio5c"><i class="fa fa-star"></i></label>
                           </p>
                        </div>
                     </div>
                  </div> 
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Valorar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection