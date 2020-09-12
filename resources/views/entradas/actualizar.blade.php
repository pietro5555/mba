@extends('layouts.dashboardnew')

@section('content')


<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
     
      <form action="{{route('admin-edit-entrada')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <input type="hidden" name="id" value="{{$entradas->id}}">

          <div class="col-md-12">
             <label>Titulo</label>
              <input class="form-control" type="text" name="titulo" value="{{$entradas->titulo}}" required>
          </div>

          <div class="col-md-12">
             <label>Autor</label>
              <input class="form-control" type="text" name="autor" value="{{$entradas->autor}}" required>
          </div>

          <div class="col-md-12">
             <label>Descripción</label>
              <textarea class="form-control" type="textarea" name="contenido">
              {{(!empty($entradas->descripcion)) ? $entradas->descripcion : ''}}</textarea>
          </div>


          <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Imagen destacada</label>
          <input type="file" name="destacada" accept="image/*">
        </div>

               
             <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>

   </div>
  </div>
</div>	
@endsection


@push('script')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
 CKEDITOR.replace('contenido', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
@endpush
