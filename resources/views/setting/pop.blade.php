@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        Pop up
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('setting-up') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <a href="{{route('setting-desactivaciom-pop')}}" class="btn btn-info btn-block">{{($pop->activado == 0) ? 'Activar' : 'Desactivar'}}</a>
        
        <div class="col-md-12">
            <label for="">Titulo</label>
            <input type="text" name="titulo" class="form-control" value="{{(!empty($pop->titulo)) ? $pop->titulo : '' }}">
        </div>
        
            <div class="col-md-12">
                <label for="">Contenido del Pop Up</label>
                <textarea name="contenido" class="summernote" cols="30" rows="10">{{(!empty($pop->contenido)) ? $pop->contenido : '' }}</textarea>
            </div>
       
     <div class="col-sm-6" style="padding-left: 10px;">
          <a href="{{ route('admin.index') }}" class="btn btn-danger btn-block" id="btn"
            style="margin-bottom: 5px; margin-top: 8px;">Cancelar</a>
        </div>
        <div class="col-sm-6" style="padding-left: 10px;">
          <button class="btn btn-info btn-block" type="submit" id="btn"
            style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
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
      toolbar: [
        ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview']]
      ]
    });
  })
  
 </script>
@endpush