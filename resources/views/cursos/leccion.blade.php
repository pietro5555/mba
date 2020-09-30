@extends('layouts.landing')

@section('content')
   <div class="container-fluid">
  <div class="row justify-content-end">
    <div class="title-level col-xs-1 col-md-4">
      <h5>Nivel: {{$lesson->course->subcategory->title}}</h5>
    </div>
    <div class="col-xs-1 col-md-4 text-center ">
      <div class="icon-social-media">
        <a href="" class="btn btn-social-icon btn-facebook btn-rounded"><img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px"></a>
        <a href="" class="btn btn-social-icon btn-twitter btn-rounded"><img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px"></a>
        <a href="" class="btn btn-social-icon btn-instagram btn-rounded"><img src="{{ asset('images/icons/instagram.svg') }}" height="20px" width="20px"></a>
      </div>
    </div>
  </div>
</div>

{{-- BANNER --}}

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel"  data-interval = "false">
  <div class="carousel-inner">
    <div class="carousel-item active">

      <!--<iframe src="https://player.vimeo.com/video/76979871" width="{video_width}" height="{video_height}" frameborder="0" title="{video_title}" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->

        <video
    class="d-block w-100 leccion-curso"
    controls
    crossorigin
    playsinline
    poster="{{ asset('images/banner_cursos.png') }}"
    id="player"
  >
    <!-- Video files -->
    <source
      src="{{$lesson->url}}"
      type="video/mp4"
      size="576"
    />
    <source
      src="{{$lesson->url}}"
      type="video/mp4"
      size="720"
    />
    <source
      src="{{$lesson->url}}"
      type="video/mp4"
      size="1080"
    />

    <!-- Caption files -->
    <track
      kind="captions"
      label="English"
      srclang="en"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
      default
    />
    <track
      kind="captions"
      label="Français"
      srclang="fr"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"
    />
  </video>
    </div>
    <div class="carousel-item">
       <video
class="d-block w-100 leccion-curso"
    controls
    crossorigin
    playsinline
    poster="{{ asset('images/banner_cursos.png') }}"
    id="player"
  >
    <!-- Video files -->
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
      type="video/mp4"
      size="576"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
      type="video/mp4"
      size="720"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
      type="video/mp4"
      size="1080"
    />

    <!-- Caption files -->
    <track
      kind="captions"
      label="English"
      srclang="en"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
      default
    />
    <track
      kind="captions"
      label="Français"
      srclang="fr"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"
    />
  </video>
    </div>
    <div class="carousel-item">
       <video
class="d-block w-100 leccion-curso"
    controls
    crossorigin
    playsinline
    poster="{{ asset('images/banner_cursos.png') }}"
    id="player"
  >
    <!-- Video files -->
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
      type="video/mp4"
      size="576"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
      type="video/mp4"
      size="720"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
      type="video/mp4"
      size="1080"
    />

    <!-- Caption files -->
    <track
      kind="captions"
      label="English"
      srclang="en"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
      default
    />
    <track
      kind="captions"
      label="Français"
      srclang="fr"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"
    />
  </video>
    </div>
  </div>
  <div class="">
      <a class="btn-prev text-white" href="#carouselExampleControls" role="button" data-slide="prev"> Introducción</a>
  </div>
   <div >
      <a class="btn-next text-white" href="#carouselExampleControls" role="button" data-slide="next">Lección 2</a>
  </div>
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
  <a class="nav-item nav-link m-2" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Materiales</a>
  <a class="nav-item nav-link m-2" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Certificado</a>
</div>
</nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  {{$lesson->course->description}}
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <div class="custombox clearfix">
<div class="row">
<div class="col-lg-12">
  <div class="comments-list">
      <div class="media">
          <a class="media-left" href="#">
              <div class="col-md-2">
                <div class="perfil-comments"><h2 class="text-white"> JD</h2></div>
            </div>
          </a>
          <div class="media-body align-items-center">
              <div class="col-12 box-comments d-flex">
              <form class="form-inline" action="{{route ('lesson.comments')}}" method="POST">
                @csrf
                <input type="hidden" name="lesson_slug" value="{{ $lesson->slug}}">
                <input type="hidden" name="course_id" value="{{ $lesson->course->id}}">
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
                      <div class="perfil-comments"><h2 class="text-white"> JD</h2></div>
                  </div>
                </a>
                
                <div class="media-body">
                    <h4 class="media-heading text-white">Jhon Doe</h4>
                   <h7 class="media-heading about-course-text">{{str_replace('-', '/', date('d-m-Y', strtotime($comment->date)))}}</h7>
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
<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.
</div>
<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.
</div>
</div>
</div>
<div class="col-md-4">
<nav>
        <div class="nav nav-tabs nav-fill justify-content-center font-weight-bold btn-cont-course align-items-center" id="nav-tab" role="tablist">
            <h5 class="text-white">CONTENIDO DEL CURSO</h5>
        </div>
</nav>
<div class="row">
    <div class="col-lg-12 mx-auto mt-2 mb-2">
      <!-- Accordion -->
      <div id="accordionContentLeccion" class="accordion-leccion">

        <!-- Accordion item 1 -->
        @foreach($all_lessons as $lesson)
        <div id="card{{$lesson->id}}" class="card mb-2">
        <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapse{{$lesson->id}}">
          <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapse{{$lesson->id}}" aria-expanded="true" aria-controls="collapse{{$lesson->id}}"><i class="text-primary fa fa-play-circle"></i> {{$lesson->title}}</h5>
            <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  {{$lesson->duration}} m</h6>
        </div>
        <div id="collapse{{$lesson->id}}" class="card-body collapse" data-parent="#accordionContentLeccion">
          <p class="card-text about-course-text ">
          {{$lesson->description}}
        </p>
        </div>
      </div>
      @endforeach
  </div>
</div>
</div>

      </div>
    </div>
  </div>
</div>
  
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
