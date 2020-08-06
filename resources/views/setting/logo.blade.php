@extends('layouts.dashboardnew')

@section('content')


{{-- formulario de traductor--}}

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        <h3>Traductor</h3>
      </div>
    </div>
    
    <div class="box-body">
        
        <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Traductor : @if($settings->traductor == '1') Activado @else Desactivado @endif</h3>
      </div>
      
      <div class="col-sm-12 col-xs-12">
      <a href="{{route('setting-traductor')}}" class="btn btn-info btn-block">@if($settings->traductor == '1') Desactivar @else Activar @endif</a>
      </div>
      
    </div>
  </div>
</div>
{{-- fin de traductor --}}

{{-- información --}}
<div class="col-xs-12">
  <div class="box box-info mostrar">
    <div class="box-header with-border">
      <div class="box-title">
        <h3>Información del Sistema</h3>
      </div>
    </div>
    {{-- inicio body --}}
    <div class="box-body">
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Nombre del Sistema</h3>
        <input class="form-control" disabled placeholder="{{$settings->name}}">
      </div>
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Edad Minima Para Ingresar al sistema</h3>
        <input class="form-control" disabled placeholder="{{$settings->edad_minino}}">
      </div>
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Licencia del Sistema</h3>
        <input class="form-control" disabled placeholder="{{$settings->licencia}}">
      </div>
      <div class="col-sm-12 col-xs-12">
        <h3 class="text-center">Fecha de Vencimiento de la Licencia</h3>
        <input class="form-control" disabled placeholder="{{date('d-m-Y', strtotime($settings->fecha_vencimiento))}}">
      </div>
      
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Logo del Sistema</h3>
          <h5 class="text-center">
            <img src="{{asset('assets/img/logo-light.png')}}" class="circular-log" alt="">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Favicon del Sistema</h3>
          <h5 class="text-center">
            <img src="{{asset('favicon.ico')}}" alt="" class="circular-log">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Banner del Sistema Login</h3>
          <h5 class="text-center">
            <img src="{{asset('assets/blanco.png')}}" alt="" class="circular-log">
          </h5>
        </div>
      </div>
      
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Banner de Sistema</h3>
          <h5 class="text-center">
            <img src="{{asset('assets/formulario.png')}}" alt="" class="circular-log">
          </h5>
        </div>
      </div>
      
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Banner Escritorio</h3>
          <h5 class="text-center">
            <img src="{{asset('assets/inicio.png')}}" alt="" class="circular-log">
          </h5>
        </div>
      </div>
    </div>
    {{-- fin body --}}
    
    <div class="box-title">
        <h3 style="text-align: center;">Slider Home</h3>
      </div>
    
    
    @foreach($component as $item)
     <div class="col-sm-3 col-xs-12" style="margin-bottom: 20px;">
        <div class="fav">
          <h3 class="text-center"></h3>
          <h5 class="text-center">
            <img src="{{asset('drop/'.$item->slider)}}" alt="" class="circular-log">
            
            <center><a href="{{route('setting-delete-drop', $item->id)}}"><span
            class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></center>
          </h5>
        </div>
      </div>
      @endforeach
     
      
    <div class="box-footer">
      <button class="btn green btn-block mostrar toggle">Editar</button>
    </div>
  </div>
</div>

