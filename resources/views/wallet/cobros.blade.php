@extends('layouts.dashboardnew')

@section('content')

@include('usuario.componentes.filtroPorFecha', ['ruta' => 'wallet-cobros-fechas', 'form' => ''])

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Descripcion</th>
						<th class="text-center">Ingreso</th>
						<th class="text-center">Retiro</th>
						<th class="text-center">Balance</th>
						@if($adicional == '1')
                        <th class="text-center">Valor en otras monedas</th>
                        @endif
						<th class="text-center">Fecha</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($billetera as $bille)
					<tr>
						<td class="text-center">{{ $bille->id }}</td>
						<td class="text-center">{{ $bille->usuario }}</td>
						<td class="text-center">{{ $bille->descripcion }}</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{ $bille->debito }}
							@else
							{{ $bille->debito }} {{$moneda->simbolo}}
							@endif
						</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{ $bille->credito }}
							@else
							{{ $bille->credito }} {{$moneda->simbolo}}
							@endif
						</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{ $bille->balance }}
							@else
							{{ $bille->balance }} {{$moneda->simbolo}}
							@endif
						</td>
						@if($adicional == '1')
						<td class="text-center">
						{{ $bille->monedaAdicional }}
						</td>
						@endif
						
						<td class="text-center">{{ date('d-m-Y', strtotime($bille->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scritpTable')