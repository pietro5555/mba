@extends('layouts.dashboardnew')

@section('content')

<style>
    .title-producto{
        border-bottom: 2px double darkcyan !important;
    }
    .price {
        background: darkcyan;
        font-size: 18px;
    }
</style>


<section class="content">
 <div class="row">
    
<div class="col-xs-6">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        Producto
      </div>
    </div>
    <div class="box-body">
      <form method="POST" action="{{ route('tienda-product-saveeditar') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        
        <input type="hidden" name="ID" value="{{$required['ID']}}">
        
        <input type="hidden" value="{{$puntos}}" name="autenticador">

        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Titulo del Producto</label>
          <input class="form-control" type="text" name="titulo" value="{{$required['titulo']}}"
            required  id="titulo"  onkeyup="tituloinser()"/>

        </div>
        
        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Precio del Producto</label>
          <input class="form-control" type="number" name="precio" min="0" value="{{$required['precio']}}"
            required onkeyup="precioinser()" id="precionormal"/>

        </div>
        
        
        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Descripcion del Producto</label>
          <textarea class="form-control" name="contenido"
            required  id="descripcion"  onkeyup="descripcioninsert()"/>
            {!!(!empty($required['contenido'])) ? $required['contenido'] : ' '!!}
            </textarea>

        </div>
        
        @if($puntos == '1')
        <div class="col-sm-12">

          <label class="control-label " style="text-align: center; margin-top:4px;">Puntos</label>
          <input class="form-control" type="number" name="puntos" value="{{$required['puntos']}}" min="0"
            required/>

        </div>
        @endif
        
        <div class="col-sm-12">
           
               <label class="control-label " style="text-align: center; margin-top:4px;">Categorias</label>
               <select class="form-control" name="categoria" required=""/>
               <option value="" selected disabled>Seleccione una Categoria</option>
               @foreach($datos as $dato)
                <option value="{{$dato['ID']}}" @if($required['cat'] == $dato['ID']) selected @endif>{{$dato['nombre']}}</option>
                @endforeach
                </select>
           
            </div>
            
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Seleccione una imagen</label>
          <input type="file" name="archivo" accept="image/*" id="imgInp">
        </div>
        
        <div class="col-sm-12">
          <label class="control-label " style="text-align: center; margin-top:4px;">Seleccione las Imagenes para la galeria</label>
          <input type="file" name="galeria[]" multiple accept="image/*">
        </div>
        
        <div class="col-sm-6" style="padding-left: 10px;">
          <a href="{{ route('tienda-product-nueva') }}" class="btn btn-danger btn-block" id="btn"
            style="margin-bottom: 5px; margin-top: 8px;">Cancelar</a>
        </div>
        <div class="col-sm-6" style="padding-left: 10px;">
          <button class="btn btn-info btn-block" type="submit" id="btn"
            style="margin-bottom: 5px; margin-top: 8px;">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="col-xs-6">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        Vista Previa
      </div>
    </div>
    <div class="box-body">
        <div class="col-xs-12 col-md-12">
                <div class="thumbnail">
                    <img src="{{$required['img']}}" alt="" id="blah" class="circular">
                    <div class="caption">
                        <h3 id="titleprevio" class="title-producto">
                            {{$required['titulo']}}
                        </h3>
                        
                        {{--<p class="text-justify" id="textdescrip">{!! $required['contenido'] !!}</p>--}}
                        
                        <h3>
                            
                            <h4 style="text-align:center;" style="display:none;" id="puntosmostrar"> </h4>
                            
                            <a href="#" class="btn btn-primary">Ver en tienda <i
                                    class="fas fa-external-link-alt"></i></a>
                            <span class="label pull-right price" id="normal">
                                Precio: <b id="precio">
                                     @if ($moneda->mostrar_a_d)
                                    {{$moneda->simbolo}} {{$required['precio']}}
                                    @else
                                    {{$required['precio']}} {{$moneda->simbolo}}
                                    @endif
                                </b>
                            </span>
                        </h3>
                        <a href="#" class="btn green btn-block" style="margin-top: 20px;">Comprar</a>
                        
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>  

 </div>
</section>
@endsection

@push('script')
<script>
function tituloinser() {
         $('#titleprevio').empty()
         let producto = $('#titulo').val()
         
         $('#titleprevio').append(
             producto
         )
     }
     
     
      function descripcioninsert() {
         $('#textdescrip').empty()
         let descrip = $('#descripcion').val()
         
         $('#textdescrip').append(
             descrip
         )
     }
     
     
     function precioinser() {
         $('#normal').show();
         $('#normal').empty()
         let normal = $('#precionormal').val()
         
         $('#normal').append(
             'Precio : {{ $moneda['simbolo'] }} '+normal
         )
         
          if(normal == ''){
           $('#normal').hide();
         }
     }
     
     
     function puntosinser() {
         $('#puntosmostrar').show();
         $('#puntosmostrar').empty()
         let puntos = $('#puntos').val()
         
         $('#puntosmostrar').append(
            'Puntos: '+puntos
         )
         
         if(puntos == ''){
           $('#puntosmostrar').empty() 
         }
     }
     
     function readImage (input) {
         
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
}

  $("#imgInp").change(function () {
    // C贸digo a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
</script>

<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
 
<script>
  CKEDITOR.replace('contenido');
</script>

@endpush