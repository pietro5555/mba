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
            @if($courses->count() <8)
            @php
             $count =    8 - $courses->count();
            @endphp
                @foreach ($courses  as $course)

                <div class="col-md-3 mt-1 box-courses">
                    @if (!is_null($course->thumbnail_cover))
                        <img src="{{ asset('uploads/images/courses/covers/'.$course->thumbnail_cover) }}" class="card-img-top" alt="...">
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top" alt="...">
                        @endif
                   <div class="card-img-overlay course-overlay">
                        <div class="container-fluid">
                        <div class="row card-carousel-text mr-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9 p-0">
                                        <h6>
                                            <a href="{{ route('courses.show', [$course->slug, $course->id]) }}" class="text-white">{{ $course->title }}</a>
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
                @for ($i = 0; $i < $count; $i++)
                   <div class="col-md-3 mt-1" style="padding: 5px;">
                    <div class="row h-100">
                            <div class="card-block w-50 text-primary align-self-center">
                                <h4 class="text-white p-0">Próximamente</h4>
                            </div>

                    </div>
                </div>
                @endfor
                @else
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
                                            <a href="{{ route('courses.show', [$course->slug, $course->id]) }}" class="text-white">{{ $course->title }}</a>
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

                            </div>
                        </div>
                    </div>
                    </div>
                   </div>
                @endforeach

                @endif
            @else
            <div class="container-fluid">
                <h3>
                    No se encontraron courses relacionados con la búsqueda...
                </h3>
            </div>

            @endif
        </div>


            <div class="d-flex justify-content-center paginador">
                    {{ $courses->links("pagination::bootstrap-4") }}
                </div>

    </div>


        {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
{{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div class="pt-4">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-12 pl-4 pr-4">
                    <div class="referrers-box">
                        <i class="fa fa-user referrers-icon" style="color: #2a91ff;"></i><br>
                        {{ $refeDirec }} Referidos
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
