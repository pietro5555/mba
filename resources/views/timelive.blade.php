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

            '<p class="p-1 bd-highlight" style="font-size: 76px;">'+
             t.remainDays +   
                '<p style="margin-left: -40px; margin-top: 100px;">DIAS</p>'+
            '</p>'+

            '<p class="p-2 bd-highlight" style="font-size: 66px;">'+
                ':'+
            '</p>'+

            '<p class="p-1 bd-highlight" style="font-size: 76px;">'+
              t.remainHours +
                '<p style="margin-left: -68px; margin-top: 100px;">HORAS</p>'+
            '</p>'+

            '<p class="p-2 bd-highlight" style="font-size: 66px;">'+
               ':'+
            '</p>'+

            '<p class="p-1 bd-highlight" style="font-size: 76px;">'+
               t.remainMinutes + 
            
                '<p style="margin-left: -80px; margin-top: 100px;">MINUTOS</p>'+
            '</p>'+

            '<p class="p-2 bd-highlight" style="font-size: 66px;">'+
                ':'+
            '</p>'+
            '<p class="p-1 bd-highlight" style="font-size: 76px;">'+
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
<div class="row">
    <div class="col-md-12">

        <img src="{{ asset('vivo/temporizador.png') }}" class="card-img-top" alt="..." style="height: 500px; width: 100%;">

        <div class="card-img-overlay" style="text-align: center; margin-top: 130px; color:white;">

            
            <h6 class="card-title">TIEMPO PARA INICIAR EL LIVE</h6>

          <div class="d-flex justify-content-center bd-highlight mb-1" id="clock">
           

           </div>


        </div>
     </div>
</div>

<div class="row">

<div class="col-md-8" style="background-color: #121317; margin-left: 15px;
    margin-right: -15px;">
  <h3 style="color: #2A91FF; margin-top: 20px;">{{$evento['title']}}</h3>
   <hr color="white" size=3>
   <p style="color:white;">
     {{$evento['descripcion']}}
   </p>

   <div style="margin-top: 60px;">
   
<div class="row">

  @if (Session::has('msj'))
  <div class="col-md-12">
      <div class="alert alert-success">
        <button class="close" data-close="alert"></button>
          <span>
              {{Session::get('msj')}}
          </span>
      </div>
   </div>   
  @endif

   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="#" class="btn btn-primary btn-block">AGENDAR LIVE</a>
   </div>

   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="{{route('oauthCallback', ['id' => $evento['id']])}}" class="btn gris-boton btn-block"><i class="fas fa-calendar-alt" style="color:#2A91FF"></i> Google Calendar</a>
   </div>

   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="{{route('time-prox', $evento['id'])}}" class="btn btn-secondary btn-block">PROXIMO LIVE <i class="fas fa-angle-right"></i></a>
   </div>

   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="#" class="btn btn-secondary btn-block"><i class="far fa-heart"></i> FAVORITOS</a>
   </div>
</div>

   </div>

  </div>


  <div class="col-md-4 col-xs-12" style="margin-top: 20px;">
     <div style="margin-right: 10px; margin-left: 10px;">
          <img src="{{ asset('vivo/nivel.png') }}" class="card-img-top" alt="..." style="height: 165px; width: 100%;">

          <p style="color: white;">Invitado</p>
          <h5 style="color:#2A91FF; margin-top: -20px;">{{$evento['nombre']}} {{$evento['apellido']}}</h5>
          <p style="color: white;">Conferencista Experta en Marketing<p>
          <p style="color:#b7a7a7; font-size: 12px; margin-top: -10px;"> {{$evento['descripcion']}}</p>

        <a href="#" class="btn btn-success btn-block">NIVEL: PRINCIPIANTE</a>
    </div>
  </div>

</div>


                  <div class="section-landing" style="background-color: #121317;">
                    
                        <div class="col">
                            <div class="section-title-landing" style="padding-bottom: 35px;">PRÓXIMAS TRANSMISIONES EN VIVO</div>
                        </div>

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">



                      <div class="carousel-inner">

                       <div class="carousel-item active">
                         <div class="row">

                           <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/1.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/2.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/3.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                      </div>
                   </div>
                   
                   
                   
                   <div class="carousel-item">
                         <div class="row">

                           <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/1.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/2.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                            <div class="col-md-4" style="margin-top: 20px;">
                             <img src="{{ asset('vivo/3.png') }}" class="card-img-top" alt="..." style="height: 320px;">
                             <div class="card-img-overlay" style="margin-left: 10px; margin-right: 10px;">
                              <h3 class="card-title" style="margin-top: 190px; color: #2A91FF;">Nombre del Live</h3>
                              <p class="card-text" style="margin-top: -10px; font-size: 10px;"> <i class="far fa-calendar" style="font-size: 18px;"></i> Sabado 25 de Julio 

                              <i class="far fa-clock" style="font-size: 18px;"></i> 6:00 Pm 

                               </p>

                              <a href="#" class="btn btn-success btn-block">Agendar</a>
                              </div>
                             </div>

                      </div>
                   </div>
                </div>    


                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
                   </a>
               </div>
            </div>  
        
        @else

        <div class="section-title-landing" style="padding-top: 20px; margin-bottom: 20px; text-align: center;">NO HAY EVENTOS PENDIENTES</div>

        @endif     

  @endsection