<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    <!-- Logo -->
    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="logo" class="logo-default" />
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('/avatar/'.Auth::user()->avatar)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs"> {{ Auth::user()->display_name }} </span>
                    </a>
                    
                </li>
                
                <li class="">
                <a href="{{ route('login-cerrar') }}" >
                    <i class="glyphicon glyphicon-off"></i>
                </a> 

                
            </li>
                
            </ul>
        </div>
    </nav>
</header>