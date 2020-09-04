@extends('layouts.landing')

@section('content')
@stack('styles')
<!-- css para la vista de anotaciones y mas -->
<link rel="stylesheet" href="{{asset('css/anotaciones-simple.css')}}">
<div class="bg-dark-gray">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 my-auto">
          <h4 class="text-blue">
        NOMBRE DEL LIVE / ESPECIALISTA
        </h4>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6 title-level">
              <h6 class="">Nivel: Principiante</h6>
            </div>
            <div class="col-md-6 text-center pt-1 my-auto">
              <div class="">
              <a href="" class="btn btn-social-icon btn-facebook btn-rounded"><img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px"></a>
              <a href="" class="btn btn-social-icon btn-twitter btn-rounded"><img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px"></a>
              <a href="" class="btn btn-social-icon btn-instagram btn-rounded"><img src="{{ asset('images/icons/instagram.svg') }}" height="20px" width="20px"></a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<video
    class="d-block w-100 leccion-curso"
    controls
    crossorigin
    playsinline
    poster="{{ asset('images/banner_live.png') }}"
    id="player"
  >
    <!-- Video files -->
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
      type="video/mp4"
      size="576"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
      type="video/mp4"
      size="720"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
      type="video/mp4"
      size="1080"
    />

    <!-- Caption files -->
    <track
      kind="captions"
      label="English"
      srclang="en"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
      default
    />
    <track
      kind="captions"
      label="Français"
      srclang="fr"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"
    />
  </video>
</div>





  @endsection       