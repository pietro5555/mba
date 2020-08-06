@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      {{-- form 1 --}}
      <div class="col-xs-12">
        <form method="POST" action="{{ route('info.fecha') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="fecha" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
      </div>
      {{-- form 1 fin --}}
      {{-- form 2 --}}
      <div class="col-xs-12">
        <form method="POST" action="{{ route('info.mostrar-activo') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha desde</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="primer_id" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha hasta</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="segundo_id" required style="background-color:f7f7f7;" />
          </div>


          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
      </div>
      {{-- form 2 fin --}}
    </div>
  </div>
</div>
@endsection