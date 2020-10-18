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

        .punto::before{
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #222326;
            border-radius: 50%;
            margin-left: -7px;
            z-index: 2;
        }

        .punto::after{
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            background: rgba(0,123,255,1);
            border-radius: 50%;
            margin-left: -12px;
        }

        .punto-end::before{
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #222326;
            border-radius: 50%;
            margin-left: -10px;
            z-index: 2;
        }

        .punto-end::after{
            content: '';
            position: absolute;
            width: 30px;
            height: 30px;
            background: rgba(40,167,70,1);
            border-radius: 50%;
            right: 0;
        }
        .punto.bg-success::after{
            background: rgba(0,123,255,0.99);
            background: -moz-linear-gradient(left, rgba(0,123,255,0.99) 0%, rgba(0,123,253,0.99) 1%, rgba(40,167,69,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(0,123,255,0.99)), color-stop(1%, rgba(0,123,253,0.99)), color-stop(100%, rgba(40,167,69,1)));
            background: -webkit-linear-gradient(left, rgba(0,123,255,0.99) 0%, rgba(0,123,253,0.99) 1%, rgba(40,167,69,1) 100%);
            background: -o-linear-gradient(left, rgba(0,123,255,0.99) 0%, rgba(0,123,253,0.99) 1%, rgba(40,167,69,1) 100%);
            background: -ms-linear-gradient(left, rgba(0,123,255,0.99) 0%, rgba(0,123,253,0.99) 1%, rgba(40,167,69,1) 100%);
            background: linear-gradient(to right, rgba(0,123,255,0.99) 0%, rgba(0,123,253,0.99) 1%, rgba(40,167,69,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007bff', endColorstr='#28a745', GradientType=1 );
        }

        .punto.invertido::after{
            background: rgba(0,6,191,1);
            background: -moz-linear-gradient(left, rgba(0,6,191,1) 0%, rgba(40,167,70,1) 0%, rgba(0,123,253,0.99) 99%, rgba(0,123,255,0.99) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(0,6,191,1)), color-stop(0%, rgba(40,167,70,1)), color-stop(99%, rgba(0,123,253,0.99)), color-stop(100%, rgba(0,123,255,0.99)));
            background: -webkit-linear-gradient(left, rgba(0,6,191,1) 0%, rgba(40,167,70,1) 0%, rgba(0,123,253,0.99) 99%, rgba(0,123,255,0.99) 100%);
            background: -o-linear-gradient(left, rgba(0,6,191,1) 0%, rgba(40,167,70,1) 0%, rgba(0,123,253,0.99) 99%, rgba(0,123,255,0.99) 100%);
            background: -ms-linear-gradient(left, rgba(0,6,191,1) 0%, rgba(40,167,70,1) 0%, rgba(0,123,253,0.99) 99%, rgba(0,123,255,0.99) 100%);
            background: linear-gradient(to right, rgba(0,6,191,1) 0%, rgba(40,167,70,1) 0%, rgba(0,123,253,0.99) 99%, rgba(0,123,255,0.99) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0006bf', endColorstr='#007bff', GradientType=1 );
        }

        .progress {
            display: -ms-flexbox;
            display: flex;
            height: 0.6rem;
            overflow: hidden;
            line-height: 0;
            font-size: .75rem;
            background: transparent linear-gradient(90deg, #2A91FF 0%, #257EDB 30%, #6AB742 100%) 0% 0% no-repeat padding-box;
            border-radius: .25rem;
        }

        .progress-bar-striped {
            background-size: 1rem 1rem;
            background: transparent;
        }

        .punto.bg-info::after{
            background: rgba(40,167,70,0.99);
            background: -moz-linear-gradient(left, rgba(40,167,70,0.99) 0%, rgba(40,167,71,0.99) 1%, rgba(23,163,184,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(40,167,70,0.99)), color-stop(1%, rgba(40,167,71,0.99)), color-stop(100%, rgba(23,163,184,1)));
            background: -webkit-linear-gradient(left, rgba(40,167,70,0.99) 0%, rgba(40,167,71,0.99) 1%, rgba(23,163,184,1) 100%);
            background: -o-linear-gradient(left, rgba(40,167,70,0.99) 0%, rgba(40,167,71,0.99) 1%, rgba(23,163,184,1) 100%);
            background: -ms-linear-gradient(left, rgba(40,167,70,0.99) 0%, rgba(40,167,71,0.99) 1%, rgba(23,163,184,1) 100%);
            background: linear-gradient(to right, rgba(40,167,70,0.99) 0%, rgba(40,167,71,0.99) 1%, rgba(23,163,184,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#28a746', endColorstr='#17a3b8', GradientType=1 );
        }
        .punto.bg-warning::after{
            background: rgba(23,163,184,0.99);
            background: -moz-linear-gradient(left, rgba(23,163,184,0.99) 0%, rgba(25,163,182,0.99) 1%, rgba(255,193,7,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(23,163,184,0.99)), color-stop(1%, rgba(25,163,182,0.99)), color-stop(100%, rgba(255,193,7,1)));
            background: -webkit-linear-gradient(left, rgba(23,163,184,0.99) 0%, rgba(25,163,182,0.99) 1%, rgba(255,193,7,1) 100%);
            background: -o-linear-gradient(left, rgba(23,163,184,0.99) 0%, rgba(25,163,182,0.99) 1%, rgba(255,193,7,1) 100%);
            background: -ms-linear-gradient(left, rgba(23,163,184,0.99) 0%, rgba(25,163,182,0.99) 1%, rgba(255,193,7,1) 100%);
            background: linear-gradient(to right, rgba(23,163,184,0.99) 0%, rgba(25,163,182,0.99) 1%, rgba(255,193,7,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#17a3b8', endColorstr='#ffc107', GradientType=1 );
        }
        .punto.bg-danger::after{
            background: rgba(255,193,7,0.99);
            background: -moz-linear-gradient(left, rgba(255,193,7,0.99) 0%, rgba(255,192,8,0.99) 1%, rgba(220,53,69,1) 100%);
            background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,193,7,0.99)), color-stop(1%, rgba(255,192,8,0.99)), color-stop(100%, rgba(220,53,69,1)));
            background: -webkit-linear-gradient(left, rgba(255,193,7,0.99) 0%, rgba(255,192,8,0.99) 1%, rgba(220,53,69,1) 100%);
            background: -o-linear-gradient(left, rgba(255,193,7,0.99) 0%, rgba(255,192,8,0.99) 1%, rgba(220,53,69,1) 100%);
            background: -ms-linear-gradient(left, rgba(255,193,7,0.99) 0%, rgba(255,192,8,0.99) 1%, rgba(220,53,69,1) 100%);
            background: linear-gradient(to right, rgba(255,193,7,0.99) 0%, rgba(255,192,8,0.99) 1%, rgba(220,53,69,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffc107', endColorstr='#dc3545', GradientType=1 );
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
        	                <div class="overlay" ></div>
        	                <img src="{{ asset('uploads/images/courses/featured_covers/'.$cursoDestacado->featured_cover) }}" class="d-block w-100" alt="...">
        	                <div class="carousel-caption">
                                <p style="color:#007bff; font-size: 22px; font-weight: bold; margin-top: -20px;">NUEVO CURSO</p>
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

   @auth
   <div class="col-12 section-landing mb-4" style="background: linear-gradient(to bottom, #222326 100%, #1C1D21 100%)">
        <div class="row">
            <div class="col-12">
                <div class="section-title-landing new-courses-section-title">TU AVANCE</div>
            </div>
            <div class="col-12 col-md-6">
                <h4 class="text-left">
                    Nivel: <span>{{$avance['nivel']}}</span>
                </h4>
            </div>
            <div class="col-12 col-md-6">
            <h4 class="text-right">
                Próximo Nivel: <span>{{$avance['proximo']}}</span>
            </h4>
            </div>
            <div class="col-12 mt-4">
                <div class="progress">
                    @if (Auth::user()->membership_id >= 1)
                    <div class="progress-bar progress-bar-striped punto" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    @if(Auth::user()->membership_id >= 2)
                    <div class="progress-bar progress-bar-striped punto invertido" role="progressbar" style="width: 20%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    @if(Auth::user()->membership_id >= 3)
                    <div class="progress-bar progress-bar-striped punto invertido" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    @if(Auth::user()->membership_id >= 4)
                    <div class="progress-bar progress-bar-striped punto invertido" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    @if(Auth::user()->membership_id >= 5)
                    <div class="progress-bar progress-bar-striped punto invertido" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped punto-end bg-danger " role="progressbar" style="width: 0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
            </div>
            </div>
            <div class="col-12 mt-4">
                <h4 class="">Cursos Realizados: {{$avance['cursos']}}</h4>
            </div>
        </div>
    </div>
   @endauth

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

                            @if (!is_null($cursoNuevo->mentor->avatar))
                                <img src="{{ asset('uploads/avatar/'.$cursoNuevo->mentor->avatar) }}" class="card-img-top new-course-img" alt="...">
                            @else
                                <img src="{{ asset('uploads/avatar/default.jpg') }}" class="card-img-top new-course-img" alt="...">
                            @endif
                            <div class="card-img-overlay d-flex flex-column">
                                <div class="mt-auto">
                                    <div class="new-course-title">{{ $cursoNuevo->title }}</div>
                                    <div class="row">
                                       <div class="col-md-12">
                                           <p class="ico" style="float: right;"> <i class="far fa-user-circle"> {{ $cursoNuevo->users->count()}}</i></p>
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
            	<a href="{{route('transmisiones')}}" type="button" class="btn btn-primary btn-next-streaming">Próximo Streaming</a><br>

                <div class="next-streaming-title">{{ $proximoEvento->title }}</div>
                <div class="next-streaming-date">
                    <i class="fa fa-calendar"></i> {{ $proximoEvento->weekend_day }} {{ $proximoEvento->date_day }} de {{ $proximoEvento->month }}
                    <i class="fa fa-clock"></i> {{ date('H:i A', strtotime($proximoEvento->time)) }}
                </div>
                @if (!Auth::guest())
                    <div class="next-streaming-reserve">
                        @if (is_null(Auth::user()->membership_id))
                            {{-- USUARIOS LOGUEADOS SIN MEMBRESÍA  --}}
                            <a href="{{route('shopping-cart.membership')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> AGREGAR AL CARRITO</a>
                        @else
                            @if ($evento_actual->subcategory_id > Auth::user()->membership_id)
                                {{-- USUARIOS LOGUEADOS CON MEMBRESÍA MENOR A LA SUBCATEGORÍA DEL EVENTO--}}
                                <a href="{{route('shopping-cart.membership')}}" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> MEJORAR MEMBRESÍA</a>
                            @else
                                @if (Auth::user()->membership_status == 1)
                                    @if (!in_array($evento_actual->id, $misEventosArray))
                                        {{-- USUARIOS LOGUEADOS CON MEMBRESÍA MAYOR O IGUAL A LA SUBCATEGORÍA DEL EVENTO Y QUE NO TIENEN EL EVENTO AGENDADO AÚN--}}
                                        <a href="{{ route('schedule.event', [$evento_actual->id]) }}">Reservar Plaza <i class="fas fa-chevron-right"></i></a>
                                    @else
                                        <a href="{{ route('timeliveEvent', $evento_actual->id) }}">Ir al Evento<i class="fas fa-chevron-right"></i></a>
                                    @endif
                                @else
                                    <a href="{{route('shopping-cart.membership')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> RENOVAR MEMBRESÍA</a>
                                @endif
                            @endif
                        @endif
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
