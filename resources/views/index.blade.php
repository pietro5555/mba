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

@push('styles')
    <style>
        #new-courses-section .card-img-overlay:hover{
            text-decoration: underline;
        }
    </style>
@endpush

@section('content')
    @if (Session::has('msj-exitoso'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>{{ Session::get('msj-exitoso') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::has('msj-erroneo'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong>{{ Session::get('msj-erroneo') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
  
	{{-- SLIDER --}}
    @if ($cursosDestacados->count() > 0)
    	<div class="container-fluid courses-slider">
    		<div id="mainSlider" class="carousel slide" data-ride="carousel">
                @if ($cursosDestacados->count() > 1)
                    @php $contCD = 0; @endphp
                    <ol class="carousel-indicators">
                        @foreach ($cursosDestacados as $cd)
                            <li data-target="#mainSlider" data-slide-to="{{ $contCD }}" @if ($contCD == 0) class="active" @endif></li>
                            @php $contCD++; @endphp
                        @endforeach
                    </ol>
                @endif
    	        <div class="carousel-inner">
                    @php $cont = 0; @endphp
                    @foreach ($cursosDestacados as $cursoDestacado)
                        @php $cont++; @endphp
        	            <div class="carousel-item @if ($cont == 1) active @endif">
        	                <img src="{{ asset('uploads/images/courses/featured_covers/'.$cursoDestacado->featured_cover) }}" class="d-block w-100" alt="...">
        	                <div class="carousel-caption">
        						<div class="course-autor">{{$cursoDestacado->mentor->display_name}}</div>
        						<div class="course-title"> <a href="{{ route('courses.show', [$cursoDestacado->slug, $cursoDestacado->id]) }}" style="color: white;">{{ $cursoDestacado->title }}</a></div>
        	                    <div class="course-category">{{ $cursoDestacado->category->title }} | {{ $cursoDestacado->subcategory->title }}</div>
        	                </div>
        	            </div>
                    @endforeach
                </div>
                @if ($cursosDestacados->count() > 1)
                    <a class="carousel-control-prev" href="#mainSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#mainSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                @endif
    	    </div>
    	</div>
    @endif
    {{-- FIN DEL SLIDER --}}

	{{-- SECCIÓN TU AVANCE (USUARIOS LOGGUEADOS) 
	@if (!Auth::guest())
        <div class="section-landing">
            <div class="section-title-landing">TU AVANCE</div>
            <div class="row">
                <div class="col text-left">Nivel: Principiante</div>
                <div class="col text-right">Próximo Nivel: Intermedio</div>
                <div class="w-100"></div>
                <div class="col" style="padding: 20px 20px;">
                	<div class="progress" style="background-color: #8E8E8E;">
		                <div class="progress-bar" role="progressbar" style="width: 35%; background-color: #2A91FF;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
		                <div class="progress-bar bg-success" role="progressbar" style="width: 35%; background: linear-gradient(to right, #2A91FF, #6AB742); border-radius: 30px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
		                <!--<div class="progress-bar bg-info" role="progressbar" style="width: 35%; background-color: #6AB742;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
		            </div>
                </div>
                <div class="w-100"></div>
                <div class="col text-left">Cursos Realizados: 7</div>
                <div class="col text-right">Cursos por Realizar: 4</div>
            </div>
        </div><BR><BR>
    @endif
   {{-- FIN DE SECCIÓN TU AVANCE (USUARIOS LOGGUEADOS) --}}

    {{-- SECCIÓN CURSOS MAS NUEVOS --}}
    @if ($cursosNuevos->count() > 0)
        <div class="section-landing new-courses-section" id="new-courses-section">
            <div class="row">
                <div class="col">
                    <div class="section-title-landing new-courses-section-title">LOS MÁS NUEVOS</div>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-outline-light btn-arrow btn-arrow-previous" @if ($previous == 0) disabled @endif data-route="{{ route('landing.load-more-courses-new', [$idStart, 'previous'] ) }}"  onclick="loadMoreCoursesNew('previous');"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-outline-success btn-arrow btn-arrow-next" @if ($next == 0) disabled @endif data-route="{{ route('landing.load-more-courses-new', [$idEnd, 'next'] ) }}"  onclick="loadMoreCoursesNew('next');"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
                   
            <div id="newers" class="row" style="padding: 10px 30px;">
                @foreach ($cursosNuevos as $cursoNuevo)
                    <div class="col-xl-4 col-lg-4 col-12" style="padding-bottom: 10px;">
                        <div class="card">
                            <a href="{{ route('courses.show', [$cursoNuevo->slug, $cursoNuevo->id]) }}" style="color: white;">

                            @if (!is_null($cursoNuevo->cover))
                                <img src="{{ asset('uploads/images/courses/covers/'.$cursoNuevo->cover) }}" class="card-img-top new-course-img" alt="...">
                            @else
                                <img src="{{ asset('uploads/images/courses/covers/default.jpg') }}" class="card-img-top new-course-img" alt="...">
                            @endif
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="mt-auto">
                                    <div class="new-course-title">{{ $cursoNuevo->title }}</div>
                                    <div class="row">
                                        <div class="col-12 col-xl-6 new-course-category">{{ $cursoNuevo->category->title }}</div>
                                        <div class="col-12 col-xl-6" style="font-size: 16px;">
                                            <div class="row row-cols-3">
                                                <div class="col text-right no-padding-sides mr-2">
                                                    <i class="far fa-user-circle"></i><br>
                                                    <span class="new-course-items-text">{{ $cursoNuevo->views}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    {{-- FIN DE SECCIÓN CURSOS MÁS NUEVOS--}}

    {{-- SECCIÓN PRÓXIMO STREAMING--}}
    @if (!is_null($proximoEvento))
        <div class="next-streaming">
            <img src="{{ asset('/uploads/images/banner/'.$proximoEvento->image) }}" class="next-streaming-img">
            <div class="next-streaming-info">
            	<button type="button" class="btn btn-primary btn-next-streaming">Próximo Streaming</button><br>
                                
                <div class="next-streaming-title">{{ $proximoEvento->title }}</div> 
                <div class="next-streaming-date">
                    <i class="fa fa-calendar"></i> {{ $proximoEvento->weekend_day }} {{ $proximoEvento->date_day }} de {{ $proximoEvento->month }}
                    <i class="fa fa-clock"></i> {{ date('H:i A', strtotime($proximoEvento->date)) }}
                </div>
                @if (!Auth::guest())
                    <div class="next-streaming-reserve">
                        <a href="{{ route('landing.book-event', $proximoEvento->id) }}">Reservar Plaza <i class="fas fa-chevron-right"></i></a>
                    </div>
                @endif
            </div>
        </div><br><br>
    @endif
    {{-- FIN SECCIÓN PRÓXIMO STREAMING--}}
	
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