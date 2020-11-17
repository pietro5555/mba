@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		   
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Mentor</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Titulo del Curso</th>
						<th class="text-center">Progreso</th>
						<th class="text-center">Fecha Inicio</th>
						<th class="text-center">Fecha Culminacion</th>
						<th class="text-center">Idioma</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($estadisticas as $esta)
				
					<tr>
						<td class="text-center">{{ $esta->id }}</td>
						<td class="text-center">{{ $esta->mentor }}</td>
						<td class="text-center">{{ $esta->usuario }}</td>
						<td class="text-center">{{ $esta->title }}</td>
						<td class="text-center">{{ $esta->progreso}} % </td>
						<td class="text-center">{{ date('d-m-Y', strtotime($esta->start_date))}}</td>
						<td class="text-center">
						    @if($esta->finish_date != null)
						    {{ date('d-m-Y', strtotime($esta->finish_date)) }}
						    @else
						    
						    @endif
						</td>
						
						<td class="text-center">
						    @if($esta->language == 'en')
						    Ingles
						    @else
						    Español
						    @endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection
@include('usuario.componentes.scripBotones')