@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      <div class="col-xs-12">
        {{-- form 1 --}}
        <form method="POST" action="{{ route('info.nombre') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Nombre de Usuario</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
              name="user_nicename" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>
        </form>
        {{-- fin form 1 --}}
        {{-- form 2 --}}
        <div class="col-xs-12">
          <form method="POST" action="{{ route('info.usuario') }}">
            {{ csrf_field() }}

            <div class="col-sm-4">
              <label class="control-label " style="text-align: center; margin-top:4px;">ID Usuario</label>
              <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="id"
                required style="background-color:f7f7f7;" />
            </div>

            <div class="col-sm-2" style="padding-left: 10px;">
              <button class="btn green padding_both_small" type="submit" id="btn"
                style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
            </div>
          </form>
        </div>
        {{-- fin form 2 --}}
        {{-- form 3 --}}
        <form method="POST" action="{{ route('info.lista') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">

            <label class="control-label " style="text-align: center; margin-top:4px;">ID desde</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
              name="primer_id" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">ID hasta</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
              name="segundo_id" required style="background-color:f7f7f7;" />
          </div>


          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
        {{-- fin form 3 --}}
      </div>
    </div>
  </div>
</div>
@endsection