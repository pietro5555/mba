@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box ">
        <div class="box-body">
            {{-- formulario 1 --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <form method="GET" action="{{ route('info.pagosusuario') }}">
                            {{ csrf_field() }}
                            <div class="col-sm-4">
                                <label class="control-label " style="text-align: center; margin-top:4px;">Buscar
                                    Usuario</label>
                                <input class="form-control form-control-solid placeholder-no-fix" type="text"
                                    autocomplete="off" name="iduser" required style="background-color:f7f7f7;" />
                            </div>
                            <div class="col-sm-2" style="padding-left: 10px;">
                                <button class="btn green padding_both_small" type="submit" id="btn"
                                    style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- formulario 1 fin --}}
            {{-- formulario 2 --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <form method="POST" action="{{ route('info.buscar') }}">
                            {{ csrf_field() }}
                            <div class="col-sm-4">
                                <label class="control-label " style="text-align: center; margin-top:4px;">Fecha
                                    desde</label>
                                <input class="form-control form-control-solid placeholder-no-fix" type="date"
                                    autocomplete="off" name="primero" required style="background-color:f7f7f7;" />

                            </div>
                            <div class="col-sm-4">
                                <label class="control-label " style="text-align: center; margin-top:4px;">Fecha
                                    hasta</label>
                                <input class="form-control form-control-solid placeholder-no-fix" type="date"
                                    autocomplete="off" name="segundo" required style="background-color:f7f7f7;" />
                            </div>
                            <div class="col-sm-2" style="padding-left: 10px;">
                                <button class="btn green padding_both_small" type="submit" id="btn"
                                    style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- formulario 2 fin --}}
            {{-- tabla  --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table id="mytable" class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Monto</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagos as $pago)
                                <tr>
                                    <td class="text-center">{{$pago->id}}</td>
                                    <td class="text-center">{{$pago->username}}</td>
                                    <td class="text-center">{{$pago->email}}</td>
                                    <td class="text-center">{{$pago->monto}}</td>
                                    <td class="text-center">{{$pago->fechapago}}</td>
                                    <td class="text-center">
                                        @if ($pago->estado == 1)
                                        Aprobado
                                        @elseif ($pago->estado == 0)
                                        En Espera
                                        @endif
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