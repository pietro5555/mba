@extends('layouts.dashboardnew')

@section('content')


<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">

      <a class="btn btn-info btn-block" data-toggle="modal" data-target="#anexar">Agregar Entrada</a>

      <table id="mytable" class="table">
                <thead>
                    <tr>
                        <th class="text-center">
                            Titulo
                        </th>

                        <th class="text-center">
                            Autor
                        </th>

                        <th class="text-center">
                            Imagen Destacada
                        </th>

                        <th class="text-center">
                            Acciónes
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($entradas as $ent)
                    <tr>
                        <td class="text-center">
                            {{$ent->titulo}}
                        </td>

                        <td class="text-center">
                            {{$ent->autor}}
                        </td>

                        <td class="text-center">
                        	@if($ent->imagen_destacada != null)
                            <img src="{{ asset('/uploads/entradas/'.$ent->imagen_destacada)}}" alt="" class="circular-avatar">
                            @else
                            @endif
                        </td>

                        <td class="text-center">
                           <a class="btn btn-info" href="{{route('admin-actual-entrada', $ent->id)}}">Editar</a>
                           <a class="btn btn-danger" href="{{route('admin-delet-entrada', $ent->id)}}">Eliminar</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
  </div>
</div>



{{-- anexar --}}
<div class="modal fade" id="anexar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva entrada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin-save-entrada')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="col-md-12">
             <label>Titulo</label>
              <input class="form-control" type="text" name="titulo" required>
          </div>

          <div class="col-md-12">
             <label>Autor</label>
              <input class="form-control" type="text" name="autor" required>
          </div>

          <div class="col-md-12">
             <label>Resumen</label>
              <textarea class="form-control" type="textarea" name="contenido" required>
              </textarea>
          </div>
          <div class="col-md-12">
            <label>Artículo completo</label>
             <textarea class="form-control" type="textarea" name="articulo" required>
             </textarea>
         </div>


          <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Imagen destacada</label>
          <input type="file" name="destacada" accept="image/*">
        </div>
        <div class="col-sm-12">
                <label class="control-label " style="text-align: center; margin-top:4px;">Banner</label>
                <input type="file" name="banner" accept="image/*">
        </div>

               <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
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
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
 CKEDITOR.replace('contenido', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });

  CKEDITOR.replace('articulo', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
@endpush
