@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
	.color {
		background-color: #e5e5e5;
	}
</style>
@endpush

<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr class="color">
						<th class="text-center">#</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Nombre de Usuario</th>
						<th class="text-center">Direccion IP</th>
						<th class="text-center">Actividad</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sesion as $sesi)
					<tr>
						<td class="text-center">{{ $sesi->id }}</td>
						<td class="text-center">{{ $sesi->fecha }}</td>
						<td class="text-center">{{ $sesi->display_name }}</td>
						<td class="text-center">{{ $sesi->ip }}</td>
						<td class="text-center">{{ $sesi->actividad }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scritpTable')