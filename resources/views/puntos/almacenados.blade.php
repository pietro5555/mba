@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Descripcion</th>
						<th class="text-center">Puntos</th>
						<!--<th class="text-center">Balance</th>-->
						<th class="text-center">Fecha</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($billetera as $bille)
					<tr>
						<td class="text-center">{{ $bille->id }}</td>
						<td class="text-center">{{ $bille->usuario }}</td>
						<td class="text-center">{{ $bille->concepto }}</td>
						<td class="text-center">
						
							{{ $bille->puntos }}
						
						</td>
						<!--<td class="text-center">
							{{ $bille->balance }}
							
						</td>-->
						<td class="text-center">{{ date('d-m-Y', strtotime($bille->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<h4 style="text-align:center;"><strong>Puntos Derecha: {{$D}}, Puntos Izquierda: {{$I}}</strong></h4>
		</div>
	</div>
</div>
@endsection
@include('usuario.componentes.scritpTable')