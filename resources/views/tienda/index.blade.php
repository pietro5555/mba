@extends('layouts.dashboardnew')

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
@section('content')

 @if($settings->btc == 1)
<div class="col-md-12">
   <div class="alert alert-info" role="alert">
    <h4><strong>Nota:</strong> Una vez realizado su proceso de pago tiene 60 min para realizar el pago y entrara en un periodo de validación que tiene una duración de 30 min hasta 48 horas para que el pago sea exitoso. Si su pago es rechazado o cancelado deberá esperar 60 min para realizar un nuevo pago.</h4>
    </div>
 </div> 
 @endif

<div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Buscar Producto
                </h3>
            </div>
            <div class="box-body">
                <form action="{{route('tienda-filtro')}}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nombre del Producto</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                
    
        
        

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                Articulos de la tienda
            </div>
        </div>
        <div class="box-body">
            
        @if($settings->btc == 0)    
        <a class="btn btn-primary btn-block" onclick="copyToStore('store')" style="margin-bottom:10px;">Copiar Link de la tienda</a>
                        
        <small id="store" class="info-box-number" style="display:none;">{{route('link.tienda-completa').'?user='.Auth::user()->ID}}
        </small>
        @endif
            
            @foreach ($productos as $item)
             
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
                        
                        @if($settings->btc == 0)
                        <a href='link/link?producto_id={{$item->ID}}' class="btn green btn-block">Ver Producto</a>
                        
                          <a class="btn btn-info btn-block" onclick="copyToClipboard({{$item->ID}})" style="margin-bottom:5px;">Copiar Link del Producto</a>
                         <small id="{{$item->ID}}" class="info-box-number" style="display:none;">
                         {{route('link.tienda').'?referred_id='.Auth::user()->ID.'&amp;producto_id='.$item->ID}}
                         </small>
                         
                         @else
                         
                <a onclick="seleccionar('{{$item->ID}}','{{$item->post_title}}','{{$item->meta_value}}')" class="btn btn-info btn-block">Comprar {{env('CRYPTO')}}</a>
                        
                <a onclick="seleccionarTB('{{$item->ID}}','{{$item->post_title}}','{{$item->meta_value}}')" class="btn btn-primary btn-block">Comprar TB</a>  
                 
                         @endif
                       
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="modal fade" id="comprar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comprar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('tienda-save-compra')}}" method="post">
          {{ csrf_field() }} 

           <input type="hidden" class="form-control" name="idproducto" id="id">
            
            
            <input type="hidden" class="form-control" name="tipo" value="0">
            
            <input type="hidden" class="form-control" name="precio" id="precio" readonly >
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nombre del Producto</label>
            <input type="text" class="form-control" name="name" id="titulo" readonly >
            </div>
              </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Precio del Producto</label>
            <input type="text" class="form-control" name="pre" id="pre" readonly >
            </div>
               </div>
              

               <div class="col-md-12">
                <div class="form-group">
                    <label>Valor en BTC</label>
            <input type="number" class="form-control" name="btc" id="btc" readonly>
            </div>
              </div>

               
               
               <button type="submit" class="btn btn-info btn-block">Comprar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 


{{-- TB --}}
<div class="modal fade" id="comprarTB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comprar Producto Transferencia Bancaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('tienda-save-compra')}}" method="post">
          {{ csrf_field() }} 

      <input type="hidden" class="form-control" name="idproducto" id="idtb">
      
            
            <input type="hidden" class="form-control" name="precio" id="preciotb">
            
            <input type="hidden" class="form-control" name="tipo" value="1">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nombre del Producto</label>
            <input type="text" class="form-control" name="name" id="titulotb" readonly >
            </div>
              </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Precio del Producto</label>
            <input type="text" class="form-control" name="pre" id="pretb" readonly >
            </div>
               </div>

               
               <button type="submit" class="btn btn-primary btn-block">Comprar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 


@endsection

@push('script')

<script type="text/javascript">
  function copyToClipboard(element) {
    var aux = document.createElement("input");
    let link = document.getElementById(element).innerHTML.replace('&amp;', '&')
    aux.setAttribute("value", link);
    document.body.appendChild(aux);
    aux.select();
    
    document.execCommand("copy");
    document.body.removeChild(aux);
    swal.fire({
      type:'success',
      title:'Link copiado con exito'
    })
  }
  
  
  function copyToStore(element) {
    var aux = document.createElement("input");
    let link = document.getElementById(element).innerHTML.replace('&amp;', '&')
    aux.setAttribute("value", link);
    document.body.appendChild(aux);
    aux.select();
    
    document.execCommand("copy");
    document.body.removeChild(aux);
    swal.fire({
      type:'success',
      title:'Link copiado con exito'
    })
  }
  
  
      seleccionar = function(id,titulo,precio){
      
        $('#id').val(id); 
        $('#titulo').val(titulo);
        $('#pre').val(precio+'$');
        $('#precio').val(precio);
        var total = precio * {{$valorbtc}}
        $('#btc').val(total.toFixed(8));
        
        $('#comprar').modal();
           
       } 
       
       
       seleccionarTB = function(id,titulo,precio){
           
        $('#idtb').val(id); 
        $('#titulotb').val(titulo);
        $('#pretb').val(precio +'$');
        $('#preciotb').val(precio);
        
        $('#comprarTB').modal();
       }     
</script>
@endpush