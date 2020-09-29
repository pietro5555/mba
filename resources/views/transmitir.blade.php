@extends('layouts.landing')

@push('scripts')
    <script>
        const getRemainingTime = deadline => {
            let now = new Date(),
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

        const countdown = (deadline,elem) => {
            //const el = document.getElementById(elem);

            const timerUpdate = setInterval( () => {
                let t = getRemainingTime(deadline);
                //el.innerHTML = `${t.remainDays}d:${t.remainHours}h:${t.remainMinutes}m:${t.remainSeconds}s`;
                $('#'+elem).empty()

                if(t.remainTime <= 1) {
                    clearInterval(timerUpdate);
                    //$('#'+elem).append('<h1>El live ya a Iniciado</h1>');
                    $("#wait").css('display', 'none');
                    $("#live").css('display', 'block');
                }else{ 
                    $('#'+elem).append(
                        '<p class="p-1 bd-highlight" style="font-size: 66px;">'+t.remainDays +   
                            '<p style="margin-left: -40px; margin-top: 100px;">DIAS</p>'+
                        '</p>'+
                        '<p class="p-2 bd-highlight" style="font-size: 56px;">'+
                        ':'+
                        '</p>'+
                        '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
                        t.remainHours +
                            '<p style="margin-left: -68px; margin-top: 100px;">HORAS</p>'+
                        '</p>'+
                        '<p class="p-2 bd-highlight" style="font-size: 56px;">'+
                        ':'+
                        '</p>'+
                        '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
                        t.remainMinutes + 
                            '<p style="margin-left: -80px; margin-top: 100px;">MINUTOS</p>'+
                        '</p>'+
                        '<p class="p-2 bd-highlight" style="font-size: 56px;">'+
                            ':'+
                        '</p>'+
                        '<p class="p-1 bd-highlight" style="font-size: 66px;">'+
                        t.remainSeconds +
                        '<p style="margin-left: -85px; margin-top: 100px;">SEGUNDOS</p>'+
                        '</p>'
                    )
                }
            }, 1000)
        };
        countdown('{{$fechaEvento}}', 'clock');
    </script>
@endpush

@section('content')
    <div class="row" id="wait">
        <div class="col-md-12">
            @if (!is_null($evento->image))
                <img src="{{ asset('uploads/images/banner/'.$evento->image) }}" class="card-img-top img-banner-live" alt="..."> 
            @else
                <img src="{{ asset('uploads/images/banner/default.jpg') }}" class="card-img-top img-fluid img-banner-live" alt="...">
            @endif

            <div class="card-img-overlay counter-caption">
                <h6 class="card-title text-white text-center">TIEMPO PARA INICIAR EL LIVE</h6>
                <div class="d-flex justify-content-center bd-highlight mb-1 text-white" id="clock"></div>
            </div>
        </div>
    </div>

    <div class="row" id="live" style="display: none;">
        <div class="col-md-12">
            <!--<iframe src="{{ $evento->url_streaming }}" style="width: 100%; height: 700px;" frameborder="0"></iframe>-->
            <a href="https://streaming.shapinetwork.com/mba/stre.php?event={{$evento->uuid}}">Ir Al Live</a>
        </div>
    </div>
@endsection