{{-- formularios --}}
<div class="col-xs-12">
  <div class="box box-info mostrar" style="display:none;">
    <div class="box-body">
      {{-- formulario 1 --}}
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="box-title">
              Nombre del sistema y la edad minima
            </div>
          </div>
          <div class="box-body">
            <form class="" action="{{route('setting-save-name')}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="">Nombre del Sistema</label>
                <input type="text" class="form-control" name="namesystem" value="{{$settings->name}}" required>
              </div>
              <div class="form-group">
                <label for="">Edad Minima para entrar al sistema</label>
                <input type="text" class="form-control" name="edad_minima" value="{{$settings->edad_minino}}" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary"> Guardar <span
                    class="glyphicon glyphicon-floppy-disk"></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- fin formulario 1 --}}
      {{-- formulario 2 --}}
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="box-title">
              Logo del sistema
            </div>
          </div>
          <div class="box-body">
              
            <div class="alert alert-info" role="alert">
              <h5><strong>Nota: El tamaño adecuado de la imagen debe ser 170 X 170 pixeles</strong></h5>
            </div>
    
            <form class="" action="{{route('setting-save-logo')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="">Logo Sistema</label>
                <input type="file" class="form-control" name="logo" value="" accept="image/x-png" required>
              </div>
              <div class="form-group sisi">
                <button type="submit" class="btn btn-primary"> Guardar <span
                    class="glyphicon glyphicon-floppy-disk"></span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- fin formulario 2 --}}
      {{-- formulario 3 --}}
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-title">
                Favico del sistema
              </div>
            </div>
            <div class="box-body">
                
            <div class="alert alert-info" role="alert">
              <h5><strong>Nota: El tamaño de la imagen puede ser de 150 x 150 pixeles o superior, la extencion de la imagen debe ser .icon</strong></h5>
            </div>
            
                <form class="" action="{{route('setting-save-favicon')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Favicon Sistema</label>
                    <input type="file" class="form-control" name="favicon" accept="image/x-icon" value="" required>
                  </div required>
                  <div class="form-group sisi">
                    <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span>
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      {{-- fin formulario 3 --}}
      
       {{-- formulario 4 --}}
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-title">
                Banner del sistema Login
              </div>
            </div>
            <div class="box-body">
                
            <div class="alert alert-info" role="alert">
              <h5><strong>Nota: El tamaño de la imagen adecuado es 1920 X 1279 pixeles</strong></h5>
            </div>
            
                <form class="" action="{{route('setting-save-banner')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Banner Sistema Login</label>
                    <input type="file" class="form-control" name="banner" accept="image/x-png" value="" required>
                  </div required>
                  <div class="form-group sisi">
                    <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span>
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      {{-- fin formulario 4 --}}
      
      
      
      {{-- formulario 5 --}}
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-title">
                Banner del Sistema
              </div>
            </div>
            <div class="box-body">
                
            <div class="alert alert-info" role="alert">
              <h5><strong>Nota: El tamaño de la imagen adecuado es 1440 X 810 pixeles</strong></h5>
            </div>
            
                <form class="" action="{{route('setting-save-banner-formulario')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Banner de Sistema</label>
                    <input type="file" class="form-control" name="formulario" accept="image/x-png" value="" required>
                  </div required>
                  <div class="form-group sisi">
                    <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span>
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      {{-- fin formulario 5 --}}
      
      
      {{-- formulario 6 --}}
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-title">
                Banner Escritorio
              </div>
            </div>
            <div class="box-body">
                
            <div class="alert alert-info" role="alert">
              <h5><strong>Nota: El tamaño de la imagen adecuado es 225 X 225 pixeles</strong></h5>
            </div>
            
                <form class="" action="{{route('setting-save-bannerinicio')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Banner Escritorio</label>
                    <input type="file" class="form-control" name="inicio" accept="image/x-png" value="" required>
                  </div required>
                  <div class="form-group sisi">
                    <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span>
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      {{-- fin formulario 6 --}}
      
      
      {{-- formulario 7 --}}
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-title">
                Slider del Home
              </div>
            </div>
            <div class="box-body">
                
            <div class="alert alert-info" role="alert">
              <h5><strong>Nota: El tamaño de la imagen adecuado es 1118 X 120 pixeles</strong></h5>
            </div>
            
          <form method="post" action="{{route('setting-save-home')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
            {{ csrf_field() }}
           
            </form>
            
            </div>
          </div>
        </div>
      {{-- fin formulario 7 --}}
    </div>
  </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
        Dropzone.options.dropzone =
         {
             
            maxFiles: 5, 
            dictDefaultMessage: 'Arrastre o Pulse aqui las imagenes',
            dictFallbackMessage: 'Lo sentimos su navegador no es compatible',
            dictCancelUploadConfirmation: 'Esta seguro que desea cancelar ?',
            dictCancelUpload: 'Cancelar',
            dictRemoveFile: 'Eliminar',
            
            maxfilesexceeded: function(file) {
            
             confirm("A superado el maximo de archivos subidos");    
             this.removeAllFiles();
           
            },
            
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            timeout: 5000,

                    
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
        };

 </script>
 @endpush
