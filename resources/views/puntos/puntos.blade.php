@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      {{-- form 1 --}}
      <div class="col-xs-12">
        <form method="POST" action="{{ route('puntos.nombre') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Nombre del Usuario</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
              name="nombre" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
      </div>
    
      <div class="col-xs-12">
        <form method="POST" action="{{ route('puntos.fechas') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha desde</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="fecha1" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha hasta</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="fecha2" required style="background-color:f7f7f7;" />
          </div>


          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
      </div>
      {{-- form 2 fin --}}
    </div>
  </div>
</div>


<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        @if (Auth::user()->rol_id == 0)
                        <th class="text-center">
                            Usuario
                        </th>
                        @endif
                        <th class="text-center">
                            Descripción
                        </th>
                        <th class="text-center">
                            Puntos
                        </th>
                        <th class="text-center">
                            Cantidad de Puntos
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total =0;
                    @endphp
                    @foreach ($datos as $dato)
                    @php
                    $total +=$dato['puntos'];
                    @endphp
                    <tr>
                        <td class="text-center">
                            {{$dato['id']}}
                        </td>
                        @if (Auth::user()->rol_id == 0)
                        <td class="text-center">
                             {{$dato['usuario']}}
                        </td>
                        @endif
                        <td class="text-center">
                            {{$dato['concepto']}}
                        </td>
                        <td class="text-center">
                            {{$dato['puntos']}}
                        </td>
                        <td class="text-center">
                            {{$dato['cantidad']}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div><h4 style="text-align:center;"><strong>Total Puntos: {{$total}}</strong></h4></div>
        </div>
    </div>

</div>


@endsection

@include('usuario.componentes.scritpTable')