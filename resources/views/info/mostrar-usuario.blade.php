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
						<th class="center">Nombre</th>
						<th class="center">Nombre Completo</th>
						<th class="center">Parocinador</th>
						<th class="center">Direccion</th>
						<th class="center">Telefono</th>
						<th class="center">Banco</th>
						<th class="center">N° de cuenta</th>
						<th class="center">Correo</th>
						<th class="center">Fecha de inscripcion</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($buscar as $bus)

					@php
					$referido = DB::table($settings->prefijo_wp.'users')
					->select('user_nicename')
					->where('ID', '=', $bus->referred_id)
					->get();

					$faltante = DB::table('user_campo')
					->where('ID', '=', $bus->ID)
					->get();
					@endphp

					<tr>
						@foreach($faltante as $falta)
						<td class="center">{{ $falta->ID }}</td>
						<td class="center">{{ $bus->user_nicename }}</td>
						<td class="center">{{$falta->firstname}} {{$falta->lastname}}</td>


						@foreach($referido as $refe)
						<td class="center">{{ $refe->user_nicename }}</td>
						@endforeach

						@if($falta->ID==1)
						<td class="center">N/A</td>
						@endif
						<td class="center">{{ $falta->direccion }}</td>
						<td class="center">{{ $falta->phone }}</td>
						<td class="center">{{ $falta->banco}}</td>
						<td class="center">{{ $falta->cuenta}}</td>
						@endforeach
						<td class="center">{{ $bus->user_email }}</td>
						<td class="center">{{ date('d-m-Y', strtotime($bus->created_at)) }}</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scripBotones')