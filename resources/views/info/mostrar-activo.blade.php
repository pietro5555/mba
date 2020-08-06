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
						<th class="center">Nombre</th>
						<th class="center">Nombre Completo</th>
						<th class="center">Parocinador</th>
						<th class="center">Direccion</th>
						<th class="center">Telefono</th>
						<th class="center">Correo</th>
						<th class="center">Banco</th>
						<th class="center">N° de cuenta</th>
						<th class="center">Fecha de inscripcion</th>
					</tr>
				</thead>
				<tbody>
					@foreach($usuario as $usua)
					@php
					$referido = DB::table($settings->prefijo_wp.'users')
					->select('user_nicename')
					->where('ID', '=', $usua['referred'])
					->get();

					$faltante = DB::table('user_campo')
					->where('ID', '=', $usua['ID'])
					->get();
					@endphp

					@if(date('d-m-Y', strtotime($usua['fecha'])) >= $primero && date('d-m-Y', strtotime($usua['fecha']))
					<= $segundo) @if($usua['status']==1) <tr>
						<td class="center">{{ $usua['ID'] }}</td>
						<td class="center">{{ $usua['nombre'] }}</td>
						@foreach($faltante as $falta)
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
						<td class="center">{{ $usua['email'] }}</td>
						<td class="center">{{ date('d-m-Y', strtotime($usua['fecha'])) }}</td>
						</tr>
						@endif
						@endif


						@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@include('usuario.componentes.scripBotones')