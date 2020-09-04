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
        	                <img src="{{ asset('uploads/images/courses/featured_covers/'.$cursoDestacado->featured_cover) }}" class="d-block w-100" alt="..." style="height: 550px;">
        	                <div class="carousel-caption">
        	                    <div class="course-label">NUEVO CURSO</div>
        						<div class="course-autor">John Doe</div>
        						<div class="course-title">{{ $cursoDestacado->title }}</div>
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

	{{-- SECCIÓN TU AVANCE (USUARIOS LOGGUEADOS) --}}
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
                   
            <div class="row" style="padding: 10px 30px;">
                @foreach ($cursosNuevos as $cursoNuevo)
                    <div class="col-xl-4 col-lg-4 col-12" style="padding-bottom: 10px;">
                        <div class="card" >
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
                                                <div class="col text-right no-padding-sides">
                                                    <i class="far fa-user-circle"></i><br>
                                                    <span class="new-course-items-text">1310</span>
                                                </div>
                                                <div class="col text-center no-padding-sides">
                                                    <i class="fas fa-share-alt"></i><br>
                                                    <span class="new-course-items-text">869</span>
                                                </div>
                                                <div class="col text-left no-padding-sides">
                                                    <i class="far fa-thumbs-up"></i><br>
                                                    <span class="new-course-items-text">1242</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    {{-- FIN DE SECCIÓN CURSOS MÁS NUEVOS--}}

    {{-- SECCIÓN PRÓXIMO STREAMING--}}
    <div class="next-streaming">
        <img src="{{ asset('images/banner_completo.png') }}" class="next-streaming-img">
        <div class="next-streaming-info">
        	<button type="button" class="btn btn-primary btn-next-streaming">Próximo Streaming</button><br>
                            
            <div class="next-streaming-title">Lorem ipsum up dolor sit amet</div> 
            <div class="next-streaming-date">
                <i class="fa fa-calendar"></i> Sábado 25 de Julio
                <i class="fa fa-clock"></i> 6:00 pm
            </div>
            <div class="next-streaming-reserve">
                <a href="">Reservar Plaza <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div><br><br>
    {{-- FIN SECCIÓN PRÓXIMO STREAMING--}}
	
	{{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 " style="padding-left: 30px;">
                    <div style="text-align: center; font-size: 34px; color: white; font-weight: bold; border: solid #919191 1px; background-color: #222326; margin-bottom: 10px; height: 330px; padding: 120px 15px;">
                        <i class="fa fa-user"></i><br>
                        {{$refeDirec}} Referidos
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