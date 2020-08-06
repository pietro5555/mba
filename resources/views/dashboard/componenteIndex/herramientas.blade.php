{{-- noticias --}}
<div class="row">
  <div class="col-md-12">
     <div class="box box-warning" style="border-radius: 20px;">
      <div class="box-header with-border">
        <h3 class="box-title">Blog y Artículos</h3>
        <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      
      
       <div class="box-body">
      @foreach($materiales as $material)

    @if($material->imagen != null)
     <div class="col-sm-2">

        <img src="{{asset('imagen/'.$material->imagen)}}" alt="" class="circular-herramienta">
     </div>
     @endif
     
     <div class="col-sm-{{($material->imagen != null) ? '10' : '12'}}">
        <h3 class="titulo-herramienta">{{$material['titulo']}}</h3>
        <br>
        <p class="otros-herramienta">{!! $material->contenido !!}<p>
        <p class="otros-herramienta">{{$material->created_at->diffForHumans()}}</p>

        
        <hr>
      </div>

      @endforeach

    </div>
      
    </div>
  </div> 
  
{{-- materiales --}}
  <div class="col-md-12">
     <div class="box box-danger" style="border-radius: 20px;">
      <div class="box-header with-border">
        <h3 class="box-title">Materiales</h3>
        <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      
      
       <div class="box-body">
      @foreach($noticias as $archi)
      @if($archi->imagen_muestra != null)
      <div class="col-sm-2">

        <img src="{{asset('imagenmaterial/'.$archi->imagen_muestra)}}" alt="" class="circular-herramienta"
          >
      </div>
      @endif
      
      <div class="col-sm-10">
        <h3 class="margin-herramienta">{{$archi->titulo}}</h3>
        <br>
        <p class="margin-herramienta">{!! $archi->contenido !!}</p>
        <p class="margin-herramienta">{{$archi->created_at->diffForHumans()}}</p>
         
         @if(!empty($archi->archivo))
         <a href="{{route('archivo.ver-descargar', $archi->id)}}" class="btn btn-primary">
         <i class="fas fa-cloud-download-alt"></i>
        </a>  
         @endif
       <hr>
      </div>

      @endforeach

    </div>
      
    </div>
  </div>
</div>     