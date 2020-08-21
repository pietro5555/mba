@extends('layouts.landing')

@section('content')
    
    <div class="title-page-course col-md"> Hola <a class="text-primary">Jhon.</a>&nbsp¡Nos alegra verte hoy!
    </div>

    {{-- BANNER --}}
    <div class="container-fluid banner-course">
            <div class="carousel-inner">
                <div class="">
                    <img src="{{ asset('images/banner_cursos.png') }}" class="course-banner-img" alt="...">

                    <div class="course-banner-caption">
                        <div class="title-course col-xl">NOMBRE DEL CURSO</div>
                        <div class="description-course col-sm-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis.</div>
                        <br>
                        <div class="col-md">
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
<div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        
            <div class="col">
                <div class=""> 
                    <a class="text-primary">Recomendados,</a>
                    según tus intereses.                    
                </div>
            </div>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

         <div class="carousel-inner">

           <div class="carousel-item active">
             <div class="row">

               <div class="col-md-4" style="margin-top: 20px;">
                 <img src="{{ asset('images/img-recommended1.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                 <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                  <h5 class="card-title">Nombre Apellido</h5>
                  </div>
                 </div>

                <div class="col-md-4" style="margin-top: 20px;">
                 <img src="{{ asset('images/img-recommended2.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                 <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                    <h5 class="card-title">Nombre Apellido</h5>
                  </div>
                 </div>

                <div class="col-md-4" style="margin-top: 20px;">
                 <img src="{{ asset('images/img-recommended3.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                 <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                    <h5 class="card-title">Nombre Apellido</h5>
                  </div>
                 </div>

          </div>
       </div>
       
       
       
       <div class="carousel-item">
             <div class="row">

               <div class="col-md-4" style="margin-top: 20px;">
                 <img src="{{ asset('images/img-recommended4.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                 <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                    <h5 class="card-title">Nombre Apellido</h5>
                  </div>
                 </div>

                <div class="col-md-4" style="margin-top: 20px;">
                 <img src="{{ asset('images/img-recommended5.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                 <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                    <h5 class="card-title">Nombre Apellido</h5>
                  </div>
                 </div>

                <div class="col-md-4" style="margin-top: 20px;">
                 <img src="{{ asset('images/img-recommended6.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                 <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                    <h5 class="card-title">Nombre Apellido</h5>
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
{{--FIN SECCIÓN RECOMENDACIONES--}}
<div>
        <hr style="border: 1px solid #707070;opacity: 1;" />
    </div>
    {{-- SECCIÓN CURSOS MAS NUEVOS --}}
    <div class="section-landing">
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
 
 {{-- SECCIÓN CURSOS POR CATEGORÍA --}}
 <div class="section-landing">
    <div class="container-fluid">
        <div class="col section-title-category">CURSOS POR CATEGORÍA
        </div>
        <div class="row">
            <div class="col-sm d-inline-flex p-2"> 
                <img class="card-img-top img-fluid course-category1" src="{{ asset('images/img-category1.png') }}" alt="Card image cap">
                <div class="course-banner-caption">
                        <div class="col">
                            <h4>Finanzas</h4>
                        </div>
                        <div class="col">
                        <h5>43 Cursos</h5>
                        </div>
                </div> 
            </div>
            <div class="col-sm d-inline-flex p-2"> 
                <img class="card-img-top img-fluid course-category2" src="{{ asset('images/img-category2.png') }}" alt="Card image cap">
                <div class="course-banner-caption">
                        <div class="col">
                            <h4>Emprendimiento</h4>
                        </div>
                        <div class="col">
                        <h5>32 Cursos</h5>
                        </div>
                </div> 
            </div>
            <div class="col-sm d-inline-flex p-2"> 
                <img class="card-img-top img-fluid course-category3" src="{{ asset('images/img-category3.png') }}" alt="Card image cap">
                <div class="course-banner-caption">
                        <div class="col">
                            <h4>Negocios</h4>
                        </div>
                        <div class="col">
                        <h5>51 Cursos</h5>
                        </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-sm d-inline-flex p-2"> 
                <img class="card-img-top img-fluid course-category4" src="{{ asset('images/img-category4.png') }}" alt="Card image cap">
                <div class="course-banner-caption">
                        <div class="col">
                            <h4>Marketing</h4>
                        </div>
                        <div class="col">
                        <h5>64 Cursos</h5>
                        </div>
                </div> 
            </div>
            <div class="col-sm d-inline-flex p-2"> 
                <img class="card-img-top img-fluid course-category5" src="{{ asset('images/img-category5.png') }}" alt="Card image cap">
                <div class="course-banner-caption">
                        <div class="col">
                            <h4>Ventas</h4>
                        </div>
                        <div class="col">
                        <h5>28 Cursos</h5>
                        </div>
                </div> 
            </div>
            <div class="col-sm d-inline-flex p-2"> 
                <img class="card-img-top img-fluid course-category6" src="{{ asset('images/img-category6.png') }}" alt="Card image cap">
                <div class="course-banner-caption">
                        <div class="col">
                            <h4>Liderazgo</h4>
                        </div>
                        <div class="col">
                        <h5>37 Cursos</h5>
                        </div>
                </div> 
            </div>
        </div>
        
    </div>
</div>
 {{-- FIN SECCIÓN CURSOS POR CATEGORÍA--}}

 {{-- SECCIÓN TUS MENTORES--}}
<div class="section-landing">
    <div>
        <h4 class=" section-title-landing text-primary text-center">TUS MENTORES</h4>
    </div>
    <div class="container-fluid">
        <div class="row d-flex flex-row p-2">
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor1.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor2.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor4.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor5.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor6.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor7.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor8.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor9.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor10.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor11.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
            <div class="col-xs-12 col-sm-4">
                <div class="card mentors-card">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img src="{{ asset('images/img-mentor12.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-6">
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
