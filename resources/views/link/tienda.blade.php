@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
    .title-producto {
        border-bottom: 2px double darkcyan !important;
    }

    .price {
        background: darkcyan;
    }
</style>
@endpush


<div class="col-xs-12 {{(Auth::user()) ? 'col-md-12' : 'col-md-10 col-md-offset-1'}}">
    
    @guest
    <center>
    <a class="logo" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/logo-light.png') }}" alt="logo" style="width:200px; height:200px;" />
    </a>
    </center>
    @endif
    
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Buscar Producto
                </h3>
            </div>
            <div class="box-body">
                <form action="{{route('link.tienda-buscar')}}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nombre del Producto</label>
                        <input type="text" name="nombre" class="form-control" required>
                        
                        <input type="hidden" name="user" value="{{$user}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="col-xs-12 {{(Auth::user()) ? 'col-md-12' : 'col-md-10 col-md-offset-1'}}">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                Articulos de la tienda
            </div>
        </div>
        <div class="box-body">
            @foreach ($result as $item)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{$item->img}}" alt="{{$item->post_title}}" class="circular">
                    <div class="caption">
                        <h3 id="title{{$item->ID}}" class="title-producto">{{$item->post_title}}</h3>
                        <!--<p class="text-justify">{{$item->post_content}}</p>-->
                        <h3>
                            <a href="{{$item->guid}}" target="_blank" class="btn btn-primary">Ver en tienda <i
                                    class="fas fa-external-link-alt"></i></a>
                            <span class="label pull-right price">
                                Precio: <b id="precio{{$item->ID}}">
                                    @if ($moneda->mostrar_a_d)
                                    {{$moneda->simbolo}} {{$item->meta_value}}
                                    @else
                                    {{$item->meta_value}} {{$moneda->simbolo}}
                                    @endif
                                </b>
                            </span>
                        </h3>
                        
                        <a href="{{route('link.tienda').'?referred_id='.$user.'&amp;producto_id='.$item->ID.'&amp;user='.$user}}" class="btn green btn-block">Ver Producto</a>
                       
                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </div>
</div>    
@endsection