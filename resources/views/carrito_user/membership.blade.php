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
@if (!Auth::guest())
<div class="title-page-course col-md"><span class="text-white">
    <h3 class="mb-2"><span class="text-white">Hola</span><span class="text-primary"> {{Auth::user()->display_name}}</span><span class="text-white"> ¡Nos alegra verte hoy!</span></h3>
</div>
@endif
<div class="col-12 mb-2">
<div class="row justify-content-center">
<section class="pricing">
        <div class="container mb-5">
          <div class="row justify-content-center">

            <!--AUTH-->
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
            @switch($membresia->id)
                @case(1)
                    <!-- Free Tier -->
                    <h1 class="text-white">HOLA 1</h1>
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-azul-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>

                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-azul-claro text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-azul-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¿Tienes interés por saber acerca de las finanzas tecnológicas?</h5><br>
                                    <h5 class="p-2 text-white text-center"><strong>¡Este paquete es para ti!</strong></h5><br>
                                    <h5 class="p-2 text-white text-center">Con esta membresía podrás acceder al contenido de este nivel:</h5>
                                    <h5 class="p-2 text-white text-center">+ de 15 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-azul-claro text-center">+ 5 Live Streaming <br> Al Mes</h4><br><br>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif
                            </div>
                            </div>
                    </div>
                @break
                @case(2)
                     <!-- Plus Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-orange-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-orange text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-orange text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> Nos alegra que tu primera impresión haya sido tan buena para crecer en tu formación</h5><br><br>
                                    <h5 class="p-2 text-white text-center">En este paquete encontrarás:</h5>
                                    <h5 class="p-2 text-white text-center">Todo el contenido de este nivel y del anterior</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 25 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-orange text-center">+ 10 Live Streaming <br> Al Mes</h4><br>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif
                            </div>
                            </div>
                        </div>
                    @break
                @case(3)
                        <!-- Pro Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-verde-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center" >{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-verde-claro text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-verde-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¡Bravo!</h5><br>
                                    <h5 class="p-2 text-white text-center">Si estás aquí es porque quieres hacer carrera con nosotros</h5>
                                    <h5 class="p-2 text-white text-center">Obtendrás en esta categoría:</h5><br>
                                    <h5 class="p-2 text-white text-center">Todo el contenido de este nivel y los 2 anteriores</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 35 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-verde-claro text-center">+ 15 Live Streaming <br> Al Mes</h4>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif
                            </div>
                            </div>
                    </div>
                @break
                @case(4)
                <div class="col-lg-4 mt-4 mb-5" style="margin:10px;">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header-purple-price" style="position: absolute;"><h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1></div>
                          <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                <div class="row" style="padding:20px;">
                                        <p class="card-price text-purple text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                        <h4 class="card-price text-purple text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                        <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                </div>
                                  <h5 class="p-2 text-white text-center"> ¡WOW!</h5><br>
                                  <h5 class="p-2 text-white text-center">Siéntete orgulloso de ti si creces a este nivel en tu formación, lo mejor está por venir</h5>
                                  <h5 class="p-2 text-white text-center">Accederás:</h5><br>
                                  <h5 class="p-2 text-white text-center">A todo el contenido de este nivel y los 3 anteriores</h5><br>
                                  <h5 class="p-2 text-white text-center">+ de 45 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                  <h4 class="p-2 text-purple text-center">+ 20 Live Streaming <br> Al Mes</h4><br>
                                  @if ($membresia->price == $price_low)
                                  <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                  @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                  @endif
                          </div>
                        </div>
                </div>
                    @break
                @case(5)
                    <div class="col-lg-4 mt-4 mb-5" style="margin:10px;">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-rosado-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-rosado text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-rosado text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¡Felicidades!</h5><br>
                                    <h5 class="p-2 text-white text-center">¡Estas a punto de convertirte en un PRO de las finanzas digitales!</h5>
                                    <h5 class="p-2 text-white text-center">Todo el contenido para los 5 niveles de desarrollo</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 55 videos con increíbles especialistas en los diversos temas Fintech</h5><br><br><br><br>
                                    <h4 class="p-2 text-rosado text-center">+ 25 Live Streaming <br> Al Mes</h4><br>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                        <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif

                            </div>
                            </div>
                    </div>
                @break
                @case(6)
                <div class="section-membresia-avanzada col-lg-12 mt-4 py-5">
                    <div class="mb-2 text-center">
                            <h1 class="card-price text-azul-claro text-center">${{$membresia->price}}<span class="period">/pase anual</span></h1>
                    </div>
                    <div class="mb-2 text-center text-white">
                        <h5>Con acceso a todo el contenido de fintech y empredurismo <br> en todos los niveles</h5>
                        <div class="text-azul-claro" >
                            <h1 class="text-center">. . . . . . . . . . . . . </h1>

                        </div>
                        <h5>Más contenido de bonus gratis y entrenamientos en vivo</h5><br>
                        <h5>En total durante toda su experiencia de aprendizaje con todos los niveles <strong class="text-azul-claro">recibirás más de 100 <br> videos</strong> de diferentes temas para tu formación y desarrollo</h5>
                        <a href="{{route('shopping-cart.store', $membresia->id)}}"class="mt-4 btn btn-azul-claro text-white">¿Qué esperas? Suscribete ya!</a>
                    </div>

                </div>
                @break
            @endswitch
            @endif
        @else
            @switch($membresia->id)
                @case(1)
                    <!-- Free Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-azul-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-azul-claro text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-azul-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¿Tienes interés por saber acerca de las finanzas tecnológicas?</h5><br>
                                    <h5 class="p-2 text-white text-center"><strong>¡Este paquete es para ti!</strong></h5><br>
                                    <h5 class="p-2 text-white text-center">Con esta membresía podrás acceder al contenido de este nivel:</h5>
                                    <h5 class="p-2 text-white text-center">+ de 15 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-azul-claro text-center">+ 5 Live Streaming <br> Al Mes</h4><br><br>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif
                            </div>
                            </div>
                    </div>
                @break
                @case(2)
                     <!-- Plus Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                    <div class="card-header-orange-price" style="position: absolute;">
                                            <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                    </div>
                                <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                        <div class="row" style="padding:20px;">
                                                <p class="card-price text-orange text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                                <h4 class="card-price text-orange text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                                <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                        </div>
                                        <h5 class="p-2 text-white text-center"> Nos alegra que tu primera impresión haya sido tan buena para crecer en tu formación</h5><br><br>
                                        <h5 class="p-2 text-white text-center">En este paquete encontrarás:</h5>
                                        <h5 class="p-2 text-white text-center">Todo el contenido de este nivel y del anterior</h5><br>
                                        <h5 class="p-2 text-white text-center">+ de 25 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                        <h4 class="p-2 text-orange text-center">+ 10 Live Streaming <br> Al Mes</h4><br>
                                        @if ($membresia->price == $price_low)
                                        <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                        @else
                                            <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                        @endif
                                </div>
                            </div>
                    </div>
                    @break
                @case(3)
                        <!-- Pro Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-verde-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center" >{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-verde-claro text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-verde-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¡Bravo!</h5><br>
                                    <h5 class="p-2 text-white text-center">Si estás aquí es porque quieres hacer carrera con nosotros</h5>
                                    <h5 class="p-2 text-white text-center">Obtendrás en esta categoría:</h5><br>
                                    <h5 class="p-2 text-white text-center">Todo el contenido de este nivel y los 2 anteriores</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 35 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-verde-claro text-center">+ 15 Live Streaming <br> Al Mes</h4>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                        <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif
                            </div>
                            </div>
                    </div>
                @break
                @case(4)
                <div class="col-lg-4 mt-4 mb-5" style="margin:10px;">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header-purple-price" style="position: absolute;"><h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1></div>
                          <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                <div class="row" style="padding:20px;">
                                        <p class="card-price text-purple text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                        <h4 class="card-price text-purple text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                        <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                </div>
                                  <h5 class="p-2 text-white text-center"> ¡WOW!</h5><br>
                                  <h5 class="p-2 text-white text-center">Siéntete orgulloso de ti si creces a este nivel en tu formación, lo mejor está por venir</h5>
                                  <h5 class="p-2 text-white text-center">Accederás:</h5><br>
                                  <h5 class="p-2 text-white text-center">A todo el contenido de este nivel y los 3 anteriores</h5><br>
                                  <h5 class="p-2 text-white text-center">+ de 45 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                  <h4 class="p-2 text-purple text-center">+ 20 Live Streaming <br> Al Mes</h4><br>
                                  @if ($membresia->price == $price_low)
                                  <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                  @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                  @endif
                          </div>
                        </div>
                </div>
                    @break
                @case(5)
                    <div class="col-lg-4 mt-4 mb-5" style="margin:10px;">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-rosado-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-rosado text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-rosado text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¡Felicidades!</h5><br>
                                    <h5 class="p-2 text-white text-center">¡Estas a punto de convertirte en un PRO de las finanzas digitales!</h5>
                                    <h5 class="p-2 text-white text-center">Todo el contenido para los 5 niveles de desarrollo</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 55 videos con increíbles especialistas en los diversos temas Fintech</h5><br><br><br><br>
                                    <h4 class="p-2 text-rosado text-center">+ 25 Live Streaming <br> Al Mes</h4><br>
                                    @if ($membresia->price == $price_low)
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}" class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                                    @else
                                    <button class="btn btn-color-green text-white btn-block" disabled>Seleccionar Membresia</button>
                                    @endif

                            </div>
                            </div>
                    </div>
                @break
                @case(6)
                <div class="section-membresia-avanzada col-lg-12 mt-4 py-5">
                    <div class="mb-2 text-center">
                            <h1 class="card-price text-azul-claro text-center">${{$membresia->price}}<span class="period">/pase anual</span></h1>
                    </div>
                    <div class="mb-2 text-center text-white">
                        <h5>Con acceso a todo el contenido de fintech y empredurismo <br> en todos los niveles</h5>
                        <div class="text-azul-claro" >
                            <h1 class="text-center">. . . . . . . . . . . . . </h1>

                        </div>
                        <h5>Más contenido de bonus gratis y entrenamientos en vivo</h5><br>
                        <h5>En total durante toda su experiencia de aprendizaje con todos los niveles <strong class="text-azul-claro">recibirás más de 100 <br> videos</strong> de diferentes temas para tu formación y desarrollo</h5>
                        <a href="{{route('shopping-cart.store', $membresia->id)}}"class="mt-4 btn btn-azul-claro text-white">¿Qué esperas? Suscribete ya!</a>
                    </div>

                </div>
                @break
            @endswitch

        @endif
        @else
        @switch($membresia->id)
                @case(1)
                    <!-- Free Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-azul-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-azul-claro text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-azul-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¿Tienes interés por saber acerca de las finanzas tecnológicas?</h5><br>
                                    <h5 class="p-2 text-white text-center"><strong>¡Este paquete es para ti!</strong></h5><br>
                                    <h5 class="p-2 text-white text-center">Con esta membresía podrás acceder al contenido de este nivel:</h5>
                                    <h5 class="p-2 text-white text-center">+ de 15 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-azul-claro text-center">+ 5 Live Streaming <br> Al Mes</h4><br><br>
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}"class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                            </div>
                            </div>
                    </div>
                @break
                @case(2)
                     <!-- Plus Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-orange-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-orange text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-orange text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> Nos alegra que tu primera impresión haya sido tan buena para crecer en tu formación</h5><br><br>
                                    <h5 class="p-2 text-white text-center">En este paquete encontrarás:</h5>
                                    <h5 class="p-2 text-white text-center">Todo el contenido de este nivel y del anterior</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 25 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-orange text-center">+ 10 Live Streaming <br> Al Mes</h4><br>
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}"class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                            </div>
                            </div>
                        </div>
                    @break
                @case(3)
                        <!-- Pro Tier -->
                    <div class="col-lg-4 mt-4 mb-5">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-verde-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center" >{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                    <div class="row" style="padding:20px;">
                                            <p class="card-price text-verde-claro text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                            <h4 class="card-price text-verde-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                            <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                    </div>
                                    <h5 class="p-2 text-white text-center"> ¡Bravo!</h5><br>
                                    <h5 class="p-2 text-white text-center">Si estás aquí es porque quieres hacer carrera con nosotros</h5>
                                    <h5 class="p-2 text-white text-center">Obtendrás en esta categoría:</h5><br>
                                    <h5 class="p-2 text-white text-center">Todo el contenido de este nivel y los 2 anteriores</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 35 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                    <h4 class="p-2 text-verde-claro text-center">+ 15 Live Streaming <br> Al Mes</h4>
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}"class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                            </div>
                            </div>
                    </div>
                @break
                @case(4)
                <div class="col-lg-4 mt-4 mb-5" style="margin:10px;">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-header-purple-price" style="position: absolute;"><h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1></div>
                          <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                <div class="row" style="padding:20px;">
                                        <p class="card-price text-purple text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                        <h4 class="card-price text-purple text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                        <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                </div>
                                  <h5 class="p-2 text-white text-center"> ¡WOW!</h5><br>
                                  <h5 class="p-2 text-white text-center">Siéntete orgulloso de ti si creces a este nivel en tu formación, lo mejor está por venir</h5>
                                  <h5 class="p-2 text-white text-center">Accederás:</h5><br>
                                  <h5 class="p-2 text-white text-center">A todo el contenido de este nivel y los 3 anteriores</h5><br>
                                  <h5 class="p-2 text-white text-center">+ de 45 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                  <h4 class="p-2 text-purple text-center">+ 20 Live Streaming <br> Al Mes</h4><br>
                                  <a href="{{route('shopping-cart.store', $membresia->id)}}"class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                          </div>
                        </div>
                </div>
                    @break
                @case(5)
                    <div class="col-lg-4 mt-4 mb-5" style="margin:10px;">
                            <div class="card mb-5 mb-lg-0">
                                <div class="card-header-rosado-price" style="position: absolute;">
                                    <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                </div>
                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                <div class="row" style="padding:20px;">
                                        <p class="card-price text-rosado text-center" style="font-size:28px;"> <strike>${{$membresia->price}}<span class="period">/Mes &nbsp&nbsp</span> </strike> </p>
                                        <h4 class="card-price text-rosado text-center"> ${{$membresia->descuento}}<span class="period">/Mes</span></h4>
                                        <h1 class="text-center text-white">. . . . . . . . . . . . . </h1><br><br>
                                </div>
                                    <h5 class="p-2 text-white text-center"> ¡Felicidades!</h5><br>
                                    <h5 class="p-2 text-white text-center">¡Estas a punto de convertirte en un PRO de las finanzas digitales!</h5>
                                    <h5 class="p-2 text-white text-center">Todo el contenido para los 5 niveles de desarrollo</h5><br>
                                    <h5 class="p-2 text-white text-center">+ de 55 videos con increíbles especialistas en los diversos temas Fintech</h5><br><br><br><br>
                                    <h4 class="p-2 text-rosado text-center">+ 25 Live Streaming <br> Al Mes</h4><br>
                                    <a href="{{route('shopping-cart.store', $membresia->id)}}"class="btn btn-color-green text-white btn-block">Seleccionar Membresia</a>
                            </div>
                            </div>
                    </div>
                @break
                @case(6)
                    <div class="section-membresia-avanzada col-lg-12 mt-4 py-5">
                        <div class="mb-2 text-center">
                                <h1 class="card-price text-azul-claro text-center">${{$membresia->price}}<span class="period">/pase anual</span></h1>
                        </div>
                        <div class="mb-2 text-center text-white">
                            <h5>Con acceso a todo el contenido de fintech y empredurismo <br> en todos los niveles</h5>
                            <div class="text-azul-claro" >
                                <h1 class="text-center">. . . . . . . . . . . . . </h1>

                            </div>
                            <h5>Más contenido de bonus gratis y entrenamientos en vivo</h5><br>
                            <h5>En total durante toda su experiencia de aprendizaje con todos los niveles <strong class="text-azul-claro">recibirás más de 100 <br> videos</strong> de diferentes temas para tu formación y desarrollo</h5>
                            <a href="{{route('shopping-cart.store', $membresia->id)}}"class="mt-4 btn btn-azul-claro text-white">¿Qué esperas? Suscribete ya!</a>
                        </div>

                    </div>
                @break
            @endswitch

        @endauth
        @endforeach
          </div>
        </div>
      </section>

    </div>

</div>

@endsection
