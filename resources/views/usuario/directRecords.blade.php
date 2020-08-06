@extends('layouts.dashboardnew')

@section('content')

{{-- filtro por fecha --}}
@include('usuario.componentes.filtroPorFecha', ['ruta' => 'buscardirectos', 'form' => ''])

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Estado</th>
						<th class="text-center">Ingreso</th>
						@if($estructura == 'binaria')
						<th class="text-center">Lado</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@php
					$cont = 0;
					@endphp
					@foreach ($referidosDirectos as $referido)
					@php
					$cont++;
					@endphp
					<tr>
						<td class="text-center">{{ $referido->ID }}</td>
						<td class="text-center">{{ $referido->display_name }}</td>
						<td class="text-center">{{ $referido->user_email }}</td>
						<td class="text-center">
							@if ($referido->status == '0')
								Inactivo
							@else
								Activo
							@endif
						</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($referido->created_at)) }}</td>
						
						@if($estructura == 'binaria')
						<td class="text-center">{{ $referido->ladomatriz}}</td>
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