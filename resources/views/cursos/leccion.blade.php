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
     <div class="col mt-2"><h5 class="text-white">{{$lesson->title}}</h5></div>
    <div class="col-xs-1 col-md-2">
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

    <div class="col-xs-1 col-md-2 text-center ">
      <div class="icon-social-media">
        <a href="https://m.facebook.com/MyBusinessAcademyPro/" target="_blank" class="btn btn-social-icon btn-facebook btn-rounded ml-2 mr-2"><img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px"></a>
        <a href="" class="btn btn-social-icon btn-twitter btn-rounded ml-2 mr-2" target="_blank"><img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px"></a>
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
              @if ($lesson->materials->isNotEmpty())
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
                            <form class="form-inline" action="{{route ('lesson.comments')}}" method="POST">
                              @csrf
                              <!--<input type="hidden" name="lesson_slug" value="{{ $lesson->slug}}">
                              <input type="hidden" name="course_id" value="{{ $lesson->course->id}}">-->
                              <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                              <input type="text" class="form-control" placeholder="Escribe tu comentario" name="comment" required>
                              <button class="btn btn-outline-success mt-2" type="submit">Enviar</button>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div><!-- end col -->
                </div><!-- end row -->
              </div><!-- end custom-box -->
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
                            <p class="about-course-text float-right mr-4">
                              <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>

                            </p>

                          </div>

                        </div>
                      </div>

                    </div><!-- end col -->
                  </div><!-- end row -->
                </div>
              @endforeach
              <!-- end custom-box -->
            </div>
            <div class="tab-pane fade pl-5" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              @foreach ($lesson->materials as $material)
                @if ($material->type == 'Archivo')
                  <a href="{{ asset('uploads/courses/lessons/materials/'.$material->material) }}" target="_blank">
                    <h5 class="mb-0 font-weight-bold d-block position-relative py-2">
                      <i class="text-primary fa fa-link"></i> {{$material->title}}
                    </h5>
                  </a>
                @else
                  <a href="{{ $material->material }}" target="_blank">
                    <h5 class="mb-0 font-weight-bold d-block position-relative py-2">
                      <i class="text-primary fa fa-link"></i> {{$material->title}}
                    </h5>
                  </a>
                @endif
                <br>
              @endforeach
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
                                        <i class="text-primary fa fa-play-circle"></i>  {{$lesson->title}}
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
            @if ($progresoCurso->certificate == 0)
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

  {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
  <!--@if (!Auth::guest())
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
        <!--<img src="{{ asset('images/banner_referidos.png') }}" alt="" style="height: 400px; width:100%; opacity: 1; background: transparent linear-gradient(90deg, #2A91FF 0%, #2276D0A1 54%, #15498000 100%) 0% 0% no-repeat padding-box;">
        <div style="font-size: 50px; width: 50%; padding: 80px 40px 80px 80px; color: white; line-height: 55px;">EL QUE QUIERE SUPERARSE, NO VE OBSTÁCULOS, VE SUEÑOS.</div>
      </div>
    </div>
  </div><br><br>
  @endif
  {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
  </div>
</div>-->

    {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}

    {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}

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
  });
  </script>
  @endpush
