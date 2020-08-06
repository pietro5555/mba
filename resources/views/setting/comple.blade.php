@extends('layouts.dashboardnew')

@section('content')

{{-- billetera y canje --}}

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        <h3>Complementos</h3>
      </div>
    </div>
    
    <div class="box-body">
        
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Recarga de Billetera : @if($settings->recarga == '1') Activado @else Desactivado @endif</h3>
      </div>
      
      <div class="col-sm-12 col-xs-12">
      <a href="{{route('setting-recarga')}}" class="btn btn-info btn-block">@if($settings->recarga == '1') Desactivar @else Activar @endif</a>
      </div>
      
      
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Canje de Puntos : @if($settings->canje == '1') Activado @else Desactivado @endif</h3>
      </div>
      
      <div class="col-sm-12 col-xs-12">
      <a href="{{route('setting-canje')}}" class="btn btn-info btn-block">@if($settings->canje == '1') Desactivar @else Activar @endif</a>
      </div>
      
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Tipo de Login</h3>
        <a  class="btn btn-info btn-block" data-toggle="modal" data-target="#logines">Ver Opciones de Login</a>
      </div>
      
      
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Tipo de Registros</h3>
        <a  class="btn btn-info btn-block" data-toggle="modal" data-target="#registros">Ver Opciones de Registro</a>
      </div>
      
    </div>
  </div>
</div>
{{-- billetera y canje --}}   


{{-- tipos de login disponibles --}}
<div class="modal fade" id="logines" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipos de Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-comple-login')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            
         
              <div class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
              <label for="">Seleccione un Login</label>
              <select name="login" class="form-control">
                <option value="" selected disabled>Selecciones un Opción</option>
                <option value="1">Login Basico</option>
                <option value="2">Login Estandar</option>
                <option value="3">Login Personalizado</option>
              </select>
             </div>
            
               <button type="submit" class="btn btn-info btn-block">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 


{{-- tipos de login disponibles --}}
<div class="modal fade" id="registros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipos de Registros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-comple-registro')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
            
         
              <div class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
              <label for="">Seleccione un Registro</label>
              <select name="registro" class="form-control">
                <option value="" selected disabled>Selecciones un Opción</option>
                <option value="1">Registro Basico</option>
                <option value="2">Registro Estandar</option>
              </select>
             </div>
             
             <div class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
              <label for="">Color de los Label</label>
              <input name="color" type="text" class="form-control" required>
             </div>
             
             <div class="col-xs-12 col-sm-12" style="margin-bottom:10px;">
              <label for="">Color del Fondo</label>
              <input name="fondo" type="text" class="form-control" required>
             </div>
            
               <button type="submit" class="btn btn-info btn-block">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 

@endsection