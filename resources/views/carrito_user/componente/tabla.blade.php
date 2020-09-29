<h4 class="text-white text-right mb-5"><strong><i class="fa fa-shopping-cart"></i> Carrito</strong></h4>

@foreach ($items as $item)
<div class="media mb-2">
    <img src="{{$item->curso['img']}}" class="align-self-start mr-3" alt="curso" style="max-height: 200px; max-width: 150px;">
    <div class="media-body">
      <h5 class="mt-0 text-white"><strong>{{$item->curso['titulo']}}</strong></h5>
      <br>
      <h4 class="float-righ text-right text-white">
          <small>Costo</small> <strong>{{$item->curso['precio']}} USD</strong>
      </h4>
      <a class="btn btn-danger" href="{{route('shopping-cart.delete', [$item->id])}}">
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>
@endforeach
<hr style="border: 1px solid #ffffff;opacity: 1;" />
<h4 class="text-white mb-5">
    TOTAL
    <strong class="float-right color-green">{{$totalItems}} USD</strong>
</h4>