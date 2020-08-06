@extends('layouts.dashboardnew')

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary"/>

<!-- Open Graph data -->
<meta property="og:title" content="{{$data['titulo']}} - Producto a comprar"/>
<meta property="og:type" content="website"/>
<meta property="og:image" content="{{$data['imagen']}}"/>
<!--<meta property="og:description" content="{{$data['contenido']}} - Producto a comprar"/>-->
<meta property="og:updated_time" content="1440432930"/>

@push('style')
<style>
    
    .linea-border{
        width: 80px;
        height: 80px;
        border: 1px solid #17a2b8!important;
        margin-bottom:10px;
    }
    
    .subida{
      margin-top: 20px;
    }
    
    .labeles{
    padding: .2em .6em .3em;
    font-size: 100%;
    font-weight: 700;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
    color:red;
    }
    
    .tamano-img-bon{
        width: {{(Auth::user()) ? '330px' : '400px'}}; 
        height: {{(Auth::user()) ? '330px' : '400px'}};
    }
    
    @media only screen and (max-width: 420px) {
      .tamano-img-bon{
        width: 285px;
        height: 280px;
      }
    }
   
</style>
@endpush
@section('content')

@guest
 <div class="col-xs-12 col-md-12">
    <center>
    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="logo" style="width:150px; height:150px;" />
    </a>
    </center>
</div>   
@endif


    <div class="col-xs-12 col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                Articulo de la tienda
            </div>
        </div>
        <div class="box-body">
            
            <div class="col-md-1 col-xs-12">
                @foreach($galerias as $galeria)
                  @if($galeria['id'] == 0)
                    <img src="{{$galeria['imagen']}}" class="linea-border" alt="" onclick="readImage('{{$galeria['imagen']}}')">
                  @else
                  <img src="{{$galeria['imagen']}}" class="linea-border" alt="" onclick="readImage('{{$galeria['imagen']}}')">
                  @endif
                @endforeach
            </div>
            
            <div class="col-md-4 col-xs-12">
                <img src="{{$data['imagen']}}" alt="" id="blah" class="tamano-img-bon">
            </div>
            
            <div class="col-md-7 col-xs-12">
                <h2>{{$data['titulo']}}</h2>
                
                <h4>{!! $data['contenido'] !!}</h4>
                
                <strong> Precio del Producto: </strong>
                <span class="labeles">
                    @if ($moneda->mostrar_a_d)
                        {{$moneda->simbolo}} {{$data['precio']}}
                    @else
                        {{$data['precio']}} {{$moneda->simbolo}}
                    @endif
                </span>
                
                
                <br>
                <strong>Categoria:</strong> {{$data['categoria']}}
                
                
                @if($data['tipo_puntos'] == '1')
                <br>
                <strong>Puntos:</strong> {{$data['puntos']}}
                @endif
                
                
                @if($data['tipo_iva'] == '1')
                <br>
                <strong>Iva:</strong>
                @if ($moneda->mostrar_a_d)
                        {{$moneda->simbolo}} {{$data['iva']}}
                @else
                        {{$data['iva']}} {{$moneda->simbolo}}
                @endif
                @endif
                <br>
                
                <div class="col-xs-12 col-sm-6">
                <a href="{{$data['link']}}" target="_blank" class="btn btn-primary btn-block subida">ver en tienda <i class="fas fa-external-link-alt"></i></a>
                </div>
                
                @if(!empty(request()->referred_id))
                <div class="col-xs-12 col-sm-6">
                <a href="{{route('setting-guardar', ['id' => $data['ID'], 'precio' => $data['precio'], 'sesion' => ($user == 0) ? '0' : '1', 'referido' => request()->referred_id])}}" class="btn btn-info btn-block subida">Comprar</a>
                </div>
                @else
                <div class="col-xs-12 col-sm-6">
                <a href="{{route('setting-guardar', ['id' => $data['ID'], 'precio' => $data['precio'], 'sesion' => ($user == 0) ? '0' : '1', 'referido' => 0])}}" class="btn btn-info btn-block subida">Comprar</a>
                </div>
                @endif
                
                @if($user != 0)
                <div class="col-xs-12 col-sm-6">
                <a href="{{request()->root()}}/link/linktienda?user={{$user}}" class="btn btn-danger btn-block subida">Ir a tienda</a>
                </div>
                @endif
            </div>
           
          
            
        </div>
    </div>
</div>    

@endsection

@push('script')

<script type="text/javascript">

 function readImage (imagen) {
     
          $('#blah').attr('src', imagen); // Renderizamos la imagen
      
 }
 
</script>
@endpush