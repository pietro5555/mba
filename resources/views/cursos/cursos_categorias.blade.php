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
<div class="col-md-12 "><span>
          <h6 class="mt-3" style="color:#707070; ">
            <span>Cursos > </span>
            @if (!is_null ($category_name)) <span> {{ $category_name->title }} @else Búsqueda @endif</span>
          </h6>
          <hr style="border: 1px solid #707070;opacity: 1;" />
       </div>
    <div class="container-fluid">
        
        <div class="col mb-4 mt-4">
            <div class="title-page-course col-md"><span class="text-white">
                @if (!is_null ($category_name))
                    <h2>Cursos Online de<span class="text-primary"> "{{$category_name->title}}"</span></h2>
                @else
                    <h2>Cursos Online <span class="text-primary">relacionados</span></h2>
                @endif
            </div>
        </div>     
             
        <div class="row">
            @if ($courses->count() > 0)
                @foreach ($courses as $curso)

                <div class="col-md-4 mt-1 img-course-cat border-0">
                    @if (!is_null($curso->cover))
                        <img src="{{ asset('uploads/images/courses/covers/'.$curso->cover) }}" class="border-0 card-img-top img-opacity p-2" alt="..." style="border-top-left-radius: 0px !important; border-top-right-radius:0px !important;"> 
                        @else
                            <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="border-0 card-img-top img-opacity p-2" alt="..." style="border-top-left-radius: 0px !important; border-top-right-radius:0px !important;">
                        @endif
                   <div class="card-img-overlay clearfix">
                    <div class="row ml-0 d-flex h-100">
                        <div class="col-md-9 my-auto" style="margin-bottom: 0px !important">
                            <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><i class="text-success fa fa-play-circle"></i> <a href="{{ route('courses.show', [$curso->slug, $curso->id]) }}" class="text-white">{{ $curso->title }}</a></h6>
                            <h6 class="ml-2 text-white" style="font-size: 12px">
                                {{ $curso->category->title }}
                            </h6>
                         </div>
                        <div class="col-md-3 my-auto" style="margin-bottom: 0px !important">
                            <h6 class="text-white w-100">
                                <i class="far fa-user-circle text-center"><p style="font-size: 10px;">{{ $curso->views }}</p></i>
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