@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
  <div class="box">
    <div class="box-header with-border">
      <div class="box-title">Buscar usuario para ver su perfil</div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('admin.vista') }}">
        {{ csrf_field() }}
  
        <div class="col-sm-4">
  
          <label class="control-label " style="text-align: center; margin-top:4px;">Buscar Usuario</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
            name="user_email" placeholder="ID o Correo" required style="background-color:f7f7f7;" />
  
        </div>
  
        <div class="col-sm-2" style="padding-left: 10px;">
          <button class="btn green padding_both_small" type="submit" id="btn"
            style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
        </div>
  
      </form>
    </div>
  </div>
</div>
@endsection