@extends('layouts.dashboardnew')

@push('script')
	<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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
        <div class="col-md-12 ticket-box"><h4 class="white"><b>Nota:</b> Si necesitas ayuda los tiempos de respuesta son de 12 a 34 horas</h4></div>
		<div class="box" style="margin-top: 100px; border-radius:10px!important; background:#2f343a!important;">
            
			<div class="box-body">
                 
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="container-fluid">
                                <h4 class="white"><b>Crear Ticket</b></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="white">Tipo de ticket</label>
                                            <input type="text" class="form-control input-white" name="title" required style="background:none!important;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <label class="white">Asunto del ticket</label>
                                            <input type="text" class="form-control input-white" name="subject" required style="background:none!important;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="white">Comentario</label>
                                            <textarea class="ckeditor form-control" name="description" style="background:none!important;"></textarea>
                                        </div>
                                    </div>        
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="white">Subir Archivo</label><br><br>
                                            <div class="custom-input-file col-md-3 col-sm-3 col-xs-3">
                                                    <input type="file" id="ticket-image" class="input-file" value="">
                                                    Seleccionar archivo
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                        <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block" style="font-size: 16px; margin-top:20px; margin-bottom:20px;">Aceptar</button>
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

