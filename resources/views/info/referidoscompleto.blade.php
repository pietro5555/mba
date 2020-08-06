@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box ">
        <div class="box-body">
        
            {{-- tabla  --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table id="mytable" class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        ID
                                    </th>
                                    <th class="text-center">
                                        Nombre
                                    </th>
                                    <th class="text-center">
                                        Dni
                                    </th>
                                    <th class="text-center">
                                        Tipo de Usuario
                                    </th>
                                     <th class="text-center">
                                        Ingreso
                                    </th>
                                    <th class="text-center">
                                        Nivel
                                    </th>
                                    <th class="text-center">
                                        Patrocinador
                                    </th>
                                    <th class="text-center">
                                        Billetera
                                    </th>
                                    <th class="text-center">
                                        Ganancias
                                    </th>
                                    <th class="text-center">
                                        Ultima Compra
                                    </th>
                                    
                                    <th class="text-center">
                                        Total Referidos
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datos as $dato)
                                <tr>
                                    <td class="text-center">
                                        {{$dato['ID']}}
                                    </td>
                                    <td class="text-center">
                                        {{$dato['usuario']}}
                                    </td>
                                    <td class="text-center">
                                        {{$dato['dni']}}
                                    </td>
                                     <td class="text-center">
                                        {{$dato['tipo']}}
                                    </td>
                                    <td class="text-center">
                                        {{date('d-m-Y', strtotime($dato['ingreso']))}}
                                    </td>
                                    <td class="text-center">
                                        {{$dato['nivel']}}
                                    </td>
                                    <td class="text-center">
                                       {{$dato['patrocinador']}}
                                    </td>
                                     <td class="text-center">
                                       {{$dato['billetera']}}
                                    </td>
                                     <td class="text-center">
                                       {{$dato['ganancia']}}
                                    </td>
                                     <td class="text-center">
                                         @if(!empty($dato['ultimacompra']))
                                       {{date('d-m-Y', strtotime($dato['ultimacompra']))}}
                                       @else
                                       @endif
                                    </td>
                                     <td class="text-center">
                                       {{$dato['afiliados']}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- tabla fin --}}
        </div>
    </div>
</div>
@endsection
@include('usuario.componentes.scripBotones')