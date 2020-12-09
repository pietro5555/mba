@extends('layouts.landing')

@section('content')

@push('scripts')
<script>
   const getRemainingTime = deadline => {
      let objFecha = new Date()
      let now = new Date(objFecha.getUTCFullYear(), objFecha.getUTCMonth(), objFecha.getUTCDate(), objFecha.getUTCHours(), objFecha.getUTCMinutes(), objFecha.getUTCSeconds()),
         remainTime = (new Date(deadline) - now + 1000) / 1000,
         remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
         remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
         remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
         remainDays = Math.floor(remainTime / (3600 * 24));

      return {
         remainSeconds,
         remainMinutes,
         remainHours,
         remainDays,
         remainTime
      }
   };

   const countdown = (deadline, elem) => {
      //const el = document.getElementById(elem);

      const timerUpdate = setInterval(() => {
         let t = getRemainingTime(deadline);
         //el.innerHTML = `${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;
         $('#' + elem).empty()

         if (t.remainTime <= 1) {
            clearInterval(timerUpdate);
            if ($("#statusLive").val() == 'scheduled') {
               $('#' + elem).append('<h1 class="title-status-live">El live está por iniciar</h1>');
            } else if ($("#statusLive").val() == 'live') {
               $('#' + elem).append('<h1 class="title-status-live">El live ya ha iniciado</h1>');
            } else if ($("#statusLive").val() == 'ended') {
               $('#' + elem).append('<h1 class="title-status-live">El live ya ha finalizado</h1>');
            } else if ($("#statusLive").val() == 'cancelled') {
               $('#' + elem).append('<h1 class="title-status-live">El live ha sido cancelado</h1>');
            }
            $('.text-change').html('AGENDAR LIVE Y ENTRAR');
            $('.ocultar').addClass('d-none')
            $('.mostrar').removeClass('d-none')
         } else {

            $('#' + elem).append(

               '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
               t.remainDays +
               '<p style="margin-left: -40px; margin-top: 100px; font-weight:800;">DIAS</p>' +
               '</p>' +

               '<p class="p-2 bd-highlight" style="font-size: 70px; font-weight:800;">' +
               ':' +
               '</p>' +

               '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
               t.remainHours +
               '<p style="margin-left: -68px; margin-top: 100px; font-weight:800;">HORAS</p>' +
               '</p>' +

               '<p class="p-2 bd-highlight" style="font-size: 70px; font-weight:800;">' +
               ':' +
               '</p>' +

               '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
               t.remainMinutes +

               '<p style="margin-left: -80px; margin-top: 100px; font-weight:800;">MINUTOS</p>' +
               '</p>' +

               '<p class="p-2 bd-highlight" style="font-size: 70px; font-weight:800;">' +
               ':' +
               '</p>' +
               '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
               t.remainSeconds +

               '<p style="margin-left: -85px; margin-top: 100px; font-weight:800;">SEGUNDOS</p>' +
               '</p>'

            )
         }

      }, 1000)
   };
   //Verificar que cuando no exista el evento no lo tome
   countdown('{{($evento != null) ? $evento->date.'
      '.$evento->time : $fechaActual}}', 'clock');
</script>
@endpush

