@extends('layouts.dashboardnew')

@push('script')
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});

			/*$('.editar').on('click',function(e){
 				e.preventDefault();

 				var route = $(this).attr('data-route');
 				$.ajax({
	                url:route,
	                type:'GET',
	                success:function(ans){
	                	$("#content-modal").html(ans); 
	                    $("#modal-edit").modal("show");
	                }
	            });
			});*/

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

		function editar($id){
			var route = $("#"+$id).attr('data-route');
 			$.ajax({
	            url:route,
	            type:'GET',
	            success:function(ans){
	                $("#course_id_edit").val(ans[0].id);
	                $("#title").val(ans[0].title);
	                $("#category_id option[value="+ans[0].category_id+"]").attr("selected", true);
	                $("#subcategory_id option[value="+ans[0].subcategory_id+"]").attr("selected", true);
	                $("#mentor_id option[value="+ans[0].mentor_id+"]").attr("selected", true);
                 	CKEDITOR.instances["description"].setData(ans[0].description);
	                $("#price").val(ans[0].price);
	                var myArr = ans[1];
	                $(".check-edit").each(function() {
			            if(myArr.includes(parseInt($(this).val()))){
			            	$(this).prop("checked", true);  
			            }
			        });
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
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info descargar"><i class="fa fa-plus-circle"></i> Nuevo Curso</a>
				</div>
				
				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Título</th>
							<th class="text-center">Categoría</th>
							<th class="text-center">Subcategoría</th>
							<th class="text-center">Lecciones</th>
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
								<td class="text-center">{{ $curso->lessons_count }}</td>
								<td class="text-center">
									<a class="btn btn-info" data-route="{{ route('admin.courses.edit', $curso->id) }}" id="{{$curso->id}}" onclick="editar(this.id);"><i class="fa fa-edit"></i></a>
									<a class="btn btn-warning" href="{{ route('admin.courses.lessons', $curso->id) }}" title="Ver Temario"><i class="fa fa-list"></i></a>
									@if ($curso->featured == 0)
										<a class="btn btn-success featured" href="javascript:;" data-id="{{ $curso->id }}" title="Agregar a Destacados"><i class="fa fa-star"></i></a>
									@else
										<!--<a class="btn btn-info show-img" href="javascript:;" data-title="{{ $curso->title }}" data-source="{{ asset('uploads/images/courses/featured_covers/'.$curso->featured_cover) }}" title="Ver Imagen Destacada"><i class="fa fa-image"></i></a>-->
										<a class="btn btn-danger" href="{{ route('admin.courses.quit-featured', $curso->id) }}" title="Quitar de Destacados"><i class="fa fa-star"></i></a>
									@endif
									<a class="btn btn-info" href="{{ route('admin.courses.evaluation.show', $curso->id) }}" title="Evaluación"><i class="far fa-file-alt"></i></a>
									@if ($curso->status == 1)
										<a class="btn btn-danger" href="{{ route('admin.courses.change-status', [$curso->id, 0]) }}" title="Deshabilitar"><i class="fa fa-ban"></i></a>
									@else
										<a class="btn btn-success" href="{{ route('admin.courses.change-status', [$curso->id, 1]) }}" title="Habilitar"><i class="fa fa-check"></i></a>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Agregar Curso-->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Curso</h5>
      			</div>
      			<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Título del Curso</label>
						            	<input type="text" class="form-control" name="title" required>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Categoría</label>
						                <select class="form-control category" name="category_id" required>
						                	<option value="" selected disabled>Seleccione una categoría..</option>
						                	@foreach ($categorias as $categoria)
						                		<option value="{{ $categoria->id }}">{{ $categoria->title }}</option>
						                	@endforeach
						                </select>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Subcategoría</label>
						            	<select class="form-control" name="subcategory_id" required>
						                	<option value="" selected disabled>Seleccione una subcategoría..</option>
						                	@foreach ($subcategorias as $subcategoria)
						                		<option value="{{ $subcategoria->id }}">{{ $subcategoria->title }}</option>
						                	@endforeach
						                </select>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Mentor</label>
						                <select class="form-control" name="mentor_id" required>
						                	<option value="" selected disabled>Seleccione un mentor..</option>
						                	@foreach ($mentores as $mentor)
						                		<option value="{{ $mentor->ID }}">{{ $mentor->user_email }}</option>
						                	@endforeach
						                </select>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Descripción</label>
						            	<textarea class="ckeditor form-control" name="description"></textarea> 
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Imagen de Cover</label>
						            	<input type="file" class="form-control" name="cover" >
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Precio</label>
						            	<input type="text" class="form-control" name="price">
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Etiquetas Disponibles</label>
						                <div class="row">
						                	@foreach ($etiquetas as $etiqueta)
							            		<div class="col-sm-6 col-md-3">
												    <input type="checkbox" class="form-check-input" value="{{ $etiqueta->id }}" name="tags[]">
												    <label class="form-check-label">{{ $etiqueta->tag }}</label>
												</div>
							            	@endforeach
						                </div>
						            	
						            </div>
						        </div>
						    </div>
						</div>
				        
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Curso</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal Editar Curso-->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Modificar Curso</h5>
      			</div>
      			<form action="{{ route('admin.courses.update') }}" method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid" id="content-modal">
	    					<div class="row">
								<input type="hidden" name="course_id" id="course_id_edit">
								<div class="col-md-12">
									<div class="form-group">
										<label>Título del Curso</label>
										<input type="text" class="form-control" name="title" id="title" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Categoría</label>
										<select class="form-control" name="category_id" id="category_id" required>
											@foreach ($categorias as $categoria)
												<option value="{{ $categoria->id }}">{{ $categoria->title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Subcategoría</label>
										<select class="form-control" name="subcategory_id" id="subcategory_id" required>
											@foreach ($subcategorias as $subcategoria)
												<option value="{{ $subcategoria->id }}">{{ $subcategoria->title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Mentor</label>
										<select class="form-control" name="mentor_id" id="mentor_id" required>
											@foreach ($mentores as $mentor)
												<option value="{{ $mentor->ID }}">{{ $mentor->user_email }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Descripción</label>
										<textarea class="ckeditor form-control" name="description" id="description"></textarea> 
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Imagen de Cover</label>
										<input type="file" class="form-control" name="cover" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Precio</label>
										<input type="text" class="form-control" name="price" id="price">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Etiquetas Disponibles</label>
										<div class="row">
											@foreach ($etiquetas as $etiqueta)
												<div class="col-sm-6 col-md-3">
													<input type="checkbox" class="form-check-input check-edit" name="tags[]" value="{{ $etiqueta->id }}">
													<label class="form-check-label">{{ $etiqueta->tag }}</label>
												</div>
											@endforeach
										</div>
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

