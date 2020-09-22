@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
        
    <div class="box box-info mostrar">
        <div class="box-header with-border">
            
                <h3>Redes Sociales</h3>
                <button type="button" class="btn btn-info btn-block" onclick="toggle()">
                    Agregar Nuevas Redes Sociales
                </button>
            
        </div> 
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-striped" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Link</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Imagen</th>
            <th class="text-center">Acciónes</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($redes as $red)
          <tr>
            <td class="text-center">{{ $red->id }}</td>
            <td class="text-center">{{ $red->nombre }}</td>
            <td class="text-center">{{ $red->link }}</td>
            <td class="text-center">
                @if($red->tipo == '1')
                Glyphicon
                @else
                Imagen
                @endif
            </td>
            <td class="text-center">
                @if($red->tipo == '1')
                <i class="{{$red->imagen}} ampliar" style="color: #{{$red->color}};"></i>
                @else
                <img src="{{asset('redes/'.$red->imagen)}}" height="50" class="border-redes">
                @endif
            </td>
            <td class="text-center">
                <a class="btn btn-info" data-toggle="modal" data-target="#redsocial" onclick="seleccionar('{{$red->id}}','{{$red->link}}','{{$red->color}}','{{$red->imagen}}','{{$red->tipo}}','{{$red->nombre}}')">Editar</a>
                <a href="{{route('setting-eliminar-red', $red->id)}}" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table> 
        </div>    
    </div>
    
    
 <div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-header">
                <h3>Configuración de las Redes Sociales </h3>
        </div>
        
        <div class="box-body">
            <form class="" action="{{route('setting-save-red')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group col-sm-12 col-xs-12 ptr">
                    <label for="">Cantidad de nuevas redes sociales</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" required
                        onkeyup="confiredes()">
                </div>
                
                <div id="valor">
  
                </div>
                
                <button class="btn btn-info btn-block" type="submit">Aceptar</button>
            </form>
        </div>
        
    </div>
</div>

     </div>    
  </div>
</div>  

@include('setting.redes.edicion')

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">

function toggle() {
    $('.mostrar').toggle('slow')
  }
  
  
  function confiredes() {
      $('#valor').empty()
      let cantidad = $('#cantidad').val()
      
      for (var i = 0; i < cantidad; i++) {
        $('#valor').append(

          '<div class="col-xs-12 col-sm-3">' +
          '<label for="">Nombre (*) </label>' +
          '<input type="text" class="form-control" name="nombre' + (i + 1) + '">'+
          '</div>'+

          '<div class="col-xs-12 col-sm-3">' +
          '<label for="">Link (*) </label>' +
          '<input type="text" class="form-control" name="link' + (i + 1) + '">'+
          '</div>'+
          
          '<div class="col-xs-12 col-sm-2">' +
          '<label for="">Icono (*) </label>' +
          '<input type="text" class="form-control" name="icono' + (i + 1) + '">'+
          '</div>'+
          
          '<div class="col-xs-12 col-sm-2 ">' +
          '<label for="">Imagen (Opcional) </label>' +
          '<input type="file" name="imagen' + (i + 1) + '">'+
          '</div>'+
          
          '<div class="col-xs-12 col-sm-2">' +
          '<label for="">Color (Opcional) </label>' +
          '<input type="text" class="form-control" name="color' + (i + 1) + '">'+
          '</div>'
        )
      }
  }
  
  
  seleccionar = function(id, link, color, imagen, tipo, nombre){
      
       if(tipo == 1){
         $('#icono').val(imagen); 
       }
       
        $('#id').val(id);
        $('#link').val(link);
        $('#color').val(color);
        $('#nombre').val(nombre);
        
       };  
</script>
@endpush