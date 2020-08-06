@extends('layouts.dashboardnew')

@section('content')


@push('style')
<style>
		.color {
			background-color: #e5e5e5;
		}
	
		.center {
			text-align: center;
		}
	</style>
@endpush

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr class="color">
						<th class="center">#</th>
						<th class="center">Nombre Usuario</th>
						<th class="center">Descripcion</th>
						<th class="center">Descuento</th>
						<th class="center">Debito</th>
						<th class="center">Credito</th>
						<th class="center">Total Liquidado</th>
						<th class="center">Balance</th>
						<th class="center">Fecha</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($liquidacion as $liquida)
					<tr>
						<td class="center">{{ $liquida->id }}</td>
						<td class="center">{{ $liquida->usuario }}</td>
						<td class="center">{{ $liquida->descripcion }}</td>
						<td class="center">{{ $liquida->descuento }}</td>
						<td class="center">{{ $liquida->debito }}</td>
						<td class="center">{{ $liquida->credito }}</td>
						<td class="center">{{ ($liquida->descuento + $liquida->debito) }}</td>
						<td class="center">{{ $liquida->balance }}</td>
						<td class="center">{{ date('d-m-Y', strtotime($liquida->created_at))}}</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@include('usuario.componentes.scripBotones')