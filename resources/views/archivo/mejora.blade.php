@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        Archivos
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('archivo.ver-actual') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

         <input type="hidden" name="id" value="{{$archivo->id}}">

        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo del archivo</label>
          <input class="form-control" type="text" name="titulo"
            required value="{{$archivo->titulo}}"/>

        </div>

        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Descripcion del archivo</label>
          <textarea class="form-control" type="textarea"
            name="contenido" required>
              {{(!empty($archivo->contenido)) ? $archivo->contenido : ''}}
              </textarea>

        </div>
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Seleccione un archivo</label>
          <input type="file" name="archivo[]" multiple>
        </div>
        
        <div class="col-sm-6" style="padding-left: 10px;">
          <a href="{{ route('archivo.ver') }}" class="btn btn-danger btn-block" id="btn"
            style="margin-bottom: 5px; margin-top: 8px;">Regresar</a>
        </div>
        <div class="col-sm-6" style="padding-left: 10px;">
          <button class="btn btn-success btn-block" type="submit" id="btn"
            style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
        </div>
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