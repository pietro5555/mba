@extends('layouts.login.inicio')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
       <div class="box-title">
            <h3>
                Transferencia Comision
                 <button type="button" class="btn btn-info btn-block hh" data-toggle="modal"data-target="#myModal2">
                                    Editar
                </button>
            </h3>
        </div>
    </div>
    <div class="box-body">
                            
                   <div class="col-xs-12 col-md-6 ch">
                            <h3>Comision Por Transferencia</h3>
                           
                            <h5>
                                @if ($comision->tipotransferencia == '1')
                                   Monto por Porcentaje
                                    {{$comision->comisiontransf * 100}} %
                                    @endif
                                @if($comision->tipotransferencia == '0')
                                Monto por Fijo
                                    {{$comision->comisiontransf}} $
                                @endif
                            </h5>
                            
                        </div>
    </div>
  </div>
</div>



<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comisiones de Metodo de Pago</h4>
      </div>
      <div class="modal-body">
        {{-- seccion de transferencia --}}
        <form class="" action="{{route ('ajustes-comision')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tipo de Comision</label>
            <select name="tipotransferencia" class="form-control" required>
              <option value="" selected disabled>Seleccione una Opción</option>
              <option value="0">Monto fijo</option>
              <option value="1">Monto por porcentaje</option>
            </select>
          </div>
          
         
          <div class="form-group">
            <label for="">Comision Por Transferencia</label>
            <input type="number" name="valor" value="" step="any" class="form-control" >
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

@endsection