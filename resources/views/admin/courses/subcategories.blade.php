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
	                	document.getElementById("subcategory_id").value = ans.id;
	                    document.getElementById("subcategory_title").value = ans.title;
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
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nueva Subcategoría</a>
				</div>
				
				<br class="col-xs-12">

				<table id="mytable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">Título</th>
							<th class="text-center">Cursos Asociados</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subcategorias as $subcategoria)
							<tr>
								<td class="text-center">{{ $subcategoria->title }}</td>
								<td class="text-center">{{ $subcategoria->courses_count }}</td>
								<td class="text-center">
									<a class="btn btn-info editar" data-route="{{ route('admin.courses.edit-subcategory', $subcategoria->id) }}"><i class="fa fa-edit"></i></a>
									@if ($subcategoria->courses_count == 0)
										<a class="btn btn-danger" href="{{ route('admin.courses.delete-subcategory', $subcategoria->id) }}"><i class="fa fa-trash"></i></a>
									@endif
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
        			<h5 class="modal-title" id="exampleModalLabel">Crear Subcategoría</h5>
      			</div>
      			<form action="{{ route('admin.courses.add-subcategory') }}" method="POST">
			        {{ csrf_field() }}
			        <input type="hidden" name="category_id" value="{{ $datosCategoria->id }}">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Título de la Subcategoría</label>
						            	<input type="text" class="form-control" name="title" required>
						            </div>
						        </div>
						    </div>
						</div>
				        
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Subcategoría</button>
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
        			<h5 class="modal-title" id="exampleModalLabel">Editar Subcategoría</h5>
      			</div>
      			<form action="{{ route('admin.courses.update-subcategory') }}" method="POST">
			        {{ csrf_field() }}
			        <input type="hidden" name="subcategory_id" id="subcategory_id">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Subcategoría</label>
						            	<input type="text" class="form-control" name="title" id="subcategory_title" required>
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

