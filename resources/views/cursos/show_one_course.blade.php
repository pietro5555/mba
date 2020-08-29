@extends('layouts.landing')

@section('content')
    
    <div class="title-page-one_course col-md border-bottom-2"><span>
        <h6 class=""><span>Cursos > </span><span> Liderazgo ></span><span>Nombre del curso</span></h6>
        <hr style="border: 1px solid #707070;opacity: 1;" />
    </div>

{{-- BANNER --}}
<div class="container-fluid">
<video
class="d-flex w-100"
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
<hr style="border: 1px solid #707070;opacity: 1;" />
{{-- SECCIÓN ACERCA DEL CURSO--}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-white">NOMBRE DEL CURSO</h3>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-success play-course-button col-xs"><i class="fa fa-play"></i> ACCEDER AL CURSO</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star-o text-secondary"></i>
                </div>
            </div>
            <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                   <h6 class="text-white"> <img src="{{ asset('images/icons/icon-user.svg') }}" alt="" height="30px" width="30px">  1296 Alumnos</h6>

                                </div>
                                <div class="col-md-4">
                                     <h6 class="text-white"> <img src="{{ asset('images/icons/icon-book-video.svg') }}" height="30px" width="30px">  7 Lecciones</h6>
                                </div>
                                <div class="col-md-4">
                                     <h6 class="text-white"> <img src="{{ asset('images/icons/clock.svg') }}" height="30px" width="30px">  2h 17m</h6>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h6 class="text-white"><img src="{{ asset('images/icons/calendar.svg') }}" height="30px" width="30px">  Fecha de salida: 12 de Marzo 2020</h6>
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
                    <hr style="border: 1px solid #707070;opacity: 1;" />
                    <div class="col-md-12">
                        <div class="col-md-12 justify-content-center p-2 ml-4">
                                <p class=" ml-4 about-course-text about-course-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus.Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.
                        </p>
                         <p class=" ml-4 about-course-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus.Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.
                        </p>
                         <p class=" ml-4 about-course-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor.
                        </p>

                        <div class="container-fluid p-2">
                        <div class="row featurette">
                              <div class="col-md-7 order-md-2">
                                <h5 class="featurette-heading text-white">Mentor</h5>
                                <h3 class="featurette-heading text-primary">Nombre y Apellido</h3>
                                <h6 class="featurette-heading text-white">Conferencista Experto en Liderazgo</h6>
                                <p class="lead about-course-text">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                                <a href="" class="text-primary">Ver perfil <i class=" fa fa-angle-right"> </i></a>
                              </div>
                              <div class="col-md-5 order-md-1">
                                <img src="{{ asset('images/mentor-course.png') }}" alt="" class="featurette-image img-fluid mx-auto ml-2" width="409" height="370">
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
<div class="container-fluid">
     <div class="col-md-12 section-title-category">
        <h3 class="ml-4">LECCIONES</h3>
    </div>
    <hr style="border: 1px solid #707070;opacity: 1;" />
    <div class="col-md-10">
        <div class="full margin_bottom_30">
          <div class="accordion border_circle">
            <div class="bs-example">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <div class="col-md-12 p-2 accordion-seccion-leccion align-items-center">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 01</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title about-course-text"> <h5 class="about-course-text"> Introducción</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12 m-2">
                        <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                        </div>
                        
                      </div>
               
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                   <div class="col-md-12 p-2 mt-2 accordion-seccion-leccion">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 02</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title about-course-text"> <h5 class="about-course-text"> Lección 1</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <div class="col-md-12 p-2 mt-2  accordion-seccion-leccion">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 03</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title about-course-text"> <h5 class="about-course-text"> Lección 2</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    <div class="col-md-12 p-2 mt-2  accordion-seccion-leccion">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 04</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title about-course-text"> <h5 class="about-course-text"> Lección 3</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                    <div class="col-md-12 p-2 mt-2 accordion-seccion-leccion">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 05</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title about-course-text"> <h5 class="about-course-text"> Lección 4</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                    <div class="col-md-12 p-2 mt-2 accordion-seccion-leccion">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 06</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title"> <h5 class="about-course-text"> Lección 5</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                    <div class="col-md-12 p-2 mt-2 accordion-seccion-leccion">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="cuadrado"><h2 class="text-white"> 07</h2></div>
                            </div>
                            <div class="col-md-8">
                                <p class="panel-title about-course-text"> <h5 class="about-course-text"> Lección 6</h5></p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{ asset('images/icons/chevron.svg') }}" class="leccion-icon float-right"> 
                            </div>
                        </div>
                    </div>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p class="about-course-text panel-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>



{{-- FIN SECCIÓN LECCIONES--}}

{{-- SECCIÓN VALORACIONES--}}
<div class="container-fluid p-2 pt-5">
    <div class="row">
        <div class="col-md-10">
            <h3 class="text-white ml-5">VALORACIONES
            </h3>
            <hr style="border: 1px solid #707070;opacity: 1;" />
            <div class="row m-4 pt-4 border-bottom">
                <div class="col-md-2">
                    <div class="circle"><h2 class="text-white"> JD</h2></div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                   <h5 class="text-white font-weight-bold">John Doe</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star-o text-secondary"></i>
                                    <h6 class="text-secondary">12/03/2020</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-secondary">Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.</h6>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row pt-4 m-4 border-bottom">
                <div class="col-md-2">
                    <div class="circle"><h2 class="text-white"> JD</h2></div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                   <h5 class="text-white font-weight-bold">John Doe</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star-o text-secondary"></i>
                                    <h6 class="text-secondary">12/03/2020</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-secondary">Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.</h6>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row pt-4 m-4 border-bottom">
                <div class="col-md-2">
                    <div class="circle"><h2 class="text-white"> JD</h2></div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                   <h5 class="text-white font-weight-bold">John Doe</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star-o text-secondary"></i>
                                    <h6 class="text-secondary">12/03/2020</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-secondary">Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.</h6>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row pt-4 m-4 border-bottom">
                <div class="col-md-2">
                    <div class="circle"><h2 class="text-white"> JD</h2></div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <div class="col-md-4">
                                   <h5 class="text-white font-weight-bold">John Doe</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star-o text-secondary"></i>
                                    <h6 class="text-secondary">12/03/2020</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="text-secondary">Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat.</h6>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

{{-- FIN SECCIÓN VALORACIONES--}}

  
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
