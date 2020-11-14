@extends('layouts.landing')
@push('scripts')
<script>
    function loadMoreCoursesNew($accion) {
        if ($accion == 'next') {
            var route = $(".btn-arrow-next").attr('data-route');
        } else {
            var route = $(".btn-arrow-previous").attr('data-route');
        }

        $.ajax({
            url: route,
            type: 'GET',
            success: function (ans) {
                $("#new-courses-section").html(ans);
            }
        });
    }

</script>
@endpush


@section('content')
    <div class="section-landing mt-3" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="col mb-4 mt-4">
            <div class="title-page-course col-md-12"><span class="text-white">
                <h1>Mis Cursos</h1>
            </div>
        </div>

        <div class="row">
            @if ($cursos->count() > 0)
                @foreach ($cursos as $curso)
                    <div class="col-md-3 mt-1 box-courses">
                        @if (!is_null($curso->thumbnail_cover))
                            <img src="{{ asset('uploads/images/courses/covers/'.$curso->thumbnail_cover) }}" class="card-img-top img-opacity" alt="...">
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top img-opacity" alt="...">
                        @endif
                        <div class="card-img-overlay course-overlay">
                            <div class="container-fluid">
                                <div class="row card-carousel-text mr-1">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-9 p-0">
                                                <h6>
                                                    <a href="{{ route('courses.show', [$curso->slug, $curso->id]) }}" class="text-white">{{ $curso->title }}</a>
                                                </h6>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <i class="far fa-user-circle text-white"><p class="text-center text-white" style="font-size: 10px;">{{ $curso->users->count() }}</p></i>
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
                <div class="col-md-3 mt-1" style="display: flex;align-items: center;">
                    <div style="text-align: center; padding-left: 10%;">
                        <h6>
                            <a href="{{ route('courses.show.all') }}" class="text-white">
                                <i class="fa fa-plus-circle" style="font-size: 26px;"></i><br><br>
                                AGREGAR MAS CURSOS<br> A MI BIBLIOTECA
                            </a>
                        </h6>
                    </div>
                    
                </div>
            @else
                <div class="container-fluid">
                    <h3>
                        No se encontraron cursos relacionados con la búsqueda...
                    </h3>
                </div>
            @endif
        </div>
    </div>




{{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
@if (!Auth::guest())
<div class="pt-4">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-12 pl-4 pr-4">
            <div class="referrers-box">
                <i class="fa fa-user referrers-icon" style="color: white;"></i><br>
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
