<nav class="navbar navbar-expand-lg navbar-dark bg-dark-gray border-bottom" style="height: 70px;">
    <button class="btn btn-primary" id="menu-toggle" style="background-color: #1D94FF !important;"><!--<span class="navbar-toggler-icon"></span>--><i class="fas fa-bars"></i></button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarItems">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 header-list">
            <li class="nav-item active">
                <a class="nav-link items-header" href="#">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="#">NOSOTROS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="{{ route('cursos') }}">CURSOS</a>
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
            @if (Auth::guest())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle items-header" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        IDIOMA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Español</a>
                        <a class="dropdown-item" href="#">Inglés</a>
                    </div>
                </li>
            @else
                <li class="nav-item dropdown" style="padding-left: 10px; padding-right: 20px;">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-language dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            IDIOMA
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Español</a>
                            <a class="dropdown-item" href="#">Inglés</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item" style="padding-right: 10px;">
                    <a class="nav-link items-header" href="#"><i class="fa fa-search"></i></a>
                </li>
                <li class="nav-item" style="padding-right: 10px;">
                    <a class="nav-link items-header" href="#"><i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item" style="padding-right: 10px;">
                    <a class="nav-link items-header" href="#"><i class="fa fa-envelope"></i></a>
                </li>
                <li class="nav-item" style="padding-right: 10px;">
                    <a class="nav-link items-header" href="#"><i class="fa fa-bell"></i></a>
                </li>
                <li class="nav-item dropdown dropleft" style="padding-right: 20px;">
                    <img class="dropdown-toggle items-header" id="navbarDropdown2" role="button" data-toggle="dropdown" src="{{ asset('images/logo.png') }}" alt="" width="40" height="40">
                
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Salir</a>
                    </div>
                </li>
            @endif-
        </ul>
        @if (Auth::guest())
            <div class="btn-register-header-div">
                <a type="button" class="btn btn-primary btn-register-header" href="{{ route('login') }}">REGISTRARME</a>
            </div>
        @endif
    </div>
</nav>