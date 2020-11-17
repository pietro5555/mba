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
						<th class="text-center">Titulo del Curso</th>
						<th class="text-center">Visualizaciones</th>
						<th class="text-center">Favoritos</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($curse as $curs)
				
					<tr>
						<td class="text-center">{{ $curs->id }}</td>
						<td class="text-center">{{ $curs->mentor->display_name }}</td>
						<td class="text-center">{{ $curs->title }}</td>
						<td class="text-center">{{ $curs->visto }}</td>
						<td class="text-center">{{ $curs->favorito }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection
@include('usuario.componentes.scripBotones')