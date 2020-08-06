@extends('layouts.dashboardnew')

@section('content')
   
    <div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
                <table id="mytable" class="table table-bordered table-hover table-responsive">
            		<thead>
            			<tr>
            				<th><center>#</center></th>
            				<th><center>titulo</center></th>
            				<th><center>Fecha de inicio</center></th>
            				<th><center>Fecha final</center></th>
            				<th><center>Acciones</center></th>
            			</tr>
                    </thead>
                    <tbody>
                        @foreach ($anuncios as $anuncio)
                            <tr>
                                <td>
                                    <center>{{$anuncio->id}}</center>
                                </td>

                                <td>
                                    <center>{{$anuncio->titulo}}</center>
                                </td>
                                <td>
                                    <center>
                                      {{ date('d-m-Y', strtotime($anuncio->inicio)) }}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                         {{ date('d-m-Y', strtotime($anuncio->vencimiento)) }}
                                    </center>
                                </td>
                                
                                <td>
                                    
                            <a class="btn btn-info" data-toggle="modal" data-target="#editar" onclick="seleccionar('{{$anuncio->id}}','{{$anuncio->titulo}}','{{$anuncio->contenido}}','{{$anuncio->inicio}}','{{$anuncio->vencimiento}}','{{$anuncio->color}}')">
								<i class="fa fa-edit"></i></a>
								
								<a class="btn btn-danger" href="{{ route('archivo.eliminaranuncio', $anuncio->id) }}">
									<i class="fa fa-trash"></i></a>
									
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
        	    </table>
        </div>
    </div>
</div>


<!-- Modal editar -->   
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Anuncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('archivo.actualizaranuncio')}}" method="post">
          {{ csrf_field() }} 

 <input type="hidden" class="form-control" name="id" id="id">
 
 
       <div class="col-sm-12 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
            name="titulo" id="titu" required style="background-color:f7f7f7;" />

        </div>

        <div class="col-sm-4 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Fecha desde</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
            name="desde" id="comienzo" required style="background-color:f7f7f7;" />

        </div>

        <div class="col-sm-4 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Fecha hasta</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
            name="hasta" id="vence" required style="background-color:f7f7f7;" />
        </div>
       
       <div class="col-sm-4 col-xs-12">
          <label class="control-label" style="text-align: center; margin-top:4px;">Color del anuncio</label>
        <select class="form-control" name="color" id="color">
        <option value="info">Azul</option>
        <option value="warning">Amarillo</option>
        <option value="light">Blanco</option>
        <option value="success">Verde</option>
        <option value="danger">Rojo</option>
        <option value="secondary">gris</option>
        <option value="dark">Negro</option>
        </select>
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Contenido</label>
          <textarea class="form-control form-control-solid placeholder-no-fix summernote" type="textarea" autocomplete="off"
            name="contenido" id="todo" required style="background-color:f7f7f7;">
              </textarea>
        </div>

               
               <button type="submit" class="btn btn-primary btn-block">Modificar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 
   
@endsection
@include('usuario.componentes.scritpTable')
@push('script')
<script type="text/javascript">
      seleccionar = function(usuarios,titulo,contenido,inicio,vencimiento,colores){
        $('#id').val(usuarios);
        $('#titu').val(titulo);
        $('#todo').val(contenido);
        $('#comienzo').val(inicio);
        $('#vence').val(vencimiento);
        $('#color').val(colores);
       
        $(document).ready(function () {
            
            
    $('.summernote').summernote('code', contenido);
  })
  
      }; 
    </script>
@endpush