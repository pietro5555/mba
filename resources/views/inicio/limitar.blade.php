@extends('layouts.login.inicio')

@section('content')


<div class="col-xs-12">
    <div class="box box-info">
        <a href="{{route('restriccion-limitartodos')}}" class="btn btn-danger">Limitar Acceso Todos</a>
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                
                        <th class="text-center">
                            Usuario
                        </th>
                        <th class="text-center">
                            Ingreso
                        </th>
                        <th class="text-center">
                            Billetera
                        </th>
                        <th class="text-center">
                            Estatus
                        </th>
                        
                        <th class="text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">
                            {{$user->ID}}
                        </td>
                        
                        <td class="text-center">
                            {{$user->display_name}}
                        </td>
                        
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($user->created_at))}}
                        </td>
                        
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$user->billetera}}
                            @else
                            {{$user->billetera}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                           @if($user->limitar == 0)
                           Sin Acceso
                           @else
                           Acceso Permitido
                           @endif
                        </td>
                        <td class="text-center">
                           
                           @if($user->limitar == 1)
                           <a class="btn btn-danger" href="{{ route('restriccion-acceso', $user->ID) }}">Limitar Acceso </a>
                            @else
                            <a class="btn btn-info" href="{{ route('restriccion-acceso', $user->ID) }}">Permitir Acceso </a>
                            @endif
                        </td>
                
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@include('usuario.componentes.scritpTable')