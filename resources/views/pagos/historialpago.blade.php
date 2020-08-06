@extends('layouts.dashboardnew')

@section('content')

@include('usuario.componentes.filtroPorFecha', ['ruta' => 'price-filtro', 'form' => 'historialpago'])

@if (!empty($fechas['desde']) && !empty($fechas['hasta']))
{{-- fecha --}}
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
			<div class="form-group col-xs-12 col-sm-6">
				<label>Fecha Desde</label>
				<h5>{{ date('d-m-Y', strtotime($fechas['desde'])) }}</h5>
			</div>
			<div class="form-group col-xs-12 col-sm-6">
				<label>Fecha Hasta</label>
				<h5>{{date('d-m-Y', strtotime($fechas['hasta']))}}</h5>
			</div>
		</div>
	</div>
</div>
@endif

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
							Correo
						</th>
						<th class="text-center">
							Tipo de Metodo
						</th>
						<th class="text-center">
							Monto
						</th>
						<th class="text-center">
							Descuento
						</th>
						<th class="text-center">
							Total
						</th>
						
						 @if($adicional == '1')
                        <th class="text-center">
                            Valor en otras monedas
                        </th>
                        @endif
                        
						<th class="text-center">
							Fecha
						</th>
						<th class="text-center">
							Estado
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
							{{$pago->username}}
						</td>
						<td class="text-center">
							{{$pago->email}}
						</td>
							<td class="text-center">
							{{$pago->tipopago}}
						</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{$pago->monto}}
							@else
							{{$pago->monto}} {{$moneda->simbolo}}
							@endif
						</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{$pago->descuento}}
							@else
							{{$pago->descuento}} {{$moneda->simbolo}}
							@endif
						</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{($pago->monto + $pago->descuento)}}
							@else
							{{($pago->monto + $pago->descuento)}} {{$moneda->simbolo}}
							@endif
						</td>
						
						 @if($adicional == '1')
                        <th class="text-center">
                            {{$pago->monedaAdicional}}
                        </th>
                        @endif
                        
						<td class="text-center">
							{{$pago->fechapago}}
						</td>
						<td class="text-center">
							@if ($pago->estado == 1)
							Aprobado
							@elseif ($pago->estado == 2)
							Rechazado
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
@include('usuario.componentes.scripBotones')
@push('script')
<script>
	$('#sandbox-container input').datepicker();
</script>
@endpush