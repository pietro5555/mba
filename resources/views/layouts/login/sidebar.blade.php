@guest
@else
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/avatar/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->display_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> @if (Auth::user()->status == '0')
                    <strong>Inactivo</strong>
                    @else
                    <strong>Activo</strong>
                    @endif</span></a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            {{-- INICIO --}}
            <li class="header">Menu</li>
            
            <li class="">
               <a href="{{route('inicio-inicio')}}">
                 <i class="fa fa-home"></i>
                   <span>Inicio</span>
                </a>
            </li>
            
            <li class="">
               <a href="{{route('inicio-inicio')}}">
                 <i class="fas fa-sync"></i>
                   <span>Actualizar</span>
                </a>
            </li>
            
            
            @if(Auth::user()->rol_id > '0')
            
            <li class="">
               <a href="{{route('transferencia-historial')}}">
                 <i class="fa fa-credit-card"></i>
                   <span>Historial de Transferencias</span>
                </a>
            </li>
            
            
             @else
            <li class="treeview">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>Ajustes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('noticias-noticias')}}">
                                    <i class="far fa-circle"></i>
                                    Noticias
                                </a>
                       </li>
                       
                        <li>
                            <a href="{{route('ajustes-wallet')}}">
                                    <i class="far fa-circle"></i>
                                    Wallet
                                </a>
                       </li>
                       
                       
                       <li>
                            <a href="{{route('ajustes-feet')}}">
                                    <i class="far fa-circle"></i>
                                    Transferencia Comision
                                </a>
                       </li>
                       
                       <li>
                            <a href="{{route('restriccion-limitar')}}">
                                    <i class="far fa-circle"></i>
                                    Acceso
                                </a>
                       </li>
                       
                        <li>
                            <a href="{{route('ajustes-recarga')}}">
                                    <i class="far fa-circle"></i>
                                    Recargar
                                </a>
                       </li>
                    </ul>
                </li>
            @endif
           
              
            {{-- CERRAR SESIÓN --}}
            <li class="">
                <a href="{{ route('login-cerrar') }}">
                    <i class="glyphicon glyphicon-off"></i>
                    <span>Cerrar Sesión</span>
                </a>

            </li>
            {{-- FIN CERRAR SESIÓN --}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endguest