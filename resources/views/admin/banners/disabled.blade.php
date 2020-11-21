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
                                    <a class="btn btn-info" data-source="{{ asset('uploads/images/banners/'.$banner->image) }}" id="image-{{$banner->id}}" onclick="showImg(this.id);"><i class="fa fa-image"></i></a>
									<a class="btn btn-success" href="{{ route('admin.banners.change-status', [$banner->id, 1]) }}" title="Habilitar"><i class="fa fa-check"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
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

