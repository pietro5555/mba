@extends('layouts.landing')

@section('content')
<div class="container-fluid p-2">
<div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h5 class="featurette-heading text-white">Perfil</h5>
        <h3 class="featurette-heading text-primary">{{$mentor_info->nombre}}</h3>
        <h6 class="featurette-heading text-white">{{$mentor_info->profession}}</h6>
        <p class="lead about-course-text">{{$mentor_info->biography}}</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('uploads/avatar/'.$mentor_info->avatar) }}" alt="" class="featurette-image mx-auto ml-2 img-fluid">
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
                    <div class="col-9"><h6 class="text-course-mentor"><a class="text-secondary" href="{{ route('courses.show', [$course->slug, $course->id]) }}" style="color: white;">{{$course->course_title}}</a></h6></div>
                     <div class="col-3"><i class="text-primary fa fa-play-circle"></i></div>
                </div>
                </div>
        </div>
        @endforeach
         </div>

     </div>

    {{-- FIN SECCIÓN TUS CURSOS--}}
@endsection
