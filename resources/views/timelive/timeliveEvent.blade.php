@extends('layouts.landing')

@push('scripts')
    <script>
        const getRemainingTime = deadline => {
            let objFecha = new Date()
            let now = new Date(objFecha.getUTCFullYear(), objFecha.getUTCMonth(), objFecha.getUTCDate(), objFecha.getUTCHours(), objFecha.getUTCMinutes(), objFecha.getUTCSeconds()),
                remainTime = (new Date(deadline) - now + 1000) / 1000,
                remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
                remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
                remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
                remainDays = Math.floor(remainTime / (3600 * 24));

            return {
                remainSeconds,
                remainMinutes,
                remainHours,
                remainDays,
                remainTime
            }
        };

        const countdown = (deadline, elem) => {
            //const el = document.getElementById(elem);

            const timerUpdate = setInterval(() => {
                let t = getRemainingTime(deadline);
                //el.innerHTML = `${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;
                $('#' + elem).empty()
            
                if ((t.remainTime <= 1) || ($("#statusLive").val() == 'live') ) {
                    clearInterval(timerUpdate);
                    $("#remain-time-text").css('display', 'none');
                    $("#checkCountdown").val(1);
                    $("#close").css('display', 'none');
                    $("#open").css('display', 'block');
                    if ($("#statusLive").val() == 'scheduled'){
                        $('#' + elem).append('<h1>El live está por iniciar</h1>');
                    }else if ($("#statusLive").val() == 'live'){
                        $('#' + elem).append('<h1>El live ya ha iniciado</h1>');
                    }else if ($("#statusLive").val() == 'ended'){
                        $('#' + elem).append('<h1>El live ya ha finalizado</h1>');
                    }else if ($("#statusLive").val() == 'cancelled'){
                        $('#' + elem).append('<h1>El live ha sido cancelado</h1>');
                    }
                    
                } else {
                    

                    $('#' + elem).append(

                        '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
                        t.remainDays +
                        '<p style="margin-left: -40px; margin-top: 100px; font-weight:800;">DIAS</p>' +
                        '</p>' +

                        '<p class="p-2 bd-highlight" style="font-size: 70px; font-weight:800;">' +
                        ':' +
                        '</p>' +

                        '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
                        t.remainHours +
                        '<p style="margin-left: -68px; margin-top: 100px; font-weight:800;">HORAS</p>' +
                        '</p>' +

                        '<p class="p-2 bd-highlight" style="font-size: 70px; font-weight:800;">' +
                        ':' +
                        '</p>' +

                        '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
                        t.remainMinutes +

                        '<p style="margin-left: -80px; margin-top: 100px; font-weight:800;">MINUTOS</p>' +
                        '</p>' +

                        '<p class="p-2 bd-highlight" style="font-size: 70px; font-weight:800;">' +
                        ':' +
                        '</p>' +
                        '<p class="p-1 bd-highlight" style="font-size: 80px; font-weight:800;">' +
                        t.remainSeconds +

                        '<p style="margin-left: -85px; margin-top: 100px; font-weight:800;">SEGUNDOS</p>' +
                        '</p>'

                    )
                }

            }, 1000)
        };
        countdown('{{$evento->date.' '.$evento->time}}', 'clock');
    </script>
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
            <div>
                <a href="{{route ('schedule.calendar')}}" class="btn btn-success"> VER AGENDA</a>
            </div>
        </div>
    @endif

    <div class="row">
        <input type="hidden" id="statusLive" value="{{ $statusLive }}">
        <input type="hidden" id="checkCountdown" value="0">
        <div class="col-md-12">
            @if (!is_null($evento->image))
                <img src="{{ asset('uploads/images/banner/'.$evento->image) }}" class="card-img-top img-banner-live" alt="...">
            @else
                <img src="{{ asset('uploads/images/banner/default.jpg') }}" class="card-img-top img-fluid img-banner-live" alt="...">
            @endif

            <div class="card-img-overlay counter-caption">
                <h6 class="card-title text-white text-center" id="remain-time-text">TIEMPO PARA INICIAR EL LIVE</h6>
                <div class="d-flex justify-content-center bd-highlight mb-1 text-white" id="clock"></div>
            </div>
        </div>
    </div>

    <div class="row ml-1 mb-1">
        <div class="col-md-8 kol">
            <h3 style="color: #2A91FF;margin-top: 20px;text-transform: uppercase;font-weight: 600;">{{$evento->title}}</h3>
            <hr color="white" size=3>
            <p class="text-white">
                {!!$evento->description!!}
            </p>

            <div style="margin-top: 60px;">
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 10px;">
                        <div id="close">
                             <a href="{{route('show.event', $evento->id)}}" class="btn btn-success btn-block">VER DETALLES DEL EVENTO</a>
                        </div> 
                        <div id="open" style="display: none;">
                            @if (Auth::user()->rol_id == 2)
                                @if ( ($statusLive == 'scheduled') || ($statusLive == 'live') )
                                    <form action="https://streaming.mybusinessacademypro.com/connect-mba/{{$evento->id}}/{{Auth::user()->ID}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ Auth::user()->user_email }}">
                                        <input type="hidden" name="password" value="{{ decrypt(Auth::user()->clave) }}">
                                        
                                        <button type="submit" class="btn btn-success btn-block">ENTRAR AL LIVE</button>  
                                    </form>
                                @else
                                    <a href="{{route('show.event', $evento->id)}}" class="btn btn-success btn-block">VER DETALLES DEL EVENTO</a>
                                @endif
                            @else
                                @if ($statusLive == 'live')
                                    <form action="https://streaming.mybusinessacademypro.com/connect-mba/{{$evento->id}}/{{Auth::user()->ID}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ Auth::user()->user_email }}">
                                        <input type="hidden" name="password" value="{{ decrypt(Auth::user()->clave) }}">
                                        
                                        <button type="submit" class="btn btn-success btn-block">ENTRAR AL LIVE</button>  
                                    </form>
                                @else
                                    <a href="{{route('show.event', $evento->id)}}" class="btn btn-success btn-block">VER DETALLES DEL EVENTO</a>
                                @endif
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12 " style="margin-top: 20px;">
            <div style="background:#25262B; margin-right: 10px; margin-left: 10px;">
                @if (!is_null($evento->mentor->avatar))
                    <img src="{{ asset('uploads/avatar/'.$evento->mentor->avatar) }}" class="card-img-top" alt="...">
                @else
                    <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top" alt="...">
                @endif
                <p style="color: white; padding-left: 10px;">Invitado</p>
                <h5 style="color:#2A91FF; margin-top: -20px; padding-left: 10px;">{{$evento->mentor->display_name}}</h5>
                <p style="color: white; padding-left: 10px;">{{$evento->mentor->profession}}</p>
                <p style="color:#FFFFFF; font-size: 18px; margin-top: 0px;padding-left: 10px"> {{$evento->mentor->about}}</p>
                <a href="#" class="btn btn-success btn-block">NIVEL: {{$evento->subcategory->title}}</a>
            </div>
        </div>
    </div>
@endsection