@extends('layouts.dashboardnew')

@push('script')
	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});
		});

		function changeType($opc){
			if ($opc == 'add'){
				if ($('#type').val() == 'Archivo'){
		        	$('#url').removeAttr("required");
		        	$("#url_div").hide();
		        	$('#file').prop("required", true);
		        	$("#file_div").show();
		        }else{
		        	$('#file').removeAttr("required");
		        	$("#file_div").hide();
		        	$('#url').prop("required", true);
		        	$("#url_div").show();
		        }
			}else{
		        if ($('#type2').val() == 'Archivo'){
		        	$('#url2').removeAttr("required");
		        	$("#url_div2").hide();
		        	$("#file_div2").show();
		        }else{
		        	$("#file_div2").hide();
		        	$('#url2').prop("required", true);
		        	$("#url_div2").show();
		        }
			}
		}

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
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nuevo Recurso</a>
				</div>
				
				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Título</th>
							<th class="text-center">Tipo</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($leccion->materials as $material)
							<tr>
								<td class="text-center">{{ $material->id }}</td>
								<td class="text-center">{{ $material->title }}</td>
                                <td class="text-center">{{ $material->type }}</td>
								<td class="text-center">
									@if ($material->type == 'Enlace')
										<a class="btn btn-warning" href="{{ $material->material }}" target="_blank"><i class="fa fa-search"></i></a>
									@else
										<a class="btn btn-warning" href="{{ url('uploads/courses/lessons/materials/'.$material->material) }}" target="_blank"><i class="fa fa-search"></i></a>
									@endif
									<a class="btn btn-info" data-route="{{ route('admin.courses.lessons.resources.edit', $material->id) }}" id="{{$material->id}}" onclick="editar(this.id);"><i class="fa fa-edit"></i></a>
									<a class="btn btn-danger" href="{{ route('admin.courses.lessons.resources.delete', $material->id) }}" title="Eliminar"><i class="fa fa-ban"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Agregar Recurso -->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Material</h5>
      			</div>
      			<form action="{{ route('admin.courses.lessons.resources.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="lesson_id" value="{{ $leccion->id }}">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Título</label>
						            	<input type="text" class="form-control" name="title" required>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Tipo</label>
						            	<select class="form-control" name="type" id="type" onchange="changeType('add');">
						            		<option value="Archivo">Archivo</option>
						            		<option value="Enlace">Enlace</option>
						            	</select>
						            </div>
                                </div>
                                <div class="col-md-12" id="file_div">
						            <div class="form-group">
						                <label>Archivo</label>
						            	<input type="file" class="form-control" name="file" id="file" required>
						            </div>
						        </div>
                                <div class="col-md-12" id="url_div" style="display: none;">
						            <div class="form-group">
						                <label>URL</label>
						            	<input type="url" class="form-control" name="url" id="url">
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

	<!-- Modal Editar Recurso-->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Modificar Leccion</h5>
      			</div>
      			<form action="{{ route('admin.courses.lessons.resources.update') }}" method="POST" enctype="multipart/form-data">
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

