@extends('layouts.landing')

{{-- fullcalendar--}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/calendario/fullcalendar.min.css')}}">

@push('scripts')
{{-- full calendar --}}
<script src="{{ asset('assets/calendario/moment.min.js')}}"></script>
<script src="{{ asset('assets/calendario/fullcalendar.min.js')}}"></script>
<script src="{{ asset('assets/calendario/idioma/es.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){

      $('#calendario').fullCalendar({
        header:{
          left:'prev,next,today',
          center:'title',
          right:'month, basicWeek, basicDay'
        },

        events    : [
        @foreach($user_calendar as $calendario)
        {
          ID        : '{{$calendario->id}}',
          iduser    : '{{$calendario->iduser}}',
          title     : '{{$calendario->titulo}}',
          color     : '{{$calendario->color}}',
          start     : '{{$calendario->inicio}}',
          end       : '{{$calendario->vence}}',
          backgroundColor: '{{$calendario->color}}',
          borderColor    : '{{$calendario->color}}',
        },
        @endforeach
      ],
      timeFormat: 'hh:mm a',


      dayClick:function(date, jsEvent, view){
        $('#fechainicio').val(date.format("YYYY-MM-DD[T]HH:mm:ss"));
        $('#agregar').modal();
      },

      eventClick:function(calEvent,jsEvent,view){
        $('#titulo').html(calEvent.title);
        $('#titu').val(calEvent.title);
        $('#color').val(calEvent.color);
        $('#ID').val(calEvent.ID);
        $('#iduser').val(calEvent.iduser);
        $('#inicio').val(calEvent.start.format());
        $('#vence').val(calEvent.end.format());


        if($('#iduser').val() == {{$usuario}}){
        $('.habilitar').removeAttr('disabled')
        $(".oculto").show("slow");
        $('#subcate').hide();
        if($('#tipo').val() == 5){
            $('#subcate').show();
         }else{
             $('#subcate').hide();
         }
        }else{
             $(".oculto").hide();
             if($('#tipo').val() == 5){
            $('#subcate').show();
         }else{
             $('#subcate').hide();
         }
        }

        $('#mostrar').modal();
      }

      });
  });


    //evitar saltos de linia en el textarea
    function pulsar(e) {
     if (e.which === 13 && !e.shiftKey) {
    e.preventDefault();
    return false;
    }
  }

</script>
@endpush
@section('content')
<div>
@if(!empty($agendado))
  <div class="alert alert-success"> {{ $agendado }}</div>
@endif
</div>
<div>
  <h3 class="text-primary text-center mt-5 mb-5">EVENTOS AGENDADOS</h3>

</div>

<div class="container-fluid">
<div class="row">
        @foreach ($eventos_agendados as $agendado)
         <div class="col-md-4 mt-1 img-course-cat border-0">
                    @if (!is_null($agendado->image))
                    <img src="{{ asset('uploads/images/banner/'.$agendado->image) }}" class="card-img-top" alt="...">
                    @else
                        <img src="{{ asset('uploads/images/banner/default.png') }}" class="card-img-top" alt="...">
                    @endif
                   <div class="card-img-overlay clearfix">
                    <div class="row ml-0 d-flex h-100">
                        <div class="col-md-9 my-auto" style="margin-bottom: 0px !important">
                            <h6 class="col-sm w-100 pl-0" style="font-size: 14px"><i class="text-success fa fa-play-circle"></i> <a href="{{ route('show.event', $agendado->id) }}" class="text-white"> {{ $agendado->title }}</a></h6>
                            <h6 class="ml-2 text-white" style="font-size: 12px">

                            </h6>
                         </div>
                        <div class="col-md-3 my-auto" style="margin-bottom: 0px !important">
                            <h6 class="text-white w-100">
                                <i class="far fa-calendar text-center"><p style="font-size: 10px;">{{strftime("%d de %B",strtotime($agendado->date) )}}</p></i>
                            </h6>
                        </div>
                    </div>
                    </div>
          </div>


           <!-- <div class="col-md-3 bg-success" style="margin-top: 20px;">
                @if (!is_null($agendado->image))
                <img src="{{ asset('uploads/images/banner/'.$agendado->image) }}" class="card-img-top" alt="...">
                @else
                    <img src="{{ asset('uploads/images/banner/default.png') }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body" style="background-color: #2f343a; height: 150px">
                    <h6 class="card-title text-white" style="margin-top: -15px;"> <i class="far fa-play-circle" style="font-size: 16px; color: #6fd843;"></i> {{ $agendado->title }}</h6>
                    <h6 class="text-secondary">   {{strftime("%d de %B",strtotime($agendado->date) )}}</h6>
                    @if ($agendado->favorite ==1)
                    <h6 class="text-right"><img src="{{ asset('images/icons/heart.svg') }}" alt="" height="20px" width="20px"></h6>
                    @else
                    <a href="{{route('event.favorite', $agendado->event_id)}}" class="float-right"><i class="far fa-heart text-secondary" height="20px" width="20px"></i></a>
                    @endif
                </div>
            </div>-->
        @endforeach
</div>
</div>

<div>
  <h3 class="text-primary text-center mt-5 mb-5">CALENDARIO DE EVENTOS</h3>

</div>
<div class="container-fluid m-2">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="box box-info">
        <div class="box-body">
            <div id="calendario"></div>

      </div>
    </div>
</div>
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
