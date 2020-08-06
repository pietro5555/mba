@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            Descripción
                        </th>
                        <th class="text-center">
                            Puntos
                        </th>
                        <th class="text-center">
                           Total Puntos
                        </th>
                        <th class="text-center">
                           Fecha
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puntos as $dato)
                    <tr>
                        <td class="text-center">
                            {{$dato->id}}
                        </td>
                        @if (Auth::user()->rol_id == 0)
                        <td class="text-center">
                             {{$dato->usuario}}
                        </td>
                        @endif
                        <td class="text-center">
                            {{$dato->concepto}}
                        </td>
                        <td class="text-center">
                            {{$dato->puntos}}
                        </td>
                        <td class="text-center">
                            {{$dato->cantidad}}
                        </td>
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($dato->created_at))}}
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