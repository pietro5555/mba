@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Filtrar por fecha</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="{{ route('wallet-comisiones-pagar-filtro') }}" class="form-inline">
                {{ csrf_field() }}
                
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Fecha desde</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha1" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Fecha hasta</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha2" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-2">
                    <button class="btn green padding_both_small" type="submit" id="btn">
                        buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Nivel</th>
						<th class="text-center">Total</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($datos as $wallet)
					<tr>
						<td class="text-center">{{ $wallet['ID'] }}</td>
						<td class="text-center">{{ $wallet['usuario'] }}</td>
						<td class="text-center">{{ $wallet['nivel'] }}</td>
						<td class="text-center">
						    @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{ $wallet['total'] }}
                            @else
                            {{ $wallet['total'] }} {{$moneda->simbolo}}
                            @endif  
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<h4 style="text-align:center;"><strong>
			    Total:
			    @if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{$totalcompleto}}
							@else
							{{$totalcompleto}} {{$moneda->simbolo}}
							@endif
				</strong></h4>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scripBotones')