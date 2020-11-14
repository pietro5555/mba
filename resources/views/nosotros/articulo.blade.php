@extends('layouts.landing')

@section('content')

<div class="container-fluid courses-slider" style="background-color: #fff;">
    <div class="container-fluid courses-slider">
      <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item  active ">
              <div class="overlay"></div>
                  <img src="{{ asset('uploads/entradas/'.$articulo->banner) }}" class="d-block w-100" alt="...">
                   <div class="carousel-caption row align-items-center">
                        <div class="col-md-12 blog-title-two font-weight-bold">{{$articulo->titulo}}</div>
                    </div>

          </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10 mt-2">{!! $articulo->descripcion_completa !!}</div>
    </div>
    <div class="row featurette">
            <div class="col-md-7 order-md-1">
              <h3 class="featurette-heading text-primary"></h3>
              <h6 class="featurette-heading text-white"></h6>
              <p class="my-auto lead about-course-text"></p>
            </div>
            <div class="col-md-5 order-md-2">
                    <img src="{{ asset('uploads/entradas/'.$articulo->imagen_destacada) }}" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                     <div class="mt-auto">
                        <div class="new-course-title" style="background-color: #333; padding: 8px; color: #2A91FF; float: left; font-size:30px;">
                                {!! $articulo->autor !!}
                        </div>
                      </div>
                   </div>

            </div>
    </div>
</div>

</div>



@endsection
