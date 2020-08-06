@extends('layouts.dashboardnew')

@push('style')
<style>
    .title-producto {
        border-bottom: 2px double darkcyan !important;
    }

    .price {
        background: darkcyan;
        font-size: 18px;
    }
</style>
@endpush
@section('content')


<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                Articulos de la tienda
            </div>
        </div>
        <div class="box-body">
           @foreach ($productos as $item)
           <div class="card mb-3" style="max-width: 740px;">
              <div class="row no-gutters">
                <div class="col-md-5">
                  <img src="{{$item->img}}" class="card-img circular" alt="{{$item->post_title}}">
                </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h3 class="card-title"><strong>{{$item->post_title}}</strong></h3>
                        <h4 class="card-text"><small class="text-muted">Producto creado: <strong>{{ date('d-m-Y', strtotime($item->post_date)) }}</strong></small></h4>
                        
                        <span class="label pull price">
                                Precio: <b id="precio{{$item->ID}}">
                                    @if ($moneda->mostrar_a_d)
                                    {{$moneda->simbolo}} {{$item->meta_value}}
                                    @else
                                    {{$item->meta_value}} {{$moneda->simbolo}}
                                    @endif
                                </b>
                            </span> 
                    </div>
                 </div>
                 
                 <div class="col-md-5" style="margin-top:12px;">
                    <a href="{{route('tienda-product-edit', $item->ID)}}" class="btn btn-info btn-block">Editar</a>  
                    <a href="{{route('tienda-product-eliminar', $item->ID)}}" class="btn btn-danger btn-block cancelar" data-id="{{$item->ID}}">Eliminar</a>  
                    </div>
                </div>
            </div>
            <hr>
           @endforeach
        </div>
    </div>
</div>

@endsection

@push('script')
<script type="text/javascript">

$('.cancelar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere eliminar este producto',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'eliminarproducto/'+ID;
    }
  });
});

</script>
@endpush