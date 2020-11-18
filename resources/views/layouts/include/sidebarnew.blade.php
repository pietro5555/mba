@guest
@else
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        {{--<div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/uploads/avatar/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->display_name }}</p>
                <a href="#"> @if (Auth::user()->status == '0')
                <i class="fa fa-circle text-danger"></i>
                    <strong>Inactivo</strong>
                    @else
                <i class="fa fa-circle text-success"></i>
                    <strong>Activo</strong>
                    @endif</span></a>
            </div>
        </div>--}}

        <ul class="sidebar-menu" data-widget="tree">
            {{-- INICIO --}}
            <li class="header">Menu</li>

            {{-- el arreglo de menus esta en el middleware menu --}}
            @foreach ($menus as $index => $item)
            @if ($item['permisoAdmin'] == 1)
                @if ($item['submenu'] == '0')
                    @if ($item['complementoruta'] != 'externo')
                        @if ($index == 'Nuevo Registro Cliente' && $settingCliente->cliente == 1)
                            <li class="">
                            <a href="{{route($item['ruta']).$item['complementoruta']}}">
                                <i class="{{$item['icono']}}"></i>
                                <span>{{$index}}</span>
                            </a>
                        </li>
                        @else
                            @if ($index != 'Nuevo Registro Cliente')
                                <li class="">
                                    <a href="{{route($item['ruta']).$item['complementoruta']}}">
                                        <i class="{{$item['icono']}}"></i>
                                        <span>{{$index}}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @else
                    @if($item['black'] == '0')
                        <li class="">
                            <a href="{{$item['ruta']}}">
                                <i class="{{$item['icono']}}"></i>
                                <span>{{$index}}</span>
                            </a>
                        </li>
                        @else
                        <li class="">
                            <a href="{{$item['ruta']}}" target="_blank">
                                <i class="{{$item['icono']}}"></i>
                                <span>{{$index}}</span>
                            </a>
                        </li>
                        @endif
                    @endif
                @else
                <li class="treeview {{$item['activo'] }}">
                    <a href="{{$item['ruta']}}">
                        <i class="{{$item['icono']}}"></i>
                        <span>{{$index}}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach ($item['menus'] as $subIndex => $subItem)
                        @if($subItem['oculto'] == 'activo')
                        <li>
                            @if ($subIndex == 'Árbol de Cliente' && $settingCliente->cliente == 1)
                                <a href="{{route($subItem['ruta']).$subItem['complementoruta']}}">
                                    <i class="far fa-circle"></i>
                                    {{$subIndex}}
                                </a>
                            @else
                                @if ($subIndex != 'Árbol de Cliente')
                                @if($subItem['black'] == '0')
                                <a href="{{route($subItem['ruta']).$subItem['complementoruta']}}">
                                        <i class="far fa-circle"></i>
                                        {{$subIndex}}
                                    </a>
                                    @else
                                    <a href="{{url($subItem['ruta']).$subItem['complementoruta']}}" target="_blank">
                                        <i class="far fa-circle"></i>
                                        {{$subIndex}}
                                    </a>
                                    @endif
                                @endif
                            @endif

                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @endif
                @endif
            @endforeach
            @if(Auth::user()->rol_id == 0)
            <li class="">
                <a href="#imageLanding" data-toggle="modal">
                    <i class="fas fa-toolbox"></i>
                    <span>Imagen Landing</span>
                </a>
            </li>
            @endif
            {{-- CERRAR SESIÓN --}}
            <li class="">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="glyphicon glyphicon-off"></i>
                    <span>Cerrar Sesión</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            {{-- FIN CERRAR SESIÓN --}}

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

{{-- Modal Imagen Landing --}}
<div class="modal fade" id="imageLanding" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content" style="background-color: black;">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Actualizar imagen Landing</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body text-center">
            <form action="{{route('admin.update.image.landing')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <h5 for="">Imagen Actual</h5>
                    <img src="{{asset($settings->id_no_comision)}}" alt="" height="200" width="200">
                </div>
                <div class="form-group">
                    <label for="">Nueva Imagen</label>
                    <input type="file" name="image_landing" class="form-control" accept="image/png, image/jpeg">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Subir</button>
                </div>
            </form>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
       </div>
    </div>
 </div>
@endguest
