@extends('layouts.dashboardnew')

@section('content')

<style>
    .var{
        color: red;
    }
</style>

<div class="col-xs-12">
            <div class="col-xs-12 mostrar">
                <div class="box box-info">
                    <div class="box-header">
                        
                        <div class="col-md-3">
                          <button class="btn btn-info btn-block mostrar hh toggle">Editar Plantillas</button>
                        </div>
                        
                    </div>
                    <div class="box-body white">
            
                
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 ">
                    <h3>Configuracion notificacion Evento Agendado</h3>
                    <h5>{{(!empty($plantillaC->titulo)) ? $plantillaC->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 ">
                    <h3>Contenido de la Plantilla de Evento Agendado</h3>
                    <h5>{!!(!empty($plantillaC->contenido)) ? $plantillaC->contenido : ''!!}</h5>
                  </div>
                
                  
                 
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 ">
                    <h3>Configuracion notificacion el live va a iniciar</h3>
                    <h5>{{(!empty($plantillaPC->titulo)) ? $plantillaPC->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 ">
                    <h3>Contenido de la Plantilla de live va a iniciar</h3>
                    <h5>{!!(!empty($plantillaPC->contenido)) ? $plantillaPC->contenido : ''!!}</h5>
                  </div>
                
                  
                  
                  <div class="col-xs-12"></div>
                  <div class="col-sm-4 col-xs-12 ">
                    <h3>Configuracion notificacion Inicio del live</h3>
                    <h5>{{(!empty($plantillaL->titulo)) ? $plantillaL->titulo : ''}}</h5>
                  </div>
                  <div class="col-sm-8 col-xs-12 ">
                    <h3>Contenido de la Plantilla de Inicio del live</h3>
                    <h5>{!!(!empty($plantillaL->contenido)) ? $plantillaL->contenido : ''!!}</h5>
                  </div>
                 

                  
                    </div>
                </div>    
            </div>
        </div>
 


<div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-body">
         
            {{-- correo de Compra --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title white">
                            <h3>Configuracion notificacion el live va a iniciar</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        
                            <form class="" action="{{route('settings-save-plantilla-nueva')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaC->id)) ? $plantillaC->id : '' }}">
                                <div class="form-group">
                                    <label class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaC->titulo)) ? $plantillaC->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="white">Contenido del Correo</label>
                                    <textarea name="correo2" cols="30"
                                        rows="10">{{(!empty($plantillaC->contenido)) ? $plantillaC->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group">
                                    <label class="white">Variables que pueden usar</label>
                                <span class="var">@nombre</span>
                                <span class="var">@titulo</span>
                                <span class="var">@mentor</span>
                                <span class="var">@fecha</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
          
            
           
            {{-- correo de Pago Compra --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title white">
                            <h3>Configuracion notificacion Pago Compra</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                            <form class="" action="{{route('settings-save-plantilla-nueva')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaPC->id)) ? $plantillaPC->id : '' }}">
                                <div class="form-group">
                                    <label class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaPC->titulo)) ? $plantillaPC->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="white">Contenido del Correo</label>
                                    <textarea name="correo3" cols="30"
                                        rows="10">{{(!empty($plantillaPC->contenido)) ? $plantillaPC->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group">
                                    <label class="white">Variables que pueden usar</label>
                                    <span class="var">@nombre</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@fecha</span>
                                    <span class="var">@total</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
          
            
           
            {{-- correo de Liquidacion --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3>Configuracion notificacion Inicio del live</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        
                            <form class="" action="{{route('settings-save-plantilla-nueva')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaL->id)) ? $plantillaL->id : '' }}">
                                <div class="form-group">
                                    <label class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaL->titulo)) ? $plantillaL->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label class="white">Contenido del Correo</label>
                                    <textarea name="correo4" cols="30"
                                        rows="10">{{(!empty($plantillaL->contenido)) ? $plantillaL->contenido : '' }}</textarea>
                                    <p class="help-block">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                
                                <div class="form-group">
                                    <label class="white">Variables que pueden usar</label>
                                     <span class="var">@nombre</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@fecha</span>
                                    <span class="var">@total</span>
                                </div>
                                
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

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
 CKEDITOR.replace('correo4', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>



@endpush