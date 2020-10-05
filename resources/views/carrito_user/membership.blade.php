@extends('layouts.landing')

@section('content')
<style>
    .color-green{
        color: #6ab742;
    }

    .btn-color-green{
        background: #6ab742;
    }

    .bg-grey-alt{
        background: #313335;
    }
</style>
<div class="title-page-one_course col-md border-bottom-2">
    <h6>Membresias</h6>
    <hr style="border: 1px solid #707070;opacity: 1;" />
</div>
<div class="col-12 mb-2">
    <div class="row justify-content-center">
        @foreach ($membresias as $membresia)
        <div class="col-12 col-md-6 col-lg-4 mt-2">
            <div class="card h-100 bg-grey-alt">
                <div class="card-body text-center">
                  <h5 class="card-title text-white">
                      <strong>{{$membresia->name}}</strong>
                  </h5>
                  <p class="card-text text-white">{{$membresia->descripcion}}</p>
                  <h4 class="card-text color-green">
                      <strong>{{$membresia->price}} USD</strong>
                  </h4>
                  @auth
                    @if (!empty(Auth::user()->membership_id))
                        @if ((Auth::user()->membership_id +1) >= $membresia->id)
                            @if (Auth::user()->membership_id == $membresia->id)
                                <button class="btn btn-color-green text-white" disabled>Activa</button>    
                            @else
                                <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white">Seleccionar Membresia</a>
                            @endif
                        @else
                            <button class="btn btn-color-green text-white" disabled>Seleccionar Membresia</button>
                        @endif
                    @else
                        @if ($membresia->id == 1)
                            <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white">Seleccionar Membresia</a>
                        @else
                            <button class="btn btn-color-green text-white" disabled>Seleccionar Membresia</button>
                        @endif    
                    @endif
                  @else    
                        @if ($membresia->id == 1)
                            <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white">Seleccionar Membresia</a>
                        @else
                        <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white">Seleccionar Membresia</a>
                        @endif
                  @endauth
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
