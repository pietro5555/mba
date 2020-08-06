@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        
      </div>
    </div>
    <div class="box-body">
        
      {!!(!empty($modulo->contenido)) ? $modulo->contenido : ''!!}

    </div>
  </div>
</div>
@endsection