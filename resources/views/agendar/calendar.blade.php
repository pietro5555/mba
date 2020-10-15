@extends('layouts.landing')

{{-- fullcalendar--}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/calendario/fullcalendar.min.css')}}">

@push('scripts')
{{-- full calendar --}}
<script src="{{ asset('assets/calendario/moment.min.js')}}"></script>
<script src="{{ asset('assets/calendario/fullcalendar.min.js')}}"></script>
<script src="{{ asset('assets/calendario/idioma/es.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#calendario').fullCalendar({
      header: {
        left: 'prev,next,today',
        center: 'title',
        right: 'month, basicWeek, basicDay'
      },

      events: [
        @foreach($user_calendar as $calendario) {
          ID: '{{$calendario->id}}',
          iduser: '{{$calendario->iduser}}',
          title: '{{$calendario->titulo}}',
          color: '{{$calendario->color}}',
          start: '{{$calendario->inicio}}',
          end: '{{$calendario->vence}}',
          backgroundColor: '{{$calendario->color}}',
          borderColor: '{{$calendario->color}}',
        },
        @endforeach
      ],
      timeFormat: 'hh:mm a',


      dayClick: function(date, jsEvent, view) {
        $('#fechainicio').val(date.format("YYYY-MM-DD[T]HH:mm:ss"));
        $('#agregar').modal();
      },

      eventClick: function(calEvent, jsEvent, view) {
        $('#titulo').html(calEvent.title);
        $('#titu').val(calEvent.title);
        $('#color').val(calEvent.color);
        $('#ID').val(calEvent.ID);
        $('#iduser').val(calEvent.iduser);
        $('#inicio').val(calEvent.start.format());
        $('#vence').val(calEvent.end.format());


        if ($('#iduser').val() == {
            
              $usuario
            
          }) {
          $('.habilitar').removeAttr('disabled')
          $(".oculto").show("slow");
          $('#subcate').hide();
          if ($('#tipo').val() == 5) {
            $('#subcate').show();
          } else {
            $('#subcate').hide();
          }
        } else {
          $(".oculto").hide();
          if ($('#tipo').val() == 5) {
            $('#subcate').show();
          } else {
            $('#subcate').hide();
          }
        }

        $('#mostrar').modal();
      }

    });

    $(".connect").on('click', function() {
      $("#connect-form-" + $(this).attr('data-id')).submit();
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
    
   <div class="col-md-4" style="margin-top: 20px;">
                              @if (!is_null($agendado->mentor->avatar))
                                 <img src="{{ asset('uploads/avatar/'.$agendado->mentor->avatar) }}" class="card-img-top img-prox-events" alt="...">
                              @else
                                 <img src="{{ asset('uploads/images/avatar/default.jpg') }}" class="card-img-top img-prox-events" alt="...">
                              @endif
                              <div class="card-img-overlay d-flex flex-column" style="margin-left: 10px; margin-right: 10px;">
                                  <div class="mt-auto">
                                 <form action="{{route('timelive')}}" method="GET">
                                    @csrf
                                    <input id="sigEvent" name="sigEvent" type="hidden" value="{{ $agendado->id }}">
                                    <button class="btn text-left" type="submit" style=" color: #2A91FF;"><h2 class="streaming">{{$agendado->title}}</h2></button>
                                 </form>

                                 <p class="mr-2 text-white" style="margin-top: -10px; font-size: 12px;">   <i class="far fa-calendar mr-2" style="font-size: 18px !important;padding: 5px;"> </i>
                                    {{\Carbon\Carbon::parse($agendado->date)->formatLocalized(' %d de %B')}}
                                    <i class="far fa-clock ml-2" style="font-size: 18px !important;padding: 5px;" aria-hidden="true"></i>{{\Carbon\Carbon::parse($agendado->time)->format('g:i a')}}
                                 </p>
                                 @if (Auth::guest())
                                    {{-- USUARIOS INVITADOS --}}
                                    <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                                 @else
                                    @if (is_null(Auth::user()->membership_id))
                                       {{-- USUARIOS LOGUEADOS SIN MEMBRESÍA --}}
                                       <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                                    @else
                                       @if ($agendado->subcategory_id > Auth::user()->membership_id)
                                          {{-- USUARIOS LOGUEADOS CON MEMBRESÍA MENOR A LA SUBCATEGORÍA DEL EVENTO--}}
                                          <a href="{{route('shopping-cart.membership')}}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar al Carrito</a>
                                       @else
                                          @if (!in_array($agendado->id, $misEventosArray))
                                             {{-- USUARIOS LOGUEADOS CON MEMBRESÍA MAYOR O IGUAL A LA SUBCATEGORÍA DEL EVENTO Y QUE NO TIENEN EL EVENTO AGENDADO AÚN--}}
                                             <a href="{{route('schedule.event', [$agendado->id])}}" class="btn btn-success btn-block">Agendar</a>
                                          @else
                                             {{-- EL USUARIO YA TIENE EL EVENTO AGENDADO--}}
                                             <form action="{{route('timelive')}}" method="GET">
                                                @csrf
                                                <input id="sigEvent" name="sigEvent" type="hidden" value="{{ $agendado->id }}">
                                                <button class="btn btn-success btn-block" type="submit"><h4>Ir al Evento</h4></button>
                                             </form>
                                          @endif
                                       @endif
                                    @endif
                                 @endif
                                 </div>
                              </div>
                           </div>

    
  <form action="https://streaming.shapinetwork.com/connect-mba/{{$agendado->id}}/{{Auth::user()->ID}}" method="POST" id="connect-form-{{$agendado->id}}">
           @csrf
           <input type="hidden" name="email" value="{{ Auth::user()->user_email }}">
          <input type="hidden" name="password" value="{{ decrypt(Auth::user()->clave) }}">
      </form>
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