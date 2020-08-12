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

                <div class="container-fluid" style="padding-right: 0 !important; padding-left: 0 !important; padding-bottom: 30px;">
                    <div id="mainSlider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
                            <li data-target="#mainSlider" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/slider1.png') }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <div style="color: #2A91FF; font-weight: bold; padding-bottom: 30px; font-size: 24px;">NUEVO CURSO</div>

                                    <div style="color: #727272; font-weight: bold; font-size: 35px;">John Doe</div>

                                    <div style="color: #FFFFFF; font-weight: bold; font-size: 60px; line-height: 60px; padding: 20px 0;">
                                        LEYES DEL ÉXITO FINANCIERO
                                    </div>

                                    <div style="color: #727272; font-weight: bold; font-size: 22px;">
                                        FINANZAS | NEGOCIOS
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/slider1.png') }}" class="d-block w-100" alt="...">

                                <div class="carousel-caption d-none d-md-block">
                                    <div style="color: #2A91FF; font-weight: bold; padding-bottom: 30px; font-size: 24px;">NUEVO CURSO</div>

                                    <div style="color: #727272; font-weight: bold; font-size: 35px;">John Doe</div>

                                    <div style="color: #FFFFFF; font-weight: bold; font-size: 60px; line-height: 60px; padding: 20px 0;">
                                        LEYES DEL ÉXITO FINANCIERO
                                    </div>

                                    <div style="color: #727272; font-weight: bold; font-size: 22px;">
                                        FINANZAS | NEGOCIOS
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                @if (!Auth::guest())
                    <div class="section-landing">
                        <div class="section-title-landing">TU AVANCE</div>
                        <div class="row">
                            <div class="col text-left">
                                Nivel: Principiante
                            </div>
                            <div class="col text-right">
                                Próximo Nivel: Intermedio
                            </div>
                            <div class="w-100"></div>
                            <div class="col" style="padding: 20px 20px;">
                                <!--<div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>-->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-left">
                                Cursos Realizados: 7
                            </div>
                            <div class="col text-right">
                                Cursos por Realizar: 4
                            </div>
                        </div>
                    </div><BR><BR>
                @endif
                
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
                            <div class="card" >
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

                <div style="width: 100%; position: relative; display: inline-block;">
                    <img src="{{ asset('images/banner_completo.png') }}" alt="" style="height: 500px; width:100%; opacity: 0.5;">
                    <div style="position: absolute; top: 2%; left: 5%;">
                        <div style="color: white; font-size: 70px; font-weight: bold;">
                            <button type="button" class="btn btn-primary" style="font-weight: bold; width: 180px;">Próximo Streaming</button><br>
                            
                            <div style="width: 60%; line-height: 70px;">
                                Lorem ipsum up dolor sit amet
                            </div> 
                            <div style="font-size: 25px; font-weight: 500;">
                                <i class="fa fa-calendar"></i> Sábado 25 de Julio
                                <i class="fa fa-clock"></i> 6:00 pm
                            </div>
                            <div style="font-size: 35px; padding-top: 60px;">
                                <a href="">Reservar Plaza <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><br><br>

                @if (!Auth::guest())
                    <div style="padding-top: 30px;">
                        <div class="row">
                            <div class="col-4" style="padding-left: 30px;">
                                <div style="text-align: center; font-size: 30px; color: white; font-weight: bold; border: solid white 1px; margin-bottom: 10px;">
                                    <i class="fa fa-user"></i><br>
                                    739 Referidos
                                </div>
                                <div style="text-align: center; font-size: 25px; color: white; font-weight: bold; background-color: green;">
                                    Panel de referidos
                                </div>
                            </div>
                            <div class="col-8">
                                <img src="{{ asset('images/banner2.jpg') }}" alt="" style="height: 200px; width:100%;">
                            </div>
                        </div>
                    </div><br><br>
                @endif

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
