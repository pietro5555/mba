@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
  .texto-central {
    text-align: center;
  }

  .var {
    margin: 0 10px;
    color: brown;
    border-bottom: 2px solid;
  }
</style>
@endpush

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Agregar Informacion Bancaria
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('bancaria-guardar') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
       
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo del archivo</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="titulo" value="{{(!empty($bancaria->titulo)) ? $bancaria->titulo : '' }}"
            required style="background-color:f7f7f7;" />
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Información</label>
          <textarea class="form-control form-control-solid placeholder-no-fix summernote" type="textarea" cols="30" rows="10" autocomplete="off"
            name="contenido" required style="background-color:f7f7f7;">
              {{(!empty($bancaria->contenido)) ? $bancaria->contenido : '' }}
              </textarea>
        </div>
        
       
        <div class="col-sm-12">
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
<script>
  $(document).ready(function () {
    $('.summernote').summernote({
      toolbar:[
        [ 'style', [ 'style' ] ], 
        [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ], 
        [ 'fontname', [ 'fontname' ] ], 
        [ 'fontsize', [ 'fontsize' ] ], 
        [ 'color', [ 'color' ] ], 
        [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ], 
        [ 'table', [ 'table' ] ], 
        ['insert', ['link', 'picture']],
      ]
    });
  })
  

</script>
@endpush