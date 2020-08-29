@extends('layouts.landing')

@section('content')
   <div class="container-fluid text-white">
  <div class="row justify-content-end">
    <div class="col-4 text-white title-level m-1">
      <h5 class="">Nivel: Principiante</h5>
    </div>
    <div class="col-4">
      <div class="icon-social-media">

        <button type="button" class="btn btn-social-icon btn-facebook btn-rounded float-right"><i class="fa fa-facebook"></i></button>

        <button type="button" class="btn btn-social-icon btn-twitter btn-rounded float-right"><i class="fa fa-twitter"></i></button>

        <button type="button" class="btn btn-social-icon btn-instagram btn-rounded float-right"><i class="fa fa-instagram"></i></button> </div>
    </div>
  </div>
</div>

{{-- BANNER --}}

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel"  data-interval = "false">
  <div class="carousel-inner">
    <div class="carousel-item active">
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
  <div class="btn-play-video">
    <i class="fa fa-play-circle text-primary"></i>
  </div>
  



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
  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Acerca del Curso</a>
  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Comentarios</a>
  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Materiales</a>
  <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Certificado</a>
</div>
</nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  Sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
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
              <div class="col-12 box-comments">
                  <form class="form-inline">
              <input type="text" class="form-control" placeholder="Escribe tu comentario">
          </form>
              </div>
              
          </div>
      </div>
  </div>
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end custom-box -->
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
                    <h4 class="media-heading text-white">John Doe</h4>
                   <h7 class="media-heading about-course-text">12/03/2020</h7>
                   <p class="about-course-text">
                       Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
                   </p>
                   <p class="about-course-text float-right mr-4">
                    <i class="fa fa-heart-o" aria-hidden="true"></i> 5 <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>
                       
                   </p>
                   
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
  </div><!-- end custom-box -->
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
                    <h4 class="media-heading text-white">John Doe</h4>
                   <h7 class="media-heading about-course-text">12/03/2020</h7>
                   <p class="about-course-text">
                       Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
                   </p>
                   <p class="about-course-text float-right mr-4">
                    <i class="fa fa-heart-o" aria-hidden="true"></i> 5 <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>
                       
                   </p>
                </div>
            </div>
        </div>
    </div><!-- end col -->
</div><!-- end row -->
  </div><!-- end custom-box -->
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
                      <h4 class="media-heading text-white">John Doe</h4>
                     <h7 class="media-heading about-course-text">12/03/2020</h7>
                     <p class="about-course-text">
                         Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
                     </p>
                     <p class="about-course-text float-right mr-4">
                      <i class="fa fa-heart-o" aria-hidden="true"></i> 5 <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>
                         
                     </p>
                  </div>
              </div>
          </div>
      </div><!-- end col -->
  </div><!-- end row -->
  </div><!-- end custom-box -->
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
                      <h4 class="media-heading text-white">John Doe</h4>
                     <h7 class="media-heading about-course-text">12/03/2020</h7>
                     <p class="about-course-text">
                         Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
                     </p>
                     <p class="about-course-text float-right mr-4">
                      <i class="fa fa-heart-o" aria-hidden="true"></i> 5 <i class="far fa-comment-alt about-course-text" aria-hidden="true"></i> <a href="" class="about-course-text"> Responder</a>
                         
                     </p>

                  </div>
              </div>
          </div>
      </div><!-- end col -->
  </div><!-- end row -->
  </div><!-- end custom-box -->
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
        <div id="card1" class="card">
        <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseOne">
          <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="text-primary fa fa-play-circle"></i> Introducción</h5>
            <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  07 m</h6>
        </div>
        <div id="collapseOne" class="card-body collapse" data-parent="#accordionContentLeccion">
        </div>
      </div>
          

<!-- Accordion item 2 -->
<div id="card2" class="card  mt-2">
<div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseTwo">
<h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="text-primary fa fa-play-circle"></i> 1. Nombre de Lección</h5>
  <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i> 15 m</h6>
</div>
<div id="collapseTwo" class="card-body collapse show" data-parent="#accordionContentLeccion">
  <p class="card-text about-course-text ">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.
  </p>
</div>
</div>
<!-- Accordion item 3 -->
<div id="card3" class="card  mt-2">
  <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseThree">
    <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><i class="text-primary fa fa-play-circle"></i> 2. Nombre de Lección</h5>
      <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  35 m</h6>
  </div>
  <div id="collapseThree" class="card-body collapse" data-parent="#accordionContentLeccion">
  </div>
</div>

<!-- Accordion item 4 -->
<div id="card4" class="card  mt-2">
  <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseFour">
    <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="text-primary fa fa-play-circle"></i> 3. Nombre de Lección</h5>
      <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  23 m</h6>
  </div>
  <div id="collapseFour" class="card-body collapse" data-parent="#accordionContentLeccion">
  </div>
</div>

<!-- Accordion item 5 -->
<div id="card5" class="card  mt-2">
  <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseFive">
    <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><i class="text-primary fa fa-play-circle"></i> 4. Nombre de Lección</h5>
      <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  23 m</h6>
  </div>
  <div id="collapseFive" class="card-body collapse" data-parent="#accordionContentLeccion">
  </div>
</div>
<!-- Accordion item 6 -->
<div id="card6" class="card  mt-2">
  <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseSix">
    <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><i class="text-primary fa fa-play-circle"></i> 5. Nombre de Lección</h5>
      <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  23 m</h6>
  </div>
  <div id="collapseSix" class="card-body collapse" data-parent="#accordionContentLeccion">
  </div>
</div>

<!-- Accordion item 7 -->
<div id="card7" class="card  mt-2">
  <div class="card-header accordion-leccion-content" data-toggle="collapse" data-target="#collapseSeven">
    <h5 class="mb-0 font-weight-bold d-block position-relative collapsible-link py-2" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven"><i class="text-primary fa fa-play-circle"></i> 6. Nombre de Lección</h5>
      <h6 class="mb-0 ml-4 d-block py-2"><i class="fa fa-clock-o" aria-hidden="true"></i>  23 m</h6>
  </div>
  <div id="collapseSeven" class="card-body collapse" data-parent="#accordionContentLeccion">
  </div>
</div>
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
