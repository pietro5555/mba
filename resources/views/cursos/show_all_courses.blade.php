@extends('layouts.landing')
@push('scripts')
    <script>
        function loadMoreCoursesNew($accion){
            if ($accion == 'next'){
                var route = $(".btn-arrow-next").attr('data-route');
            }else{
                var route = $(".btn-arrow-previous").attr('data-route');
            }

            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#new-courses-section").html(ans);
                }
            });
        }
    </script>
@endpush


@section('content')
    <div class="" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="col mb-4 mt-2">
            <div class="title-page-course col-md-12"><span class="text-white">
            <h2>Todos los Cursos</h2>
            </div>
        </div>

        <div class="row p-4">
            @if ($courses->count() > 0)
                @foreach ($courses  as $course)

                <div class="col-md-3 mt-1">
                    @if (!is_null($course->thumbnail_cover))
                        <img src="{{ asset('uploads/images/courses/covers/'.$course->thumbnail_cover) }}" class="card-img-top img-opacity" alt="...">
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top img-opacity" alt="...">
                        @endif
                   <div class="card-img-overlay ml-1 mr-1">
                        <div class="container-fluid">
                        <div class="row card-carousel-text mr-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9 p-0">
                                        <h6>
                                            <a href="{{ route('courses.show', [$course->slug, $course->id]) }}" class="text-white"><i class="text-success fa fa-play-circle"></i>{{ $course->title }}</a>
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="far fa-user-circle text-white"><p class="text-center text-white" style="font-size: 10px;">{{ $course->users->count() }}</p></i>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <h6>
                                            <a href="{{ route('courses.show', [$course->slug, $course->id]) }}" class="subtitle-cat">{{ $course->category->title }} </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row card-carousel-text">
                        <div class="col-md-9">
                            <h6 class=""><i class="text-success fa fa-play-circle"></i> <a href="{{ route('courses.show', [$course->slug, $course->id]) }}" class="text-white">{{ $course->title }}</a></h6>
                            <h6 class="ml-2">
                                <a href="{{ route('courses.show', [$course->slug, $course->id]) }}" class="subtitle-cat">{{ $course->category->title }} </a>
                                @if ($course->favorite ==1)
                                <h6 class="text-right"><img src="{{ asset('images/icons/heart.svg') }}" alt="" height="20px" width="20px"></h6>
                                @else
                                <a href="{{route('event.favorite', $course->id)}}" class="float-right"><i class="far fa-heart text-secondary" height="20px" width="20px"></i></a>
                                @endif
                            </h6>
                         </div>
                        <div class="col-md-3">
                            <h6>
                                <i class="far fa-user-circle"><p style="font-size: 10px;">{{ $course->views }}</p></i>
                                <i class="far fa-thumbs-up"><p style="font-size: 10px;">{{ $course->likes }}</p></i>
                            </h6>
                        </div>
                    </div>-->
                    </div>
                   </div>
                @endforeach
            @else
            <div class="container-fluid">
                <h3>
                    No se encontraron courses relacionados con la búsqueda...
                </h3>
            </div>

            @endif
        </div>
        
        <div class="text-white text-center">
            <a class="">{{ $courses->links() }}</a>
            </div>
        
    </div>


        {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 " style="padding-left: 30px;">
                    <div style="text-align: center; font-size: 34px; color: white; font-weight: bold; border: solid #919191 1px; background-color: #222326; margin-bottom: 10px; height: 330px; padding: 120px 15px;">
                        <i class="fa fa-user"></i><br>
                        {{ $refeDirec }} Referidos
                    </div>
                    <div style="text-align: center; font-size: 25px; color: white; font-weight: bold; background-color: #6AB742; height: 60px; padding: 10px 10px;">
                        Panel de referidos
                    </div>
                </div>
                <div class="col-8" style=" background:url('http://localhost:8000/images/banner_referidos.png');">
                    <!--<img src="{{ asset('images/banner_referidos.png') }}" alt="" style="height: 400px; width:100%; opacity: 1; background: transparent linear-gradient(90deg, #2A91FF 0%, #2276D0A1 54%, #15498000 100%) 0% 0% no-repeat padding-box;">-->
                    <div style="font-size: 50px; width: 50%; padding: 80px 40px 80px 80px; color: white; line-height: 55px;">EL QUE QUIERE SUPERARSE, NO VE OBSTÁCULOS, VE SUEÑOS.</div>
                </div>
            </div>
        </div><br><br>
    @endif
    {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
@endsection
