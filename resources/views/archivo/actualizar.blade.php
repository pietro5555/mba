@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Actualizar Blog y Artículos
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('archivo.modificar', $contenido->id) }}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}


        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="titulo"
            value="{{$contenido->titulo}}" required style="background-color:f7f7f7;" />

        </div>

        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Contenido</label>
          <textarea class="form-control" type="textarea"
            name="contenido">
              {{(!empty($contenido->contenido)) ? $contenido->contenido : ''}} 
                   </textarea>
        </div>

        <div class="col-sm-4">
          <label class="control-label " style="text-align: center; margin-top:4px;">Seleccione una Imagen</label>
          <input type="file" name="imagen">
        </div>

        <div class="col-sm-12" style="padding-left: 10px;">
          <div class="col-sm-6" style="padding-left: 10px;">
            <button class="btn green btn-block" type="submit" id="btn"
              style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
          </div>
          <div class="col-sm-6" style="padding-left: 10px;">
            <a href="{{ route('archivo.contenido') }}" class="btn btn-danger btn-block" id="btn"
              style="margin-bottom: 5px; margin-top: 8px;">Regresar</a>
          </div>
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