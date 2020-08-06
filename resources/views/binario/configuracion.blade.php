@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
        {{-- informacion genera--}}
     <div class="col-xs-12">
    {{-- comisiones  --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Productos y sus puntos </h3>
                <button class="btn btn-info btn-block" data-toggle="modal" data-target="#binario">Configurar Bono Binario</button>
                <button class="btn btn-info btn-block" data-toggle="modal" data-target="#inicio">Configurar Bono de Inicio</button>
                <button class="btn btn-info btn-block" data-toggle="modal" data-target="#patrocinador">Configurar Bono de Patrocinador</button>
            </div>
        </div>
        <div class="box-body">
            @empty(!$binario)
            
            <h4 style="text-align:center;">Bono Binario </h4>
            {{-- Bono de binario --}}
            <div class="col-sm-4 col-xs-12">
                <h5>Valor del binario</h5>
                <input type="text" class="form-control" readonly value="{{$binario->binario * 100}} %" >
            </div>
            
            <div class="col-sm-4 col-xs-12">
                <h5>Forma de descuento</h5>
                <input type="text" class="form-control" readonly value="pata {{$binario->pata}}">
            </div>
            
             <div class="col-sm-4 col-xs-12">
                <h5>Automatizacion </h5>
                @if($binario->autobinario == '1')
                 <input type="text" class="form-control" readonly value="Automatico">
                @else
                
                <input type="text" class="form-control" readonly value="Semi-automatico">
                @endif
            </div>
            
            {{-- Bono de inicio --}}
            
            <h4 style="text-align:center;">Bono de Inicio </h4>
           <div class="col-sm-3 col-xs-12">
                <h5>Valor del bono de inicio</h5>
                @if($binario->tipo == 'porcentaje')
                <input type="text" class="form-control" readonly value="{{$binario->inicio * 100}} %">
                @else
                <input type="text" class="form-control" readonly value="{{$binario->inicio}}">
                @endif
            </div>
            
            <div class="col-sm-3 col-xs-12">
                <h5>Tipo de valor para el bono de inicio</h5>
                <input type="text" class="form-control" readonly value="{{$binario->tipo}}">
            </div>
            
             <div class="col-sm-3 col-xs-12">
                <h5>Automatizacion </h5>
                @if($binario->auto == 'automatico')
                <input type="text" class="form-control" readonly value="Automatico">
                @elseif($binario->auto == 'semi')
                <input type="text" class="form-control" readonly value="Semi-automatico">
                @else
                <input type="text" class="form-control" readonly value="">
                @endif
            </div>
            
            <div class="col-sm-3 col-xs-12">
                <h5>Puntos</h5>
                <input type="text" class="form-control" readonly value="{{$binario->puntos_inicio}}">
            </div>
            
            
             {{-- Bono de patrocinador --}}
             <h4 style="text-align:center;">Bono de Patrocinador </h4>
           <div class="col-sm-12 col-xs-12">
                <h5>Valor del bono patrocinador</h5>
                <input type="text" class="form-control" readonly value="{{$binario->patrocinador}}">
            </div>
            
            
            @endempty
        </div>
    </div>
    {{-- comisiones fin --}}
</div>
{{-- informacion fin --}}
        
    </div>
  </div>
</div>


<!-- Modal binario -->   
<div class="modal fade" id="binario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Configurar Binario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('binario-save')}}" method="post">
          {{ csrf_field() }}
               <input type="hidden" name="id" class="form-control" value="1">
               
                <div class="form-group">
              <label for="">Valor del binario este valor sera tomado como porcentaje</label>
              <input type="number" name="binario" class="form-control" >
            </div>
            
            
             <div class="form-group">
            <label for="">Forma de Descuento</label>
            <select class="form-control" name="pata">
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="corta">Pata Corta</option>
              <option value="larga">Pata Larga</option>
            </select>
          </div>
          
          
           <div class="form-group">
            <label for="">Automatizacion</label>
            <select id="requerido" class="form-control" name="automatico">
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="1">Automatico</option>
              <option value="0">Semi-automatico</option>
            </select>
          </div>
               
               <button type="submit" class="btn btn-primary btn-block">Configurar Binario</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 



<!-- Modal binario de inicio -->   
<div class="modal fade" id="inicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Configurar Bono de inicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('binario-iniciado')}}" method="post">
          {{ csrf_field() }}
          
          <input type="hidden" name="id" class="form-control" value="1">
               
                <div class="form-group">
              <label for="">Valor del bono inicio</label>
              <input type="number" name="inicio" class="form-control" >
            </div>
            
            
             <div class="form-group">
            <label for="">Tipo de valor</label>
            <select class="form-control" name="tipo">
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="porcentaje">porcentaje</option>
              <option value="normal">normal</option>
            </select>
          </div>
          
          
           <div class="form-group">
            <label for="">Automatizacion</label>
            <select id="requerido" class="form-control" name="automatico">
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="automatico">Automatico</option>
              <option value="semi">Semi-automatico</option>
            </select>
          </div>
          
          <div class="form-group">
              <label for="">Valor en puntos</label>
              <input type="number" name="puntos" class="form-control" >
            </div>
               
               <button type="submit" class="btn btn-primary btn-block">Configurar Bono inicio</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 


<!-- Modal binario de patrocinador -->   
<div class="modal fade" id="patrocinador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Configurar Bono de inicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('binario-patrocinador')}}" method="post">
          {{ csrf_field() }}
          
          <input type="hidden" name="id" class="form-control" value="1">
               
                <div class="form-group">
              <label for="">Valor del bono patrocinador</label>
              <input type="number" name="patrocinador" class="form-control" >
            </div>
            
       
               <button type="submit" class="btn btn-primary btn-block">Configurar Bono patrocinador</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 

@endsection