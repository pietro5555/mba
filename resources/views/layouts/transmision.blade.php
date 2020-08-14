<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <title>{{ $settings->name }}</title>

        <link rel="stylesheet" href="{{ asset('bootstrap-4.5.1/css/bootstrap.min.css') }}">
        <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};

            var base_url = '{{ url('/') }}';
            var assetsPath = base_url + '/assets';
        </script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-dark-gray" id="sidebar-wrapper">
                <div class="sidebar-heading border-right" style="border-bottom: solid white 1px; height: 70px;">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('images/logo.png') }}" style="width: 40px; height: 40px;">
                        </div>
                        <div class="col-9">
                            <div style="color: white; font-size: 16px; font-weight: bold;">My Business</div> 
                            <div style="color: white; font-size: 11px; ">A c a d e m y  p r o</div>
                        </div>
                    </div>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-home"></i> Home</a>
                    @if(Auth::user())
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-asterisk"></i> Live Streames</a>
                    
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-user-circle"></i> Cursos</a>
                    
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-user"></i> Referidos</a>
                    @endif
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-search"></i> Explorar</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fas fa-border-all"></i> Categorías</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-file-alt"></i> Test</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="fa fa-gear"></i> Ajustes</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-question-circle"></i> Ayuda</a>
                    <a href="#" class="list-group-item bg-dark-gray" style="color: white;"><i class="far fa-flag"></i> Informes</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div class="bg-dark-gray" id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark-gray border-bottom" style="height: 70px;">
                    <button class="btn btn-primary" id="menu-toggle" style="background-color: #1D94FF !important;"><!--<span class="navbar-toggler-icon"></span>--><i class="fas fa-bars"></i></button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarItems">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link items-header" href="#">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">NOSOTROS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">CURSOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">STREAMING</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">GRATIS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">BLOG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">FXT LIVE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link items-header" href="#">IDIOMA</a>
                            </li>
                        </ul>
                        <div style="padding-left: 20px;">
                            <a type="button" class="btn btn-primary" href="{{ route('login') }}" style="border-radius: 25px !important; font-weight: bold; width: 180px;">REGISTRARME</a>
                        </div>
                    </div>
                </nav>
                
                
                
               <div style="width: 100%; position: relative; display: inline-block;">
                    <img src="{{ asset('images/banner_completo.png') }}" alt="" style="height: 500px; width:100%; opacity: 0.5;">
                    <div style="position: absolute; top: 2%; left: 5%;">
                        <div style="color: white; font-size: 70px; font-weight: bold;">
                            <a style="font-weight: bold; width: 180px; font-size: 28px; color: #2A91FF;">PRÓXIMO STREAMING</a><br>
                            
                            <div style="width: 60%; line-height: 70px;">
                                Lorem ipsum up dolor sit amet
                            </div> 
                            <div style="font-size: 25px; font-weight: 500;">
                                <i class="fa fa-calendar"></i> Sábado 25 de Julio
                                <i class="fa fa-clock"></i> 6:00 pm
                            </div>
                            <div style="font-size: 35px; padding-top: 60px;">
                                <a href="" style="color: #6fd843;">Reservar Plaza <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                
                
                
                
            <div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
                    
                        <div class="col">
                            <div class="section-title-landing" style="padding-bottom: 35px;">PRÓXIMAS TRANSMISIONES EN VIVO</div>
                        </div>

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                     <div class="carousel-inner">

                       <div class="carousel-item active">
                         <div class="row">

                           <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/1.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/2.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/3.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                      </div>
                   </div>
                   
                   
                   
                   <div class="carousel-item">
                         <div class="row">

                           <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/1.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/2.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/3.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                      </div>
                   </div>
                </div>

                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
                   </a>
               </div>
            </div>   



    <div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
                    
       <div class="col">
          <div class="section-title-landing" style="padding-bottom: 35px; text-align:center;">TRANSMISIONES RECIENTES</div>
        </div> 
        
        <div class="form-row">
       
       <div class="col-md-2" style="font-size: 20px;">
        <label>ORDENAR POR:</label>
        </div>
        
        <div class="col-md-3">
        <select name="tipo" class="form-control" required style="height: calc(1.9em + .100rem + 2px); width: 80%; border: none; background-color: #1a1b1d; color: #2A91FF; font-size: 16px; font-weight: bold;
">
            <option value="1">MÁS VISTOS</option>
        </select>
        </div>    
        
    </div>      

         <div class="row">
            
            @for($i=1; $i<=12; $i++)
            <div class="col-md-3" style="margin-top: 20px;">
                <img src="{{ asset('vivo/reciente') }}{{$i}}.png" class="card-img-top" alt="..." style="height: 200px;">

                <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                   <h6 class="card-title">Nombre Apellido</h6>
                </div>

                <div class="card-body" style="background-color: #2f343a;">
                  <h6 class="card-title" style="margin-top: -15px;"> <i class="far fa-play-circle" style="font-size: 16px; color: #6fd843;"></i> Nombre del Curso</h6>

                  <h6 style="font-size: 10px; margin-left: 20px; margin-top: -10px;">Categoria</h6>
 
                  <h6 align="right" style="margin-bottom: -20px;"> 
                    <i class="icon fa fa-eye" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">1310</p></i>
                    <i class="far fa-comment-alt" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">346</p></i>
                    <i class="fas fa-share-alt" style="font-size: 16px; margin-right: 10px;"><p style="font-size: 10px;">862</p></i>
                    <i class="far fa-thumbs-up" style="font-size: 16px;"><p style="font-size: 10px;">1243</p></i>
                  </h6>
                </div>
            </div>
            @endfor
         </div>
    </div>        


                <div>
                    <img src="{{ asset('images/grupo-371.png') }}" alt="" style="width:100%;">
                </div>
                
                <footer class="bg-dark-gray" style="padding: 20px 20px; color: white; border-top: solid white 1px;">
                    <div class="row">
                        <div class="col-10 text-left">
                            <img src="{{ asset('images/logo.png') }}" style="width: 35px; height: 35px;"> 2020 My Business Academy Pro All Rigth Reserved
                        </div>
                        <div class="col-2 text-right">
                            <div class="row">
                                <div class="col" style="margin: 0 10px; background-color: #404040; border-radius: 50%; text-align: center; padding: 5px 5px 5px 5px;">
                                    <img src="{{ asset('images/facebook.png') }}" alt="">
                                </div>
                                <div class="col" style="margin: 0 10px; background-color: #404040; border-radius: 50%; text-align: center; padding: 5px 5px 5px 5px;">
                                    <img src="{{ asset('images/twitter.png') }}" alt="">
                                </div>
                                <div class="col" style="margin: 0 10px; background-color: #404040; border-radius: 50%; text-align: center; padding: 5px 5px 5px 5px;">
                                    <img src="{{ asset('images/instagram.png') }}" alt="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   
                </footer>
            </div>
            <!-- /#page-content-wrapper -->

            
        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="https://kit.fontawesome.com/d6f2727f64.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="{{ asset('bootstrap-4.5.1/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bootstrap-4.5.1/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>
    