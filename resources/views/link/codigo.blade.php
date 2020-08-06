@extends('layouts.dashboardnew')

@section('content')

<div class="col-md-12">
   <div class="alert alert-info" role="alert">
    <h5>Para agregar el codigo qr a los metodo de pago cree el metodo de pago y coloque en el campo link la siguiente direccion {{request()->root()}}/link/qr</h5>
    </div>
  </div>  

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Codigo QR
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('link-insercion') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
       
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Contenido</label>
          <textarea class="form-control form-control-solid placeholder-no-fix" type="textarea" autocomplete="off"
            name="contenido" required style="background-color:f7f7f7;">
             {!! (!empty($qr->contenido)) ? $qr->contenido : '' !!} </textarea>
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