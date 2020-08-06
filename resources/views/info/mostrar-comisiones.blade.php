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
		<div class="box-header with-border text-center">
			<img src="{{ asset('assets/img/logo-light.png') }}" alt="logo" class="logo-default" style="width: 115px;" />
		</div>
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr class="color">
						<th class="center">#</th>
						<th class="center">Nombre de Usuario</th>
						<th class="center">Concepto</th>
						<th class="center">Monto</th>
					</tr>
				</thead>
				<tbody>
					@foreach($lista as $usua)



					@php

					$faltante = DB::table($settings->prefijo_wp.'users')
					->where('ID', '=', $usua->user_id)
					->get();
					@endphp


					<tr>
						<td class="center">{{ $usua->id }}</td>
						@foreach($faltante as $falta)
						<td class="center">{{ $falta->user_nicename }}</td>
						@endforeach
						<td class="center">{{ $usua->concepto }}</td>
						<td class="center">{{ $usua->total }}</td>

					</tr>

					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scripBotones')