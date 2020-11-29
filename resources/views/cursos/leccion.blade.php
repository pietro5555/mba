@extends('layouts.landing')

@push('styles')
  <style>
    .circular--square {
        width: 5rem;
        height: 5rem;
      border-radius: 50%;
    }
  </style>
@endpush


@section('content')
    <input type="hidden" id="membership_id" value="{{Auth::user()->membership_id}}" />
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

    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-md-6 mt-2"><h5 class="text-white">@if ($progresoCurso->language == 'es') {{$lesson->title}} @else {{$lesson->english_title}} @endif</h5></div>

            <div class="col-xs-1 col-md-2 mt-2">
                @if ($progresoCurso->language == 'es')
                    <a href="{{ route('course.change-language', [$lesson->course_id, 'en', $lesson->id]) }}">
                        <h5 style="padding: 10px 10px; background-color: #007bff;color: #fff;text-align: center;">
                            <small>
                                <strong>Continuar en Inglés</strong>
                             </small>
                        </h5>
                    </a>
                @else
                    <a href="{{ route('course.change-language', [$lesson->course_id, 'es', $lesson->id]) }}">
                        <h5 style="padding: 10px 10px;background-color: #007bff;color: #fff;text-align: center;">
                            <small>
                                <strong>Continuar en Español</strong>
                             </small>
                        </h5>
                    </a>
                @endif
            </div>

            <div class="col-xs-1 col-md-2 mt-2">
                @switch( $lesson->subcategory_id)
                    @case(1)
                        <h5 style="padding: 10px 10px;background-color: #BF4040;color: #fff;text-align: center;">
                          <small>
                            <strong>Principiante</strong>
                          </small>
                        </h5>
                    @break
                    @case(2)
                        <h5 style="padding: 10px 10px;background-color: #B9AA1D;color: #fff;text-align: center;">
                          <small>
                            <strong>Básico</strong>
                          </small>
                        </h5>
                    @break
                    @case (3)
                        <h5 style="padding: 10px 10px;background-color: #A5D6E5;color: #fff;text-align: center;">
                          <small>
                            <strong>Intermedio</strong>
                          </small>
                        </h5>
                    @break
                    @case (4)
                        <h5 style="padding: 10px 10px;background-color: #9C4F9D;color: #fff;text-align: center;">
                          <small>
                            <strong>Avanzado</strong>
                          </small>
                        </h5>
                    @break
                    @case (5)
                        <h5 style="padding: 10px 10px;background-color: #3B053C;color: #fff;text-align: center;">
                          <small>
                            <strong>Pro</strong>
                          </small>
                        </h5>
                    @break
                @endswitch
            </div>


            <div class="col-xs-1 col-md-2 text-center mt-2 ">
                <div class="icon-social-media">
                    <a href="https://m.facebook.com/MyBusinessAcademyPro/" target="_blank" class="btn btn-social-icon btn-facebook btn-rounded ml-2 mr-2"><img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px"></a>
                    <a href="https://twitter.com/GlobalMBApro" class="btn btn-social-icon btn-twitter btn-rounded ml-2 mr-2" target="_blank"><img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px"></a>
                    <a href="https://instagram.com/mybusinessacademypro?igshid=tdj5prrv1gx1" target="_blank" class="btn btn-social-icon btn-instagram btn-rounded ml-2 mr-2"><img src="{{ asset('images/icons/instagram.svg') }}" height="20px" width="20px"></a>
                </div>
            </div>
        </div>
    </div>

  {{-- BANNER --}}
  <div id="lessonsCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">
      @php $ending = 0; $cont = 1; @endphp
      @foreach ($all_lessons as $leccion)
        <div class="carousel-item @if ($leccion->id == $lesson->id) active @endif">

        @if ($progresoCurso != null)
          <div class="video-container">
            <iframe @if ($progresoCurso->language == 'es') src="{{ $leccion->url }}" @else src="{{ $leccion->english_url }}" @endif width="100%" height="590" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
          </div>
        </div>
        @endif
        @if ($leccion->id <= $lesson->id)
            @php
                if ($cont >= count($all_lessons) ){
                  $ending = 1;
                }else{
                  $cont++;
                }
            @endphp
        @endif
          @if ($leccion->id > $lesson->id)
            @if ($leccion->id == ($lesson->id + 1))
              <a id="nextlesson" class="d-none" href="{{ route('lesson.show', [$leccion->slug, $leccion->id, $leccion->course_id]) }}">Siguiente</a>
            @endif
          @else
            @if ($leccion->id == $lesson->id && $ending == 1)
              <a id="nextlesson" class="d-none" href="{{ route('client.courses.take-evaluation', [$lesson->course->slug, $lesson->course_id]) }}">Evaluacion</a>
            @endif
          @endif
      @endforeach
    </div>
    <!--<div class="">
      <a class="btn-prev text-white" href="#lessonsCarousel" role="button" data-slide="prev">Anterior</a>
    </div>
    <div>
      <a class="btn-next text-white" href="#lessonsCarousel" role="button" data-slide="next">Siguiente</a>
    </div>-->
    <!--<div class="btn-play-video">
      <i class="fa fa-play-circle text-primary"></i>
    </div>-->
  </div>
{{-- FIN DEL BANNER --}}
{{-- SECCIÓN Tabs Leccion--}}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mt-2">
      <div class="row">
        <div class="col-md-8">
          <nav>
            <div class="nav nav-tabs nav-fill font-weight-bold" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active m-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Acerca del Curso</a>
              <a class="nav-item nav-link m-2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Comentarios</a>
              @if ($lesson->course->materials->isNotEmpty())
                <a class="nav-item nav-link m-2" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Materiales</a>
              @endif

              @if ($certificar)
              <a class="nav-item nav-link m-2" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Certificado</a>
              @endif
            </div>
          </nav>
          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              {!!$lesson->course->description!!}
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <div class="custombox clearfix">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="comments-list">
                      <div class="media">
                        <a class="media-left" href="#">
                          <div class="col-md-2">
                            <div class="perfil-comments">
                              <img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" alt="" class="circular--square" >
                            </div>
                          </div>
                        </a>
                        <div class="media-body align-items-center">
                          <div class="col-12 box-comments d-flex">
                            <form class="form-inline" id="store_comment_form">
                                @csrf
                                <!--<input type="hidden" name="lesson_slug" value="{{ $lesson->slug}}">
                                <input type="hidden" name="course_id" value="{{ $lesson->course->id}}">-->
                                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                <input type="text" class="form-control" placeholder="Escribe tu comentario" name="comment" id="comment" required>
                                <a class="btn btn-outline-success mt-2 ml-2" onclick="newComment();" id="store_comment_submit">Enviar</a>
                                <button class="btn btn-success" type="button" disabled id="store_comment_loader" style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Espere...
                                </button>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div><!-- end col -->
                </div><!-- end row -->
              </div><!-- end custom-box -->
                <div id="comments_section">
                  @foreach ($all_comments as $comment)
                    <div class="custombox clearfix mt-4 pb-4 border-bottom">
                      <div class="row">
                        <div class="col-lg-12">

                          <div class="comments-list">
                            <div class="media">
                              <a class="media-left" href="#">
                                <div class="col-md-2">
                                  <img src="{{ asset('uploads/avatar/'.$comment->user->avatar) }}" alt="" class="circular--square" >
                                </div>
                              </a>

                              <div class="media-body">
                                <h4 class="media-heading text-white">{{ $comment->user->display_name }}</h4>
                                <small class="media-heading about-course-text">{{str_replace('-', '/', date('d-m-Y', strtotime($comment->date)))}}</small>
                                <p class="about-course-text">
                                  {{$comment->comment}}
                                </p>
                                <!--<p class="about-course-text float-right mr-4">
                                  <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>

                                </p>-->

                              </div>

                            </div>
                          </div>

                        </div><!-- end col -->
                      </div><!-- end row -->
                    </div>
                  @endforeach
                </div>
              <!-- end custom-box -->
            </div>
            <div class="tab-pane fade pl-5 pr-5" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

              <div class="container">

              <div class="row">
               @foreach ($lesson->course->materials as $material)
                  <div class="col-md-6 mt-2">
                    <h5 style="background-color: #27282C; padding: 10px 20px; color: #007bff;">{{ $material->title }}</h5>
                    <div class="row">
                      <div class="col-md-6">
                        @if (!is_null($material->image))
                            <img src="{{ asset('uploads/courses/lessons/materials/images/'.$material->image) }}">
                        @else
                            <img src="{{ asset('uploads/courses/lessons/materials/images/download-image.png') }}" style="widht: 80px; height: 80px;">
                        @endif
                      </div>
                      <div class="col-md-6 text-right">
                            <a  @if ($material->type == 'Archivo') href="{{ asset('uploads/courses/lessons/materials/'.$material->material) }}" @else href="{{ $material->material }}" @endif target="_blank">
                                    <img src="{{ asset('uploads/courses/lessons/materials/images/download-image.png') }}" style="widht: 50px; height: 50px;">
                            </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
              @if ($progresoCurso->certificate == 1)
                <a href="{{ route('client.courses.get-certificate', $progresoCurso->course_id) }}" class="btn btn-primary play-course-button btn-block"><i class="fas fa-certificate"></i> OBTENER CERTIFICADO</a>
              @else
                Debe finalizar el curso para generar el certificado...
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <nav>
            <div class="nav nav-tabs nav-fill justify-content-center font-weight-bold btn-cont-course align-items-center" id="nav-tab" role="tablist">
              <h5 class="text-white">CONTENIDO DEL CURSO</h5>
            </div>
          </nav>

          <div id="accordion">
                @php $cont2 = 0; @endphp
                <!-- Accordion item 1 -->
                @foreach($all_lessons as $lesson)
                <div class="card mt-2 card-accordion" id="card-lesson-content">
                        <div class="card-header collapsed border-0 collapsible-link" id="heading{{$lesson->id}}" data-toggle="collapse" data-target="#collapse{{$lesson->id}}" aria-expanded="false" aria-controls="collapse{{$lesson->id}}">
                                <a href="{{ route('lesson.show', [$lesson->slug, $lesson->id, $lesson->course_id]) }}">
                                        <h5 class="mb-0 font-weight-bold d-block position-relative py-2">
                                         <i class="text-primary fa fa-play-circle"></i>  @if ($progresoCurso->language == 'es') {{$lesson->title}} @else {{$lesson->english_title}} @endif
                                        </h5>
                                </a>
                        </div>
                        <div id="collapse{{$lesson->id}}" class="collapse" aria-labelledby="heading{{$lesson->id}}" data-parent="#accordion">
                        <div class="card-body">
                                {{$lesson->description}}
                        </div>
                        </div>
                </div>
                @php $cont2++; @endphp
            @endforeach
            </div>
            @if ( ($progresoCurso->certificate == 0) && (!is_null($lesson->course->evaluation)) )
                  <div class="card mt-2 mb-2" style="background-color: #2A91FF;">
                    <div class="card-header text-center" >
                      <a href="{{ route('client.courses.take-evaluation', [$lesson->course->slug, $lesson->course_id]) }}">
                        <h5 class="mb-0 font-weight-bold d-block position-relative py-2" style="color: white;">
                          PRESENTAR EVALUACIÓN
                        </h5>
                      </a>
                    </div>
                  </div>
            @endif
            <a href="{{route('courses.show.all')}}" class="btn btn-primary play-course-button btn-block" ><i class="fa fa-search" aria-hidden="true"></i> EXPLORAR MÁS CURSOS</a>



          <!--<div class="row">
            <div class="col-lg-12 mx-auto mt-2 mb-2">

              <div id="accordionContentLeccion" class="accordion-leccion">
                @php $cont2 = 0; @endphp

                @foreach($all_lessons as $lesson)
                  <div id="card{{$lesson->id}}" class="card mb-2">
                    <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapse{{$lesson->id}}">
                      <a href="{{ route('lesson.show', [$lesson->slug, $lesson->id, $lesson->course_id]) }}">
                        <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2">
                          <i class="text-primary fa fa-play-circle"></i>{{$lesson->title}}
                        </h5>
                      </a>
                      <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$lesson->duration}} m</h6>
                    </div>
                    <div id="collapse{{$lesson->id}}" class="card-body collapse" data-parent="#accordionContentLeccion">
                      <p class="card-text about-course-text ">
                        {{$lesson->description}}
                      </p>
                    </div>
                  </div>
                  @php $cont2++; @endphp
                @endforeach
                @if ($progresoCurso->certificate == 0)
                  <div class="card mb-2" style="background-color: #2A91FF;">
                    <div class="card-header text-center" >
                      <a href="{{ route('client.courses.take-evaluation', [$lesson->course->slug, $lesson->course_id]) }}">
                        <h5 class="mb-0 font-weight-bold d-block position-relative py-2" style="color: white;">
                          PRESENTAR EVALUACIÓN
                        </h5>
                      </a>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>-->

        </div>
      </div>
    </div>
  </div>

    {{-- Modal Membresia --}}
  <div class="modal fade" id="upgradeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: black;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: white;">UPGRADE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <h4 class="text-muted">¿Qué esperas para mejorar tu membresía y subir de nivel?</h4>
          <p class="text-muted">Con esto tedrás acceso a nuevas lecciones...</p>
          @php
            $idmembresia = empty(Auth::user()->membership_id) ? 1 : (Auth::user()->membership_id + 1);
          @endphp
          <a href="{{route('shopping-cart.store', $idmembresia)}}" class="btn btn-color-green text-white" style="background: #6ab742;">SUBIR DE NIVEL</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  @endsection
  @push('scripts')
  <script>
    $(document).on(function(){
    $(".vp-telecine.invisible video").on('ended', function(){
      $('#nextlesson').click();
    });
  });

  $(document).ready(function(){
    $(".vp-telecine.invisible video").on('ended', function(){
      $('#nextlesson').click();
    });
    if ($("#membership_id").val() < 5){
        $("#upgradeModal").modal("show");
    }
  });

    function newComment(){
        $("#store_comment_submit").css('display', 'none');
        $("#store_comment_loader").css('display', 'block');
        var route = "https://mybusinessacademypro.com/academia/courses/lesson/comments";
        var parametros = $('#store_comment_form').serialize();
        $.ajax({
            url:route,
            type:'POST',
            data:  parametros,
            success:function(ans){
                $("#comment").val("");
                $("#store_comment_loader").css('display', 'none');
                $("#store_comment_submit").css('display', 'block');
                $("#comments_section").html(ans);
        }
        });
    }
  </script>
  @endpush
