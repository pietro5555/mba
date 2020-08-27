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
<div class="container-fluid">
<video
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

    <!-- Fallback for browsers that don't support the <video> element -->
    <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
  </video>

</div>
    {{-- FIN DEL BANNER --}}
{{-- SECCIÓN Tabs Leccion--}}
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
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
                                                   <h6 class="media-heading text-secondary">12/03/2020</h6>
                                                   <p class="text-secondary">
                                                       Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
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
                                                   <h6 class="media-heading text-secondary">12/03/2020</h6>
                                                   <p class="text-secondary">
                                                       Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
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
                                                   <h6 class="media-heading text-secondary">12/03/2020</h6>
                                                   <p class="text-secondary">
                                                       Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
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
                                                   <h6 class="media-heading text-secondary">12/03/2020</h6>
                                                   <p class="text-secondary">
                                                       Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.
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
            <div class="row pb-4 pt-4">
                <div class="col-md-12">
                <div class="full margin_bottom_30">
                  <div class="accordion">
                    <div class="bs-example">
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionOne">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-primary fa fa-play-circle"></i> Introducción</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionTwo">
                           <div class="col-md-12 accordion-leccion">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"><i class="text-primary fa fa-play-circle"></i> 1. Nombre de Lección</h5>
                                         <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px">  
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-white">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it 
                                over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, 
                                consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default mt-2 mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionThree">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-secondary fa fa-play-circle"></i> 2. Nombre de Lección</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionThree" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div><div class="panel panel-default mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionFour">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-secondary fa fa-play-circle"></i> 3. Nombre de Lección</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionFour" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div><div class="panel panel-default mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionFive">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-secondary fa fa-play-circle"></i> 4. Nombre de Lección</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionFive" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div><div class="panel panel-default mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionSix">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-secondary fa fa-play-circle"></i> 5. Nombre de Lección</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionSix" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div><div class="panel panel-default mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionSeven">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-secondary fa fa-play-circle"></i> 6. Nombre de Lección</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionSeven" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default mt-2">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionEight">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title about-course-text"> <h5 class="about-course-text"> <i class="text-secondary fa fa-play-circle"></i> 7. Nombre de Lección</h5></p>
                                        <h6 class="about-course-text">
                                        <img src="{{ asset('images/icons/clock.svg') }}" height="20px" width="20px" class=""> 07 m</h6>
                                    </div>
                                    <div class="col-md-2 p-2">
                                        <img src="{{ asset('images/icons/chevron.svg') }}" class="float-right m-1" height="20px" width="20px"> 
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionEight" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
                                </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default mt-2 bg-primary">
                          <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseleccionNine">
                            <div class="col-md-12 accordion-leccion-content">
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="panel-title"> <h5 class="text-white font-weight-bold"> <i class="text-white fa fa-file-alt"></i> Evaluación</h5></p>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="collapseleccionNine" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <div class="row">
                                <div class="col-md">
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
