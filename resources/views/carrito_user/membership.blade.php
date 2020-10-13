@extends('layouts.landing')

@section('content')
<style>
    .color-green {
        color: #6ab742;
    }

    .btn-color-green {
        background: #6ab742;
    }

    .bg-grey-alt {
        background: #313335;
    }

</style>
<div class="title-page-one_course col-md border-bottom-2">
    <h6>Membresias</h6>
    <hr style="border: 1px solid #707070;opacity: 1;" />
</div>
<div class="col-12 mb-2">
    <div class="row justify-content-center">
        @auth
        @php
            $idmembresia = 0;
            $price_low = 1000000000000000;
            foreach ($membresias as $membresia) {
                if ($membresia->id > Auth::user()->membership_id){
                    if($price_low >= $membresia->price){
                        $price_low = $membresia->price;
                    }
                }
            }
        @endphp
        @endauth
        @foreach ($membresias as $membresia)
        @auth
        @if (!empty(Auth::user()->membership_id))
            @if ($membresia->id > Auth::user()->membership_id)
                <div class="col-12 col-md-6 col-lg-4 mt-2">
                    <div class="card h-100 bg-grey-alt">
                        <img src="{{asset('assets/'.$membresia->image)}}" class="card-top-img m-auto pt-2" height="120" width="120" alt="">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">
                                <strong>{{$membresia->name}}</strong>
                            </h5>
                            <p class="card-text text-white">{{$membresia->descripcion}}</p>
                            <h4 class="card-text color-green">
                                <strong>{{$membresia->price}} USD</strong>
                            </h4>
                            @if ($membresia->price == $price_low)
                                <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white">Seleccionar Membresia</a>
                            @else
                                <button class="btn btn-color-green text-white" disabled>Seleccionar Membresia</button>
                            @endif    
                        </div>
                    </div>
                </div>   
            @endif
        @else
            <div class="col-12 col-md-6 col-lg-4 mt-2">
                <div class="card h-100 bg-grey-alt">
                    <img src="{{asset('assets/'.$membresia->image)}}" class="card-top-img m-auto pt-2" height="120" width="120" alt="">
                    <div class="card-body text-center">
                        <h5 class="card-title text-white">
                            <strong>{{$membresia->name}}</strong>
                        </h5>
                        <p class="card-text text-white">{{$membresia->descripcion}}</p>
                        <h4 class="card-text color-green">
                            <strong>{{$membresia->price}} USD</strong>
                        </h4>
                        @if ($membresia->price == $price_low)
                            <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white">Seleccionar Membresia</a>
                        @else
                            <button class="btn btn-color-green text-white" disabled>Seleccionar Membresia</button>
                        @endif    
                    </div>
                </div>
            </div>    
        @endif
        @else
        <div class="col-12 col-md-6 col-lg-4 mt-2">
            <div class="card h-100 bg-grey-alt">
                <img src="{{asset('assets/'.$membresia->image)}}" class="card-top-img m-auto pt-2" height="120" width="120" alt="">
                <div class="card-body text-center">
                    <h5 class="card-title text-white">
                        <strong>{{$membresia->name}}</strong>
                    </h5>
                    <p class="card-text text-white">{{$membresia->descripcion}}</p>
                    <h4 class="card-text color-green">
                        <strong>{{$membresia->price}} USD</strong>
                    </h4>

                    <a href="{{route('shopping-cart.store', $membresia->id)}}"
                        class="btn btn-color-green text-white">Seleccionar Membresia</a>
                </div>
            </div>
        </div>
        @endauth
        @endforeach
    </div>
</div>

@endsection
