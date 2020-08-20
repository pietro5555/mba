@extends('layouts.landing')

@section('content')
    
    <div class="title-page-course col-6"> Hola <a class="course-username">Jhon.</a>&nbsp¡Nos alegra verte hoy!
    </div>

    {{-- BANNER --}}
    <div class="container-fluid banner-course">
            <div class="carousel-inner">
                <div class="">
                    <img src="{{ asset('images/banner_cursos.png') }}" class="d-block w-100 course-banner-img" alt="...">

                    <div class="course-banner-caption">
                        <div class="title-course col-6">NOMBRE DEL CURSO</div>
                        <div class="description-course col-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.</div>
                        <br>
                        <div class="col-6">
                             <button type="button" class="btn btn-primary play-course-button"><i class="fa fa-play"></i> CONTINUAR CURSO</button>
                        </div>
                        <br>
                         <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                            aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            </div>
                    </div> 
                    </div> 
                                  

                </div>
               
            </div>
            
    </div>
    {{-- FIN DEL BANNER --}}

     {{-- SECCIÓN TUS CURSOS--}}
     <div class="container-fluid">
         <div class="section-title-courses">Tus Cursos</div>
         <hr style="border: 2px solid #707070;opacity: 1;" />
         <div class="row pb-5 mb-4">
             <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0" style="background-color: #2f343a; width: 291px; height: 217px; opacity: 1;" ><img src="{{ asset('images/preview-course1.png') }}" alt="" class="w-100 h-100 card-img-top" style="border: 1px solid #707070;opacity: 1;">
                        <div class="p-0">
                            <p class="small text-muted pt-3">Curso número 1 <i class="text-primary fa fa-play-circle"></i></p>
                            <hr style="border: 1px solid #707070;opacity: 1;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0" style="background-color: #2f343a; width: 291px; height: 217px;opacity: 1;"><img src="{{ asset('images/preview-course2.png') }}" alt="" class="w-100 h-100 card-img-top" style="border: 1px solid #707070;opacity: 1;">
                        <div class="p-0">
                            <p class="small text-muted pt-3">Curso número 2 <i class="text-primary fa fa-play-circle"></i></p>
                            <hr style="border: 1px solid #707070;opacity: 1;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0" style="background-color: #2f343a; width: 291px; height: 217px;opacity: 1;" ><img src="{{ asset('images/preview-course3.png') }}" alt="" class="w-100 h-100 card-img-top" style="border: 1px solid #707070;opacity: 1;" >
                        <div class="p-0">
                            <p class="small text-muted pt-3">Curso número 3 <i class="text-primary fa fa-play-circle"></i></p>
                            <hr style="border: 1px solid #707070;opacity: 1;">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <!-- Card-->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0" style="background-color: #2f343a; width: 291px; height: 217px;opacity: 1;"><img src="{{ asset('images/preview-course4.png') }}" alt="" class="w-100 h-100 card-img-top" style="border: 1px solid #707070;opacity: 1;">
                        <div class="p-0">
                            <p class="small text-muted pt-3">Curso número 4 <i class="text-primary fa fa-play-circle"></i></p>
                            <hr style="border: 1px solid #707070;opacity: 1;">
                        </div>
                    </div>
                </div>
            </div>
         </div>

         

     </div>
    {{-- FIN SECCIÓN TUS CURSOS--}}

    {{-- SECCIÓN TU AVANCE (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div class="section-landing">
            <div class="section-title-landing">TU AVANCE</div>
            <div class="row">
                <div class="col text-left">Nivel: Principiante</div>
                <div class="col text-right">Próximo Nivel: Intermedio</div>
                <div class="w-100"></div>
                <div class="col" style="padding: 20px 20px;">
                    <div class="progress" style="background-color: #8E8E8E;">
                        <div class="progress-bar" role="progressbar" style="width: 35%; background-color: #2A91FF;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%; background: linear-gradient(to right, #2A91FF, #6AB742); border-radius: 30px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        <!--<div class="progress-bar bg-info" role="progressbar" style="width: 35%; background-color: #6AB742;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col text-left">Cursos Realizados: 7</div>
                <div class="col text-right">Cursos por Realizar: 4</div>
            </div>
        </div><BR><BR>
    @endif
   {{-- FIN DE SECCIÓN TU AVANCE (USUARIOS LOGGUEADOS) --}}

    {{-- SECCIÓN CURSOS MAS NUEVOS --}}
    <div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="row">
            <div class="col">
                <div class="section-title-landing" style="padding-bottom: 35px;">LOS MÁS NUEVOS</div>
            </div>
            <div class="col text-right">
                <button type="button" class="btn btn-outline-light" style="border-radius: 0px;"><i class="fas fa-chevron-left"></i></button>
                <button type="button" class="btn btn-outline-success" style="border-radius: 0px; border-color: #6AB742; color: #6AB742;"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
               
        <div class="row" style="padding: 10px 30px;">
            <div class="col">
                <div class="card" >
                    <img src="{{ asset('images/curso1.jpg') }}" class="card-img-top" alt="..." style="filter: brightness(80%);">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="mt-auto">
                            <div style="font-size: 20px; font-weight: bold;">Nombre del Curso 1</div>
                            <div class="row">
                                <div class="col-12 col-xl-6" style="font-size: 16px; font-weight: bold;">Categoría</div>
                                <div class="col-12 col-xl-6" style="font-size: 16px;">
                                    <div class="row row-cols-3">
                                        <div class="col text-right" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="far fa-user-circle"></i><br><span style="font-size: 10px;">1310</span></div>
                                        <div class="col text-center" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="fas fa-share-alt"></i><br><span style="font-size: 10px;">869</span></div>
                                        <div class="col text-left" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="far fa-thumbs-up"></i><br><span style="font-size: 10px;">1242</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/curso2.jpg') }}" class="card-img-top" alt="..." style="filter: brightness(80%);">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="mt-auto">
                            <div style="font-size: 20px; font-weight: bold;">Nombre del Curso 2</div>
                            <div class="row">
                                <div class="col-12 col-xl-6" style="font-size: 16px; font-weight: bold;">Categoría</div>
                                <div class="col-12 col-xl-6" style="font-size: 16px;">
                                    <div class="row row-cols-3">
                                        <div class="col text-right" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="far fa-user-circle"></i><br><span style="font-size: 10px;">1310</span></div>
                                        <div class="col text-center" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="fas fa-share-alt"></i><br><span style="font-size: 10px;">869</span></div>
                                        <div class="col text-left" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="far fa-thumbs-up"></i><br><span style="font-size: 10px;">1242</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" >
                    <img src="{{ asset('images/curso3.jpg') }}" class="card-img-top" alt="..." style="filter: brightness(80%);">
                    <div class="card-img-overlay d-flex flex-column">
                        <div class="mt-auto">
                            <div style="font-size: 20px; font-weight: bold;">Nombre del Curso 3</div>
                            <div class="row">
                                <div class="col-12 col-xl-6" style="font-size: 16px; font-weight: bold;">Categoría</div>
                                <div class="col-12 col-xl-6" style="font-size: 16px;">
                                    <div class="row row-cols-3">
                                        <div class="col text-right" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="far fa-user-circle"></i><br><span style="font-size: 10px;">1310</span></div>
                                        <div class="col text-center" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="fas fa-share-alt"></i><br><span style="font-size: 10px;">869</span></div>
                                        <div class="col text-left" style="padding-right: 0 !important; padding-left: 0 !important;"><i class="far fa-thumbs-up"></i><br><span style="font-size: 10px;">1242</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    {{-- FIN DE SECCIÓN CURSOS MÁS NUEVOS--}}

    {{-- SECCIÓN PRÓXIMO STREAMING--}}
    <div class="next-streaming">
        <img src="{{ asset('images/banner_completo.png') }}" class="next-streaming-img">
        <div class="next-streaming-info">
            <button type="button" class="btn btn-primary btn-next-streaming">Próximo Streaming</button><br>
                            
            <div class="next-streaming-title">Lorem ipsum up dolor sit amet</div> 
            <div class="next-streaming-date">
                <i class="fa fa-calendar"></i> Sábado 25 de Julio
                <i class="fa fa-clock"></i> 6:00 pm
            </div>
            <div class="next-streaming-reserve">
                <a href="">Reservar Plaza <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div><br><br>
    {{-- FIN SECCIÓN PRÓXIMO STREAMING--}}
    
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
