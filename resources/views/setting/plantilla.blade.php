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
  <div class="box">
    <div class="box-body">
      {{-- informario --}}
      <div class="col-xs-12 mostrar">
        <div class="box box-info">
          <div class="box-header white">
              <h3 class="white">Información de las Plantilla de correos </h3>
              
              <div class="col-md-3">
              <button class="btn btn-info btn-block mostrar hh toggle">Editar</button>
              
              <button class="btn btn-info btn-block mostrar hh" data-toggle="modal" data-target="#servidor">Servidor Externo</button>
              
              </div>
              
              <div class="col-md-3">
              <button class="btn btn-info btn-block mostrar hh" data-toggle="modal" data-target="#myModalAdmin">Probar
                Plantillas</button>
                </div>
                
                <div class="col-md-3">
                 <a class="btn btn-info btn-block mostrar hh" data-toggle="modal" data-target="#firma">Agregar Firma</a>
                 </div>
                 
                 <div class="col-md-3">
                 <a class="btn btn-info btn-block mostrar hh" data-toggle="modal" data-target="#habilitarcorreo">Habilitar Correos</a>
                 </div>
            
          </div>
          <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-warning" role="alert">
                       <h5>Los correos solo seran enviados cuando cargue el logo y agregue el campo de firma</h5>
                        </div>
                </div>
                
                <div class="col-xs-12 col-md-12 white">
                            <h4><strong>Correos Habilitados</strong></h4>
                            <div class="col-xs-6">
                                <h5>Correo de Pago: {{($Correos->pago == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5>Correo de Compra: {{($Correos->compra == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            
                            <div class="col-xs-6">
                                <h5>Correo de pago Compra: {{($Correos->pc == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            
                            <div class="col-xs-6">
                                <h5>Correo de Liquidacion: {{($Correos->liquidacion == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                        </div>
                
                
                <div class="col-sm-4 col-xs-12 white">
                    <h3>Titulo de la Plantilla de Bienvenida</h3>
                    <h5>{{(!empty($plantillaB->titulo)) ? $plantillaB->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de Bienvenida</h3>
                    <h5>{!!(!empty($plantillaB->contenido)) ? $plantillaB->contenido : ''!!}</h5>
                  </div>
                  
                  @if($Correos->pago == '1')
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 white">
                    <h3>Titulo de la plantilla de Pago</h3>
                    <h5>{{(!empty($plantillaP->titulo)) ? $plantillaP->titulo : ''}}</h5>
                  </div>
                  
                  <div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de Pago</h3>
                    <h5>{!!(!empty($plantillaP->contenido)) ? $plantillaP->contenido : ''!!}</h5>
                  </div>
                   @endif
                   
                  @if($Correos->compra == '1')
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 white">
                    <h3>Titulo de la plantilla de Compra</h3>
                    <h5>{{(!empty($plantillaC->titulo)) ? $plantillaC->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de Compra</h3>
                    <h5>{!!(!empty($plantillaC->contenido)) ? $plantillaC->contenido : ''!!}</h5>
                  </div>
                  @endif
                  
                  @if($Correos->pc == '1')
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 white">
                    <h3>Titulo de la plantilla de Pago Compra</h3>
                    <h5>{{(!empty($plantillaPC->titulo)) ? $plantillaPC->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de Pago Compra</h3>
                    <h5>{!!(!empty($plantillaPC->contenido)) ? $plantillaPC->contenido : ''!!}</h5>
                  </div>
                  @endif
                  
                  @if($Correos->liquidacion == '1')
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 white">
                    <h3>Titulo de la plantilla de Liquidacion</h3>
                    <h5>{{(!empty($plantillaL->titulo)) ? $plantillaL->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de Liquidacion</h3>
                    <h5>{!!(!empty($plantillaL->contenido)) ? $plantillaL->contenido : ''!!}</h5>
                  </div>
                  @endif
                  
                  
                  
                   
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 white">
                    <h3>Titulo de la plantilla de Prospeccion</h3>
                    <h5>{{(!empty($plantillaPros->titulo)) ? $plantillaPros->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 white">
                    <h3>Contenido de la Plantilla de Prospeccion</h3>
                    <h5>{!!(!empty($plantillaPros->contenido)) ? $plantillaPros->contenido : ''!!}</h5>
                  </div>
                  
            </div>
          </div>
        </div>
      </div>
      {{-- Formulario --}}
      @include('setting.componentes.formPlantilla')
    </div>
  </div>
</div>


{{-- modal de la firma --}}
@include('setting.componentes.correo.modalfirma')

{{-- modal prueba --}}
@include('setting.componentes.modalPrueba')

{{-- modal para habilitar correo --}}
@include('setting.componentes.correo.modalhabilitar')

{{-- modal para servidor externo --}}
@include('setting.componentes.correo.servidor')

@endsection

@push('script')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

<script>
 CKEDITOR.replace('correo', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

<script>
 CKEDITOR.replace('correo1', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

<script>
 CKEDITOR.replace('correo2', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>


<script>
 CKEDITOR.replace('correo3', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

<script>
 CKEDITOR.replace('correo4', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

<script>
 CKEDITOR.replace('correo5', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>


<script>
 CKEDITOR.replace('fir', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>



<script>
  function toggle() {
    $('.mostrar').toggle('slow')
  }
</script>
@endpush