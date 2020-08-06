@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
  .texto-central {
    text-align: center;
  }

  .var {
    margin: 0 10px;
    color: brown;
    border-bottom: 2px solid;
  }
</style>
@endpush

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header">
      <div class="box-title">
        Enviar Correo
      </div>
    </div>
    <div class="box-body">
        @if($modal == 0)
      <form method="POST" action="{{ route('correo-subir') }}" enctype="multipart/form-data">
          @else
           <form method="POST" action="{{ route('correo-envioprospecto') }}" enctype="multipart/form-data">
          @endif
        {{ csrf_field() }}
        
       
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Asunto</label>
          <input class="form-control" type="text" name="asunto"
            required />
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Contenido</label>
          <textarea type="textarea" cols="30" rows="10"
            name="contenido" required>
              </textarea>
        </div>
        
        <div class="col-sm-12">
           <div class="form-group">
                <label for="">Variables que pueden usar</label>
                <span class="var">@usuario</span>
                <span class="var">@idpatrocinio</span>
                <span class="var">@correo</span>
            </div>
        </div> 
        @if($modal == 0)
        
        <div class="col-md-12">
             <label class="control-label " style="text-align: center; margin-top:4px;">Destinatarios</label>
        <select class="form-control" name="detalles" id="opcion" onchange="seleccionado()">
        <option value="1">Todos los afiliados</option>
        <option value="2">Todos los afiliados activos</option>
        <option value="3">Todos los afiliados inactivos</option>
        <option value="4">Afiliados registrados este mes</option>
        <option value="5">Afiliado especifico</option>
        </select>
        </div>
        
        
      <div class="col-md-12" style="margin-top:20px;">
        <div id="subcategoria" style="display:none;">
              <select class="form-control" name="personal">
        <option value="" selected disabled>Seleccione una Opción</option>
                  @foreach($personales as $personal)
        <option value="{{$personal['ID']}}">{{$personal['nombre']}} {{$personal['email']}}</option>
                  @endforeach
        </select>
           </div>
        </div>
        @else
        
        <input name="id" type="hidden" value="{{$modal}}">
        
         <div class="col-md-12">
             <label class="control-label " style="text-align: center; margin-top:4px;">Destinatarios</label>
        <select class="form-control" name="detalles" disabled>
        <option value="5">Afiliado especifico</option>
        </select>
        </div>
        
        
        <div class="col-md-12" style="text-align: center; margin-top:4px;">
       <input type="email" name="personal" value="{{$correoprospecto}}" class="form-control" disabled>
        </div>
        @endif
        
        
       
        <div class="col-sm-12">
          <div class="col-sm-6 col-md-offset-3" style="padding-left: 10px;">
              <button class="btn btn-success btn-block" type="submit" id="btn"
                style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>





@endsection
@push('script')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
  $(document).ready(function () {
 CKEDITOR.replace('contenido', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
})
  
  
   function seleccionado(){
    var opt = $('#opcion').val();
    
    if(opt=="5"){
        $('#subcategoria').show();
        }else{
            $('#subcategoria').hide();
        }
    }
</script>
@endpush