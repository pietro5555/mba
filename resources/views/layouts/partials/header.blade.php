<nav class="navbar navbar-expand-lg navbar-dark bg-dark-gray border-bottom" style="height: 70px;">
    <button class="btn btn-primary" id="menu-toggle" style="background-color: #1D94FF !important;"><!--<span class="navbar-toggler-icon"></span>--><i class="fas fa-bars"></i></button>

    <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarItems" style="z-index: 1000;">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 header-list">
            <li class="nav-item active">
                <a class="nav-link items-header" href="{{route('index')}}">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="https://www.mybusinessacademypro.com/nosotros/">NOSOTROS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="https://www.mybusinessacademypro.com/gratis/">GRATIS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="https://www.mybusinessacademypro.com/blog/">BLOG</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link items-header" href="{{route('shopping-cart.membership')}}">MEMBRESIAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="{{ route('courses') }}">CURSOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link items-header" href="{{route('transmisiones')}}">STREAMING</a>
            </li>
            @if (Auth::guest())
                <li class="nav-item dropdown">
                    <div id="google_translate_element" class="google"></div>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle items-header" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        IDIOMA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Español</a>
                        <a class="dropdown-item" href="#">Inglés</a>
                    </div>
                </li> --}}

                <li class="nav-item li-register-button">
                    <a type="button" class="btn btn-primary btn-register-header" href="{{ route('log').'?act=1' }}">REGISTRARME</a> <!--/login-->
                </li>

                <li class="nav-item li-register-button">
                    <a type="button" class="btn btn-primary btn-register-header" href="{{ route('log').'?act=0' }}">ENTRAR</a> <!--/login-->
                </li>
            @else
                <li class="nav-item dropdown li-language" id="li-language-larger">
                    <div id="google_translate_element"></div>
                    {{-- <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-language dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            IDIOMA
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Español</a>
                            <a class="dropdown-item" href="#">Inglés</a>
                        </div>
                    </div> --}}
                </li>
                <li class="nav-item" id="li-language-small" style="display: none;">
                    <a class="nav-link items-header" href="#">IDIOMA</a>
                </li>

                {{--<li class="nav-item" id="li-search-larger" style="padding-right: 5px;">
                    <a class="nav-link items-header" href="#"><i class="fa fa-search"></i></a>
                </li>
                <li class="nav-item" id="li-search-small" style="display: none;">
                    <a class="nav-link items-header" href="#">BUSCAR</a>
                </li>
                <li class="nav-item" id="li-home-larger">
                    <a class="nav-link items-header" href="#"><i class="fa fa-home"></i> <span class="badge badge-pill badge-primary badge-header">9+</span></a>
                </li>
                <li class="nav-item" id="li-messages-larger">
                    <a class="nav-link items-header" href="#"><i class="fa fa-envelope"></i> <span class="badge badge-pill badge-primary badge-header">3</span></a>
                </li>
                <li class="nav-item" id="li-messages-small" style="display: none;">
                    <a class="nav-link items-header" href="#">MENSAJES</a>
                </li>
                <li class="nav-item dropdown" id="li-notifications-larger">
                    <a class="nav-link items-header" role="button" data-toggle="dropdown" data-target="#"><i class="fa fa-bell"></i> <span class="badge badge-pill badge-primary badge-header">3</span></a>

                    @include('layouts.partials.notificationsDropdown')
                </li>
                <li class="nav-item" id="li-notifications-small" style="display: none;">
                    <a class="nav-link items-header" href="#">NOTIFICACIONES</a>
                </li>--}}

                <li class="nav-item dropdown dropleft" id="li-user-larger" style="padding-right: 10px;">
                    <img class="dropdown-toggle items-header" id="navbarDropdown2" role="button" data-toggle="dropdown" src="{{ asset('images/logo.png') }}" alt="" width="40" height="40">

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Salir') }}
                    </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
                 <a class="dropdown-item" href="{{route ('admin.user.edit')}}">Ver perfil <i class=" fa fa-angle-right"> </i></a>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
