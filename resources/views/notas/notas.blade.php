@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body"> 
		    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregar">Agregar</a>
		    
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">Titulo</th>
						<th class="text-center">Contenido</th>
						<th class="text-center">Fecha Inicio</th>
						<th class="text-center">Fecha Final</th>
						<th class="text-center">Accion</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($notas as $nota)
					<tr>
						<td class="text-center">{{ $nota->titulo }}</td>
						<td class="text-center">{{ $nota->contenido }}</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($nota->inicio)) }}</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($nota->fin)) }}</td>
						<td class="text-center">
						    
						    <a class="btn btn-danger" href="{{ route('notas-eliminar', $nota->id) }}" data-id="{{$nota->id}}">
                                <i class="fa fa-trash"></i></a>
                                
                                <buttom class="btn btn-info" data-toggle="modal" data-target="#editar" onclick="seleccionar('{{$nota->id}}','{{$nota->titulo}}',
                                '{{$nota->contenido}}','{{$nota->inicio}}','{{$nota->fin}}')">
                                <i class="fa fa-edit"></i></buttom>
                                
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

{{-- modal para agregar --}}
@include('notas/modal/agregar')
{{-- modal para editar --}}
@include('notas/modal/editar')


@endsection
@include('usuario.componentes.scritpTable')



@push('script')
<script type="text/javascript">


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

seleccionar = function(id,titulo,conte,inicio,fin){
        $('#id').val(id);
        $('#titulo').val(titulo);
        $('#conte').val(conte);
        $('#inicio').val(inicio);
        $('#fin').val(fin);
        
        $('.summer').summernote('code', conte);
       };  
       
       </script>
       
@endpush