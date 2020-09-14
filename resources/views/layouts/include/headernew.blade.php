  @guest
   @php
  $carrito = DB::table('carritos')
    ->where('ip', '=', request()->ip())
    ->count();
  @endphp
  
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

        <div class="navbar-custom-menu" style="margin-right: 50px;">
            <ul class="nav navbar-nav">
                
                <li class="dropdown notifications-menu">
                    <a href="{{route('carrito-carrito')}}">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        @if($carrito != '0')
                        <span class="label label-warning">{{$carrito}}</span>
                        @else @endif
                    </a>
                    
                </li>
            </ul>
            </div>
</nav>
</header>
     
         @else
<header class="main-header">
    @php
    $cant = 0;
    
     $cant = DB::table('notificacion_tickets')
     ->where('user', '=', Auth::user()->ID)
     ->where('status', '=', '0')
     ->count();

    $cantNotificaciones = DB::table('notifications')
    ->where('user_id', '=', Auth::user()->ID)
    ->where('status', '=', false)
    ->count();
    
    $carrito = DB::table('carritos')
    ->where('iduser', '=', Auth::user()->ID)
    ->count();
    
    $mensajeria = DB::table('chats')->where([['destino', Auth::user()->ID], ['status', '=', 0]])->count();
    
    if(Auth::user()->rol_id != 0){
    $publico = DB::table('chat_codigo')->where([['codigo', Auth::user()->status], ['status', '0'], ['usuario_id', Auth::user()->ID]])->count();
    }else{
    $publico1 = DB::table('chat_codigo')->where([['status', '0'], ['usuario_id', Auth::user()->ID], ['codigo', '0']])->count();
    
    $publico2 = DB::table('chat_codigo')->where([['status', '0'], ['usuario_id', Auth::user()->ID], ['codigo', '1']])->count();
    
    $publico=0;
    $publico =($publico1 + $publico2);
    }
    $roles = DB::table('roles')->get();

    @endphp
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
                
                 <li class="dropdown notifications-menu">
                    <a href="{{route('setting-modo-oscuro', Auth::user()->ID)}}">
                        @if(Auth::user()->modo_oscuro == 1)
                        <i class="fas fa-adjust"></i>
                        @else
                        <i class="fas fa-moon"></i>
                        @endif
                    </a>
                    
                </li>
                
                
                <li class="dropdown notifications-menu">
                    <a href="{{route('chat-inicio')}}">
                        <i class="fa fa-comments"></i>
                        @if($mensajeria != '0')
                        <span class="label label-danger">{{$mensajeria}}</span>
                        @else @endif
                    </a>
                    
                </li>
               
                
                <li class="dropdown notifications-menu">
                    <a href="{{route('chat-publico')}}">
                        <i class="fas fa-comment"></i>
                        @if($publico != '0')
                        <span class="label label-info">{{$publico}}</span>
                        @else @endif
                    </a>
                    
                </li>
                
                @if($settings->btc == 0)
                <li class="dropdown notifications-menu">
                    <a href="{{route('carrito-carrito')}}">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        @if($carrito != '0')
                        <span class="label label-warning">{{$carrito}}</span>
                        @else @endif
                    </a>
                    
                </li>
                @endif
                
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-ticket-alt"></i>
                        @if($cant != '0')
                        <span class="label label-success">{{$cant}}</span>
                        @else @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes {{$cant}} tickets/Soporte</li>
                        <li>
                            @include('layouts.include.notificacion_ticket')

                        </li>
                        <li class="footer"><a href="{{url('admin/ticket/todosticket')}}">Todos los Tickets/Soporte</a></li>
                    </ul>
                </li>


                <!-- Notifications: style can be found in dropdown.less -->
               <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-bell"></i>
                        @if($cantNotificaciones != '0')
                        <span class="label label-warning">{{$cantNotificaciones}}</span>
                        @else @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tienes {{$cantNotificaciones}} notificaciones</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            @include('layouts.include.notifications')

                        </li>
                        <li class="footer"><a href="{{route('admin.notifications')}}">Todas Las Notificaciones</a></li>
                    </ul>
                </li>
                
                
        <!-- Escojer el color del sistema solo para el admin -->        
            @if(Auth::user()->rol_id == 0)
                <li>
                    
<a href="#" data-container="body" title="Selecione el color del sistema" data-toggle="popover" data-placement="left" data-html="true" 
                    
                    data-content='
<a href="{{route('setting-color-admin', ['tipo' => '1'])}}"><i class="fa fa-circle text-azul"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '2'])}}"><i class="fa fa-circle text-azul-claro"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '7'])}}"><i class="fa fa-circle text-purpura"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '8'])}}"><i class="fa fa-circle text-purpura-claro"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '5'])}}"><i class="fa fa-circle text-verde"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '6'])}}"><i class="fa fa-circle text-verde-claro"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '9'])}}"><i class="fa fa-circle text-rojo"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '10'])}}"><i class="fa fa-circle text-rojo-claro"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '11'])}}"><i class="fa fa-circle text-amarillo"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '12'])}}"><i class="fa fa-circle text-amarillo-claro"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '3'])}}"><i class="fa fa-circle text-negro"></i></a>
<a href="{{route('setting-color-admin', ['tipo' => '4'])}}"><i class="fa fa-circle text-negro-claro"></i></a>'
                    ><i class="fas fa-cog"></i></a>
                    
                </li>
            @endif
                
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('/uploads/avatar/'.Auth::user()->avatar)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs"> {{ Auth::user()->display_name }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('/uploads/avatar/'.Auth::user()->avatar)}}" class="img-circle"
                                alt="User Image">
                            <p>
                                <span class="username"> {{ Auth::user()->display_name }} </span> - @foreach($roles as
                                $rol)
                                @if($rol->id == Auth::user()->rol_id)
                                {{$rol->name}}
                                @endif
                                @endforeach
                                <small>{{date('d-m-Y', strtotime(Auth::user()->user_registered))}}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.user.edit') }}" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">

                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> Salir</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
@endguest