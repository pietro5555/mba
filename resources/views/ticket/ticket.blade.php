@extends('layouts.dashboardnew')

@section('content')
<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>


<div class="col-md-12">
   <div class="alert alert-info" role="alert">
    <h5><strong>Nota:</strong> Si necesitas ayuda los tiempos de respuesta son de 12 a 24 horas</h5>
    </div>
  </div> 

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="panel-title">Crear Ticket</div>
    </div>
    <div class="panel-body">
      <form method="POST" action="{{ route('generarticket') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
         <div class="col-md-12">
        <label class="control-label" style="text-align: center; margin-top:4px;">Tipo de tickets</label>
           <select name="tipo" class="form-control" required>
            <option value="" selected disabled>Seleccione una Opción</option>
            <option value="Activacion">Activacion</option>
            <option value="Comisiones">Comisiones</option>
            <option value="Productos y compras">Productos y compras</option>
            <option value="Afiliados y red">Afiliados y red</option>
            <option value="Otros">Otros</option>
            </select>
              </div>
              
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Asunto del ticket</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="asunto"
            required style="background-color:f7f7f7;" />
        </div>
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Comentario</label>
          <textarea class="form-control form-control-solid placeholder-no-fix" type="textarea" autocomplete="off"
            name="comentario" required style="background-color:f7f7f7;">
                      </textarea>
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Subir Archivo</label>
          <input type="file" name="archivo">
        </div>
        
        <div class="col-sm-12">
          <div class="col-sm-6" style="padding-left: 10px;">
            <button class="btn green btn-block" type="submit" id="btn"
              style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
          </div>
          <div class="col-sm-6" style="padding-left: 10px;">
            <a href="{{ route('misticket') }}" class="btn btn-danger btn-block" id="btn"
              style="margin-bottom: 5px; margin-top: 8px;">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  CKEDITOR.replace('comentario');
</script>
@endsection