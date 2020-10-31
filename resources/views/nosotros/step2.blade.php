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
                  <div class="blog-title font-weight-bold">ﾂ｡COMIENZA AHORA!
                          <p style="font-size: 22px;">En este mundo tan acelerado, es la preparaciﾃｳn lo que conduce el futuro de la vida.</p>
                        </div>
              </div>
          </div>   
        </div>
    </div>
</div>
</div>


<div class="col-md-12">
    <div class="section-title-landing new-courses-section-title" style="text-align: center;">Bienvenidos</div>

  <div class="row" style="margin-bottom: 30px;">
     <div class="col-md-4">
        <a data-toggle="modal" data-target="#video1">
       <img src="{{ asset('nosotros/fundadores/bienvenido.png') }}" class="card-img-top" alt="..." style="border: solid 0;">
       <div class="card-body">
            <h6 class="card-title" style="color: #2A91FF; padding-left: 0px; font-size: 22px !important; font-weight: 700!important; text-align:center;">Bienvenido</h6>
        </div>
        </a>
     </div>
     
     
     <div class="col-md-4">
      <a data-toggle="modal" data-target="#video2"> 
        <img src="{{ asset('nosotros/fundadores/pro.png') }}" class="card-img-top" alt="..." style="border: solid 0;">
        <div class="card-body">
            <h6 class="card-title" style="color: #2A91FF; padding-left: 0px; font-size: 22px !important; font-weight: 700!important; text-align:center;">Ser Pro</h6>
        </div>
        </a>
     </div>
     
     
     <div class="col-md-4">
      <a data-toggle="modal" data-target="#video3">         
          <img src="{{ asset('nosotros/fundadores/cambio.png') }}" class="card-img-top" alt="..." style="border: solid 0;">
        <div class="card-body">
            <h6 class="card-title" style="color: #2A91FF; padding-left: 0px; font-size: 22px !important; font-weight: 700!important; text-align:center;">El Cambio</h6>
        </div>
        </a>
    </div>
    
  </div>
</div>  



<div class="modal fade" id="video1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bienvenido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarmodal()"> 
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ asset('nosotros/videos/introduccion.mp4') }}" allowfullscreen></iframe>
          </div>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="video2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ser Pro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarmodal()"> 
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ asset('nosotros/videos/v1.mp4') }}" allowfullscreen></iframe>
          </div>
          
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="video3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">El Cambio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarmodal()"> 
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{ asset('nosotros/videos/v2.mp4') }}" allowfullscreen></iframe>
          </div>
          
      </div>
    </div>
  </div>
</div>

@endsection