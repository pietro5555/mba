@extends('layouts.landing')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img src="{{ asset('vivo/temporizador.png') }}" class="card-img-top" alt="..." style="height: 500px; width: 100%;">

        <div class="card-img-overlay" style="text-align: center; margin-top: 130px; color:white;">

            
            <h6 class="card-title">TIEMPO PARA INICIAR EL LIVE</h6>

          <div class="d-flex justify-content-center bd-highlight mb-1">
            <p class="p-1 bd-highlight" style="font-size: 76px;">
                5
                <p style="margin-left: -45px; margin-top: 100px;">DIAS</p>
            </p>

            <p class="p-1 bd-highlight" style="font-size: 66px;">
                :
            </p>

            <p class="p-1 bd-highlight" style="font-size: 76px;">
                11
                <p style="margin-left: -68px; margin-top: 100px;">HORAS</p>
            </p>

            <p class="p-1 bd-highlight" style="font-size: 66px;">
                :
            </p>

            <p class="p-1 bd-highlight" style="font-size: 76px;">
                24

                <p style="margin-left: -80px; margin-top: 100px;">MINUTOS</p>
            </p>

            <p class="p-1 bd-highlight" style="font-size: 66px;">
                :
            </p>
            <p class="p-1 bd-highlight" style="font-size: 76px;">
                15

                <p style="margin-left: -80px; margin-top: 100px;">SEGUNDOS</p>
            </p>

           </div>


        </div>
     </div>
</div>

<div class="row">

<div class="col-md-8" style="background-color: #121317; margin-left: 15px;
    margin-right: -15px;">
  <h3 style="color: #2A91FF; margin-top: 20px;">ACERCA DEL LIVE</h3>
   <hr color="white" size=3>
   <p style="color:white;">
     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit. Nulla vulputate massa nec enim finibus, vel sagittis tellus aliquet. Fusce felis tortor, condimentum at purus nec, vehicula malesuada lectus. Proin nec purus vel enim interdum feugiat. Nam placerat posuere tellus non luctus. Dolor sit amet, consectetur adipiscing elit. Vivamus maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit. Nulla vulputate massa nec enim finibus, vel sagittis tellus aliquet.  
   </p>

   <div style="margin-top: 60px;">
   
<div class="row">
   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="#" class="btn btn-primary btn-block">AGENDAR LIVE</a>
   </div>

   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="#" class="btn gris-boton btn-block"><i class="fas fa-calendar-alt" style="color:#2A91FF"></i> Google Calendar</a>
   </div>

   <div class="col-md-6" style="margin-bottom: 10px;">
       <a href="#" class="btn btn-secondary btn-block">PROXIMO LIVE <i class="fas fa-angle-right"></i></a>
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
          <h5 style="color:#2A91FF; margin-top: -20px;">Nombre Apellido</h5>
          <p style="color: white;">Conferencista Experta en Marketing<p>
          <p style="color:#b7a7a7; font-size: 12px; margin-top: -10px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivam maximus eros malesuada arcu sagittis, et lobortis lacus hendrerit.</p>

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

  @endsection
               