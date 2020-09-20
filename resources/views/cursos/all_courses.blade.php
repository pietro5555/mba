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
    <div class="section-landing" style="background: linear-gradient(to bottom, #222326 50%, #1C1D21 50.1%);">
        <div class="col mb-4 mt-4">
            <div class="title-page-course col-md-12"><span class="text-white">
            <h2>Mis cursos</h2>
            </div>
        </div>     
             
        <div class="row">
            @if ($cursos->count() > 0)
                @foreach ($cursos  as $curso)

                <div class="col-md-4 mt-1">
                    @if (!is_null($curso->cover))
                        <img src="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" class="card-img-top img-opacity" alt="..."> 
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top img-opacity" alt="...">
                        @endif
                   <div class="card-img-overlay">
                    <div class="row card-carousel-text">
                        <div class="col-md-9">
                            <h6 class="col-sm"><i class="text-success fa fa-play-circle"></i> <a href="{{ route('courses.show', [$curso->slug, $curso->id]) }}" class="text-white">{{ $curso->title }}</a></h6>
                            <h6 class="ml-2 subtitle-cat">
                                <a href="{{ route('courses.show', [$curso->slug, $curso->id]) }}" class="" style="color:#8E8E8E;">{{ $curso->category->title }} </a>
                            </h6>
                         </div>
                        <div class="col-md-3">
                            <h6>
                                <i class="far fa-user-circle"><p style="font-size: 10px;">{{ $curso->views }}</p></i>
                                <i class="far fa-thumbs-up"><p style="font-size: 10px;">{{ $curso->likes }}</p></i>
                            </h6>           
                        </div>
                    </div>
                    </div>
                   </div>
                @endforeach
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
        <div style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 " style="padding-left: 30px;">
                    <div style="text-align: center; font-size: 34px; color: white; font-weight: bold; border: solid #919191 1px; background-color: #222326; margin-bottom: 10px; height: 330px; padding: 120px 15px;">
                        <i class="fa fa-user"></i><br>
                        739 Referidos
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