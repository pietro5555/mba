@extends('layouts.landing')

@section('content')

<div class="container-fluid courses-slider" style="background-color: #fff;">
    <div class="container-fluid courses-slider">
      <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item  active ">
        	    <div class="overlay"></div>
        	        <img src="{{ asset('nosotros/gratis-Blog/HomeBlog.png') }}" class="d-block w-100" alt="...">
        	         <div class="carousel-caption row align-items-center">
        			    <div class="blog-title font-weight-bold">BLOG | MY BUSINESS ACADEMY PRO
        			 </div>
        	    </div>
        	</div>   
        </div>
    </div>
</div>


<div class="container">
  <div class="row justify-content-md-center">
   <div class="col-md-4 offset-md-1" style="box-shadow: 0 2px 4px rgba(0,0,0,.2); margin-bottom: 20px;">
        <img src="{{ asset('nosotros/gratis-Blog/mujer.png') }}" class="card-img-top" alt="..." style="border: solid 0;">
          <div class="card-body" style="background-color: #FFFFFF;">
            <h6 class="card-title" style="color: #2A91FF; padding-left: 0px; font-size: 22px !important; font-weight: 700!important;">Mariana López de Waard, de empleada hotelera a la libertad financiera con el MLM</h6>
            <h6 style="font-size: 14px; color: #8B8E9D;">Cómo esta madre y esposa española dejó un empleo frustrante para lograr su libertad financiera a través de un negocio de MLM.</h6>
            <h6 style="font-size: 12px; color: #2A91FF;" align="left">
            	Leer mas
            </h6>
           </div>
     </div>
   

   <div class="col-md-4 offset-md-1" style="box-shadow: 0 2px 4px rgba(0,0,0,.2); margin-bottom: 20px;">
        <img src="{{ asset('nosotros/gratis-Blog/jose-gordo.png') }}" class="card-img-top" alt="..." style="border: solid 0;">
          <div class="card-body" style="background-color: #FFFFFF;">
            <h6 class="card-title" style="color: #2A91FF; padding-left: 0px; font-size: 22px !important; font-weight: 700!important;">Todos debemos tener algo de militar en nuestra vida</h6>
            <h6 style="font-size: 14px; color: #8B8E9D;">El escritor, conferencista internacional, exmilitar, padre y hombre de negocios utiliza la enseñanza militar en su diario andar. Aconseja incluir la disciplina en todas las acciones</h6>

            <h6 style="font-size: 12px; color: #2A91FF;" align="left">
            	Leer mas
            </h6>
           </div>
        </div>   
     </div>  
   </div>

</div>	

@endsection