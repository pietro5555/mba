@extends('layouts.dashboardnew')

@push('script')
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});
		});

        function showImg($id){
 			$("#banner-img").attr("src", $("#"+$id).attr('data-source'));
 			$("#modal-image").modal("show");
		}

		function editar($banner){
	        $("#banner_id").val($banner.id);
	        $("#title").val($banner.title);
	        $("#page option[value="+$banner.page+"]").attr("selected", true);
			$("#url").val($banner.url);
            $("#modal-edit").modal("show");
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
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info descargar"><i class="fa fa-plus-circle"></i> Nuevo Banner</a>
				</div>

				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr>
							<th class="text-center">Título</th>
							<th class="text-center">Ubicación</th>
                            <th class="text-center">Link</th>
                            <th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($banners as $banner)
							<tr>
								<td class="text-center">{{ $banner->title }}</td>
								<td class="text-center">{{ $banner->page }}</td>
                                <td class="text-center">@if (!is_null($banner->url)) {{ $banner->url }} @else - @endif</td>
								<td class="text-center">
                                    <a class="btn btn-info" onclick="editar({{$banner}});"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-info" data-source="{{ asset('uploads/images/banners/'.$banner->image) }}" id="image-{{$banner->id}}" onclick="showImg(this.id);"><i class="fa fa-image"></i></a>
									<a class="btn btn-danger" href="{{ route('admin.banners.change-status', [$banner->id, 0]) }}" title="Deshabilitar"><i class="fa fa-ban"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Agregar Banner-->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Banner</h5>
      			</div>
      			<form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Título del Banner</label>
						            	<input type="text" class="form-control" name="title" required>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Ubicación</label>
						                <select class="form-control" name="page" required>
						                	<option value="" selected disabled>Seleccione una ubicación..</option>
                                            <option value="Home">Home</option>
                                            <option value="Membresias">Membresías</option>
                                            <option value="Cursos">Cursos</option>
                                            <option value="Nosotros">Nosotros</option>
                                            <option value="Gratis">Gratis</option>
                                            <option value="Blog">Blog</option>
                                            <option value="Streaming">Streaming</option>
                                            <option value="Mis Eventos">Mis Eventos</option>
                                            <option value="Mis Cursos">Mis Cursos</option>
						                </select>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Imagen</label>
						            	<input type="file" class="form-control" name="image" required>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Link (Opcional)</label>
						            	<input type="url" class="form-control" name="url">
						            </div>
						        </div>
						    </div>
						</div>
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Banner</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal Editar Banner-->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Modificar Banner</h5>
      			</div>
      			<form action="{{ route('admin.banners.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="banner_id" id="banner_id">
				    <div class="modal-body">
				        <div class="container-fluid" id="content-modal">
                            <div class="col-md-12">
						        <div class="form-group">
						            <label>Título del Banner</label>
						            <input type="text" class="form-control" name="title" id="title" required>
						        </div>
						    </div>
						    <div class="col-md-12">
						        <div class="form-group">
						            <label>Ubicación</label>
						            <select class="form-control" name="page" id="page" required>
                                        <option value="Home">Home</option>
                                        <option value="Membresias">Membresías</option>
                                        <option value="Cursos">Cursos</option>
                                        <option value="Nosotros">Nosotros</option>
                                        <option value="Gratis">Gratis</option>
                                        <option value="Blog">Blog</option>
                                        <option value="Streaming">Streaming</option>
                                        <option value="Mis Eventos">Mis Eventos</option>
                                        <option value="Mis Cursos">Mis Cursos</option>
					                </select>
						        </div>
						    </div>
						    <div class="col-md-12">
						        <div class="form-group">
					                <label>Imagen</label>
					            	<input type="file" class="form-control" name="image">
					            </div>
					        </div>
						    <div class="col-md-12">
						        <div class="form-group">
					                <label>Link (Opcional)</label>
					            	<input type="url" class="form-control" name="url" id="url">
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


	<!-- Modal Ver Imagen Destacada-->
	<div class="modal fade" id="modal-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			Imagen del Banner
      			</div>
				<div class="modal-body">
				    <div class="container-fluid">
				        <div class="row">
							<div class="col-md-12">
								<img src="" alt="" id="banner-img">
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

