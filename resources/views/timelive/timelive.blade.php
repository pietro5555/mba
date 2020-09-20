@extends('layouts.landing')

@section('content')

@push('scripts')
    <script>

      const getRemainingTime = deadline => {
  let now = new Date(),
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

const countdown = (deadline,elem) => {
  //const el = document.getElementById(elem);

  const timerUpdate = setInterval( () => {
    let t = getRemainingTime(deadline);
    //el.innerHTML = `${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;
     $('#'+elem).empty()

     if(t.remainTime <= 1) {
      clearInterval(timerUpdate);
      $('#'+elem).append(
        '<h1>El live ya a Iniciado</h1>'
        );
    }else{ 

     $('#'+elem).append(

            '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
             t.remainDays +   
                '<p style="margin-left: -40px; margin-top: 100px;">DIAS</p>'+
            '</p>'+

            '<p class="p-2 bd-highlight" style="font-size: 56px;">'+
                ':'+
            '</p>'+

            '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
              t.remainHours +
                '<p style="margin-left: -68px; margin-top: 100px;">HORAS</p>'+
            '</p>'+

            '<p class="p-2 bd-highlight" style="font-size: 56px;">'+
               ':'+
            '</p>'+

            '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
               t.remainMinutes + 
            
                '<p style="margin-left: -80px; margin-top: 100px;">MINUTOS</p>'+
            '</p>'+

            '<p class="p-2 bd-highlight" style="font-size: 56px;">'+
                ':'+
            '</p>'+
            '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
               t.remainSeconds +

                '<p style="margin-left: -85px; margin-top: 100px;">SEGUNDOS</p>'+
            '</p>'

        )
     }

  }, 1000)
};

countdown('{{$fecha}}', 'clock');

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

        @if (!is_null($evento['image']))
            <img src="{{ asset('uploads/images/banner/'.$evento['image']) }}" class="card-img-top img-banner-live" alt="..."> 
          @else
          <img src="{{ asset('uploads/images/banner/default.jpg') }}" class="card-img-top img-fluid img-banner-live" alt="...">
          @endif

        <div class="card-img-overlay counter-caption">
            
            <h6 class="card-title text-white text-center">TIEMPO PARA INICIAR EL LIVE</h6>

          <div class="d-flex justify-content-center bd-highlight mb-1 text-white" id="clock">
           

           </div>


        </div>
     </div>
</div>

<div class="row">

<div class="col-md-8">
  <h3 style="color: #2A91FF; margin-top: 20px;">{{$evento['title']}}</h3>
   <hr color="white" size=3>
   <p style="color:white;">
     {{$evento['descripcion']}}
   </p>

   <div style="margin-top: 60px;">
   
<div class="row">
   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="{{route ('schedule.event',[$evento['id'], $evento['user_id']]) }}" class="btn btn-primary btn-block">AGENDAR LIVE</a>
       <!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#AgendarLiveModal">
        AGENDAR LIVE
      </button>-->
   </div>
   <!-- Button trigger modal -->


   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="{{route('oauthCallback', ['id' => $evento['id']])}}" class="btn gris-boton btn-block"><i class="fas fa-calendar-alt" style="color:#2A91FF"></i> Google Calendar</a>
   </div>

   <div class="col-md-6" style="margin-bottom: 10px;">
     <a href="{{route('time-prox', $evento['id']+1)}}" class="btn btn-secondary btn-block">PROXIMO LIVE <i class="fas fa-angle-right"></i></a>

       <!--<a href="" class="btn btn-secondary btn-block">PROXIMO LIVE <i class="fas fa-angle-right"></i></a>-->
   </div>

   
   <div class="col-md-6" style="margin-bottom: 10px;">
    
        <a href="{{route('event.favorite', $evento['id'])}}" class="btn btn-secondary btn-block"><i class="far fa-heart"></i> FAVORITOS</a>
   </div>
</div>

   </div>

  </div>





  <div class="col-md-4 col-xs-12" style="margin-top: 20px;">
     <div style="margin-right: 10px; margin-left: 10px;">
          @if (!is_null($evento['avatar']))
            <img src="{{ asset('uploads/images/avatar/'.$evento['avatar']) }}" class="card-img-top" alt="..." height="200px"> 
          @else
          <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top" alt="..." height="200px">
          @endif
          <p style="color: white;">Invitado</p>
          <h5 style="color:#2A91FF; margin-top: -20px;">{{$evento['nombre']}}</h5>
          <p style="color: white;">{{$evento['profession']}}<p>
          <p style="color:#b7a7a7; font-size: 12px; margin-top: -10px;"> {{$evento['about']}}</p>

        <a href="#" class="btn btn-success btn-block">NIVEL: {{$evento['subcategory']}}</a>
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
                      $contador =0;
                      @endphp
                      @foreach($proximas as $proxima)
                      @php
                      $contador++;
                      @endphp

                      @if($contador <= 3)

                           <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('uploads/avatar/'.$proxima->avatar) }}" class="card-img-top img-prox-events" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h5 class="card-title font-weight-bold" style="margin-top: 170px; color: #2A91FF;">{{$proxima->title}} </h5>
                              <p class="card-text font-weight-bold mr-2" style="margin-top: -10px; font-size: 12px;"> <i class="far fa-calendar mr-2" style="font-size: 18px;"> </i>
                                {{$proxima->fecha}}
                               <i class="far fa-clock ml-2" style="font-size: 18px;"></i>{{\Carbon\Carbon::parse($proxima->date)->format('g:i a')}} 
                               </p>
                              <a href="{{route ('schedule.event',[$proxima->id, auth()->user()->ID]) }}" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            @endif
                            @endforeach
                      </div>
                   </div>
                   
                   
                   
                   @if($total >= 4)
                   <div class="carousel-item">
                         <div class="row">

                      @php
                      $segundo =0;
                      @endphp
                      @foreach($proximas as $proxima)
                      @php
                      $segundo++;
                      @endphp

                      @if($segundo >= 4)

                           <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('uploads/avatar/'.$proxima->avatar) }}" class="card-img-top img-prox-events" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h5 class="card-title font-weight-bold" style="margin-top: 170px; color: #2A91FF;">{{$proxima->title}} </h5>
                              <p class="card-text font-weight-bold mr-2" style="margin-top: -10px; font-size: 12px;"> <i class="far fa-calendar mr-2" style="font-size: 18px;"> </i>
                                {{$proxima->fecha}}
                               <i class="far fa-clock ml-2" style="font-size: 18px;"></i>{{\Carbon\Carbon::parse($proxima->date)->format('g:i a')}} 
                               </p>
                              <a href="{{route ('schedule.event',[$proxima->id, auth()->user()->ID]) }}" class="btn btn-success btn-block">Agendar</a>
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