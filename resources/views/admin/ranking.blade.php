@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">ID</th>
						<th class="text-center">Nombre Completo</th>
						<th class="text-center">Usuario</th>
						@if(Auth::user()->rol_id == '0')
						<th class="text-center">Saldo Actual</th>
						<th class="text-center">Ganancia Total</th>
						@endif
					</tr>
				</thead>

				<tbody>
					@php
					$n=0;
					@endphp
					@foreach ($rankingComisiones as $comision)
					@php
					$n++;
					@endphp
					<tr>
						<td class="text-center">{{$n}}</td>
						<td class="text-center">{{$comision['usuario1']}}</td>
						<td class="text-center">{{$comision['usuario2']}} {{$comision['usuario3']}}</td>
						<td class="text-center">{{$comision['usuario']}}</td>
						@if(Auth::user()->rol_id == '0')
						<td class="text-center">{{$comision['usuario4']}}</td>
						<td class="text-center">{{$comision['total']}}</td>
						@endif
					</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scritpTable')
