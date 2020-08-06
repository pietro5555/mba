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
                            Usuario
                        </th>
                        <th class="text-center">
                            Descripcion
                        </th>
                        <th class="text-center">
                            Descuento
                        </th>
                        <th class="text-center">
                            Fecha
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagos as $pago)
                    <tr>
                        <td class="text-center">
                            {{$pago->id}}
                        </td>
                        <td class="text-center">
                            {{$pago->usuario}}
                        </td>
                        <td class="text-center">
                            {{$pago->descripcion}}
                        </td>
                        <td class="text-center">
                            {{$pago->descuento}}
                        </td>
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($pago->created_at))}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@include('usuario.componentes.scripBotones')