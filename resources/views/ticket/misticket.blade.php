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
	<div class="box">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr class="color">
						<th class="center">#</th>
						<th class="center">Fecha</th>
						<th class="center">Tipo de ticket</th>
						<th class="center">Titulo</th>
						<th class="center">Soporte</th>
						<th class="center">Estado</th>
						<th class="center">Opcion</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($ticket as $tic)

					<tr>
						<td class="center">{{ $tic->id }}</td>
						<td class="center">{{ date('d-m-Y', strtotime($tic->created_at)) }}</td>
						<td class="center">{{ $tic->tipo }}</td>
						<td class="center">{{ $tic->titulo }}</td>
						<td class="center">Enviado a Soporte</td>
						@if($tic->status == 0)
						<td class="center">Abierto</td>
						@else
						<td class="center">Cerrado</td>
						@endif
						@if($tic->status == 0)
						<td><a href="{{ route('comentar', $tic->id) }}" class="btn btn-info">Comentar</a></td>
						@else
						<td><a href="{{ route('ver', $tic->id) }}" class="btn btn-info">Ver</a></td>
						@endif
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
{{-- script que activa el datatable --}}
@include('usuario.componentes.scritpTable')