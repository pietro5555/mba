@extends('layouts.login.inicio')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Valor de la moneda 
      </div>
    </div>
    <div class="box-body">
      
         <form class="" action="{{route('ajustes-cambio')}}" method="post">
                    {{ csrf_field() }}
                    
                    
                    <div class="col-md-12">
                    <div class="col-md-6">
                        <label class="control-label">Moneda </label>
                    <input type="text" class="form-control" name="wallet" value="1" disabled>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Valor Actual</label>
                    <input type="number" step="any" class="form-control" name="valor" value="{{$valor->valor_conversion}}" >
                    </div>
                    
            <div class="col-sm-4 col-md-offset-4" style="margin-top: 30px;">
              
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          
          </div>
                </form>
         
    </div>
  </div>
</div>

@endsection