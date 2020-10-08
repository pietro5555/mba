@extends('layouts.landing')

@section('content')
<div class="section-landing">
    <div class="col-md-12 mb-2">
         <div class="title-page-course col-md"><span class="text-white">
    <h3><span class="text-white"></span><span class="text-primary"></span></h3>
</div>




<div class="container-fluid p-2">
<div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h5 class="featurette-heading text-white">Perfil</h5>
        <h3 class="featurette-heading text-primary">{{$mentor_info->nombre}}</h3>
        <h6 class="featurette-heading text-white">{{$mentor_info->profession}}</h6>
        <p class="lead about-course-text">{{$mentor_info->biography}}</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('uploads/avatar/'.$mentor_info->avatar) }}" alt="" class="featurette-image mx-auto ml-2" width="370" height="370">
      </div>
</div>
</div>

     {{-- SECCIÓN TUS CURSOS--}}
<div>
<div class="section-title-courses mt-4"><h3>Cursos</h3></div>
<hr style="border: 1px solid #707070;opacity: 1;" />
</div>

     <div class="container-fluid mt-2 p-2">

         <div class="row card-deck">
             @foreach ($courses as $course)
             <div class="card col-md-3 mb-4 p-0">
              @if (!is_null($course->thumbnail_cover))
                <img class="card-img-top img-fluid mentor_img" src="{{ asset('uploads/images/courses/covers/'.$course->thumbnail_cover) }}" alt="Card image cap" height="226px">
              @else
                <img class="card-img-top mentor_img" src="{{ asset('uploads/images/courses/covers/default.jpg') }}" alt="Card image cap" height="226px">
              @endif
                <div class="card-body p-2">
                <div class="row align-items-start">
                    <div class="col-9"><p class="text-course-mentor"><a href="{{ route('courses.show', [$course->slug, $course->id]) }}" style="color: white;">{{$course->course_title}}</a></p></div>
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
                </div>
                </div>
        </div>
        @endforeach
         </div>

     </div>

    {{-- FIN SECCIÓN TUS CURSOS--}}

        {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
    <div class="pt-4">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-12 pl-4 pr-4">
                    <div class="referrers-box">
                        <i class="fa fa-user referrers-icon" style="color: white;"></i><br>
                        {{ $directos }} Referidos
                    </div>
                    <a href="{{url('/admin')}}" style="color: white; text-decoration: none;">
                     <div class="referrers-button">
                        Panel de referidos
                     </div>
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block d-xl-block referrers-banner">
                    <div class="referrers-banner-text">EL QUE QUIERE SUPERARSE, NO VE OBSTÁCULOS, VE SUEÑOS.</div>
                </div>
            </div>
        </div><br><br>
    @endif
    {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
@endsection
