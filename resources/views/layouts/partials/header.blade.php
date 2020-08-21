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
            <li class="nav-item">
                <a class="nav-link items-header" href="#">IDIOMA</a>
            </li>
        </ul>
        <div class="btn-register-header-div">
            <a type="button" class="btn btn-primary btn-register-header" href="{{ route('login') }}">REGISTRARME</a>
        </div>
    </div>
</nav>