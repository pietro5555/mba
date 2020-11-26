@extends('layouts.dashboardnew')

@push('script')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endpush

@section('content')
	<div class="col-xs-12">
		@if (Session::has('msj-exitoso'))
			<div class="alert alert-success">
                <strong>{{ Session::get('msj-exitoso') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
			</div>
		@endif

		@if (Session::has('msj-erroneo'))
			<div class="alert alert-danger">
                <strong>{{ Session::get('msj-erroneo') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
			</div>
		@endif
        <div class="col-md-12 ticket-box"><h4 class="white"><b>Nota:</b> Si necesitas ayuda los tiempos de respuesta son de 12 a 24 horas</h4></div>
        <div style="float:right;">
                <a href="{{route('soporte.tickets.clients')}}" class="btn btn-info"><i class="fas fa-ticket-alt"></i> Mis tickets</a>
                <a href="{{route('soporte.academy')}}" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Volver al menú</a>
        </div><br><br>
		<div class="box" style="margin-top: 100px; border-radius:10px!important; background:#2f343a!important;">

			<div class="box-body">

                    <form action="{{ route ('admin.soporte.create.ticket') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="container-fluid">
                                <h4 class="white"><b>Crear Ticket</b></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="white">Tipo de ticket</label>
                                            <select class="form-control select2 input-white" name="tipo" required style="background:none!important;">
                                                    <option value="" class="text-negro" disabled>Selecciones una opción</option>
                                                    <option value="General" class="text-negro">Consulta general</option>
                                                    <option value="Academia" class="text-negro">Academia</option>
                                                    <option value="Afiliados" class="text-negro">Afiliados</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <label class="white">Asunto del ticket</label>
                                            <input type="text" class="form-control input-white" name="titulo" required style="background:none!important;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="white">Comentario</label>
                                            <textarea class="ckeditor form-control" name="comentario" style="background:none!important;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                   <label class="white">Subir Archivo</label><br>
                                                    <input type="file" id="fileUpload" name="archivo">
                                            </div>
                                    </div>


                                </div>
                            </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block" style="font-size: 16px; margin-top:20px; margin-bottom:20px;">Aeptar</button>
                        </div>
                        <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" style="font-size: 16px;margin-top:20px; margin-bottom:20px;">Cancelar</button>
                        </div>


                      </form>
			</div>
		</div>
	</div>

    <!-- Crear ticket-->
    <div>


    </div>

	</div>
@endsection


