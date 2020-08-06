@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Agregar Anuncios
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('archivo-saveanuncio') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
      
      <div class="col-sm-12 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
            name="titulo" required style="background-color:f7f7f7;" />

        </div>

        <div class="col-sm-4 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Fecha desde</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
            name="desde" required style="background-color:f7f7f7;" />

        </div>

        <div class="col-sm-4 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Fecha hasta</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
            name="hasta" required style="background-color:f7f7f7;" />
        </div>
       
       <div class="col-sm-4 col-xs-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Color del anuncio</label>
        <select class="form-control" name="color">
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
          <textarea class="form-control" type="textarea"
            name="contenido" required>
              </textarea>
        </div>
        
          <div class="col-sm-6 col-md-offset-3" style="padding-left: 10px;">
              <button class="btn btn-success btn-block" type="submit" id="btn"
                style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
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