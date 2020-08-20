@extends('layouts.dashboardnew')

@push('script')
	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
				"order": [[4, 'desc']],
			});

			$('.featured').on('click',function(e){
 				e.preventDefault();

 				document.getElementById('course_id').value = $(this).attr('data-id');
 				$("#modal-featured").modal("show");
			});

			$('.show-img').on('click',function(e){
 				e.preventDefault();

 				document.getElementById("featured-title").innerHTML = '<b>'+$(this).attr('data-title')+'</b>';
 				$("#featured-img").attr("src", $(this).attr('data-source'));
 				$("#modal-image").modal("show");
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
				<br class="col-xs-12">

				<table id="mytable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Título</th>
							<th class="text-center">Categoría</th>
							<th class="text-center">Subcategoría</th>
							<th class="text-center">Destacado</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cursos as $curso)
							<tr>
								<td class="text-center">{{ $curso->id }}</td>
								<td class="text-center">{{ $curso->title }}</td>
								<td class="text-center">{{ $curso->category->title }}</td>
								<td class="text-center">{{ $curso->subcategory->title }}</td>
								<td class="text-center">@if ($curso->featured == 0) NO @else SI @endif</td>
								<td class="text-center">
									@if ($curso->featured == 1)
										<a class="btn btn-info show-img" href="javascript:;" data-title="{{ $curso->title }}" data-source="{{ asset('uploads/images/courses/featured_covers/'.$curso->featured_cover) }}" title="Ver Imagen"><i class="fa fa-search"></i></a>
										<a class="btn btn-danger" href="{{ route('admin.courses.quit-featured', $curso->id) }}" title="Quitar de Destacados"><i class="fa fa-ban"></i></a>
									@else
										<a class="btn btn-success featured" href="javascript:;" data-id="{{ $curso->id }}" title="Agregar a Destacados"><i class="fa fa-star"></i></a>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Destacar Curso-->
	<div class="modal fade" id="modal-featured" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Destacar Curso</h5>
      			</div>
      			<form action="{{ route('admin.courses.add-featured') }}" method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
				        	<div class="row">
								<input type="hidden" name="course_id" id="course_id">
								<div class="col-md-12">
									<div class="form-group">
										<label>Cover de Destacado</label>
										<input type="file" class="form-control" name="featured_cover" required>
									</div>
								</div>
							</div>
						</div>
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Destacar Curso</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal Ver Imagen Destacada-->
	<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title"id="featured-title"></h5>
      			</div>
				<div class="modal-body">
				    <div class="container-fluid">
				        <div class="row">
							<div class="col-md-12">
								<img src="" alt="" id="featured-img" width="100%;">
							</div>
						</div>
				    </div>
				</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      		</div>
    		</div>
  		</div>
	</div>
@endsection

