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
						<th class="center">Rango</th>
						<th class="center">Nombre Completo</th>
						<th class="center">Nombre de Usuario</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rango as $usua)



					@php
					$referido = DB::table($settings->prefijo_wp.'users')
					->select('user_nicename')
					->where('ID', '=', $usua->referred_id)
					->get();

					$faltante = DB::table('user_campo')
					->where('ID', '=', $usua->ID)
					->get();


					$roles = DB::table('roles')
					->get();
					@endphp

					<tr>
						<td class="center">{{ $usua->ID }}</td>
						@foreach($roles as $rol)

						@if($rol->id == $usua->rol_id)
						<td class="center">{{$rol->name}}</td>
						@endif
						@endforeach

						@foreach($faltante as $falta)
						<td class="center">{{$falta->firstname}} {{$falta->lastname}}</td>
						@endforeach

						<td class="center">{{ $usua->user_nicename }}</td>
					</tr>



					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@include('usuario.componentes.scripBotones')