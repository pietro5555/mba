@extends('layouts.landing')

@section('content')

<div class="container-fluid courses-slider" style="background-color: #1C1D21;">
    <div class="container-fluid courses-slider">
      <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item  active ">
        	    <div class="overlay"></div>
        	        <img src="{{ asset('nosotros/gratis-Blog/homegratis.png') }}" class="d-block w-100" alt="...">
        	         <div class="carousel-caption row align-items-center">
        			    <div class="blog-title font-weight-bold">¡COMIENZA AHORA!
                          <p style="font-size: 22px;">En este mundo tan acelerado, es la preparación lo que conduce el futuro de la vida.</p>
                        </div>
        	    </div>
        	</div>   
        </div>
    </div>
</div>
</div>


<div class="col-12">
    <div class="section-title-landing new-courses-section-title" style="text-align: center;">Bienvenidos</div>


<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-bottom: 40px;">
 <div class="carousel-inner">
  <div class="carousel-item active">
    <div class="col-md-6 offset-md-3">
        <video src="{{ asset('nosotros/videos/introduccion.mp4') }}" controls poster="{{ asset('nosotros/nosotros/13.png') }}" style="width: 100%; height: 300px;"></video>
      <h4 style="text-align: center; margin-top: 30px; margin-bottom: 30px; color: #fff;">Plática de Introducción</h4>
    </div>
  </div>

    <div class="carousel-item">
      <div class="col-md-6 offset-md-3">
         <video src="{{ asset('nosotros/videos/v1.mp4') }}" controls poster="{{ asset('nosotros/nosotros/09.png') }}" style="width: 100%; height: 300px;"></video>
        <h4 style="text-align: center; margin-top: 30px; margin-bottom: 30px; color: #fff;">Promocional V1 My Business Academy Pro</h4>
       </div>
      </div>

    <div class="carousel-item">
     <div class="col-md-6 offset-md-3">
         <video src="{{ asset('nosotros/videos/v2.mp4') }}" controls poster="{{ asset('nosotros/nosotros/10.png') }}" style="width: 100%; height: 300px;"></video>
        <h4 style="text-align: center; margin-top: 30px; margin-bottom: 30px; color: #fff;">Promocional V2 My Business Academy Pro</h4>
      </div>
    </div>


   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
     <i class="fas fa-chevron-circle-left"></i>
     <span class="sr-only">Previous</span>
   </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
   <i class="fas fa-chevron-circle-right"></i>
    <span class="sr-only">Next</span>
  </a>

</div>  

@endsection