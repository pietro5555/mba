@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        Subir Pagos
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('link-subir') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo del pago</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="titulo"
            required style="background-color:f7f7f7;" />

        </div>
            
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Seleccione un archivo</label>
          <input type="file" name="archivo">
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