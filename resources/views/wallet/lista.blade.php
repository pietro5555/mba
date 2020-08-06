@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    <a class="btn btn-info btn-block" data-toggle="modal" data-target="#valores">Actualizar Valor del canje</a>
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Cantidad Puntos</th>
						<th class="text-center">Total a Recibir</th>
						<th class="text-center">Estatus</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($canjes as $canje)
					@php
					$user = DB::table($settings->prefijo_wp.'users')
					->select('display_name')
					->where('ID', '=', $canje->iduser)
					->first();
					@endphp
					<tr>
						<td class="text-center">{{ $canje->id }}</td>
						<td class="text-center">{{ $user->display_name }}</td>
						<td class="text-center">{{ $canje->cantidad }}</td>
						<td class="text-center">{{ $canje->total}}</td>
						<td class="text-center">
							@if ($canje->status == '0')
							En espera
							@elseif($canje->status == '1')
							Aprobado
							@else
							Cancelado
							@endif
						</td>
						
						<td class="text-center">{{ date('d-m-Y', strtotime($canje->created_at)) }}</td>
						
						<td class="text-center">
						    
						    @if($canje->status == '0')
						    <a class="btn btn-info" href="{{ route('cambio-aceptar', $canje->id) }}">
								Aceptar</a>
								
								
								<a class="btn btn-danger" href="{{ route('cambio-cancelar', $canje->id) }}" >
								Cancelar</a>
								@else
								<a class="btn btn-info" href="{{ route('cambio-aceptar', $canje->id) }}" disabled>
								Aceptar</a>
								
								
								<a class="btn btn-danger" href="{{ route('cambio-cancelar', $canje->id) }}" disabled>
								Cancelar</a>
								@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@include('wallet/modal/modalcanje')
@include('wallet/modal/valor')

@endsection
@include('usuario.componentes.scritpTable')
