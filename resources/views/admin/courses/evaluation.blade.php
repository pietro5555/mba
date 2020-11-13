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
	                	$("#question_id").val(ans.id);
	                    $("#question").val(ans.question);
	                    $("#answer_1").val(ans.answer_1);
	                    $("#answer_2").val(ans.answer_2);
	                    $("#answer_3").val(ans.answer_3);
	                    $("#answer_4").val(ans.answer_4);
	                    $("#correct_answer option[value="+ans.correct_answer+"]").attr("selected", true);
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
				@if (is_null($curso->evaluation))
					<form action="{{ route('admin.courses.evaluation.store') }}" method="POST">
	      				<input type="hidden" name="course_id" value="{{ $curso->id }}">
				        {{ csrf_field() }}
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
							                <label>Descripción</label>
							            	<textarea class="form-control" name="description"></textarea>
							            </div>
							        </div>
							    </div>
							</div>
					    </div>
		      			<div class="modal-footer">
		        			<button type="submit" class="btn btn-primary">Crear Evaluación</button>
		      			</div>
		      		</form>
				@else
					<form action="{{ route('admin.courses.evaluation.update') }}" method="POST">
				        {{ csrf_field() }}
				        <input type="hidden" name="evaluation_id" id="evaluation_id" value="{{ $curso->evaluation->id }}">
					    <div class="modal-body">
					        <div class="container-fluid">
		    					<div class="row">
							        <div class="col-md-12">
							            <div class="form-group">
							                <label>Título</label>
							            	<input type="text" class="form-control" name="title" value="{{ $curso->evaluation->title }}" required>
							            </div>
							        </div>
							        <div class="col-md-12">
							            <div class="form-group">
							                <label>Descripción</label>
							            	<textarea class="form-control" name="description">{{ $curso->evaluation->description }}</textarea>
							            </div>
							        </div>
							    </div>
							</div>
					        
					    </div>
		      			<div class="modal-footer">
		        			<button type="submit" class="btn btn-primary">Guardar Cambios</button>
		      			</div>
		      		</form>
	      		@endif
			</div>
		</div>

		@if (!is_null($curso->evaluation))
			<div class="box">
				<div class="box-body">
					<div style="text-align: right;">
						<a data-toggle="modal" data-target="#modal-new" class="btn btn-info"><i class="fa fa-plus-circle"></i> Nueva Pregunta</a>
					</div>
				
				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Pregunta</th>
							<th class="text-center">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($curso->evaluation->questions as $pregunta)
							<tr>
								<td class="text-center">{{ $pregunta->order }}</td>
								<td class="text-center">{{ $pregunta->question }}</td>
								<td class="text-center">
									<a class="btn btn-info editar" data-route="{{ route('admin.courses.evaluation.edit-question', $pregunta->id) }}"><i class="fa fa-edit"></i></a>
									<a class="btn btn-danger" href="{{ route('admin.courses.evaluation.delete-question', $pregunta->id) }}"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
		@endif
	</div>

	<!-- Modal Nueva Pregunta -->
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Crear Pregunta</h5>
      			</div>
      			<form action="{{ route('admin.courses.evaluation.add-question') }}" method="POST">
			        {{ csrf_field() }}
			        @if (!is_null($curso->evaluation))
			        	<input type="hidden" name="evaluation_id" value="{{ $curso->evaluation->id }}">
			        @endif
			        	<input type="hidden" name="course_id" value="{{ $curso->id }}">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Pregunta</label>
						            	<textarea class="form-control" name="question" required></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 1</label>
						            	<textarea class="form-control" name="answer_1" required></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 2</label>
						            	<textarea class="form-control" name="answer_2"></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 3</label>
						            	<textarea class="form-control" name="answer_3"></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 4</label>
						            	<textarea class="form-control" name="answer_4"></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta Correcta</label>
						            	<select class="form-control" name="correct_answer" required>
						            		<option value="" selected disabled>Seleccione una opción...</option>
						            		<option value="1">Respuesta 1</option>
						            		<option value="2">Respuesta 2</option>
						            		<option value="3">Respuesta 3</option>
						            		<option value="4">Respuesta 4</option>
						            	</select>
						            </div>
						        </div>
						    </div>
						</div>
				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-primary">Crear Pregunta</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

	<!-- Modal EditarPregunta -->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Editar Pregunta</h5>
      			</div>
      			<form action="{{ route('admin.courses.evaluation.update-question') }}" method="POST">
			        {{ csrf_field() }}
			        <input type="hidden" name="question_id" id="question_id">
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Pregunta</label>
						            	<textarea class="form-control" name="question" id="question" required></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 1</label>
						            	<textarea class="form-control" name="answer_1" id="answer_1" required></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 2</label>
						            	<textarea class="form-control" name="answer_2" id="answer_2"></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 3</label>
						            	<textarea class="form-control" name="answer_3" id="answer_3"></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta 4</label>
						            	<textarea class="form-control" name="answer_4" id="answer_4"></textarea>
						            </div>
						        </div>
						        <div class="col-md-12">
						            <div class="form-group">
						                <label>Respuesta Correcta</label>
						            	<select class="form-control" name="correct_answer" id="correct_answer" required>
						            		<option value="" selected disabled>Seleccione una opción...</option>
						            		<option value="1">Respuesta 1</option>
						            		<option value="2">Respuesta 2</option>
						            		<option value="3">Respuesta 3</option>
						            		<option value="4">Respuesta 4</option>
						            	</select>
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

