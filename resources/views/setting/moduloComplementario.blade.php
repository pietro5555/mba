@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Modulo Complementario
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('setting-agregar-modulo') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
       
        
        <div class="col-sm-12">
          <textarea class="form-control form-control-solid placeholder-no-fix" type="textarea" autocomplete="off"
            name="contenido" required style="background-color:f7f7f7;">
              {!!(!empty($modulo->contenido)) ? $modulo->contenido : ''!!}
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
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
 CKEDITOR.replace('contenido', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
@endpush