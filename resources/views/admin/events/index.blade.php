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
	                	$("#content-modal").html(ans); 
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
					<a data-toggle="modal" data-target="#modal-new" class="btn btn-info descargar"><i class="fa fa-plus-circle"></i> Nuevo Evento</a>
				</div>
				
				<br class="col-xs-12">

				<table id="mytable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Título</th>
							<th class="text-center">Mentor</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($events as $event)
							<tr>
								<td class="text-center">{{ $event->id }}</td>
								<td class="text-center">{{ $event->title }}</td>
								<td class="text-center">{{ App\Models\Events::findID($event->user_id) }}</td>
								<td class="text-center">
									<a class="btn btn-info editar" data-route="{{ route('admin.events.edit', $event->id) }}"><i class="fa fa-edit"></i></a>
									@if ($event->status == '1' )
										<a class="btn btn-danger" href="{{ route('admin.events.change-status', [$event->id, 0]) }}" title="Deshabilitar"><i class="fa fa-ban"></i></a>
									@endif

									@if ($event->status == '0')
									<a class="btn btn-success" href="{{ route('admin.events.change-status', [$event->id, 1]) }}" title="Habilitar"><i class="fa fa-check"></i></a>
									@endif
										
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Agregar Evento-->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Evento</h5>
      			</div>
      			<form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Título del Evento</label>
						            	<input type="text" class="form-control" name="title" required>
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
										<textarea name="description" class="form-control" id="description" cols="30" rows="10" required></textarea>
						            </div>
						        </div>
						        <!-- <div class="col-md-12">
						            <div class="form-group">
						                <label>Fecha</label>
						            	<input type="text" class="form-control" name="date" required>
						            </div>
						        </div> -->
						        <div class="col-md-12">
						        <div class="form-group">
                                   <label class="control-label text-center">Banner
                             		</label>
                                   <input class="form-control" type="file" name="image">
                                        
                                </div>
						        </div>

						        <div class="col-md-12">
						        	<label>Fecha Inicio</label>
						            <input type="datetime-local" class="form-control" name="date" id="fechainicio" required>
						        </div>
						        
						        <div class="col-md-12">
						        	<label>Fecha de finalización</label>
            						<input type="datetime-local" class="form-control" name="date_end" required>
						        </div>
						      
						    </div>
						</div>
				        
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Evento</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal Editar Evento-->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Modificar Evento</h5>
      			</div>
      			<form action="{{ route('admin.events.update') }}" method="POST" enctype="multipart/form-data">
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

