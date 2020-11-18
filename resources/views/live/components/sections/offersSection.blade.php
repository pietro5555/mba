@if ($resources_offer->isNotEmpty())
    @foreach ($resources_offer as $offer)
        <div class="row">
            <div class="col-4 col-md-4">
                <img src="{{ asset('upload/events/'.$offer->url_resource) }}" width="150" height="150">
            </div>
            <div class="col-8 col-md-8 text-white text-center pt-2">
                <h4 class="card-title">{{ $offer->title }}</h4>
                <p class="card-text">USD ${{ $offer->price }}</p>
                <form action="{{route('shopping-cart.store', $offer->id)}}" method="get">
                    @csrf
                    <input type="hidden" value="oferta" name="type">
                    <button type="submit" class="btn btn-info">Comprar</button>
                </form>
            </div>
        </div>
        <hr>
    @endforeach
@else
    No Hay Ofertas
@endif