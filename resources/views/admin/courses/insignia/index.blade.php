@extends('layouts.dashboardnew')

@push('script')
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});
		});


		function edit(idinsignia) {
			let url = $('#route_e'+idinsignia).val()
			$.get(url, function (response) {
				console.log(response)
				response = JSON.parse(response)
				console.log(response)
				$('#course').val(response.course_id)
				$('#nivel').val(response.nivel_id)
				$('#img_actual').attr('src',response.insignia)
				$('#form_edit').attr('action', $('#route_u'+idinsignia).val())
				$('#modal-asignia-edit').modal('show')
			})
			
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
					<a data-toggle="modal" data-target="#modal-asignia" class="btn btn-info descargar"><i class="fa fa-plus-circle"></i>Asignar Insignia</a>
				</div>

				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr class="text-center">
							<th class="text-center">Curso</th>
							<th class="text-center">Nivel</th>
							<th class="text-center">Insignia</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($insignias as $insignia)
                        <tr class="text-center">
                            <td class="text-center">{{$insignia->course_name}}</td>
                            <td class="text-center">{{$insignia->nivel_name}}</td>
                            <td class="text-center">
                                <img src="{{asset($insignia->insignia)}}" alt="" height="60">
                            </td>
                            <td class="text-center">
								<input type="hidden" value="{{ route('insignia.edit', $insignia->id) }}" id="route_e{{$insignia->id}}">
								<input type="hidden" value="{{ route('insignia.update', $insignia->id) }}" id="route_u{{$insignia->id}}">
                                <form action="{{route('insignia.destroy', $insignia->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-primary" onclick="edit({{$insignia->id}})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
    </div>
	
	{{-- modal para agregar insignia --}}
	@include('admin.courses.insignia.modalAgregarInsignia')
	{{-- modal para editar insignia --}}
	@include('admin.courses.insignia.modalEditarInsignia')
@endsection

