@extends('layouts.dashboardnew')

@push('script')
	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});

			$('.editar').on('click',function(e){
 				e.preventDefault();

 				var route = $(this).attr('data-route');
 				$.ajax({
	                url:route,
	                type:'GET',
	                success:function(ans){
	                	document.getElementById("tag_id").value = ans.id;
	                    document.getElementById("tag_name").value = ans.tag;
	                    $("#modal-edit").modal("show");
	                }
	            });
			});
		});
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
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nueva Etiqueta</a>
				</div>
				
				<br class="col-xs-12">

				<table id="mytable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">Etiqueta</th>
							<th class="text-center">Cursos Asociados</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($etiquetas as $etiqueta)
							<tr>
								<td class="text-center">{{ $etiqueta->tag }}</td>
								<td class="text-center">{{ $etiqueta->courses_count }}</td>
								<td class="text-center">
									<a class="btn btn-info editar" data-route="{{ route('admin.courses.edit-tag', $etiqueta->id) }}"><i class="fa fa-edit"></i></a>
									<a class="btn btn-danger" href="{{ route('admin.courses.delete-tag', $etiqueta->id) }}"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Etiqueta</h5>
      			</div>
      			<form action="{{ route('admin.courses.add-tag') }}" method="POST">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Etiqueta</label>
						            	<input type="text" class="form-control" name="tag" required>
						            </div>
						        </div>
						    </div>
						</div>
				        
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Etiqueta</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal Editar Categoría-->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Editar Etiqueta</h5>
      			</div>
      			<form action="{{ route('admin.courses.update-tag') }}" method="POST">
			        {{ csrf_field() }}
			        <input type="hidden" name="tag_id" id="tag_id">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Etiqueta</label>
						            	<input type="text" class="form-control" name="tag" id="tag_name" required>
						            </div>
						        </div>
						    </div>
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

