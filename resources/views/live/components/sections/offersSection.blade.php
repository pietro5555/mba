@if ($resources_offer->isNotEmpty())
                                @foreach ($resources_offer as $offer)
                                    <div class="card p-2" style="background: #363840">
                                        <div class="card-content">
                                            <div class="card-body- text-center">
                                                <h4 class="card-title">{{$offer->title}}</h4>
                                                <p class="card-text">{{$offer->price}} $</p>
                                                <form action="{{route('shopping-cart.store', $offer->id)}}" method="get">
                                                    @csrf
                                                    <input type="hidden" value="oferta" name="type">
                                                    <button type="submit" class="btn btn-info">Comprar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                No Hay Ofertas
                            @endif