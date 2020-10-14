@extends('layouts.dashboardnew')

@push('script')
	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});
		});

		function editar($id){
			var route = $("#"+$id).attr('data-route');
 			$.ajax({
	            url:route,
	            type:'GET',
	            success:function(ans){
	                $("#content-modal").html(ans);
	                $("#modal-edit").modal("show");
	            }
	        });
		}
	</script>
@endpush

@section('content')
	<div class="col-xs-12">
		@if (Session::has('msj-exitoso'))
			<div class="alert alert-success">
				<strong>{{ Session::get('msj-exitoso') }}</strong>
			</div>
		@endif

		@if (Session::has('msj-erroneo'))
			<div class="alert alert-danger">
				<strong>{{ Session::get('msj-erroneo') }}</strong>
			</div>
		@endif

		<div class="box">
			<div class="box-body">
				<div style="text-align: right;">
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info descargar"><i class="fa fa-plus-circle"></i> Nueva Lección</a>
				</div>

				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Título</th>
							<th class="text-center">Descripción</th>
                            <th class="text-center">URL</th>
							<th class="text-center">Duración</th>
                            <th class="text-center">Recursos Adicionales</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($curso->lessons as $leccion)
							<tr>
								<td class="text-center">{{ $leccion->id }}</td>
								<td class="text-center">{{ $leccion->title }}</td>
								<td class="text-center">{{ $leccion->description }}</td>
                                <td class="text-center">{{ $leccion->url }}</td>
                                <td class="text-center">{{ $leccion->materials->count() }}</td>
								<td class="text-center">
									<a class="btn btn-info btn-rounded" data-route="{{ route('admin.courses.lessons.edit', $leccion->id) }}" id="{{$leccion->id}}" onclick="editar(this.id);" title="Editar"><i class="fa fa-edit"></i></a>
									<a class="btn btn-primary" href="{{ route('admin.courses.lessons.show', $leccion->id) }}" title="Ver Video"><i class="fa fa-video"></i></a>
									<a class="btn btn-warning" href="{{ route('admin.courses.lessons.resources', $leccion->id) }}" title="Ver Recursos Adicionales"><i class="fa fa-file"></i></a>
									<a class="btn btn-danger" href="{{ route('admin.courses.lessons.delete', $leccion->id) }}" title="Eliminar"><i class="fa fa-ban"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Agregar Leccion -->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Lección</h5>
      			</div>
      			<form action="{{ route('admin.courses.lessons.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="course_id" value="{{ $curso->id }}">
                    <input type="hidden" name="course_slug" value="{{ $curso->slug }}">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Título de la Lección</label>
						            	<input type="text" class="form-control" name="title" required>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Descripción</label>
						            	<textarea class="form-control" name="description"></textarea>
						            </div>
								</div>
                                <div class="col-md-12">
						            <div class="form-group">
						                <label>URL Español</label>
						            	<input type="url" class="form-control" name="url" required>
						            </div>
								</div>
								<div class="col-md-12">
						            <div class="form-group">
						                <label>URL Inglés</label>
						            	<input type="url" class="form-control" name="english_url" required>
						            </div>
						        </div>
						    </div>
						</div>
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Lección</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal Editar Leccion-->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Modificar Leccion</h5>
      			</div>
      			<form action="{{ route('admin.courses.lessons.update') }}" method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid" id="content-modal">

						</div>
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Guardar Cambios</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>
@endsection