@if(!empty($evento))
<div>

   @if (Session::has('msj-exitoso'))
   <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      <strong>{{ Session::get('msj-exitoso') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif

   @if (Session::has('msj-erroneo'))
   <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
      <strong>{{ Session::get('msj-erroneo') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
      <div>
         <a href="{{route ('schedule.calendar')}}" class="btn btn-success"> VER AGENDA</a>
      </div>
   </div>
   @endif
</div>
<div class="row">
   <div class="col-md-12">

      @if (!is_null($evento->image))
      <img src="{{ asset('uploads/images/banner/'.$evento->image) }}" class="card-img-top img-banner-live" alt="...">
      @else
      <img src="{{ asset('uploads/images/banner/default.jpg') }}" class="card-img-top img-fluid img-banner-live" alt="...">
      @endif

      <div class="card-img-overlay counter-caption">

          <div class="card-title text-white text-center title-remain" id="remain-time-text">
                    TIEMPO PARA INICIAR EL LIVE
         </div>

          <div class="d-flex justify-content-center bd-highlight mb-1 text-white clock-text" style="" id="clock">
                    
         </div>


      </div>
   </div>
</div>

<div class="row ml-1 mb-1">

   <div class="col-md-8 kol">
      <h3 style="color: #2A91FF;margin-top: 20px;text-transform: uppercase;font-weight: 600;">{{$evento->title}}</h3>
      <hr color="white" size=3>
      <p class="text-white">
         {!!$evento->description!!}
      </p>

      <div style="margin-top: 60px;">

         <div class="row">
            <div class="col-md-6" style="margin-bottom: 10px;">
               @if (Auth::guest())
                  {{-- USUARIOS INVITADOS --}}
                  <a href="{{route('shopping-cart.membership')}}" class="btn btn-success  btn-block"><i class="fa fa-shopping-cart" aria-hidden="true"></i> AQUIRIR MEMBRESIA</a>
               @else
                  @if (is_null(Auth::user()->membership_id))
                     {{-- USUARIOS LOGUEADOS SIN MEMBRESÍA --}}
                     <a href="{{route('shopping-cart.membership')}}" class="btn btn-success btn-block"><i class="fa fa-shopping-cart" aria-hidden="true"></i> AQUIRIR MEMBRESIA</a>
                  @else
                     @if (is_null($checkEvento))
                        @if (Auth::user()->membership_status == 1)
                           @if (Auth::user()->streamings < Auth::user()->membership->streamings)
                              <a href="{{ route('schedule.event',[$evento->id]) }}" class="btn btn-primary btn-block text-change">AGENDAR LIVE</a>
                           @else
                              @if (Auth::user()->membership_id < 4)
                                 <a href="{{route('shopping-cart.store', [Auth::user()->membership_id+1, 'membresia', 'Mensual'])}}" class="btn btn-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Aumentar Membresía</a>
                              @else
                                 <i class="fa fa-times" aria-hidden="true"></i> Límite de Eventos Superado
                              @endif
                           @endif      
                        @else
                           <a href="{{route('shopping-cart.membership')}}" class="btn btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> RENOVAR MEMBRESÍA</a>
                        @endif
                     @else
                        {{-- EL USUARIO YA TIENE EL EVENTO AGENDADO--}}
                        @if (Auth::user()->membership_status == 1)
                           @if ( ($statusLive == 'ended') || ($statusLive == 'cancelled') )
                              <a href="{{route('show.event', $evento->id)}}" class="btn btn-success btn-block">VER DETALLES DEL EVENTO</a>
                           @else
                              <form action="https://streaming.mybusinessacademypro.com/connect-mba/{{$evento->id}}/{{Auth::user()->ID}}" method="POST" class="mostrar d-none">
                                 @csrf
                                 <input type="hidden" name="email" value="{{ Auth::user()->user_email }}">
                                 <input type="hidden" name="password" value="{{ decrypt(Auth::user()->clave) }}">

                                 @if ($statusLive == 'scheduled')
                                    @if (Auth::user()->rol_id == 2)
                                       <button type="submit" class="btn btn-success btn-block">ENTRAR AL LIVE</button>
                                    @else
                                       <button type="submit" class="btn btn-success btn-block" disabled>ENTRAR AL LIVE</button>
                                    @endif
                                 @elseif ($statusLive == 'live')
                                    <button type="submit" class="btn btn-success btn-block">ENTRAR AL LIVE</button>
                                 @endif
                              </form>
                           @endif
                        @else
                           <a href="{{route('shopping-cart.store', [Auth::user()->membership_id, 'membresia', 'Mensual'])}}" class="btn btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> RENOVAR MEMBRESÍA</a>
                        @endif
                     @endif
                  @endif
               @endif

               <!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#AgendarLiveModal">
        AGENDAR LIVE
      </button>-->
            </div>
            <!-- Button trigger modal -->


            <!--<div class="col-md-6" style="margin-bottom: 10px;">
       <a href="{{route('oauthCallback', ['id' => $evento->id])}}" class="btn gris-boton btn-block"><i class="fas fa-calendar-alt" style="color:#2A91FF"></i> Google Calendar</a>
   </div>-->
            @if (!empty ($nextEvent))
            <div class="col-md-6" style="margin-bottom: 10px;">
               <form action="{{route('timelive')}}" method="GET">
                  @csrf
                  <input id="sigEvent" name="sigEvent" type="hidden" value="{{ $nextEvent->id }}">

                  <button class="btn btn-secondary btn-block" type="submit">PROXIMO LIVE <i class="fas fa-angle-right"></i></button>
               </form>
            </div>
            @endif

            <!--<div class="col-md-6" style="margin-bottom: 10px;">

        <a href="{{route('event.favorite', $evento->id)}}" class="btn btn-secondary btn-block"><i class="far fa-heart"></i> FAVORITOS</a>
   </div>-->
         </div>

      </div>

   </div>





   <div class="col-md-4 col-xs-12 " style="margin-top: 20px;">
      <div style="background:#25262B; margin-right: 10px; margin-left: 10px;">
         @if (!is_null($evento->mentor->avatar))
         <img src="{{ asset('uploads/avatar/'.$evento->mentor->avatar) }}" class="card-img-top" alt="...">
         @else
         <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top" alt="...">
         @endif
         <p style="color: white; padding-left: 10px;">Invitado</p>
         <h5 style="color:#2A91FF; margin-top: -20px; padding-left: 10px;">{{$evento->mentor->display_name}}</h5>
         <p style="color: white; padding-left: 10px;">{{$evento->mentor->profession}}
            <p>
               <p style="color:#FFFFFF; font-size: 18px; margin-top: 0px;padding-left: 10px"> {{$evento->mentor->about}}</p>

               <a href="#" class="btn btn-success btn-block">NIVEL: {{$evento->subcategory->title}}</a>
      </div>
   </div>

</div>

<div class="section-landing" style="background-color: #121317;">

   <div class="col">
      <div class="section-title-landing" style="padding-bottom: 35px;">PRÓXIMAS TRANSMISIONES EN VIVO</div>
   </div>

   <!--Carrusel-->

   @if($total > 0)
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner">

         <div class="carousel-item active">
            <div class="row">

               @php
               $contador=0;
               @endphp
               @foreach($proximos as $prox)
               @php
               $contador++;
               @endphp

               @if($contador <= 3) <div class="col-md-4" style="margin-top: 20px;">
                  @if (!is_null($prox->mentor->avatar))
                  <img src="{{ asset('uploads/avatar/'.$prox->mentor->avatar) }}" class="card-img-top img-prox-events" alt="...">
                  @else
                  <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top img-prox-events" alt="...">
                  @endif
                  <div class="card-img-overlay d-flex flex-column" style="margin-left: 10px; margin-right: 10px;">
                     <div class="mt-auto">
                        <form action="{{route('timelive')}}" method="GET">
                           @csrf
                           <input id="sigEvent" name="sigEvent" type="hidden" value="{{ $prox->id }}">
                           <button class="btn text-left" type="submit" style=" color: #2A91FF;">
                              <h2 class="streaming">{{$prox->title}}</h2>
                           </button>
                        </form>

                        <p class="card-text font-weight-bold mr-2" style="margin-top: -10px; font-size: 12px;"> <i class="far fa-calendar mr-2" style="font-size: 18px !important;padding: 5px;"> </i>
                           {{\Carbon\Carbon::parse($prox->date)->formatLocalized(' %d de %B')}}
                           <i class="far fa-clock ml-2" style="font-size: 18px !important;padding: 5px;" aria-hidden="true"></i>{{\Carbon\Carbon::parse($prox->time)->format('g:i a')}}
                        </p>
                        @if (Auth::guest())
                           {{-- USUARIOS INVITADOS --}}
                           <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                        @else
                           @if (is_null(Auth::user()->membership_id))
                              {{-- USUARIOS LOGUEADOS SIN MEMBRESÍA --}}
                              <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                           @else
                              @if (Auth::user()->membership_status == 1)
                                 @if (!in_array($prox->id, $misEventosArray))
                                    @if (Auth::user()->streamings < Auth::user()->membership->streamings)
                                       <a href="{{ route('schedule.event',[$prox->id]) }}" class="btn btn-primary btn-block text-change">AGENDAR LIVE</a>
                                    @else
                                       @if (Auth::user()->membership_id < 4)
                                          <a href="{{route('shopping-cart.store', [Auth::user()->membership_id+1, 'membresia', 'Mensual'])}}" class="btn btn-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Aumentar Membresía</a>
                                       @else
                                          <i class="fa fa-times" aria-hidden="true"></i> Límite de Eventos Superado
                                       @endif
                                    @endif
                                 @else
                                    {{-- EL USUARIO YA TIENE EL EVENTO AGENDADO--}}
                                    <a href="{{route('timeliveEvent', $prox->id)}}" class="btn btn-success btn-block">Ir Al Evento</a>
                                 @endif
                              @else
                                 <a href="{{route('shopping-cart.store', [Auth::user()->membership_id, 'membresia', 'Mensual'])}}" class="btn btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Renovar Membresía</a>
                              @endif
                           @endif
                        @endif
                     </div>
                  </div>
            </div>
            @endif
            @endforeach
         </div>
      </div>
      @if($total > 4)
      <div class="carousel-item">
         <div class="row">

            @php
            $segundo =0;
            @endphp
            @foreach($proximos as $prox)
            @php
            $segundo++;
            @endphp

            @if($segundo >= 4)

            <div class="col-md-4" style="margin-top: 20px;">
               @if (!is_null($prox->mentor->avatar))
               <img src="{{ asset('uploads/avatar/'.$prox->mentor->avatar) }}" class="card-img-top img-prox-events" alt="...">
               @else
               <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top img-prox-events" alt="...">
               @endif
               <div class="card-img-overlay d-flex flex-column" style="margin-left: 10px; margin-right: 10px;">
                  <div class="mt-auto">
                     <form action="{{route('timelive')}}" method="GET">
                        @csrf
                        <input id="sigEvent" name="sigEvent" type="hidden" value="{{ $prox->id }}">
                        <button class="btn text-left" type="submit" style=" color: #2A91FF;">
                           <h2 class="streaming">{{$prox->title}}</h2>
                        </button>
                     </form>

                     <p class="card-text font-weight-bold mr-2" style="margin-top: -10px; font-size: 12px;"> <i class="far fa-calendar mr-2" style="font-size: 18px !important;padding: 5px;"> </i>
                        {{\Carbon\Carbon::parse($prox->date)->formatLocalized(' %d de %B')}}
                        <i class="far fa-clock ml-2" style="font-size: 18px !important;padding: 5px;" aria-hidden="true"></i>{{\Carbon\Carbon::parse($prox->time)->format('g:i a')}}
                     </p>
                     @if (Auth::guest())
                           {{-- USUARIOS INVITADOS --}}
                           <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                        @else
                           @if (is_null(Auth::user()->membership_id))
                              {{-- USUARIOS LOGUEADOS SIN MEMBRESÍA --}}
                              <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                           @else
                              @if (Auth::user()->membership_status == 1)
                                 @if (!in_array($prox->id, $misEventosArray))
                                    @if (Auth::user()->streamings < Auth::user()->membership->streamings)
                                       <a href="{{ route('schedule.event',[$prox->id]) }}" class="btn btn-primary btn-block text-change">AGENDAR LIVE</a>
                                    @else
                                       @if (Auth::user()->membership_id < 4)
                                          <a href="{{route('shopping-cart.store', [Auth::user()->membership_id+1, 'membresia', 'Mensual'])}}" class="btn btn-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Aumentar Membresía</a>
                                       @else
                                          <i class="fa fa-times" aria-hidden="true"></i> Límite de Eventos Superado
                                       @endif
                                    @endif
                                 @else
                                    {{-- EL USUARIO YA TIENE EL EVENTO AGENDADO--}}
                                    <a href="{{route('timeliveEvent', $prox->id)}}" class="btn btn-success btn-block">Ir Al Evento</a>
                                 @endif
                              @else
                                 <a href="{{route('shopping-cart.store', [Auth::user()->membership_id, 'membresia', 'Mensual'])}}" class="btn btn-danger"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Renovar Membresía</a>
                              @endif
                           @endif
                        @endif
                  </div>
               </div>
            </div>
            @endif
            @endforeach
         </div>
      </div>

      @endif

   </div>

   @if($total >= 3)
   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <img src="{{ asset('images/icons/left-arrow.svg') }}" alt="" height="30px" width="30px" aria-hidden="true">
      <span class="sr-only">Previous</span>
   </a>

   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <img src="{{ asset('images/icons/right-arrow.svg') }}" alt="" height="30px" width="30px" aria-hidden="true">
      <span class="sr-only">Next</span>
   </a>
   @endif

</div>

@else
<div class="row">
   No se encontraron próximas transmisiones...
</div>

@endif
<!--Carrusel-->
</div>

@else

<div class="section-title-landing" style="padding-top: 20px; margin-bottom: 20px; text-align: center;">NO HAY EVENTOS PENDIENTES</div>

@endif



@endsection