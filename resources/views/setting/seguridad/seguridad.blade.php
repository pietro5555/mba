@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    
		    <a class="btn btn-info btn-block" id="modal">Editar</a>
		    
			<div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de envio de correo Perfil</h3>
                    <h5>{!!(!empty($seguridad->contenido)) ? $seguridad->contenido : ''!!}</h5>
            </div>
                  
		</div>
	</div>
</div>


<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    
		    <table id="mytable" class="table" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Titulo</th>
						<th class="text-center">Descripción</th>
						<th class="text-center">Observaciones</th>
						<th class="text-center">Tipo</th>
						<th class="text-center">Estado</th>
						<th class="text-center">Acciónes</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($seguriti as $segu)
					<tr>
						<td class="text-center">{{ $segu->id }}</td>
						<td class="text-center">{{ $segu->titulo }}</td>
						<td class="text-center">{{ $segu->contenido }}</td>
						<td class="text-center">{{ $segu->concepto }}</td>
						<td class="text-center">
						    @if($segu->tipo == '1')
						    Una ves al dia
						    @elseif($segu->tipo == '2')
						    Siempre
						    @else
						    cada 30 dias
						    @endif
						</td>
						
						<td class="text-center">
						    
						    @if($segu->status == '1')
						    <i class="fa fa-circle text-success"></i> Activo
						    @else
						    <i class="fa fa-circle text-danger"></i> Desactivado
						    @endif
						</td>
						
						<td class="text-center">
						    
						    <div class="btn-group dropup">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                          Acciónes
                        </button>
                        
                        <ul class="dropdown-menu">
                            
                            @if($segu->status == '0')
						    <li><a href="{{route('setting-seguridad-active', $segu->id)}}">Activar</a></li>
						    @else
						    <li><a href="{{route('setting-seguridad-desactivado', $segu->id)}}">Desactivar</a></li>
						    @endif
						    
						    <li><a data-toggle="modal" data-target="#editar" onclick="seleccionar('{{$segu->id}}','{{$segu->tipo}}','{{$segu->contenido}}')">Editar</a></li>
						    
                            </ul>
                        </div>
                      
						</td>
					</tr>
					@endforeach
				</tbody>
			</table> 
                  
		</div>
	</div>
</div>

@include('setting.seguridad.modal.modalplantilla')
@include('setting.seguridad.modal.modaleditar')

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script>
  $(document).ready(function () {
    $('.summernote').summernote({
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ol', 'ul', 'paragraph', 'height']],
        ['table', ['table']],
        ['insert', ['link']],
      ]
    });
  })
  
  
  seleccionar = function(id,tipo,contenido){
      if(id == 3){
         $('#texto').show();
         
         $(document).ready(function () {
             $('.super').summernote('code', ''+contenido,{
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ol', 'ul', 'paragraph', 'height']],
        ['table', ['table']],
        ['insert', ['link']],
      ]
         });
       })
        
      }else{
          $('#texto').hide();
      }
        $('#id').val(id);
        $('#tipo').val(tipo);
       };  

</script>
@endpush