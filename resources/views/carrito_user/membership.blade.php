@extends('layouts.landing')

@push('styles')
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
@endpush

@section('content')
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
                        @foreach ($membresias as $membresia)
                            @switch($membresia->id)
                                @case(1)
                                    <!-- Free Tier -->
                                    <div class="col-lg-4 mt-4 mb-5 offset-md-1">
                                        <div class="card mb-5 mb-lg-0">
                                            <div class="card-header-azul-price" style="position: absolute;">
                                                <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                            </div>
                                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                                <div class="row" style="padding:20px;">
                                                    @if (Auth::guest())
                                                        <h4 class="card-price text-azul-claro text-center"> ${{$membresia->price}}<span class="period">/Mensual</span> ${{$membresia->price_annual}}<span class="period">/Anual</span></h4>
                                                    @else
                                                        <h4 class="card-price text-azul-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mensual</span> ${{$membresia->discount_annual}}<span class="period">/Anual</span></h4>
                                                    @endif
                                                    <h1 class="text-center text-white">. . . . . . . . . . . . . .</h1><br><br>
                                                </div>
                                                <h5 class="p-2 text-white text-center">¡Podrás dar el primer paso a SER lo que deseas SER aquí!</h5><br>
                                                <h5 class="p-2 text-white text-center"><strong class="text-azul-claro">En este primer nivel podrás acceder a:</strong></h5><br>
                                                <h5 class="p-2 text-white text-center">+ de 100 videos con increíbles especialistas en los diversos temas de Desarrollo Humano (Liderazgo, Comunicación, Inteligencia Emocional, Coaching, Salud y equilibrio, etc.) + Contenido especial de Finanzas.</h5>
                                                <h5 class="p-2 text-white text-center">+ de 15 videos con increíbles especialistas en los diversos temas Fintech</h5><br>
                                                <h4 class="p-2 text-azul-claro text-center">+ 4 LIVE STREAMING <br> AL MES</h4>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Mensual'])}}" class="btn btn-color-green text-white btn-block">Comprar Plan Mensual</a>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Anual'])}}" class="btn btn-primary text-white btn-block">Comprar Plan Anual</a>
                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h5 class="p-2 text-white text-center" style="font-size: 12px!important;">SI ADQUIERES TU MEMBRESIA EN FORMATO ANUAL TENDRÁS ACCESO A LOS  <b class="text-purple">4 STREAMING + CONTENIDO VIP
                                                    +</b> <b class="text-danger"> 2 GRATIS </b> DE NUESTRO PARTNER <b class="text-danger">FTX LIVE </b></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @break

                                @case(2)
                                    <div class="col-lg-4 mt-4 mb-5">
                                        <div class="card mb-5 mb-lg-0">
                                            <div class="card-header-orange-price" style="position: absolute;">
                                                <h1 class="card-title text-white text-uppercase text-center">{{$membresia->name}}</h1>
                                            </div>
                                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                                <div class="row" style="padding:20px;">
                                                    @if (Auth::guest())
                                                        <h4 class="card-price text-orange text-center"> ${{$membresia->price}}<span class="period">/Mensual</span> ${{$membresia->price_annual}}<span class="period">/Anual</span></h4>
                                                    @else
                                                        <h4 class="card-price text-orange text-center"> ${{$membresia->descuento}}<span class="period">/Mensual</span> ${{$membresia->discount_annual}}<span class="period">/Anual</span></h4>
                                                    @endif<h1 class="text-center text-white">. . . . . . . . . . . . . .</h1><br><br>
                                                </div>
                                                <h5 class="p-2 text-white text-center"> ¡Nos alegra que estés pasando al segundo escalón!</h5><br><br>
                                                <h5 class="p-2 text-orange text-center">Aquí encontrarás todo lo que necesitas saber para HACER y lograr.</h5><br>
                                                <h5 class="p-2 text-white text-center">Disfrutarás de todo el contenido de este nivel y del anterior</h5><br>
                                                <h5 class="p-2 text-white text-center">+ de 150 videos con increíbles especialistas en los diversos temas de Ventas, Emprendurismo, Desarrollo Humano y Finanzas</h5><br>
                                                <h4 class="p-2 text-orange text-center">+ 6 STREAMING <br> AL MES</h4><br>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Mensual'])}}" class="btn btn-color-green text-white btn-block">Comprar Plan Mensual</a>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Anual'])}}" class="btn btn-primary text-white btn-block">Comprar Plan Anual</a>
                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h5 class="p-2 text-white text-center" style="font-size: 12px!important;">SI ADQUIERES TU MEMBRESIA EN FORMATO ANUAL TENDRÁS ACCESO A LOS  <b class="text-purple">6 STREAMING + CONTENIDO VIP
                                                    +</b> <b class="text-danger"> 4 GRATIS </b> DE NUESTRO PARTNER <b class="text-danger">FTX LIVE </b></h5>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                @break

                                @case(3)
                                    <div class="col-lg-4 mt-4 mb-5 offset-md-1">
                                        <div class="card mb-5 mb-lg-0">
                                            <div class="card-header-verde-price" style="position: absolute;">
                                                <h1 class="card-title text-white text-uppercase text-center" >{{$membresia->name}}</h1>
                                            </div>
                                            <div class="card-body" style="position: relative; top:55px; z-index: 1;">
                                                <div class="row" style="padding:20px;">
                                                    @if (Auth::guest())
                                                        <h4 class="card-price text-verde-claro text-center"> ${{$membresia->price}}<span class="period">/Mensual</span> ${{$membresia->price_annual}}<span class="period">/Anual</span></h4>
                                                    @else
                                                        <h4 class="card-price text-verde-claro text-center"> ${{$membresia->descuento}}<span class="period">/Mensual</span> ${{$membresia->discount_annual}}<span class="period">/Anual</span></h4>
                                                    @endif
                                                    <h1 class="text-center text-white">. . . . . . . . . . . . . .</h1><br><br>
                                                </div>
                                                <h5 class="p-2 text-white text-center"> ¡WOW! Siéntete orgullos de ti si creces a este nivel en tu formación, lo mejor está por venir.</h5><br>
                                                <h5 class="p-2 text-verde-claro text-center">Accederás:</h5>
                                                <h5 class="p-2 text-white text-center">A todo el contenido de este nivel y los 2 anteriores</h5><br>
                                                <h5 class="p-2 text-white text-center">+ de 200 videos con increíbles especialistas en los diversos temas de Fintech, Real Estate + Ventas, Emprendurismo, Desarrollo Humano y Finanzas</h5><br>
                                                <h4 class="p-2 text-verde-claro text-center">+ 8 STREAMING <br> AL MES</h4>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Mensual'])}}" class="btn btn-color-green text-white btn-block">Comprar Plan Mensual</a>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Anual'])}}" class="btn btn-primary text-white btn-block">Comprar Plan Anual</a>
                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h5 class="p-2 text-white text-center" style="font-size: 12px!important;">SI ADQUIERES TU MEMBRESIA EN FORMATO ANUAL TENDRÁS ACCESO A LOS  <b class="text-purple">8 STREAMING + CONTENIDO VIP
                                                    +</b> <b class="text-danger"> 6 GRATIS </b> DE NUESTRO PARTNER <b class="text-danger">FTX LIVE </b></h5>
                                                    </div>
                                                </div>
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
                                                    @if (Auth::guest())
                                                        <h4 class="card-price text-purple text-center"> ${{$membresia->price}}<span class="period">/Mensual</span> ${{$membresia->price_annual}}<span class="period">/Anual</span></h4>
                                                    @else
                                                        <h4 class="card-price text-purple text-center"> ${{$membresia->descuento}}<span class="period">/Mensual</span> ${{$membresia->discount_annual}}<span class="period">/Anual</span></h4>
                                                    @endif
                                                    <h1 class="text-center text-white">. . . . . . . . . . . . . . </h1><br><br>
                                                </div>
                                                <h5 class="p-2 text-white text-center"> ¡FELICIDADES!</h5><br>
                                                <h5 class="p-2 text-white text-center">¡Estas a punto de convertirte en un PRO de los Negocios!</h5><br>
                                                <h5 class="p-2 text-purple text-center">Gozarás de todo el contenido de este nivel y de lo anterior.</h5><br>
                                                <h5 class="p-2 text-white text-center">+ de 250 videos con increíbles especialistas en los diversos temas Enseñanza, Mindfullnes + Fintech, Real Estate, Ventas, Emprendurismo, Desarrollo Humano y Finanzas</h5><br>
                                                <h4 class="p-2 text-purple text-center">+ 10 STREAMING <br> AL MES</h4>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Mensual'])}}" class="btn btn-color-green text-white btn-block">Comprar Plan Mensual</a>
                                                <a href="{{route('shopping-cart.store', [$membresia->id, 'membresia', 'Anual'])}}" class="btn btn-primary text-white btn-block">Comprar Plan Anual</a>
                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h5 class="p-2 text-white text-center" style="font-size: 12px!important;">SI ADQUIERES TU MEMBRESIA EN FORMATO ANUAL TENDRÁS ACCESO A LOS <b class="text-purple">10 STREAMING + CONTENIDO VIP +</b> <b class="text-danger"> 8 GRATIS </b> DE NUESTRO PARTNER <b class="text-danger">FTX LIVE </b></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @break
                            @endswitch
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection