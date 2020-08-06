@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
	<div class="box box-primary">
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
							Monto
						</th>
						<th class="text-center">
							Metodo
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
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{$pago->monto}}
							@else
							{{$pago->monto}} {{$moneda->simbolo}}
							@endif
						</td>
						<td class="text-center">
							{{$pago->metodo}}
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