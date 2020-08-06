@extends('layouts.dashboardnew')

@section('content')

{{-- filtro por fecha --}}
@include('usuario.componentes.filtroPorFecha', ['ruta' => 'buscarnetwork', 'form' => ''])


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
						<th class="text-center">Tipo de Usuario</th>
						<th class="text-center">Tipo de Referido</th>
						<th class="text-center">Nivel de Referido</th>
						<th class="text-center">Ingreso</th>
					    @if($estructura == 'binaria')
						<th class="text-center">Lado</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach ($allReferido as $referido)
					<tr>
						<td class="text-center">{{ $referido['ID'] }}</td>
						<td class="text-center">{{ $referido['nombre'] }}</td>
						<td class="text-center">{{ $referido['email'] }}</td>
						<td class="text-center">
							@if ($referido['status'] == '0')
								Inactivo
							@else
								Activo
							@endif
							</td>
						<td class="text-center">
								{{$referido['tipouser']}}
							</td>
						<td class="text-center">
							@if($referido['nivel'] == 1)
								Directo
							@else
								Indirecto
							@endif
						</td>
						<td class="text-center">
							@if($referido['nivel'] == 1)
								1
							@else
								{{$referido['nivel']}}
							@endif
						</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($referido['fecha'])) }}</td>
						
						@if($estructura == 'binaria')
						<td class="text-center">{{ $referido['lado']}}</td>
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